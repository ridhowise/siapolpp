<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\persediaan;
use App\Models\barangkeluar;
use App\Models\keluar;
use PDF;
use Image;
use File;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcel;
use Terbilang;
use Carbon\Carbon;
use NumConvert;

class barangkeluarController extends Controller
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
        $data=keluar::findOrFail($id);
        $barangkeluar=barangkeluar::where('keluar_id',$id)->get();
        $barangs=persediaan::all();
        $total=barangkeluar::where('keluar_id',$id)->sum('total');

      
       
        // dd($barangkeluar);
        
        // foreach($barangkeluar as $barangkeluarz => $barangz ){
        // $barangs=persediaan::where('id',$barangz->barang_id)->get();
        // }
        // dd($barangs);


        
        return view('barangkeluar.index',compact('data','barangkeluar','barangs','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data=keluar::findOrFail($id);
        $barangkeluar=barangkeluar::where('keluar_id',$id)->get();
        $barangs=persediaan::all();
        return view('barangkeluar.index',compact('data','barangkeluar','barangs'));
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $data=keluar::findOrFail($id);
        $data->status = $request->input('status');
        $data->save();

        $barangs = $request->input('id');
        $jumlahs = $request->input('jumlah');

        

        foreach($barangs as $key => $barang_id) {

           
            $datas = persediaan::find($barang_id);
            $ada = $datas->jumlah;
            $datas->jumlah = $ada-$jumlahs[$key];
            $datas->save();

            $datazz= barangkeluar::where('keluar_id',$id)->get();

            foreach($datazz as $dataw){
            $dataw->status = $request->input('status');
            $dataw->save();

        }
    
         

        }

        

            
        

		return redirect()->route('keluar.index')->with('alert-success', 'Berhasil Menambahkan Data!');

        //request()->pic->move(public_path('assets/images'), $imageName);
        //return redirect('pertemuan');
	
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = pertemuan::findOrFail($id);
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
        $data = pertemuan::where('id', $id)->first();

		if ($request->file('image')) {
            $image = $request->file('image');

            $file_name = time(). rand(1111, 9999) . '.' .$image->getClientOriginalExtension();

            // $save_Path = 'images/'.$file_name;
            //$save_Path = public_path('images/'.$file_name);

            //Image::make($image->getRealPath())->resize(300, 236)->save($save_Path);
            $image->move('images',$file_name);
            \Image::make('images/'.$file_name)->resize(300, 300)->save('images/'.$file_name);
        } else {
            $file_name = null;
        }
        
        $data = new pertemuan;
		$data->name = $request->name;
        $data->tanggal = $request->tanggal;
		$data->debit = $request->debit;
        $data->credit = $request->credit;
        $data->source = $request->source;
        $data->balance = $request->balance;
        $data->pic = $file_name;



	
        $data -> save();
		return redirect()->route('pertemuan.index')->with('alert-success', 'Data berhasil diubah!');
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function kehadiran($id)
    {
        $hadir     = kehadiran::find($id);
        $hadir->status = 1;
        $hadir->save();
    
    
        return back()->with('style', 'warning')->with('alert', '')->with('msg', 'Anda telah hadir di pertemuan ini');
    }
    public function destroy($id)
    {
        $data = pertemuan::where('id', $id)->first();
		/**$picture = $data->pic;
        File::delete('images/'.$picture);
		*/
		pertemuan::find($id)->delete();
        return back();
    }
    public function export_excel()
	{
		return Excel::download(new ExportExcel, 'data.xlsx');
	}

    public function exportPDF($id) {

        $data=keluar::findOrFail($id);
        $barangkeluar=barangkeluar::where('keluar_id',$id)->get();
        $barangs=persediaan::all();
        $createdAt = Carbon::parse($data['tanggal']);
        $months = $createdAt->format('n');
        $year= $createdAt->format('Y');
        $array_bln = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $month = $array_bln[$months];   
        
       

        $pdf_doc = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->setPaper('8.27x13', 'portrait')->loadView('export_pdf', array('data' => $data,'barangkeluar'=>$barangkeluar,'barangs'=>$barangs,'month'=>$month,'year'=>$year));

        return $pdf_doc->download('rekap.pdf');
        // return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('reports.invoiceSell')->stream();
    }    
}
