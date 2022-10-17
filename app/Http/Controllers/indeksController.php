<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\indeks;

class indeksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=indeks::all();
        return view('indeks.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('indeks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new indeks();
		$data->detail = $request->detail;
        $data->kode = $request->kode;
		$data->judul = $request->judul;
		$data->save();
		return redirect()->route('indeks.index')->with('alert-success', 'Berhasil Menambahkan Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = indeks::where('id', $id)->get();
		return view('indeks.edit', compact('data'));
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
        $data = indeks::where('id', $id)->first();
		$data->name = $request->name;
		$data->save();
		return redirect()->route('indeks.index')->with('alert-success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = indeks::where('id', $id)->first();
		$data->delete();
		return redirect()->route('indeks.index')->with('alert-success', 'Data berhasi dihapus!');
    }
}
