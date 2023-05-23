<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\tahunan;
use App\Models\usertahun;
use App\Models\month;
use App\Models\skp;
use App\Models\rencana;
use App\Models\ekspetasi;
use App\Models\hasilskp;
use App\Models\akhlak;
use App\Models\days;
use App\Models\disiplin;
use App\Models\produktifitas;
use App\Models\finger;
use App\Models\total;
use Image;
use File;
use Auth;
use Carbon\Carbon;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcel;

class skpController extends Controller
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
        $data=skp::all();
        $users=User::all();
        


        return view('skp.index',compact('data','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('skp.create');
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          
        $data = new skp;
        $data->tahun = $request->input('tahun');
        $data->user_id = $request->input('user_id');

        $data -> save();

        $rencana = new rencana;
        $rencana->skp_id = $data->id;
        $rencana->rencana = null;
        $rencana->intervensi = null;
        $rencana->save();

        $akhlaks=akhlak::all();

        foreach($akhlaks as $akhlak) {
            $ekspetasi = new ekspetasi;
            $ekspetasi->akhlak_id = $akhlak->id;
            $ekspetasi->skp_id = $data->id;
            $ekspetasi->umpan = null;
            $ekspetasi->ekspetasi = null;
            $ekspetasi->save();

        }

        $hasil = new hasilskp;
        $hasil->skp_id = $data->id;
        $hasil->organisasi = null;
        $hasil->pegawai= null;
        $hasil->baik= 27;
        $hasil->sangatbaik= 10;
        $hasil->save();

        
    
       
      

        // dd($anu);

        //request()->pic->move(public_path('assets/images'), $imageName);
        //return redirect('skp');
		
		return redirect()->route('skp.index')->with('alert-success', 'Berhasil Menambahkan Data!');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data['skp'] = skp::where('id', $id)->get();
	   return view('skp.lihat', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = skp::findOrFail($id);
        $soal = soal::where('skp_id',$id);
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
        $data = skp::where('id', $id)->first();

    

		$data->name = $request->name;
        $data->class_id = $request->class_id;
        $data->types = $request->types;
       

	
        $data -> save();

    
    
		return redirect()->route('skp.index')->with('alert-success', 'Data berhasil diubah!');
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = skp::where('id', $id)->first();
		/**$picture = $data->pic;
        File::delete('images/'.$picture);
		*/
		skp::find($id)->delete();
        return back();
    }
    public function export_excel($id)
	{
		return Excel::download(new ExportExcel, 'tpp.xlsx');
	}
}
