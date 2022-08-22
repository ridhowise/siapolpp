<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\days;
use App\Models\month;
use App\Models\kinerja;
use App\Models\produktifitas;
use App\Models\total;
use Carbon\Carbon;
use Image;
use File;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcel;

class editkinerjaController extends Controller
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
        $data=kinerja::findOrFail($id);



        // dd($days);
        
        // foreach($days as $daysz => $barangz ){
        // $barangs=persediaan::where('id',$barangz->barang_id)->get();
        // }
        // dd($barangs);


        
        return view('editkinerja.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data=pertemuan::findOrFail($id);
        $tugas = tugas::where('meeting_id', $id)->get();
        $kelas=kelas::all();
		return view('nilai.create',compact('data','kelas'));
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

		

        // dd($kuantitast);
            $kinerja = kinerja::findOrFail($id);
            $kinerja->kinerja = $request->input('kinerja');
            $kinerja->kuantitast = $request->input('kuantitast');
            $kinerja->outputt = $request->input('outputt');
            $kinerja->outputr = $request->input('outputt');
            $kinerja->kuantitasr = $request->input('kuantitasr');
            $kinerja->total = $kinerja->kuantitasr * 100 /  $kinerja->kuantitast;
            $kinerja->save();

    
        $totalsemua = kinerja::where([
        ['user_id', '=', $kinerja->user->id],
        ['produktifitas_id', '=', $kinerja->produktifitas->id],
        ])->get();

        $produktifitas=produktifitas::where('id',$kinerja->produktifitas_id)->first();

        $nilaitotal=total::where([
            ['user_id', '=', $kinerja->user->id],
            ['month_id', '=', $kinerja->produktifitas->month->id],
        ])->first();

        $kuantitastt= 0;
        $kuantitasrr= 0;
        foreach($totalsemua as $key => $items)
        {
            $kuantitastt +=$items->kuantitast;
            $kuantitasrr +=$items->kuantitasr;
        }
       

        $produktifitas->total = 100 - $kuantitasrr *100 / $kuantitastt;
        $produktifitas->save();
       

        $nilaitotal->produktifitas = 100 - $kuantitasrr *100 / $kuantitastt;
        $nilaitotal->save();
        
        

        //request()->pic->move(public_path('assets/images'), $imageName);
        //return redirect('pertemuan');
		
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
}
