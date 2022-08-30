<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\total;
use App\Models\month;

use PDF;
use Image;
use File;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcel;
use Terbilang;
use Carbon\Carbon;
use NumConvert;

class totalController extends Controller
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
        $data=total::where('month_id',$id)->with('user')->get()->sortByDesc('user.golongan_id')->sortByDesc('user.salary');
        $status=month::findOrFail($id);

        // $data=total::where('month_id',$id)->where('disiplin','!=','null')->where('produktifitas','<', 100 )->orderBy('id', 'ASC')->get();
        // dd($data);
        // $total=total::where('keluar_id',$id)->get();
        // $barangs=persediaan::all();
        // $total=total::where('keluar_id',$id)->sum('total');

      
       
        // dd($total);
        
        // foreach($total as $totalz => $barangz ){
        // $barangs=persediaan::where('id',$barangz->barang_id)->get();
        // }
        // dd($barangs);


        
        return view('total.index',compact('data','status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data=keluar::findOrFail($id);
        $total=total::where('keluar_id',$id)->get();
        $barangs=persediaan::all();

        
        return view('total.index',compact('data','total','barangs'));
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
       
    
         

        $data=month::findOrFail($id);
        $data->status = $request->input('status');
        $data->save();

        

            
        

		return redirect()->route('rekapan.index')->with('alert-success', 'Berhasil Menambahkan Data!');

        //request()->pic->move(public_path('assets/images'), $imageName);
        //return redirect('pertemuan');
	
           
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

    public function exportPDF($id) {
        $bulan = month::findorFail($id);
        $data=total::where('month_id',$id)->with('user')->get()->sortByDesc('user.golongan_id')->sortByDesc('user.salary');

        $total = 0;
        $totals = 0;

        foreach($data as $key => $items){
            $totals += $items->tpp;

            if($items->disiplin == null) {
            $total += 60*$items->tpp/100-60*$items->tpp/100*$items->produktifitas/100;
            } else {
            $total += 40*$items->tpp/100-40*$items->tpp/100*$items->disiplin/100+60*$items->tpp/100-60*$items->tpp/100*$items->produktifitas/100;
            }
        }

        $pdf_doc = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('exporttotal_pdf', array('data' => $data,'bulan'=>$bulan,'total' => $total,'totals' => $totals))->setPaper('legal', 'landscape');

        return $pdf_doc->download('tpp.pdf');
        // return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('reports.invoiceSell')->stream();
    }    
}
