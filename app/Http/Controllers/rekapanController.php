<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\month;
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

class rekapanController extends Controller
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
        $data=month::all();
        $days=days::all();

        return view('rekapan.index',compact('data','days'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('rekapan.create');
		
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
          
        $data = new month;
        $data->awal = $request->input('awal');
        $data->akhir = $request->input('akhir');
        $data->status = 0;
        $data->file = $nama_file;

        $data -> save();

        $dates= $request->input('date');
        $datangs= $request->input('timet');
        $pulangs= $request->input('timep');

       
        foreach($dates as $key => $date) {
            $datas = new days;
            $datas->date = $date;
            $datas->timet = $datangs[$key];
            $datas->timep = $pulangs[$key];
            $datas->month_id = $data->id;
            $datas->save();

        }

        $users=User::all();

        foreach($users as $user) {
            $disiplin = new disiplin;
            $disiplin->month_id = $data->id;
            $disiplin->user_id = $user->id;
            $disiplin->save();

            $produktifitas = new produktifitas;
            $produktifitas->month_id = $data->id;
            $produktifitas->user_id = $user->id;
            $produktifitas->total = 100;
            $produktifitas->save();

            $total = new total;
            $total->user_id = $user->id;
            $total->month_id = $data->id;
            $total->tpp = $user->salary;
            $total->produktifitas = 100;
            $total->save();
            
        //     foreach($dates as $key => $date) {
        //         $finger = new finger;
        //         $finger->date = $date;
        //         $finger->timet = $datangs[$key];
        //         $finger->timep = $pulangs[$key];
        //         $finger->user_id = $user->id;
        //         $finger->disiplin_id = $disiplin->id;
        //         $finger->save();

        // }

        }

       

        


       


        // dd($anu);

        //request()->pic->move(public_path('assets/images'), $imageName);
        //return redirect('rekapan');
		
		return redirect()->route('rekapan.index')->with('alert-success', 'Berhasil Menambahkan Data!');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data['rekapan'] = rekapan::where('id', $id)->get();
	   return view('rekapan.lihat', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = rekapan::findOrFail($id);
        $soal = soal::where('rekapan_id',$id);
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
        $data = rekapan::where('id', $id)->first();

    

		$data->name = $request->name;
        $data->class_id = $request->class_id;
        $data->types = $request->types;
       

	
        $data -> save();

    
    
		return redirect()->route('rekapan.index')->with('alert-success', 'Data berhasil diubah!');
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = month::where('id', $id)->first();
		/**$picture = $data->pic;
        File::delete('images/'.$picture);
		*/
		month::find($id)->delete();
        return back();
    }
    public function export_excel($id)
	{
		return Excel::download(new ExportExcel, 'tpp.xlsx');
	}
}
