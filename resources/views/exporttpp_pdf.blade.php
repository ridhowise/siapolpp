<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rekap Kedisiplinan</title>
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

<body style="font-size:11px">
<b>Nama : {{$data->user->name}}
<br>
Periode : {{$data->month->awal}} - {{$data->month->akhir}}</b>
<br>
<br>
<table class="display table table-bordered" id="dataTable" width="100%" cellspacing="0">
  
  <thead style="">
    <tr>
      <th>Tanggal</th>
      <th>Jam Masuk</th>
      <th>Jam Pulang</th>
      <th>Scan Masuk</th>
      <th>Scan Pulang</th>
      <th>Terlambat</th>
      <th>Pulang cepat</th>
      <th>Keterangan</th>
      <th>Pengurangan</th>
    </tr>
  </thead>
  
  <tbody>
   
    @foreach($days as $key => $items)
    <td>{{ $items->date }} </td>
    <td>{{ $items->timet }} </td>
    <td>{{ $items->timep}} </td>
    @if($items->timetf == null)
    <td> <b>-</b></td>
    @else
    <td>{{ $items->timetf }} </td>
    @endif
    @if($items->timepf == null)
    <td> <b>-</b></td>
    @else
    <td>{{ $items->timepf }} </td>
    @endif
    @php

    $fingerpulang = date("g:i a", strtotime(str_replace('-','/', $items->timep)));
    $fingerpulangs = date("g:i a", strtotime(str_replace('-','/', $items->timepf)));

    if($items->timetf == null){
                $datangtime = \Carbon\Carbon::parse($items->timet);           
                $datangtimes = \Carbon\Carbon::parse("12:00:00");
            }else{
                $datangtime = \Carbon\Carbon::parse($items->timet);           
                $datangtimes = \Carbon\Carbon::parse($items->timetf);
            }
            
            $pulangtime = \Carbon\Carbon::parse($fingerpulang);
            $pulangtimes = \Carbon\Carbon::parse($fingerpulangs);
    
$selisihdatang = $datangtime->diffInMinutes($datangtimes, false);
$selisihpulang = $pulangtimes->diffInMinutes($pulangtime, false);
@endphp
    @if($selisihdatang <= 0)
    <td></td>
    @elseif ($items->timetf == null)
    <td> <b>-</b></td>
    @else
    <td>{{$selisihdatang}} </td>
    @endif
    @if($selisihpulang <= 0 )
    <td></td>
    @elseif($items->timepf == null)
    <td> <b>-</b></td>
    @else
    <td>{{$selisihpulang}} </td>
    @endif

    @if($items->status == 0)
    <td>Hadir</td>
    @elseif($items->status == 1)
    <td>Tidak Finger</td>
    @elseif($items->status == 2)
    <td>Sakit</td>
    @else
    <td>Izin</td>
    @endif

    <td>{{$items->total}} %</td>
    
   
  </tr>
  
  @endforeach

      <tr><td colspan="8"><b>TOTAL</b></td><td><b>{{$totals}} %</b></tr>

  </tbody>
</table>
<br>
<br>

</body>

</html>