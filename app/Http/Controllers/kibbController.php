<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\tahun;
use App\Models\kibb;
use Image;
use File;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcel;

class kibbController extends Controller
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


        
        return view('kibb.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
		return view('kibb.create');
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('file') != null){
		$tujuan_upload = 'data_file';

        $file = $request->file('file');
		$nama_file = time()."_".$file->getClientOriginalName();
		$file->move($tujuan_upload,$nama_file);
        
        $data = new kibb;
        $data->tahun_id = $request->tahun_id;
		$data->kode = $request->kode;
        $data->nama = $request->nama;
        $data->register = $request->register;
        $data->merk = $request->merk;
        $data->ukuran = $request->ukuran;
        $data->bahan = $request->bahan;
        $data->pabrik = $request->pabrik;
        $data->rangka = $request->rangka;
        $data->mesin = $request->mesin;
        $data->polisi= $request->polisi;
        $data->bpkb = $request->bpkb;
        $data->harga = $request->harga;
        $data->asal = $request->asal;
        $data->keterangan = $request->keterangan;
        $data->serial = $request->serial;
        $data->status = $request->status;
        $data->file = $nama_file;

       
        $data -> save();
        }else{

            $data = new kibb;
            $data->tahun_id = $request->tahun_id;
            $data->kode = $request->kode;
            $data->nama = $request->nama;
            $data->register = $request->register;
            $data->merk = $request->merk;
            $data->ukuran = $request->ukuran;
            $data->bahan = $request->bahan;
            $data->pabrik = $request->pabrik;
            $data->rangka = $request->rangka;
            $data->mesin = $request->mesin;
            $data->polisi= $request->polisi;
            $data->bpkb = $request->bpkb;
            $data->harga = $request->harga;
            $data->keterangan = $request->keterangan;
            $data->serial = $request->serial;
            $data->status = $request->status;    
            $data->asal = $request->asal;

            $data -> save();
        }


            
        


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
