<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\persediaan;
use App\Models\barangmasuk;
use App\Models\month;
use App\Models\kinerja;
use App\Models\disiplin;
use App\Models\produktifitas;
use App\Models\finger;
use Image;
use File;
use Auth;
use Carbon\Carbon;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcel;

class daftarkinerjaController extends Controller
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
        $data=kinerja::all();
        $user=User::all();

        return view('daftarkinerja.index',compact('data','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('daftarkinerja.create');
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


       
        $kinerjas = $request->input('kinerja');


       
        foreach($kinerjas as $key => $kinerja) {
            $data = new kinerja;
            $data->user_id = $request->input('nama');
            $data->kinerja = $kinerja;
            $data -> save();


        }

        

        

       

        


       


        // dd($anu);

        //request()->pic->move(public_path('assets/images'), $imageName);
        //return redirect('daftarkinerja');
		
		return redirect()->route('daftarkinerja.index')->with('alert-success', 'Berhasil Menambahkan Data!');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data['daftarkinerja'] = daftarkinerja::where('id', $id)->get();
	   return view('daftarkinerja.lihat', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = daftarkinerja::findOrFail($id);
        $soal = soal::where('daftarkinerja_id',$id);
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
        $data = daftarkinerja::where('id', $id)->first();

    

		$data->name = $request->name;
        $data->class_id = $request->class_id;
        $data->types = $request->types;
       

	
        $data -> save();

    
    
		return redirect()->route('daftarkinerja.index')->with('alert-success', 'Data berhasil diubah!');
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = kinerja::where('id', $id)->first();
		/**$picture = $data->pic;
        File::delete('images/'.$picture);
		*/
		kinerja::find($id)->delete();
        return back();
    }
    public function export_excel()
	{
		return Excel::download(new ExportExcel, 'data.xlsx');
	}
}
