<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\keluar;
use App\Models\persediaan;
use App\Models\barangkeluar;
use App\Models\Level;
use Image;
use File;
use Auth;
use Carbon\Carbon;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcel;

class keluarController extends Controller
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
	 
    public function index()
    {
        $data=keluar::all();
        $barangs=persediaan::all();
        $users=user::where('level_id','<>' ,3)->get();

        return view('keluar.index',compact('data','barangs','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('keluar.create');
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $tujuan_upload = 'data_file';

        $file = $request->file('file');
		$nama_file = time()."_".$file->getClientOriginalName();
		$file->move($tujuan_upload,$nama_file);
        
        $data = new keluar;
		$data->tanggal = $request->tanggal;
        $data->user_id = $request->user_id;
        $data->status = 0;
        $data->file = $nama_file;

       
        $data -> save();

        $barangs = $request->input('barang');
        $jumlahs = $request->input('jumlah');

        foreach($barangs as $key => $barang_id) {
          
            $datas = persediaan::find($barang_id);
            $dataz = new barangkeluar;
            $ada = $datas->jumlah;
            $dataz->barang_id = $barang_id;
            $dataz->tanggal = $request->tanggal;
            $dataz->keluar_id = $data->id;
            $dataz->keluar = $jumlahs[$key];
            $dataz->total = $jumlahs[$key]*$datas->harga;
            $dataz->status = 0;
            $dataz->save();

        }
       

        


       


        // dd($anu);

        //request()->pic->move(public_path('assets/images'), $imageName);
        //return redirect('keluar');
		
		return redirect()->route('keluar.index')->with('alert-success', 'Berhasil Menambahkan Data!');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data['keluar'] = keluar::where('id', $id)->get();
	   return view('keluar.lihat', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = keluar::findOrFail($id);
        $soal = soal::where('keluar_id',$id);
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
        $data = keluar::where('id', $id)->first();

    

		$data->name = $request->name;
        $data->class_id = $request->class_id;
        $data->types = $request->types;
       

	
        $data -> save();

    
    
		return redirect()->route('keluar.index')->with('alert-success', 'Data berhasil diubah!');
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = keluar::where('id', $id)->first();

        if($data->status == 1){

        $barangkeluar=barangkeluar::where('keluar_id',$id)->get();


        foreach($barangkeluar as $key => $barang){
            $barangkeluar = $barang->barang_id;
            $jumlahs = $barang->keluar;
            $datas = persediaan::find($barangkeluar);
            $ada = $datas->jumlah;
            $datas->jumlah = $ada+$jumlahs;
            $datas->save();
        }
		/**$picture = $data->pic;
        File::delete('images/'.$picture);
		*/
		keluar::find($id)->delete();

    }else{
        keluar::find($id)->delete();

    }
        return back();
    }
    public function export_excel()
	{
		return Excel::download(new ExportExcel, 'data.xlsx');
	}
}
