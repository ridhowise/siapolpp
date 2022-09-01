<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use  App\Models\User;
use  App\Models\Level;
use  App\Models\lampiran;
use Image;
use File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::get()->sortByDesc('golongan_id')->sortByDesc('salary');
		// $data = User::all();
        return view('user.index', compact('data'));
    }

    public function create()
    {
        $data = level::where([
            ['id', '<>', '1'],
            ['id', '<>', '3']])->get();
        return view('user.add', compact('data'));
    }


	public function store(Request $req)
    {
        if ($req->file('image')) {
            $image = $req->file('image');

            $file_name = time(). rand(1111, 9999) . '.' .$image->getClientOriginalExtension();

            // $save_Path = 'images/'.$file_name;
            //$save_Path = public_path('images/'.$file_name);

            //Image::make($image->getRealPath())->resize(300, 236)->save($save_Path);
            $image->move('images',$file_name);
            \Image::make('images/'.$file_name)->save('images/'.$file_name);
        } else {
            $file_name = null;
        }

          
            $simpan=new User;
		    $simpan->level_id = $req->input('level_id');
            $simpan->name = $req -> input('name');
            $simpan->email = $req ->input('email');
            $simpan->nip = $req ->input('nip');
            $simpan->unit = $req ->input('unit');
            $simpan->alamat = $req ->input('alamat');
            $simpan->tempat = $req ->input('tempat');
            $simpan->tanggal = $req ->input('tanggal');
            $simpan->telepon = $req ->input('telepon');
            $simpan->nosk = $req ->input('nosk');
            $simpan->jenisjabatan = $req ->input('jenisjabatan');
            $simpan->diklat = $req ->input('diklat');
            $simpan->pendidikan = $req ->input('pendidikan');
            $simpan->golongan_id = $req ->input('golongan_id');
            $simpan->gender = $req ->input('gender');
            $simpan->password = hash::make($req->input('password'));
            $simpan->salary = $req ->input('salary');
            $simpan->images = $file_name;

            $simpan->save();

		return redirect()->route('user.index')->with('alert-success', 'Berhasil Menambahkan Data!');
    }
    

    public function show($id)
    {
        $data = User::findOrFail($id);
        return view('user.show', compact('data'));
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        $levels = Level::get();
        return view('user.edit', compact('data','levels'));
    }

    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);
        

        if ($request->hasFile('image')){
            $image_path = public_path("/images".$data->images);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $bannerImage = $request->file('image');
            $imgName = $bannerImage->getClientOriginalName();
            $destinationPath = public_path('/images');
            $bannerImage->move($destinationPath, $imgName);
          } else {
            $imgName = $data->images;
          }
          $data->name = $request->name;
          $data->email = $request->email;
          $data->images = $imgName;
          $data->nip = $request->nip;
          $data->unit = $request->unit;
          $data->alamat = $request->alamat;
          $data->tempat = $request->tempat;
          $data->tanggal = $request->tanggal;
          $data->telepon = $request->telepon;
          $data->nosk = $request->nosk;
          $data->jenisjabatan = $request->jenisjabatan;
          $data->diklat = $request->diklat;
          $data->pendidikan = $request->pendidikan;
          $data->golongan_id = $request->golongan_id;
          $data->gender = $request->gender;
          $data->salary = $request->salary;
          $data->level_id = $request->level_id;
          $data->save();
        return redirect()->route('user.index')->with('alert-success', 'Berhasil Update Data!');
    }

    public function file($id)
    {
        $data = User::findOrFail($id);
        $levels = Level::get();
        $file = lampiran::get();
        return view('user.file', compact('data','levels','file'));
    }

    public function filestore(Request $request, $id)
    {
        $data = User::findOrFail($id);
        

        if ($request->hasFile('image')){
            $image_path = public_path("/images".$data->images);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $bannerImage = $request->file('image');
            $imgName = $bannerImage->getClientOriginalName();
            $destinationPath = public_path('/images');
            $bannerImage->move($destinationPath, $imgName);
          } else {
            $imgName = $data->images;
          }
          $data->name = $request->name;
          $data->email = $request->email;
          $data->images = $imgName;
          $data->nip = $request->nip;
          $data->unit = $request->unit;
          $data->alamat = $request->alamat;
          $data->tempat = $request->tempat;
          $data->tanggal = $request->tanggal;
          $data->telepon = $request->telepon;
          $data->nosk = $request->nosk;
          $data->jenisjabatan = $request->jenisjabatan;
          $data->diklat = $request->diklat;
          $data->pendidikan = $request->pendidikan;
          $data->golongan_id = $request->golongan_id;
          $data->gender = $request->gender;
          $data->salary = $request->salary;
          $data->level_id = $request->level_id;
          $data->save();
        return redirect()->route('user.index')->with('alert-success', 'Berhasil Update Data!');
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return redirect()->route('user.index')->with('alert-success', 'Berhasil Hapus Data!');
    }
}
