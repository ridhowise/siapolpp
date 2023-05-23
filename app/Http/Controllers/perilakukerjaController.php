<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\skp;
use App\Models\rencana;
use App\Models\ekspetasi;
use App\Models\akhlak;
use App\Models\indikator;
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

class perilakukerjaController extends Controller
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
        
        $data=skp::findOrFail($id);
        $dataz=ekspetasi::where('skp_id',$id)->get();
        // $datar=rencana::where('skp_id',$id)->first();
        // $datai=indikator::where('rencana_id',$datar->id)->get();

        // $atasan=$data->user->atasan->id;
        // $atasans=$data->user->atasan->name;

        // $skp = skp::where('user_id',$atasan)->first();
        // $skpnya = $skp->id;
        // $rencana = rencana::where('skp_id',$skpnya)->first();
        // $rencananya = $rencana->id;
        // $intervensi = indikator::where('rencana_id',$skpnya)->get();


        // $datai=indikator::where('rencana_id',$dataz->id)->get();
        
        // $indikator=days::where('month_id',$id)->get();
        // $user=disiplin::where([
        //     ['month_id', '=', $id],
        //     ['total', '=', null],
        // ])->get()->all();
       
       
       


        

        
        // dd($daystd["2022-04-28"]["key_1"]);
        return view('perilakukerja.index',compact('data','dataz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('perilakukerja.create');
		
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

        $dataz=ekspetasi::where('skp_id',$id)->get();

        $akhlak= $request->input('akhlak');
        $umpans= $request->input('umpan');
        $ekspetasis= $request->input('ekspetasi');
        // dd($dataz);
        foreach($dataz as $key => $data) {

            $data->umpan = $umpans[$key];
            $data->ekspetasi = $ekspetasis[$key];
            $data->save();

        }
       
        
       

        // dd($anu);

        //request()->pic->move(public_path('assets/images'), $imageName);
        //return redirect('perilakukerja');
		
		return redirect()->back()->with('alert-success', 'Berperilaku Menambahkan Data!');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data['perilakukerja'] = perilakukerja::where('id', $id)->get();
	   return view('perilakukerja.lihat', $data);
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
        $data = perilakukerja::where('id', $id)->first();

    

		$data->nama = $request->nama;
        $data->tipe = $request->tipe;
        $data->max = $request->max;
		$data->jumlah = $request->jumlah;
		$data->harga = $request->harga;
        $data->satuan = $request->satuan;
        $data->jumlah = $request->jumlah;


       

	
        $data -> save();

    
    
		return redirect()->route('perilakukerja.index')->with('alert-success', 'Data berperilaku diubah!');
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = perilakukerja::where('id', $id)->first();
		/**$picture = $data->pic;
        File::delete('images/'.$picture);
		*/
		perilakukerja::find($id)->delete();
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

        return $pdf_doc->download('perilakukerja.pdf');
        // return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('reports.invoiceSell')->stream();
    }    
}
