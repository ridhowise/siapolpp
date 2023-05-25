<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\total;
use App\Models\month;
use App\Models\hasilskp;
use App\Models\skp;
use App\Models\ekspetasi;
use App\Models\rencana;
use App\Models\indikator;
use App\Models\dukungan;
use App\Models\skema;
use App\Models\konsekuensi;
use PDF;
use Image;
use File;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcel;
use Terbilang;
use Carbon\Carbon;
use NumConvert;

class hasilskpController extends Controller
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
        $data=skp::findOrFail($id);

        $dataz=hasilskp::where('skp_id',$id)->get();
        $dataq=hasilskp::where('skp_id',$id)->first();

        // $data=hasilskp::where('skp_id',$id)->get();
        // $data=total::where('month_id',$id)->get();
        $status=skp::findOrFail($id);

        $datad=dukungan::where('skp_id',$id)->get();

        $datak=konsekuensi::where('skp_id',$id)->get();

        $datas=skema::where('skp_id',$id)->get();

        
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


        
        return view('hasilskp.index',compact('dataz','data','dataq','datas','datak','datad'));
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

        
        return view('.index',compact('data','total','barangs'));
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
       
    
        
        $data=skp::findOrFail($id);
        $dataz=hasilskp::where('skp_id',$id)->first();
        $dataz->organisasi = $request->input('organisasi');
        $dataz->pegawai = $request->input('pegawai');
        $dataz->rating = $request->input('rating');
        $dataz->save();

        $dukungans= $request->input('dukungan');
        $skemas= $request->input('skema');
        $konsekuensis= $request->input('konsekuensi');
        // dd($dataz);
        foreach($dukungans as $key => $dukungan) {

            $datad = new dukungan;
            $datad->dukungan = $dukungan;
            $datad->skp_id = $data->id;
            $datad->save();

        }
        foreach($skemas as $key => $skema) {

            $datas = new skema;
            $datas->skema = $skema;
            $datas->skp_id = $data->id;
            $datas->save();

        }
        foreach($konsekuensis as $key => $konsekuensi) {

            $datak = new konsekuensi;
            $datak->konsekuensi = $konsekuensi;
            $datak->skp_id = $data->id;
            $datak->save();

        }

        

		return redirect()->back()->with('alert-success', 'Berperilaku Menambahkan Data!');

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

    public function exportskp($id) {
        $skp = skp::findorFail($id);
        $atasan=$skp->user->atasan->id;
        $atasann = user::where('id',$atasan)->first();
        $atasans = $atasann->name;

       

        $dataz=rencana::where('skp_id',$id)->get();
        $datar=rencana::where('skp_id',$id)->first();
        $datai=indikator::where('rencana_id',$datar->id)->get();

        $indi = $datai->count();

        $count=3*$datai->count();

        $ekspetasi1=ekspetasi::where([
            ['skp_id', '=', $id],
            ['akhlak_id', '=', '1'],])->first();

        $ekspetasi2=ekspetasi::where([
             ['skp_id', '=', $id],
            ['akhlak_id', '=', '2'],])->first();

        $ekspetasi3=ekspetasi::where([
            ['skp_id', '=', $id],
            ['akhlak_id', '=', '3'],])->first();

        $ekspetasi4=ekspetasi::where([
            ['skp_id', '=', $id],
            ['akhlak_id', '=', '4'],])->first();
        
        $ekspetasi5=ekspetasi::where([
            ['skp_id', '=', $id],
            ['akhlak_id', '=', '5'],])->first();
        
        $ekspetasi6=ekspetasi::where([
            ['skp_id', '=', $id],
            ['akhlak_id', '=', '6'],])->first();
        
        $ekspetasi7=ekspetasi::where([
            ['skp_id', '=', $id],
            ['akhlak_id', '=', '7'],])->first();

        

        
            $hasilorganisasi=hasilskp::where('skp_id',$id)->first();
            $organisasi = $hasilorganisasi->organisasi;
            $pegawai = $hasilorganisasi->pegawai;
            $rating = $hasilorganisasi->rating;

        
            $date = Carbon::now()->translatedFormat('d F Y');

       

        // $data=total::where('month_id',$id)->get();

        // $total = 0;
        // $totals = 0;

        // foreach($data as $key => $items){
        //     $totals += $items->tpp;

        //     if($items->disiplin == null) {
        //     $total += 60*$items->tpp/100-60*$items->tpp/100*$items->produktifitas/100;
        //     } else {
        //     $total += 40*$items->tpp/100-40*$items->tpp/100*$items->disiplin/100+60*$items->tpp/100-60*$items->tpp/100*$items->produktifitas/100;
        //     }
        // }

        $pdf_doc = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('exportskp', array('skp' => $skp , 'atasans' => $atasans , 'atasann' => $atasann , 'datar' => $datar, 'datai' => $datai, 'count' => $count, 'dataz' => $dataz, 'ekspetasi1' => $ekspetasi1, 'ekspetasi2' => $ekspetasi2, 'ekspetasi3' => $ekspetasi3 , 'ekspetasi4' => $ekspetasi4, 'ekspetasi5' => $ekspetasi5, 'ekspetasi6' => $ekspetasi6, 'ekspetasi7' => $ekspetasi7, 'indi' => $indi, 
        'organisasi' => $organisasi, 'date' => $date, 'rating' => $rating, 'pegawai' => $pegawai))->setPaper(array(0,0,609.4488,935.433), 'landscape');

        return $pdf_doc->download('SKP.pdf');
        // return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('reports.invoiceSell')->stream();
    }    

    public function exportskpp($id) {
        $skp = skp::findorFail($id);
        $atasan=$skp->user->atasan->id;
        $atasann = user::where('id',$atasan)->first();
        $atasans = $atasann->name;

        $superatasan=$atasann->atasan->id;
        $superatasann = user::where('level_id',$superatasan)->first();
        $superatasans = $superatasann->name;

        $dataz=rencana::where('skp_id',$id)->get();
        $datar=rencana::where('skp_id',$id)->first();
        $datai=indikator::where('rencana_id',$datar->id)->get();

        $indi = $datai->count();

        $count=3*$datai->count();

        $ekspetasi1=ekspetasi::where([
            ['skp_id', '=', $id],
            ['akhlak_id', '=', '1'],])->first();

        $ekspetasi2=ekspetasi::where([
             ['skp_id', '=', $id],
            ['akhlak_id', '=', '2'],])->first();

        $ekspetasi3=ekspetasi::where([
            ['skp_id', '=', $id],
            ['akhlak_id', '=', '3'],])->first();

        $ekspetasi4=ekspetasi::where([
            ['skp_id', '=', $id],
            ['akhlak_id', '=', '4'],])->first();
        
        $ekspetasi5=ekspetasi::where([
            ['skp_id', '=', $id],
            ['akhlak_id', '=', '5'],])->first();
        
        $ekspetasi6=ekspetasi::where([
            ['skp_id', '=', $id],
            ['akhlak_id', '=', '6'],])->first();
        
        $ekspetasi7=ekspetasi::where([
            ['skp_id', '=', $id],
            ['akhlak_id', '=', '7'],])->first();

        

        
            $hasilorganisasi=hasilskp::where('skp_id',$id)->first();
            $organisasi = $hasilorganisasi->organisasi;
            $pegawai = $hasilorganisasi->pegawai;
            $rating = $hasilorganisasi->rating;

        
            $date = Carbon::now()->translatedFormat('d F Y');

            $dukungan=dukungan::where('skp_id',$id)->get();
            $skema=skema::where('skp_id',$id)->get();
            $konsekuensi=konsekuensi::where('skp_id',$id)->get();

         


       

        // $data=total::where('month_id',$id)->get();

        // $total = 0;
        // $totals = 0;

        // foreach($data as $key => $items){
        //     $totals += $items->tpp;

        //     if($items->disiplin == null) {
        //     $total += 60*$items->tpp/100-60*$items->tpp/100*$items->produktifitas/100;
        //     } else {
        //     $total += 40*$items->tpp/100-40*$items->tpp/100*$items->disiplin/100+60*$items->tpp/100-60*$items->tpp/100*$items->produktifitas/100;
        //     }
        // }

        $pdf_doc = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('exportskpp', array('skp' => $skp , 'atasans' => $atasans , 'atasann' => $atasann , 'datar' => $datar, 'datai' => $datai, 'count' => $count, 'dataz' => $dataz, 'ekspetasi1' => $ekspetasi1, 'ekspetasi2' => $ekspetasi2, 'ekspetasi3' => $ekspetasi3 , 'ekspetasi4' => $ekspetasi4, 'ekspetasi5' => $ekspetasi5, 'ekspetasi6' => $ekspetasi6, 'ekspetasi7' => $ekspetasi7, 'indi' => $indi, 
        'organisasi' => $organisasi, 'date' => $date, 'rating' => $rating, 'pegawai' => $pegawai, 'dukungan' => $dukungan , 'skema' => $skema , 'konsekuensi' => $konsekuensi,'superatasans' => $superatasans , 'superatasann' => $superatasann))->setPaper(array(0,0,609.4488,935.433), 'potrait');

        return $pdf_doc->download('SKP.pdf');
        // return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('reports.invoiceSell')->stream();
    }    

    public function exportPDFF($id) {
        $bulan = month::findorFail($id);
        $data=total::where('month_id',$id)->get();

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

        $pdf_doc = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('exporttotalpreview_pdf', array('data' => $data,'bulan'=>$bulan,'total' => $total,'totals' => $totals))->setPaper('legal', 'landscape');
        

        return $pdf_doc->download('tpp.pdf');
        // return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('reports.invoiceSell')->stream();
    }    
}
