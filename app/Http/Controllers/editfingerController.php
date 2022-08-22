<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\days;
use App\Models\month;
use App\Models\finger;
use App\Models\disiplin;
use App\Models\total;
use Carbon\Carbon;
use Image;
use File;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcel;

class editfingerController extends Controller
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
        $data=finger::findOrFail($id);



        // dd($days);
        
        // foreach($days as $daysz => $barangz ){
        // $barangs=persediaan::where('id',$barangz->barang_id)->get();
        // }
        // dd($barangs);


        
        return view('editfinger.index',compact('data'));
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

		
        $finger=finger::findOrFail($id);
        $finger->date = $request->input('date');
        $finger->timetf = $request->input('timetf');
        $finger->timepf = $request->input('timepf');
        $finger->timet = $request->input('timet');
        $finger->timep = $request->input('timep');

        $fingerpulang = date("g:i a", strtotime(str_replace('-','/', $finger->timep)));
        $fingerpulangs = date("g:i a", strtotime(str_replace('-','/', $finger->timepf)));

        if($finger->timetf == null){
            $datangtime = Carbon::parse($finger->timet);           
            $datangtimes = Carbon::parse("12:00:00");
        }else{
            $datangtime = Carbon::parse($finger->timet);           
            $datangtimes = Carbon::parse($finger->timetf);
        }
        
        $pulangtime = Carbon::parse($fingerpulang);
        $pulangtimes = Carbon::parse($fingerpulangs);

        $selisihdatang = $datangtime->diffInMinutes($datangtimes, false);
        $selisihpulang = $pulangtimes->diffInMinutes($pulangtime, false);


        if($selisihdatang < 10){
            $finger->persentaset = 0;
        }elseif($selisihdatang >= 10 && $selisihdatang <= 29){
            $finger->persentaset = 0.5;
        }
        elseif($selisihdatang >= 30 && $selisihdatang <= 59){
            $finger->persentaset = 1;
        }
        elseif($selisihdatang >= 60 && $selisihdatang <= 90){
            $finger->persentaset = 1.25;
        }
        elseif($selisihdatang > 91 ){
            $finger->persentaset = 1.5;
        }
        else{
            $finger->persentaset = 1.5;
        }

        if($selisihpulang < 10){
            $finger->persentasep = 0;
        }elseif($selisihpulang >= 10 && $selisihpulang <= 29){
            $finger->persentasep = 0.5;
        }
        elseif($selisihpulang >= 30 && $selisihpulang <= 59){
            $finger->persentasep = 1;
        }
        elseif($selisihpulang >= 60 && $selisihpulang <= 90){
            $finger->persentasep = 1.25;
        }
        elseif($selisihpulang > 91 ){
            $finger->persentasep = 1.5;
        }
        else{
            $finger->persentasep = 1.5;
            
        }

        // $finger->persentaset = $selisihdatang;
        // $finger->persentasep = $selisihpulang;
        

        $finger->total = $finger->persentaset + $finger->persentasep;
        $finger->save();

        
        $totalsemua = finger::where([
            ['user_id', '=', $finger->user->id],
            ['disiplin_id', '=', $finger->disiplin->id],
            ])->get();
    
            $totals= 0;
            foreach($totalsemua as $key => $items)
            {
                $totals += $items->total;
            }
    
            $disiplin = disiplin::where('id',$finger->disiplin_id)->first();

            $disiplin->total = $totals;
            $disiplin->save();

    
            $tabeltotal = total::where([
                ['user_id', '=', $finger->user->id],
                ['month_id', '=', $finger->disiplin->month->id],
            ])->first();
    
            $tabeltotal->disiplin = $totals;
            $tabeltotal->save();
       
        

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
