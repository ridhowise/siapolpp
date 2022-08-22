<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\masuk;
use App\Models\persediaan;
use App\Models\barangmasuk;
use App\Models\keluar;
use App\Models\barangkeluar;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persediaan = persediaan::count();
        $masuk = masuk::count();
        $keluar = keluar::count();
        $persediaans = persediaan::all();
        // $sisa = 0;
        // foreach($persediaans as $key => $items){
        // $sisa += $items->jumlah;
        // }




  
       
        if (Auth::User()->role<>'0') {
             return view('adm.index',compact('persediaan','masuk','keluar'));
        }else {
            return view('auth.login');
        }
    }
}
