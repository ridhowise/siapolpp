<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\usertahun;
use App\Models\tahunan;
use App\Models\persediaan;
use Image;
use File;
use Auth;
use Carbon\Carbon;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcel;

class usertahunController extends Controller
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
        $data=tahunan::all();
        $users=User::all();
        return view('usertahun.index',compact('data','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('usertahun.create');
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $users = $request->input('user');

        $datas = new tahunan;
        $datas->tahun = $request->tahun;
        $datas->save();
        // dd($users);

        foreach($users as $key => $user_id) {


            $data = new usertahun;
            $data->user_id = $user_id;
		    $data->tahun_id = $datas->id;
            $data -> save();

        }



       

        


       


        // dd($anu);

        //request()->pic->move(public_path('assets/images'), $imageName);
        //return redirect('usertahun');
		
		return redirect()->route('usertahun.index')->with('alert-success', 'Berhasil Menambahkan Data!');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data['usertahun'] = usertahun::where('id', $id)->get();
	   return view('usertahun.lihat', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = usertahun::findOrFail($id);
       
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
        $data = usertahun::where('id', $id)->first();

        $tujuan_upload = 'data_file';

        $file = $request->file('filee');
		$nama_file = time()."_".$file->getClientOriginalName();
		$file->move($tujuan_upload,$nama_file);
       
        $data->file = $nama_file;

       
        $data -> save();

    
    
		return redirect()->route('usertahun.index')->with('alert-success', 'Data berhasil diubah!');
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = tahunan::where('id', $id)->first();
       


		/**$picture = $data->pic;
        File::delete('images/'.$picture);
		*/
		tahunan::find($id)->delete();
        return back();
    }
    public function export_excel()
	{
		return Excel::download(new ExportExcel, 'data.xlsx');
	}
}
