<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Surat Keluar</title>
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<style>
  .right{
    float:left;
    text-align:center;
    
}

.left{
   float:right;
   text-align:center;
   width:40%;

}

</style>

<body >
  <table width="100%">
    <tr>
    <td  align="center"><img src="https://i.ibb.co/hZWWpz1/logo.png" width="60px"></td>
    <td  align="center"><h6><b>PEMERINTAH KOTA BITUNG</b></h6><h5><b>SATUAN POLISI PAMONG PRAJA</h5></b><h6>Jln.Dr.Sam Ratulangi No.45 Bitung</h6></td>
    <td  align="center"><img src="https://i.ibb.co/dDvYw2r/logow.png" width="60px"></td>
    </tr>
    </table> 
    <hr style="height:5px;
    border-top:1px solid black;
    border-bottom:2px solid black;">
    <table width="100%">
      <tr>
        <td  align="center"><h6><b><u>BUKTI PENYALURAN BARANG</u></b></h6></td>
        
      </tr>
      <tr>
        <td  align="center"><p>Nomor :....../POL.PP/PENYALURAN.BRG-PENG.BRG/{{$month}}/{{$year}}</p></td>
        
      </tr>
      <tr>
        <td> Pada tanggal {{Riskihajar\Terbilang\Facades\Terbilang::date($data->tanggal)}} pengurus barang telah menyerahkan barang berupa alat tulis kantor untuk keperluan kegiatan Pelayanan Administrasi Perkantoran pada 
      {{strtolower($data->user->level->name)}} Satuan Polisi Pamong Praja Kota Bitung 		</td>			
    </table>

    <table class="table table-bordered" style="margin-top:20px;margin-bottom:150px;border-color:black">
      <thead style="border: 1px solid black;">
        <tr style="border: 1px solid black;">
          <th style="border: 1px solid black;">Nama</th>
          <th style="border: 1px solid black;">Jumlah</th>
          <th style="border: 1px solid black;">Satuan</th>

        </tr>
      </thead>
      
      <tbody style="border: 1px solid black;">
       
     @foreach($barangkeluar as $key => $items)
            <tr>
            <td style="border: 1px solid black;">{{ $items->barang->nama }} </td>
            <td style="border: 1px solid black;">{{ $items->keluar }} </td>
            <td style="border: 1px solid black;">{{ $items->barang->satuan }} </td>
           


           
          </tr>
          
          @endforeach
      </tbody>
    </table>
    {{-- <span class="right">Yang menyerahkan<br><b>PENGURUS BARANG</b><br><br><br><br><b>RONNY TUMIWA</b><br><b>NIP. 19750615 200604 1 017</b>
    </span><span class="left">Yang menerima,<br><b>{{strtoupper($data->user->level->name)}}</b><br><br><br><b>{{strtoupper($data->user->name)}}</b><br><b>{{$data->user->nip}}</b></span> --}}

    <div class="float-left" style="text-align:center">Yang menyerahkan, <br><b>BENDAHARA BARANG,</b><br><br><br><br><br><br><br><b>RONNY TUMIWA</b><br><b>NIP. 19750615 200604 1 017</b></div>
    <div class="float-right" style="text-align:center;width:220px">Yang menerima, <br><b>{{strtoupper($data->user->level->name)}}</b><br><br><br><br><br><b>{{strtoupper($data->user->name)}}</b><br><b>{{$data->user->nip}}</b></div><br>
</body>

</html>