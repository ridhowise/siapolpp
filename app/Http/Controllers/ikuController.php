<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\persediaan;
use App\Models\perencanaan;
use App\Models\masuk;
use App\Models\indeks;
use Image;
use File;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcel;

class ikuController extends Controller
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
        $data=perencanaan::where('tipe', '=', 3)->get();
        $indeks = indeks::all();

        
        return view('iku.index',compact('data','indeks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data=perencanaan::all();
        $indeks = indeks::all();
       
        return view('iku.create',compact('data','indeks'));
		
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
        
        $data = new perencanaan;
        $data->judul = $request->judul;
        $data->tipe = 3;



        // $data->user_id = $admin;
        $data->file = $nama_file;

       
        $data -> save();

       

        



        

            
        


        //request()->pic->move(public_path('assets/images'), $imageName);
        //return redirect('perencanaan');
		
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
        $data = perencanaan::findOrFail($id);
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
        $data = perencanaan::where('id', $id)->first();

		if ($request->file('filee')) {
            $tujuan_upload = 'data_file';

            $file = $request->file('filee');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move($tujuan_upload,$nama_file);
        } else {
            $nama_file = $request->file;
        }
        
		
        $data->judul = $request->judul;
        $data->tipe = 3;

        // $data->user_id = $admin;
        $data->file = $nama_file;

       
        $data -> save();
		return redirect()->route('iku.index')->with('alert-success', 'Data berhasil diubah!');
		
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
    
    
        return back()->with('style', 'warning')->with('alert', '')->with('msg', 'Anda telah hadir di perencanaan ini');
    }
    public function destroy($id)
    {
        $data = perencanaan::where('id', $id)->first();
		/**$picture = $data->pic;
        File::delete('images/'.$picture);
		*/
		perencanaan::find($id)->delete();
        return back();
    }
    public function export_excel()
	{
		return Excel::download(new ExportExcel, 'data.xlsx');
	}
}
