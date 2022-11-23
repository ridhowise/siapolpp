<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\persediaan;
use App\Models\suratkeluar;
use App\Models\masuk;
use App\Models\indeks;


use Image;
use File;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcel;

class suratkeluarController extends Controller
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
        $data=suratkeluar::all();
        $indeks = indeks::all();

        
        return view('suratkeluar.index',compact('data','indeks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data=suratkeluar::all();
        $indeks = indeks::all();
       
        return view('suratkeluar.create',compact('data','indeks'));
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $admin=Auth::User()->id;

        $tujuan_upload = 'data_file';

        $file = $request->file('file');
		$nama_file = time()."_".$file->getClientOriginalName();
		$file->move($tujuan_upload,$nama_file);
        
        $data = new suratkeluar;

		$data->nosurat = $request->nosurat;
        $data->judulsurat = $request->judulsurat;
        $data->tujuan = $request->tujuan;
        $data->tanggalkeluar = $request->tanggalkeluar;
        $data->keterangan = $request->keterangan;
        $data->indeks_id = $request->indeks_id;


        // $data->user_id = $admin;
        $data->file = $nama_file;

       
        $data -> save();

       

        



        

            
        


        //request()->pic->move(public_path('assets/images'), $imageName);
        //return redirect('suratkeluar');
		
        return back();
           
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
        $data = suratkeluar::findOrFail($id);
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
        $data = suratkeluar::where('id', $id)->first();

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
        
        
        $data = new suratkeluar;
		$data->nosurat = $request->nosurat;
        $data->judulsurat = $request->judulsurat;
        $data->tujuan = $request->tujuan;
        $data->tanggalkeluar = $request->tanggalkeluar;
        $data->keterangan = $request->keterangan;
        $data->indeks_id = $request->indeks_id;

        $data->file = $nama_file;

       
        $data -> save();

       


	
        $data -> save();
		return redirect()->route('suratkeluar.index')->with('alert-success', 'Data berhasil diubah!');
		
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
    
    
        return back()->with('style', 'warning')->with('alert', '')->with('msg', 'Anda telah hadir di suratkeluar ini');
    }
    public function destroy($id)
    {
        $data = suratkeluar::where('id', $id)->first();
		/**$picture = $data->pic;
        File::delete('images/'.$picture);
		*/
		suratkeluar::find($id)->delete();
        return back();
    }
    public function export_excel()
	{
		return Excel::download(new ExportExcel, 'data.xlsx');
	}
}
