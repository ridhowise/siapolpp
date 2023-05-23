<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SKP</title>
    <link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    
</head>

<style>

html *
{
    font-family: "Bookman Old Style";
}

  .right{
    float:left;
    text-align:center;
    
}

.left{
   float:right;
   text-align:center;
   width:40%;

}

 .page-break {
  page-break-after: always;
}



</style>


<body style="font-size:11px;border : 1px solid;padding:0px">
  

 

 
   <h6 style="text-align:center;margin-top:10px">LAMPIRAN SASARAN KINERJA PEGAWAI</h6>

   <div  class="float-right">
    PERIODE PENILAIAN : <b>1 JANUARI {{$skp->tahun}} - 31 DESEMBER {{$skp->tahun}}</b>
  </div>
 
  <br>
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size:10px; border : 1px solid black;padding:0px" >
    <tbody style="color:black">
        @php
        $no = 1;
        $noo = 1;
        $nooo = 1;
        @endphp
        
        <tr>
          <td colspan="2" style="background-color:#b8cce4;border: 1px solid black;padding:1px;font-size:12px"><b>DUKUNGAN SUMBER DAYA</b></td>
        </tr>
        
          @foreach($dukungan as $key => $dukungans)
          <tr>
            <td style="font-size:11px; border: 1px solid black;padding:3px;text-align:center;width:10%">{{$no++}}</td>
            <td style="font-size:11px; border: 1px solid black;padding:3px" >{{$dukungans->dukungan}}</td>
          </tr>
          @endforeach

          <tr>
            <td colspan="2" style="background-color:#b8cce4;border: 1px solid black;padding:1px;font-size:12px"><b>SKEMA PERTANGGUNG JAWABAN</b></td>
          </tr>

          @foreach($skema as $key => $skemas)
          <tr>
            <td style="font-size:11px; border: 1px solid black;padding:3px;text-align:center;">{{$noo++}}</td>
            <td style="font-size:11px; border: 1px solid black;padding:3px" >{{$skemas->skema}}</td>
          </tr>
          @endforeach

          <tr>
            <td colspan="2" style="background-color:#b8cce4;border: 1px solid black;padding:1px;font-size:12px"><b>KONSEKUENSI</b></td>
          </tr>

          @foreach($konsekuensi as $key => $konsekuensis)
          <tr>
            <td style="font-size:11px; border: 1px solid black;padding:3px;text-align:center;">{{$nooo++}}</td>
            <td style="font-size:11px; border: 1px solid black;padding:3px" >{{$konsekuensis->konsekuensi}}</td>
          </tr>
          @endforeach
        
        
        </tbody>
      </table>

<div class="float-left" style="text-align:center;font-size:12px;margin-left:10px"><br><br><b>PNS yang Dinilai,</b><br><br><br><br><br><b>{{$skp->user->name}}</b><br><b>{{$skp->user->nip}}</b></div>
<div class="float-right" style="text-align:center;font-size:12px;margin-right:10px">Bitung, {{$date}} <br><br><b>Pejabat Penilai,</b><br><br><br><br><br><b>{{$atasans}}</b><br><b>{{$atasann->nip}}</b></div><br>

<div class="page-break"></div>
  <div style="text-align:center;margin-top:10pxpx">
  <img src="https://i.ibb.co/1RsZts2/782px-Garuda-Pancasila-Coat-of-Arms-of-Indonesia-svg.png" style="width:50px;text-align:center">
  </div>
  <h6 style="text-align:center;margin-top:10px">DOKUMEN EVALUASI KINERJA PEGAWAI</h6>
  <h6 style="text-align:center">PERIODE : AKHIR</h6>

  <div  class="float-right">
    PERIODE PENILAIAN : <b>1 JANUARI {{$skp->tahun}} - 31 DESEMBER {{$skp->tahun}}</b>

</div>
<div  class="float-left" style="margin-left:3px">
 <b>SATUAN POLISI PAMONG PRAJA KOTA BITUNG</b>
</div>

<br>
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size:10px; border : 1px solid black;padding:0px" >
    <tbody style="color:black">
        @php
        $no = 1;
        $noo = 1;
        $nooo = 1;
        @endphp
        
        <tr>
          <td rowspan="6" style="font-size:11px; border: 1px solid black;padding:3px;text-align:center;width:5%;background-color:#b8cce4">1</td>
          <td colspan="3" style="background-color:#b8cce4;border: 1px solid black;padding:1px;font-size:12px"><b>PEGAWAI YANG DINILAI</b></td>
        </tr>
        
          <tr>
            <td style="font-size:11px; border: 1px solid black;padding:3px;">NAMA</td>
            <td style="font-size:11px; border: 1px solid black;padding:3px;text-align:center;width:2%">:</td>
            <td style="font-size:11px; border: 1px solid black;padding:3px" >{{$skp->user->name}}</td>
          </tr>
          <tr>
            <td style="font-size:11px; border: 1px solid black;padding:3px;">NIP</td>
            <td style="font-size:11px; border: 1px solid black;padding:3px;text-align:center;width:2%">:</td>
            <td style="font-size:11px; border: 1px solid black;padding:3px" >{{$skp->user->nip}}</td>
          </tr>
          <tr>
            <td style="font-size:11px; border: 1px solid black;padding:3px;">PANGKAT / GOL RUANG</td>
            <td style="font-size:11px; border: 1px solid black;padding:3px;text-align:center;width:2%">:</td>
            <td style="font-size:11px; border: 1px solid black;padding:3px" >{{$skp->user->golongan->name}}</td>
          </tr>
          <tr>
            <td style="font-size:11px; border: 1px solid black;padding:3px;">JABATAN</td>
            <td style="font-size:11px; border: 1px solid black;padding:3px;text-align:center;width:2%">:</td>
            <td style="font-size:11px; border: 1px solid black;padding:3px" >{{$skp->user->level->name}}</td>
          </tr>
          <tr>
            <td style="font-size:11px; border: 1px solid black;padding:3px;">UNIT KERJA</td>
            <td style="font-size:11px; border: 1px solid black;padding:3px;text-align:center;width:2%">:</td>
            <td style="font-size:11px; border: 1px solid black;padding:3px" >Satuan Polisi Pamong Praja</td>
          </tr>

          <tr>
            <td rowspan="6" style="font-size:11px; border: 1px solid black;padding:3px;text-align:center;width:5%;background-color:#b8cce4">2</td>
            <td colspan="3" style="background-color:#b8cce4;border: 1px solid black;padding:1px;font-size:12px"><b>PEJABAT PENILAI KINERJA</b></td>
          </tr>
          
            <tr>
              <td style="font-size:11px; border: 1px solid black;padding:3px;">NAMA</td>
              <td style="font-size:11px; border: 1px solid black;padding:3px;text-align:center;width:2%">:</td>
              <td style="font-size:11px; border: 1px solid black;padding:3px" >{{$atasans}}</td>
            </tr>
            <tr>
              <td style="font-size:11px; border: 1px solid black;padding:3px;">NIP</td>
              <td style="font-size:11px; border: 1px solid black;padding:3px;text-align:center;width:2%">:</td>
              <td style="font-size:11px; border: 1px solid black;padding:3px" >{{$atasann->nip}}</td>
            </tr>
            <tr>
              <td style="font-size:11px; border: 1px solid black;padding:3px;">PANGKAT / GOL RUANG</td>
              <td style="font-size:11px; border: 1px solid black;padding:3px;text-align:center;width:2%">:</td>
              <td style="font-size:11px; border: 1px solid black;padding:3px" >{{$atasann->golongan->name}}</td>
            </tr>
            <tr>
              <td style="font-size:11px; border: 1px solid black;padding:3px;">JABATAN</td>
              <td style="font-size:11px; border: 1px solid black;padding:3px;text-align:center;width:2%">:</td>
              <td style="font-size:11px; border: 1px solid black;padding:3px" >{{$atasann->level->name}}</td>
            </tr>
            <tr>
              <td style="font-size:11px; border: 1px solid black;padding:3px;">UNIT KERJA</td>
              <td style="font-size:11px; border: 1px solid black;padding:3px;text-align:center;width:2%">:</td>
              <td style="font-size:11px; border: 1px solid black;padding:3px" >Satuan Polisi Pamong Praja</td>
            </tr>
          
            <tr>
              <td rowspan="6" style="font-size:11px; border: 1px solid black;padding:3px;text-align:center;width:5%;background-color:#b8cce4">3</td>
              <td colspan="3" style="background-color:#b8cce4;border: 1px solid black;padding:1px;font-size:12px"><b>ATASAN PEJABAT PENILAI KINERJA</b></td>
            </tr>
            
              <tr>
                <td style="font-size:11px; border: 1px solid black;padding:3px;">NAMA</td>
                <td style="font-size:11px; border: 1px solid black;padding:3px;text-align:center;width:2%">:</td>
                <td style="font-size:11px; border: 1px solid black;padding:3px" >{{$superatasans}}</td>
              </tr>
              <tr>
                <td style="font-size:11px; border: 1px solid black;padding:3px;">NIP</td>
                <td style="font-size:11px; border: 1px solid black;padding:3px;text-align:center;width:2%">:</td>
                <td style="font-size:11px; border: 1px solid black;padding:3px" >{{$superatasann->nip}}</td>
              </tr>
              <tr>
                <td style="font-size:11px; border: 1px solid black;padding:3px;">PANGKAT / GOL RUANG</td>
                <td style="font-size:11px; border: 1px solid black;padding:3px;text-align:center;width:2%">:</td>
                <td style="font-size:11px; border: 1px solid black;padding:3px" >{{$superatasann->golongan->name}}</td>
              </tr>
              <tr>
                <td style="font-size:11px; border: 1px solid black;padding:3px;">JABATAN</td>
                <td style="font-size:11px; border: 1px solid black;padding:3px;text-align:center;width:2%">:</td>
                <td style="font-size:11px; border: 1px solid black;padding:3px" >{{$superatasann->level->name}}</td>
              </tr>
              <tr>
                <td style="font-size:11px; border: 1px solid black;padding:3px;">UNIT KERJA</td>
                <td style="font-size:11px; border: 1px solid black;padding:3px;text-align:center;width:2%">:</td>
                <td style="font-size:11px; border: 1px solid black;padding:3px" >Satuan Polisi Pamong Praja</td>
              </tr>

              <tr>
                <td rowspan="3" style="font-size:11px; border: 1px solid black;padding:3px;text-align:center;width:5%;background-color:#b8cce4">4</td>
                <td colspan="3" style="background-color:#b8cce4;border: 1px solid black;padding:1px;font-size:12px"><b>ATASAN PEJABAT PENILAI KINERJA</b></td>
              </tr>
              
                <tr>
                  <td style="font-size:11px; border: 1px solid black;padding:3px;">CAPAIAN KINERJA ORGANISASI</td>
                  <td style="font-size:11px; border: 1px solid black;padding:3px;text-align:center;width:2%">:</td>
                  <td style="font-size:11px; border: 1px solid black;padding:3px" ><b>{{$pegawai}}</b></td>
                </tr>
                <tr>
                  <td style="font-size:11px; border: 1px solid black;padding:3px;">CAPAIAN KINERJA PEGAWAI</td>
                  <td style="font-size:11px; border: 1px solid black;padding:3px;text-align:center;width:2%">:</td>
                  <td style="font-size:11px; border: 1px solid black;padding:3px" ><b>{{$organisasi}}</b></td>
                </tr>

                <tr>
                  <td rowspan="2" style="font-size:11px; border: 1px solid black;padding:3px;text-align:center;width:5%;background-color:#b8cce4">5</td>
                  <td colspan="3" style="background-color:#b8cce4;border: 1px solid black;padding:1px;font-size:12px"><b>CATATAN/ REKOMENDASI</b></td>
                </tr>
                <tr>
                  <td colspan="3" style="font-size:11px; border: 1px solid black;padding:3px;">-</td>
                  
                </tr>
               
        
        </tbody>
      </table>

<div class="float-left" style="text-align:center;font-size:12px;margin-left:10px">Bitung, 31 Desember 2022 <br><br><b>PNS yang Dinilai,</b><br><br><br><br><br><b>{{$skp->user->name}}</b><br><b>{{$skp->user->nip}}</b></div>
<div class="float-right" style="text-align:center;font-size:12px;margin-right:10px">Bitung, {{$date}}<br> <br><b>Pejabat Penilai,</b><br><br><br><br><br><b>{{$atasans}}</b><br><b>{{$atasann->nip}}</b></div><br>


</body>



</html>