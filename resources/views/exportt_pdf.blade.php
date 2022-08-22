<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rekap </title>
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<style>
  

</style>

<body >
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

<thead style="color:red">
    <tr>
        <th>Tipe</th>
        <th>Nama</th>
        <th>Max</th>
        @foreach($barangmasuk as $key =>$items)
            <th  style="background-color:green;color:white" >{{$items->tanggal}}</th>
        @endforeach
        @foreach($barangkeluar as $key =>$items)
            <th style="background-color:red;color:white" >{{$items->tanggal}}</th>
        @endforeach
        <th>Satuan</th>
        <th>Sisa</th>
        <th>Harga</th>
        <th>Total</th>
   
    </tr>  
</thead>

<tbody style="color:black">

    @foreach ($data as $key => $items)
        <tr>
            @if ($items->tipe == 1)
            <td>Alat Tulis Kantor</td>
            @else
            <td>Alat Kebersihan</td>
            @endif
    
            <td>{{ $items->nama }}</td>
            <td>{{ $items->max }}</td>
            <td>{{ $items->satuan }}</td>

            {{-- <tr> --}}
            @foreach($barangmasuk as $key =>$bm)
                <td style="background-color:#2ecc71;color:white">{{isset($barangmasuktd[$bm->tanggal]["key_".$items->id]) ? $barangmasuktd[$bm->tanggal]["key_".$items->id]  : ''}}</td>
            @endforeach
            {{-- </tr> --}}
            {{-- <tr> --}}
            @foreach($barangkeluar as $key =>$bk)
            <td style="background-color:#ff4d4d;color:white">{{isset($barangkeluartd[$bk->tanggal]["key_".$items->id]) ? $barangkeluartd[$bk->tanggal]["key_".$items->id]  : ''}}</td>
            @endforeach
            {{-- </tr> --}}
            @if($items->jumlah == 0)
                <td style="background-color:red;color:white" >{{ $items->jumlah }}</td>
            @else
            <td style="background-color:green;color:white" >{{ $items->jumlah }}</td>
            @endif

            

            <td>{{ $items->harga }}</td>
            <td>{{$items->jumlah}}*{{$items->satuan}}</td>
        </tr>

    @endforeach
</tbody>
</table>
</body>

</html>