<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\total;
use App\Models\produktifitas;
use App\Models\kinerja;
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

class produktifitasController extends Controller
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
        
        $data=month::findOrFail($id);
        $produktifitas=produktifitas::where('month_id',$id)->with('user')->get()->sortByDesc('user.salary');
        $user=produktifitas::where([
            ['month_id', '=', $id],
            ['file', '=', null],
        ])->get()->all();

        // dd($user);
        $days=days::where('month_id',$id)->get();


        

        
        // dd($daystd["2022-04-28"]["key_1"]);
        return view('produktifitas.index',compact('data','produktifitas','user','days'));
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
        $nilaitotal=total::where([
            ['user_id', '=', $user],
            ['month_id', '=', $id],
        ])->first();
       
        $kinerjas= $request->input('kinerja');
        $outputt= $request->input('outputt');
        $kuantitast= $request->input('kuantitast');
        $kuantitasr= $request->input('kuantitasr');

        // dd($kuantitast);

        
        foreach($kinerjas as $key => $kinerja) {
            $kinerjaa = new kinerja;
            $kinerjaa->kinerja = $kinerja;
            $kinerjaa->kuantitast = $kuantitast[$key];
            $kinerjaa->outputt = $outputt[$key];
            $kinerjaa->outputr = $outputt[$key];
            $kinerjaa->kuantitasr = $kuantitasr[$key];
            $kinerjaa->total = $kinerjaa->kuantitasr * 100 /  $kinerjaa->kuantitast;
            $kinerjaa->user_id = $user;
            $kinerjaa->produktifitas_id = $produktifitas->id;
            $kinerjaa->save();

    }
    $totalsemua = kinerja::where([
        ['user_id', '=', $user],
        ['produktifitas_id', '=', $produktifitas->id],
        ])->get();

        $kuantitastt= 0;
        $kuantitasrr= 0;
        foreach($totalsemua as $key => $items)
        {
            $kuantitastt +=$items->kuantitast;
            $kuantitasrr +=$items->kuantitasr;
        }
        $tujuan_upload = 'data_file';
        if($request->file('file')){
        $file = $request->file('file');
		$nama_file = time()."_".$file->getClientOriginalName();
		$file->move($tujuan_upload,$nama_file);

        $produktifitas->file = $nama_file;
        $produktifitas->total = 100 - $kuantitasrr *100 / $kuantitastt;
        $produktifitas->save();
        }else{
            $produktifitas->total = 100 - $kuantitasrr *100 / $kuantitastt;
            $produktifitas->save();
        }


        

        $nilaitotal->produktifitas = 100 - $kuantitasrr *100 / $kuantitastt;
        $nilaitotal->save();
        

       

        // dd($anu);

        //request()->pic->move(public_path('assets/images'), $imageName);
        //return redirect('produktifitas');
		
		return redirect()->back()->with('alert-success', 'Berhasil Menambahkan Data!');
           
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
