<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\masuk;
use App\Models\produktifitas;
use App\Models\finger;
use App\Models\days;
use App\Models\month;
use App\Models\keluar;
use App\Models\barangkeluar;
use Image;
use File;
use Auth;
use PDF;


use Carbon\Carbon;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcel;

class inputkinerjaController extends Controller
{
	
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	public function __construct(){
    	$this -> middleware('auth');    	
    	//$this -> middleware('akses:2');
    } 
	 
    public function index($id)
    {
        
        $data=User::findOrFail($id);
        $kinerja=kinerja::where('user_id',$id)->get();
        $user=produktifitas::where([
            ['month_id', '=', $id],
            ['file', '=', ''],
        ])->get()->all();
        $days=days::where('month_id',$user)->get();


        

        
        // dd($daystd["2022-04-28"]["key_1"]);
        return view('produktifitas.index',compact('data','kinerja','user','days'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('produktifitas.create');
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {

        $user= $request->input('nama');
        $produktifitas=produktifitas::where([
            ['user_id', '=', $user],
            ['month_id', '=', $id],
        ])->first();
       
        $dates= $request->input('date');
        $datangs= $request->input('timetf');
        $pulangs= $request->input('timepf');
        $datangss= $request->input('timet');
        $pulangss= $request->input('timep');

        foreach($dates as $key => $date) {
            $finger = new finger;
            $finger->date = $date;
            $finger->timetf = $datangs[$key];
            $finger->timepf = $pulangs[$key];
            $finger->timet = $datangss[$key];
            $finger->timep = $pulangss[$key];

            $fingerpulang = date("g:i a", strtotime(str_replace('-','/', $finger->timep)));
            $fingerpulangs = date("g:i a", strtotime(str_replace('-','/', $finger->timepf)));

           
            if($finger->timetf == null){
                $datangtime = Carbon::parse($finger->timet);           
                $datangtimes = Carbon::parse("12:00:00");
            }else{
                $datangtime = Carbon::parse($finger->timet);           
                $datangtimes = Carbon::parse($finger->timetf);
            }
            
            $pulangtime = Carbon::parse($fingerpulang);
            $pulangtimes = Carbon::parse($fingerpulangs);

            $selisihdatang = $datangtime->diffInMinutes($datangtimes, false);
            $selisihpulang = $pulangtimes->diffInMinutes($pulangtime, false) + 1020;

            if($selisihdatang < 10){
                $finger->persentaset = 0;
            }elseif($selisihdatang >= 10 && $selisihdatang <= 29){
                $finger->persentaset = 0.5;
            }
            elseif($selisihdatang >= 30 && $selisihdatang <= 59){
                $finger->persentaset = 1;
            }
            elseif($selisihdatang >= 60 && $selisihdatang <= 90){
                $finger->persentaset = 1.25;
            }
            elseif($selisihdatang > 91 ){
                $finger->persentaset = 1.5;
            }
            else{
                $finger->persentaset = 1.5;
            }

            if($selisihpulang < 10){
                $finger->persentasep = 0;
            }elseif($selisihpulang >= 10 && $selisihpulang <= 29){
                $finger->persentasep = 0.5;
            }
            elseif($selisihpulang >= 30 && $selisihpulang <= 59){
                $finger->persentasep = 1;
            }
            elseif($selisihpulang >= 60 && $selisihpulang <= 90){
                $finger->persentasep = 1.25;
            }
            elseif($selisihpulang > 91 ){
                $finger->persentasep = 1.5;
            }
            else{
                $finger->persentasep = 1.5;
            }

            // $finger->persentaset = $selisihdatang;
            // $finger->persentasep = $selisihpulang;
            

            $finger->total = $finger->persentaset + $finger->persentasep;
            $finger->user_id = $user;
            $finger->produktifitas_id = $produktifitas->id;
            $finger->save();

    }
        $produktifitas->total = $finger->total;
        $produktifitas->save();


        

       

        // dd($anu);

        //request()->pic->move(public_path('assets/images'), $imageName);
        //return redirect('produktifitas');
		
		return redirect()->route('rekap.index')->with('alert-success', 'Berhasil Menambahkan Data!');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data['produktifitas'] = produktifitas::where('id', $id)->get();
	   return view('produktifitas.lihat', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = produktifitas::findOrFail($id);
        $soal = soal::where('produktifitas_id',$id);
        return response()->json([
            'data' => $data,
            'soal' => $soal,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = produktifitas::where('id', $id)->first();

    

		$data->nama = $request->nama;
        $data->tipe = $request->tipe;
        $data->max = $request->max;
		$data->jumlah = $request->jumlah;
		$data->harga = $request->harga;
        $data->satuan = $request->satuan;
        $data->jumlah = $request->jumlah;


       

	
        $data -> save();

    
    
		return redirect()->route('produktifitas.index')->with('alert-success', 'Data berhasil diubah!');
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = produktifitas::where('id', $id)->first();
		/**$picture = $data->pic;
        File::delete('images/'.$picture);
		*/
		produktifitas::find($id)->delete();
        return back();
    }
    public function export_excel()
	{
        return Excel::download(new ExportExcel, 'export.xlsx');
    
	}

    public function exportPDF() {

        $data=produktifitas::all();
        $days=days::where("tanggal",">", Carbon::now()->subMonths(3))->groupBy('tanggal')->get();
        $daystd=[];
        $barangkeluar=barangkeluar::where("tanggal",">", Carbon::now()->subMonths(3))->groupBy('tanggal')->get();
        $barangkeluartd=[];

        foreach($days as $b) {
            $daystd[$b->tanggal] = null;
        }
        foreach($daystd as $key => $value) {
            $currentDateItems = days::where('tanggal', $key)->get();
            foreach($currentDateItems as $cur) {
                $daystd[$key]["key_" . $cur->barang_id] = $cur->masuk;
            }
        }
        foreach($barangkeluar as $c) {
            $barangkeluartd[$c->tanggal] = null;
        }
        foreach($barangkeluartd as $keys => $value) {
            $currentDateItemss = barangkeluar::where('tanggal', $keys)->get();
            foreach($currentDateItemss as $curs) {
                $barangkeluartd[$keys]["key_" . $curs->barang_id] = $curs->keluar;
            }
        }
        
        $pdf_doc = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('exportt_pdf', array('data' => $data,'days' => $days, 'daystd' => $daystd,'barangkeluar' => $barangkeluar,'barangkeluartd' => $barangkeluartd))->setPaper('a4', 'landscape');

        return $pdf_doc->download('produktifitas.pdf');
        // return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('reports.invoiceSell')->stream();
    }    
}
