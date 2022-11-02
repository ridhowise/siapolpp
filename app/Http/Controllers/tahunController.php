<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\tahun;
use Image;
use File;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcel;

class tahunController extends Controller
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
        $data=tahun::all();

        // $total=array_sum($tahun->total);
    
        // dd($tahun);
        
        // foreach($tahun as $tahunz => $barangz ){
        // $barangs=persediaan::where('id',$barangz->barang_id)->get();
        // }
        // dd($barangs);


        
        return view('tahun.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('tahun.create');

		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = new tahun();
		$data->tahun = $request->tahun;
		$data->save();

        

            
        


        //request()->pic->move(public_path('assets/images'), $imageName);
        //return redirect('tahun');
		
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
        $data = tahun::findOrFail($id);
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
        $data = tahun::where('id', $id)->first();

		$data->tahun = $request->tahun;
       



	
        $data -> save();
		return redirect()->route('tahun.index')->with('alert-success', 'Data berhasil diubah!');
		
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
    
    
        return back()->with('style', 'warning')->with('alert', '')->with('msg', 'Anda telah hadir di tahun ini');
    }
    public function destroy($id)
    {
        $data = tahun::where('id', $id)->first();
		/**$picture = $data->pic;
        File::delete('images/'.$picture);
		*/
		tahun::find($id)->delete();
        return back();
    }
    public function export_excel()
	{
		return Excel::download(new ExportExcel, 'data.xlsx');
	}
}
