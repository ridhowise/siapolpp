<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rekap TPP</title>
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

<body style="font-size:12px">
  <h6 style="text-align:center">REKAPITULASI TAMBAHAN PENGHASILAN SETIAP BULAN</h6>
  <table>
  <tr>
    <td>
      PERANGKAT DAERAH
    </td>
    <td>
      : SATUAN POLISI PAMONG PRAJA KOTA BITUNG
    </td>
  </tr>
  <tr>
    <td>
      PERIODE
    </td>
    <td>
      : {{$bulan->awal}}-{{$bulan->akhir}}
    </td>
  </tr>
  </table>
  <br>
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size:12px" >

    <thead style="color:black">
        <tr>
            <th rowspan="2" style="text-align:center;vertical-align : middle">No.</th>
            <th rowspan="2" style="text-align:center;vertical-align : middle" width="100">Nama</th>
            <th rowspan="2" style="text-align:center;vertical-align : middle;" >Besaran TPP</th>
            <th colspan="4" style="text-align:center" >Disiplin Kerja</th>
            <th colspan="4" style="text-align:center" >Produktifitas Kerja</th>
            <th rowspan="2" style="text-align:center;vertical-align : middle" >Total sebelum PPh</th>
          </tr>
          <tr>
            <td>Bobot(40%)</td>
            <td style="background-color:yellow" >Pengurangan</td>
            <td>Nilai Pengurangan</td>
            <td>Nilai TPP</td>
            <td>Bobot(60%)</td>
            <td style="background-color:yellow" >Pengurangan</td>
            <td>Nilai Pengurangan</td>
            <td>Nilai TPP</td>
          </tr>
         
    </thead>

    <tbody style="color:black">
        @php
        $no = 1;
        @endphp
        @foreach ($data as $key => $items)
        <tr>
        
            <td>{{ $no++ }}</td>
            <td>{{ $items->user->name}} </td>
            <td>@currency($items->tpp)</td>
            <td>@currency(40*$items->tpp/100)</td>
            <td style="background-color:yellow" >{{$items->disiplin}} %</td>
            <td>@currency(40*$items->tpp/100*$items->disiplin/100)</td>
            @if($items->disiplin == null)
            <td>@currency(0)</td>
            @else
            <td>@currency(40*$items->tpp/100-40*$items->tpp/100*$items->disiplin/100)</td>
            @endif
            <td>@currency(60*$items->tpp/100)</td>
            <td style="background-color:yellow" >{{$items->produktifitas}} %</td>
            <td>@currency(60*$items->tpp/100*$items->produktifitas/100)</td>
            <td >@currency(60*$items->tpp/100-60*$items->tpp/100*$items->produktifitas/100)</td>
            @if($items->disiplin == null)
            <td>@currency(0+60*$items->tpp/100-60*$items->tpp/100*$items->produktifitas/100)</td>
            @else
            <td>@currency(40*$items->tpp/100-40*$items->tpp/100*$items->disiplin/100+60*$items->tpp/100-60*$items->tpp/100*$items->produktifitas/100)</td>
            @endif

                
            </tr>

        @endforeach

        <tr>
          <td colspan=2></td>
          <td>@currency($totals)</td>
          <td colspan=8></td>
          <td>@currency($total)</td>
        </tr>
    </tbody>
</table>
<br>
<br>
<div class="float-left" style="text-align:center"><br><br><b>Kepala SATPOL.PP Kota Bitung</b><br><br><br><br><br><b>Steven V.Suluh,SSTP,M.Si</b><br><b>Pembina Utama Muda</b></div>
<div class="float-right" style="text-align:center">Bitung,....................... <br><b>BENDAHARA,</b><br><br><br><br><br><b>Rawis Mauren Tifani, A.Md.T</b><br><b>NIP.199708302022032015</b></div><br>
</body>

</html>