<?php
 
 namespace App\Exports;
 use Carbon\Carbon;
 use App\Models\masuk;
 use App\Models\persediaan;
 use App\Models\barangmasuk;
 use App\Models\keluar;
 use App\Models\barangkeluar;
 use Illuminate\Contracts\View\View;
 use Maatwebsite\Excel\Concerns\FromView;
 
 class ExportExcel implements FromView
 {
     public function view(): View
     {
         
      $data=persediaan::all();
      $dataq=persediaan::first();
        
      $total = 0;
      foreach($data as $key => $items){
      $total += $items->jumlah*$items->harga;
      }

      $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
      $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
      $barangmasuk = barangmasuk::select('tanggal')->whereBetween('tanggal',[$start_date,$end_date])->groupBy('tanggal')->get();
      $barangmasuktd=[];
      $barangkeluar = barangkeluar::select('tanggal')->where('status','1')->whereBetween('tanggal',[$start_date,$end_date])->groupBy('tanggal')->get();
      $barangkeluartd=[];

      foreach($barangmasuk as $b) {
          $barangmasuktd[$b->tanggal] = null;
      }
      foreach($barangmasuktd as $key => $value) {
          $currentDateItems = barangmasuk::where('tanggal', $key)->get();
          foreach($currentDateItems as $cur) {
              $barangmasuktd[$key]["key_" . $cur->barang_id] = $cur->masuk;
          }
      }
      foreach($barangkeluar as $c) {
          $barangkeluartd[$c->tanggal] = null;
      }
      foreach($barangkeluartd as $keys => $value) {
          $currentDateItemss = barangkeluar::where([
              ['status', '1'],
              ["tanggal", $keys]])->get();
          foreach($currentDateItemss as $curs) {
              $barangkeluartd[$keys]["key_" . $curs->barang_id] = $curs->keluar;
          }
      }

        $countm = $barangmasuk->count();
        $countk = $barangkeluar->count();
    
        $jumlahmk = $countm+$countk+5;
     

         return view('xp1', [
          'data' => $data,'barangmasuk' => $barangmasuk, 'barangmasuktd' => $barangmasuktd,'barangkeluar' => $barangkeluar,'barangkeluartd' => $barangkeluartd, 
          'total' => $total, 'jumlahmk' => $jumlahmk, 'dataq' => $dataq
         ]);
     }
 }