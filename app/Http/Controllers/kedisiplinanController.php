<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\disiplin;
use App\Models\finger;
use App\Models\days;
use App\Models\month;
use App\Models\total;

use Image;
use File;
use Auth;
use PDF;


use Carbon\Carbon;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcel;

class kedisiplinanController extends Controller
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
        $disiplin=disiplin::where('month_id',$id)->get();
        $days=days::where('month_id',$id)->get();
        $user=disiplin::where([
            ['month_id', '=', $id],
            ['total', '=', null],
        ])->get()->all();

       


        

        
        // dd($daystd["2022-04-28"]["key_1"]);
        return view('kedisiplinan.index',compact('data','disiplin','user','days'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('kedisiplinan.create');
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {

        // $this->validate($request, [
        //     'name' => 'required'
        // ]);

        $user= $request->input('nama');
        $disiplin=disiplin::where([
            ['user_id', '=', $user],
            ['month_id', '=', $id],
        ])->first();
       
        $dates= $request->input('date');
        $datangs= $request->input('timetf');
        $pulangs= $request->input('timepf');
        $datangss= $request->input('timet');
        $pulangss= $request->input('timep');
        $status= $request->input('status');


        foreach($dates as $key => $date) {
            $finger = new finger;
            $finger->date = $date;
            $finger->timetf = $datangs[$key];
            $finger->timepf = $pulangs[$key];
            $finger->timet = $datangss[$key];
            $finger->timep = $pulangss[$key];
            $finger->status = $status[$key];

           
          
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
            $selisihpulang = $pulangtimes->diffInMinutes($pulangtime, false);

           

            if($selisihdatang < 10  ){
                $finger->persentaset = 0;
            }elseif($selisihdatang >= 10 && $selisihdatang <= 30 ){
                $finger->persentaset = 0.5;
            }
            elseif($selisihdatang >= 31 && $selisihdatang <= 60 ){
                $finger->persentaset = 1;
            }
            elseif($selisihdatang >= 61 && $selisihdatang <= 90 ){
                $finger->persentaset = 1.25;
            }
            elseif($selisihdatang > 90 && $finger->status == 0){
                $finger->persentaset = 1.5;
            }
            elseif($selisihdatang > 90 && $finger->status == 1 ){
                $finger->persentaset = 1.5;
            }
            elseif($selisihdatang > 90 && $finger->status == 2){
                $finger->persentaset = 0;
            }
            elseif($selisihdatang > 90 && $finger->status == 3){
                $finger->persentaset = 0;
            }
            else{
                $finger->persentaset = 1.5;
            }

            if($selisihpulang < 10  ){
                $finger->persentasep = 0;
            }elseif($selisihpulang >= 10 && $selisihpulang <= 30 ){
                $finger->persentasep = 0.5;
            }
            elseif($selisihpulang >= 31 && $selisihpulang <= 60) {
                $finger->persentasep = 1;
            }
            elseif($selisihpulang >= 61 && $selisihpulang <= 90 ){
                $finger->persentasep = 1.25;
            }
            elseif($selisihpulang > 90 && $finger->status == 0 ){
                $finger->persentasep = 1.5;
            }
            elseif($selisihpulang > 90 && $finger->status == 1 ){
                $finger->persentasep = 1.5;
            }
            elseif($selisihpulang > 90 && $finger->status == 2 ){
                $finger->persentasep = 0;
            }
            elseif($selisihpulang > 90 && $finger->status == 3 ){
                $finger->persentasep = 0;
            }
           
            else{
                $finger->persentasep = 1.5;
            }

            // $finger->persentaset = $selisihdatang;
            // $finger->persentasep = $selisihpulang;
            

            $finger->total = $finger->persentaset + $finger->persentasep;
            $finger->user_id = $user;
            $finger->disiplin_id = $disiplin->id;
            $finger->save();

    }
       $totalsemua = finger::where([
        ['user_id', '=', $user],
        ['disiplin_id', '=', $disiplin->id],
        ])->get();

        $totals= 0;
        foreach($totalsemua as $key => $items)
        {
            $totals += $items->total;
        }

        if($request->file('file') != null){
            $tujuan_upload = 'data_file';
    
            $file = $request->file('file');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move($tujuan_upload,$nama_file);

        $disiplin->file = $nama_file;   
        $disiplin->total = $totals;
        $disiplin->save();

    }else{
        $disiplin->total = $totals;
        $disiplin->save();
    }

        $tabeltotal = total::where([
            ['user_id', '=', $user],
            ['month_id', '=', $id],
        ])->first();

        $tabeltotal->disiplin = $totals;
        $tabeltotal->save();

        

       

        // dd($anu);

        //request()->pic->move(public_path('assets/images'), $imageName);
        //return redirect('kedisiplinan');
		
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
       $data['kedisiplinan'] = kedisiplinan::where('id', $id)->get();
	   return view('kedisiplinan.lihat', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = finger::findOrFail($id);
       
        return response()->json([
            'data' => $data,
          
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
        $data = kedisiplinan::where('id', $id)->first();

    

		$data->nama = $request->nama;
        $data->tipe = $request->tipe;
        $data->max = $request->max;
		$data->jumlah = $request->jumlah;
		$data->harga = $request->harga;
        $data->satuan = $request->satuan;
        $data->jumlah = $request->jumlah;


       

	
        $data -> save();

    
    
		return redirect()->route('kedisiplinan.index')->with('alert-success', 'Data berhasil diubah!');
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = kedisiplinan::where('id', $id)->first();
		/**$picture = $data->pic;
        File::delete('images/'.$picture);
		*/
		kedisiplinan::find($id)->delete();
        return back();
    }
    public function export_excel()
	{
        return Excel::download(new ExportExcel, 'export.xlsx');
    
	}

    public function exportPDF($id) {
        $data=disiplin::findOrFail($id);
        $days=finger::where('disiplin_id',$id)->get();

        
        $totals= 0;

        foreach($days as $key => $items)
        {
            $totals += $items->total;
        }
 
        $pdf_doc = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('exporttpp_pdf', array('data' => $data,'days' => $days,'totals' => $totals))->setPaper('legal', 'potrait');

        return $pdf_doc->download('kedisiplinan.pdf');
        // return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('reports.invoiceSell')->stream();
    }    
}
