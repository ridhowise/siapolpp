

{{-- 
-----------------------------------INDIKATOR 2----------------------------------- --}}

@elseif($indi === 2)

<body style="font-size:11px">
  
 
  <h6 style="text-align:center">SASARAN KINERJA PEGAWAI</h6>
  <h6 style="text-align:center">JABATAN JA/STRUKTURAL</h6>
  <h6 style="text-align:center">PENDEKATAN HASIL KERJA KUALITATIF</h6>

  <div  class="float-right">
   PERIODE PENILAIAN : 1 JANUARI {{$skp->tahun}} - 31 DESEMBER {{$skp->tahun}}
 </div>
 <div  class="float-left">
    <b>SATUAN POLISI PAMONG PRAJA KOTA BITUNG</b>
 </div>

 
 <br>
 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size:10px; border: 2px solid black;padding:1px" >


   <tbody style="color:black">
       @php
       $no = 1;
       @endphp
       <tr>
         <td colspan="3" style="background-color:#b8cce4;text-align:center;border: 1px solid black;padding:1px"><b>PEGAWAI YANG DINILAI</b></td>
         <td colspan="3" style="background-color:#b8cce4;text-align:center;border: 1px solid black;padding:1px"><b>PEJABAT PENILAI KINERJA</b></td>
       </tr>
       <tr>
           <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">1</td>
           <td style="font-size:11px; border: 1px solid black;padding:1px">Nama</td>
           <td style="font-size:11px; border: 1px solid black;padding:1px" >{{$skp->user->name}}</td>
           <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">1</td>
           <td style="font-size:11px; border: 1px solid black;padding:1px">Nama</td>
           <td style="font-size:11px; border: 1px solid black;padding:1px">{{$atasans}}</td>
       </tr>
       <tr>
           <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">2</td>
           <td style="font-size:11px; border: 1px solid black;padding:1px">NIP</td>
           <td style="font-size:11px; border: 1px solid black;padding:1px" >{{$skp->user->nip}}</td>
           <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">2</td>
           <td style="font-size:11px; border: 1px solid black;padding:1px">NIP</td>
           <td style="font-size:11px; border: 1px solid black;padding:1px">{{$atasann->nip}}</td>
       </tr>
       <tr>
           <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">3</td>
           <td style="font-size:11px; border: 1px solid black;padding:1px">Pangkat / Gol Ruang</td>
           <td style="font-size:11px; border: 1px solid black;padding:1px" >{{$skp->user->golongan->name}}</td>
           <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">3</td>
           <td style="font-size:11px; border: 1px solid black;padding:1px">Pangkat / Gol Ruang</td>
           <td style="font-size:11px; border: 1px solid black;padding:1px">{{$atasann->golongan->name}}</td>
       </tr>
       <tr>
           <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">4</td>
           <td style="font-size:11px; border: 1px solid black;padding:1px">Jabatan</td>
           <td style="font-size:11px; border: 1px solid black;padding:1px" >{{$skp->user->level->name}}</td>
           <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">4</td>
           <td style="font-size:11px; border: 1px solid black;padding:1px">Jabatan</td>
           <td style="font-size:11px; border: 1px solid black;padding:1px">{{$atasann->level->name}}</td>
       </tr>
       <tr>
           <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">5</td>
           <td style="font-size:11px; border: 1px solid black;padding:1px">Unit Kerja</td>
           <td style="font-size:11px; border: 1px solid black;padding:1px" >Satuan Polisi Pamong Praja</td>
           <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">5</td>
           <td style="font-size:11px; border: 1px solid black;padding:1px">Unit Kerja</td>
           <td style="font-size:11px; border: 1px solid black;padding:1px">Satuan Polisi Pamong Praja</td>
       </tr>
       <tr>
           <td colspan="6" style="background-color:#b8cce4;border: 1px solid black;font-size:11px;padding:1px"><b>HASIL KERJA</b></td>
         </tr>
         <tr>
           <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;"><b>NO</b></td>
           <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;"><b>RENCANA HASIL KERJA PIMPINAN YANG DIINTERVENSI</b></td>
           <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;"><b>RENCANA HASIL KERJA</b></td>
           <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;"><b>ASPEK</b></td>
           <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;"><b>INDIKATOR KINERJA INDIVIDU</b></td>
           <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;"><b>TARGET</b></td>
         </tr>
         <tr>
           <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;">(1)</td>
           <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;">(2)</td>
           <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;">(3))</td>
           <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;">(4)</td>
           <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;">(5)</td>
           <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;">(6)</td>
         </tr>

         <tr>
           <td colspan="6" style="background-color:#b8cce4;border: 1px solid black;font-size:11px;padding:1px"><b>A. HASIL KERJA UTAMA</b></td>
         </tr>

         <tr>
           
               <td rowspan="{{$count}}" style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">1</td>
               <td rowspan="{{$count}}"style="font-size:11px; border: 1px solid black;padding:1px" >{{$datar->intervensi}}</td> 
               <td rowspan="{{$count}}" style="font-size:11px; border: 1px solid black;padding:1px">{{$datar->rencana}}</td> 
               @foreach($datai as $key => $items)
               
               <td style="font-size:11px; border: 1px solid black;padding:1px">Kuantitas</td> 
               <td style="font-size:11px; border: 1px solid black;padding:1px">{{$items->indikator}}</td> 
               <td style="font-size:11px; border: 1px solid black;padding:1px">{{$items->target}}</td> 
               
               </tr>

               <tr>
               <td style="font-size:11px; border: 1px solid black;padding:1px">Kualitas</td> 
               <td style="font-size:11px; border: 1px solid black;padding:1px"></td>
               <td style="font-size:11px; border: 1px solid black;padding:1px"></td>
               </tr>

               <tr>
               <td style="font-size:11px; border: 1px solid black;padding:1px">Waktu</td> 
               <td style="font-size:11px; border: 1px solid black;padding:1px"></td>
               <td style="font-size:11px; border: 1px solid black;padding:1px"></td>
               
               </tr>
              
               @endforeach
           </tr>
                       
           <tr>
               <td colspan="6" style="background-color:#b8cce4;border: 1px solid black;font-size:11px;padding:1px"><b>B. HASIL KERJA TAMBAHAN</b></td>
             </tr>

             <tr>
           
               <td rowspan="3" style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">1</td>
               <td rowspan="3"style="font-size:11px; border: 1px solid black;padding:1px" >Rencana Hasil Kerja Tambahan 1</td> 
               <td rowspan="3" style="font-size:11px; border: 1px solid black;padding:1px">Indikator Kinerja Tambahan 1</td> 
       
               
               <td style="font-size:11px; border: 1px solid black;padding:1px">Kuantitas</td> 
               <td style="font-size:11px; border: 1px solid black;padding:1px">1</td> 
               <td style="font-size:11px; border: 1px solid black;padding:1px">1</td> 
               
               </tr>

               <tr>
               <td style="font-size:11px; border: 1px solid black;padding:1px">Kualitas</td> 
               <td style="font-size:11px; border: 1px solid black;padding:1px">2</td>
               <td style="font-size:11px; border: 1px solid black;padding:1px">2</td>
               </tr>

               <tr>
               <td style="font-size:11px; border: 1px solid black;padding:1px">Waktu</td> 
               <td style="font-size:11px; border: 1px solid black;padding:1px">3</td>
               <td style="font-size:11px; border: 1px solid black;padding:1px">3</td>
               
               </tr>
              
           
           </tr>

           <tr>
           
               <td rowspan="3" style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">2</td>
               <td rowspan="3"style="font-size:11px; border: 1px solid black;padding:1px;dontBreakRows: true" >Rencana Hasil Kerja Tambahan 2</td> 
               <td rowspan="3" style="font-size:11px; border: 1px solid black;padding:1px">Indikator Kinerja Tambahan 2</td> 
       
               
               <td style="font-size:11px; border: 1px solid black;padding:1px">Kuantitas</td> 
               <td style="font-size:11px; border: 1px solid black;padding:1px">4</td> 
               <td style="font-size:11px; border: 1px solid black;padding:1px">4</td> 
               
               </tr>

               <tr>
               <td style="font-size:11px; border: 1px solid black;padding:1px">Kualitas</td> 
               <td style="font-size:11px; border: 1px solid black;padding:1px">5</td>
               <td style="font-size:11px; border: 1px solid black;padding:1px">5</td>
               </tr>

               <tr>
               <td style="font-size:11px; border: 1px solid black;padding:1px">Waktu</td> 
               <td style="font-size:11px; border: 1px solid black;padding:1px">6</td>
               <td style="font-size:11px; border: 1px solid black;padding:1px">6</td>
               
               </tr>
              
           
           </tr>

           <tr>
               <td colspan="6" style="background-color:#b8cce4;border: 1px solid black;font-size:11px;padding:1px"><b>PERILAKU KERJA</b></td>
             </tr>

             <tr>
               <td rowspan="3" style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">1</td>
               <td colspan="5" style="font-size:11px; border: 1px solid black;padding:1px">Berorientasi Pelayanan</td>
             </tr>
             <tr>
               <td colspan="3" style="font-size:11px; border: 1px solid black;padding:1px">Ukuran Keberhasilan/Indikator Kinerja dan Target :</td>
               <td colspan="2" style="font-size:11px; border: 1px solid black;padding:1px">Ekspetasi Khusus Pimpinan : </td>

             </tr>
             <tr>
               <td colspan="3" style="font-size:11px; border: 1px solid black;padding:1px">1. Memahami dan memenuhi kebutuhan masyarakat<br>
                   2. Ramah, cekatan, solutif, dan dapat diandalkan<br>
                   3. Melakukan perbaikan tiada henti</td>
               <td colspan="2" style="font-size:11px; border: 1px solid black;padding:1px">{{$ekspetasi1->ekspetasi}} </td>

             </tr>

             <br><br>


             <tr>
               <td rowspan="3" style="font-size:10px; border: 1px solid black;padding:1px;text-align:center;">2</td>
               <td colspan="5" style="font-size:10px; border: 1px solid black;padding:1px">Akuntabel</td>
             </tr>
             <tr>
               <td colspan="3" style="font-size:10px; border: 1px solid black;padding:1px">Ukuran Keberhasilan/Indikator Kinerja dan Target :</td>
               <td colspan="2" style="font-size:10px; border: 1px solid black;padding:1px">Ekspetasi Khusus Pimpinan : </td>
           
             </tr>
             <tr>
               <td colspan="3" style="font-size:10px; border: 1px solid black;padding:1px">1. Melaksanakan tugas dengan jujur, bertanggung jawab, cermat, disiplin, dan berintegritas tinggi
                   <br>2. Menggunakan kekayaan dan BMN secara bertanggung jawab, efektif, dan efisien
                   <br>3. Tidak menyalahgunakan kewenangan jabatan</td>
               <td colspan="2" style="font-size:10px; border: 1px solid black;padding:1px">{{$ekspetasi2->ekspetasi}} </td>
           
             </tr>
           
             <tr>
               <td rowspan="3" style="font-size:10px; border: 1px solid black;padding:1px;text-align:center;">3</td>
               <td colspan="5" style="font-size:10px; border: 1px solid black;padding:1px">Kompeten</td>
             </tr>
             <tr>
               <td colspan="3" style="font-size:10px; border: 1px solid black;padding:1px">Ukuran Keberhasilan/Indikator Kinerja dan Target :</td>
               <td colspan="2" style="font-size:10px; border: 1px solid black;padding:1px">Ekspetasi Khusus Pimpinan : </td>
           
             </tr>
             <tr>
               <td colspan="3" style="font-size:10px; border: 1px solid black;padding:1px">1. Meningkatkan kompetensi diri untuk menjawab tantangan yang selalu berubah
                   <br>2. Membantu orang lain belajar
                   <br>3. Melaksanakan tugas dengan kualitas terbaik</td>
               <td colspan="2" style="font-size:10px; border: 1px solid black;padding:1px">{{$ekspetasi3->ekspetasi}} </td>
           
             </tr>
             <tr>
               <td rowspan="3" style="font-size:10px; border: 1px solid black;padding:1px;text-align:center;">4</td>
               <td colspan="5" style="font-size:10px; border: 1px solid black;padding:1px">Harmonis</td>
             </tr>
             <tr>
               <td colspan="3" style="font-size:10px; border: 1px solid black;padding:1px">Ukuran Keberhasilan/Indikator Kinerja dan Target :</td>
               <td colspan="2" style="font-size:10px; border: 1px solid black;padding:1px">Ekspetasi Khusus Pimpinan : </td>
           
             </tr>
             <tr>
               <td colspan="3" style="font-size:10px; border: 1px solid black;padding:1px">1. Menghargai setiap orang apapun latar belakangnya
                   <br>2. Suka menolong orang lain
                   <br>3. Membangun lingkungan kerja yang kondusif</td>
               <td colspan="2" style="font-size:10px; border: 1px solid black;padding:1px">{{$ekspetasi4->ekspetasi}} </td>
           
             </tr>
           
             <tr>
               <td rowspan="3" style="font-size:10px; border: 1px solid black;padding:1px;text-align:center;">5</td>
               <td colspan="5" style="font-size:10px; border: 1px solid black;padding:1px">Loyal</td>
             </tr>
             <tr>
               <td colspan="3" style="font-size:10px; border: 1px solid black;padding:1px">Ukuran Keberhasilan/Indikator Kinerja dan Target :</td>
               <td colspan="2" style="font-size:10px; border: 1px solid black;padding:1px">Ekspetasi Khusus Pimpinan : </td>
           
             </tr>
             <tr>
               <td colspan="3" style="font-size:10px; border: 1px solid black;padding:1px">1. Memegang teguh ideologi pancasila, UUD 1945, setia terhadap NKRI serta pemerintahan yang sah
                   <br>2. Menjaga nama baik sesama ASN, Pimpinan, Instansi, dan Negara
                   <br>3. Menjaga rahasia jabatan dan Negara</td>
               <td colspan="2" style="font-size:10px; border: 1px solid black;padding:1px">{{$ekspetasi5->ekspetasi}} </td>
           
             </tr>
           
             <tr>
               <td rowspan="3" style="font-size:10px; border: 1px solid black;padding:1px;text-align:center;">6</td>
               <td colspan="5" style="font-size:10px; border: 1px solid black;padding:1px">Adaptif</td>
             </tr>
             <tr>
               <td colspan="3" style="font-size:10px; border: 1px solid black;padding:1px">Ukuran Keberhasilan/Indikator Kinerja dan Target :</td>
               <td colspan="2" style="font-size:10px; border: 1px solid black;padding:1px">Ekspetasi Khusus Pimpinan : </td>
           
             </tr>
             <tr>
               <td colspan="3" style="font-size:10px; border: 1px solid black;padding:1px">1. Cepat Menyesuaikan diri menghadapi perubahan
                   <br>2. Terus berinovasi dan mengembangkan kreativitas
                   <br>3. Bertindak proaktif</td>
               <td colspan="2" style="font-size:10px; border: 1px solid black;padding:1px">{{$ekspetasi6->ekspetasi}} </td>
           
             </tr>
           
             <tr>
               <td rowspan="3" style="font-size:10px; border: 1px solid black;padding:1px;text-align:center;">7</td>
               <td colspan="5" style="font-size:10px; border: 1px solid black;padding:1px">Kolaboratif</td>
             </tr>
             <tr>
               <td colspan="3" style="font-size:10px; border: 1px solid black;padding:1px">Ukuran Keberhasilan/Indikator Kinerja dan Target :</td>
               <td colspan="2" style="font-size:10px; border: 1px solid black;padding:1px">Ekspetasi Khusus Pimpinan : </td>
           
             </tr>
             <tr>
               <td colspan="3" style="font-size:10px; border: 1px solid black;padding:1px">1. Memberi kesempatan kepada berbagai pihak untuk berkontribusi
                   <br>2. Terbuka dalam bekerja sama untuk menghasilkan nilai tambah
                   <br>3. Menggerakkan pemanfaatan berbagai sumberdaya untuk tujuan bersama</td>
               <td colspan="2" style="font-size:10px; border: 1px solid black;padding:1px">{{$ekspetasi7->ekspetasi}} </td>
           
             </tr>
           
           
           
             
           
           
           
           
           </tbody>
           </table>
<br>
<br>

<div class="float-left" style="text-align:center;font-size:12px"><br><br><b>PNS yang Dinilai,</b><br><br><br><br><br><b>{{$skp->user->name}}</b><br><b>{{$skp->user->nip}}</b></div>
<div class="float-right" style="text-align:center;font-size:12px">Bitung, {{$date}}. <br><b>Pejabat Penilai,</b><br><br><br><br><br><b>{{$atasans}}</b><br><b>{{$atasann->nip}}</b></div><br>

<div class="page-break"></div>

<h6 style="text-align:center">SASARAN KINERJA PEGAWAI</h6>
   <h6 style="text-align:center">JABATAN JA/STRUKTURAL</h6>
   <h6 style="text-align:center">PENDEKATAN HASIL KERJA KUALITATIF</h6>

   <div  class="float-right">
    PERIODE PENILAIAN : 1 JANUARI {{$skp->tahun}} - 31 DESEMBER {{$skp->tahun}}
  </div>
  <div  class="float-left">
     <b>SATUAN POLISI PAMONG PRAJA KOTA BITUNG</b>
  </div>

  
  <br>
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size:10px;margin-bottom:0" >


    <tbody style="color:black">
        @php
        $no = 1;
        @endphp
        <tr>
          <td  style="background-color:#b8cce4;text-align:center;border: 1px solid black;padding:1px"><b>NO</b></td>
          <td colspan="3" style="background-color:#b8cce4;text-align:center;border: 1px solid black;padding:1px"><b>PEGAWAI YANG DINILAI</b></td>
          <td  style="background-color:#b8cce4;text-align:center;border: 1px solid black;padding:1px"><b>NO</b></td>
          <td colspan="3" style="background-color:#b8cce4;text-align:center;border: 1px solid black;padding:1px"><b>PEJABAT PENILAI KINERJA</b></td>
        </tr>
        <tr>
            <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">1</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px">Nama</td>
            <td colspan="2" style="font-size:11px; border: 1px solid black;padding:1px" >{{$skp->user->name}}</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">1</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px">Nama</td>
            <td colspan="2" style="font-size:11px; border: 1px solid black;padding:1px">{{$atasans}}</td>
        </tr>
        <tr>
            <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">2</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px">NIP</td>
            <td colspan="2" style="font-size:11px; border: 1px solid black;padding:1px" >{{$skp->user->nip}}</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">2</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px">NIP</td>
            <td colspan="2" style="font-size:11px; border: 1px solid black;padding:1px">{{$atasann->nip}}</td>
        </tr>
        <tr>
            <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">3</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px">Pangkat / Gol Ruang</td>
            <td colspan="2" style="font-size:11px; border: 1px solid black;padding:1px" >{{$skp->user->golongan->name}}</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">3</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px">Pangkat / Gol Ruang</td>
            <td colspan="2" style="font-size:11px; border: 1px solid black;padding:1px">{{$atasann->golongan->name}}</td>
        </tr>
        <tr>
            <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">4</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px">Jabatan</td>
            <td colspan="2" style="font-size:11px; border: 1px solid black;padding:1px" >{{$skp->user->level->name}}</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">4</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px">Jabatan</td>
            <td colspan="2" style="font-size:11px; border: 1px solid black;padding:1px">{{$atasann->level->name}}</td>
        </tr>
        <tr>
            <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">5</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px">Unit Kerja</td>
            <td colspan="2" style="font-size:11px; border: 1px solid black;padding:1px" >Satuan Polisi Pamong Praja</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">5</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px">Unit Kerja</td>
            <td colspan="2" style="font-size:11px; border: 1px solid black;padding:1px">Satuan Polisi Pamong Praja</td>
        </tr>
       

          <tr>
            <td colspan="8" style="background-color:#b8cce4;border: 1px solid black;font-size:11px;padding:1px"><b>CAPAIAN KINERJA ORGANISASI :<br> {{$organisasi}}</b></td>
          </tr>
          <tr>
            <td colspan="8" style="background-color:#b8cce4;border-top: 1px solid black;border-left:1px solid black;border-right:1px solid black;font-size:11px;padding:1px"><b>POLA DISTRIBUSI</b>
            
           </td>
          </tr>
          <tr>
            <td colspan="8" style="background-color:#b8cce4;border: 1px solid black;font-size:11px;padding:1px;text-align:center">
              <br><br><img src="https://i.ibb.co/3NtwXkC/grafik37.jpg" style="width:500px;text-align:center">
            
           </td>
          </tr>

        </tbody>
  </table>
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size:10px; border-bottom: 2px solid black;" >


    <tbody style="color:black">

          <tr>
            <td colspan="8" style="background-color:#b8cce4;border: 1px solid black;font-size:11px;padding:1px"><b>HASIL KERJA</b></td>
          </tr>
          <tr>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;"><b>NO</b></td>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;"><b>RENCANA HASIL KERJA PIMPINAN YANG DIINTERVENSI</b></td>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;"><b>RENCANA HASIL KERJA</b></td>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;"><b>ASPEK</b></td>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;"><b>INDIKATOR KINERJA INDIVIDU</b></td>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;"><b>TARGET</b></td>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;"><b>REALISASI</b></td>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;"><b>UMPAN BALIK</b></td>
          </tr>
          <tr>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;">(1)</td>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;">(2)</td>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;">(3))</td>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;">(4)</td>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;">(5)</td>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;">(6)</td>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;"></td>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;">(7)</td>

          </tr>
          <tr>
            <td colspan="8" style="background-color:#b8cce4;border: 1px solid black;font-size:11px;padding:1px"><b>A. HASIL KERJA UTAMA</b></td>
          </tr>

          <tr>
            
            <td rowspan="{{$count}}" style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">1</td>
            <td rowspan="{{$count}}"style="font-size:11px; border: 1px solid black;padding:1px" >{{$datar->intervensi}}</td> 
            <td rowspan="{{$count}}" style="font-size:11px; border: 1px solid black;padding:1px">{{$datar->rencana}}</td> 
            @foreach($datai as $key => $items)
            
            <td style="font-size:11px; border: 1px solid black;padding:1px">Kuantitas</td> 
            <td style="font-size:11px; border: 1px solid black;padding:1px">{{$items->indikator}}</td> 
            <td style="font-size:11px; border: 1px solid black;padding:1px">{{$items->target}}</td> 
            <td style="font-size:11px; border: 1px solid black;padding:1px">{{$items->realisasi}}</td> 
            <td style="font-size:11px; border: 1px solid black;padding:1px">{{$items->umpan}}</td> 

            </tr>

            <tr>
            <td style="font-size:11px; border: 1px solid black;padding:1px">Kualitas</td> 
            <td style="font-size:11px; border: 1px solid black;padding:1px">0</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px">0</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px">0</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px"></td>
            </tr>

            <tr>
            <td style="font-size:11px; border: 1px solid black;padding:1px">Waktu</td> 
            <td style="font-size:11px; border: 1px solid black;padding:1px">0</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px">0</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px">0</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px"></td>
            
            </tr>
           
            @endforeach
        </tr>

        <tr>
          <td colspan="8" style="background-color:#b8cce4;border: 1px solid black;font-size:11px;padding:10px"><b>B. HASIL KERJA TAMBAHAN</b></td>
        </tr>

        <tr>
      
          <td rowspan="3" style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">1</td>
          <td rowspan="3"style="font-size:11px; border: 1px solid black;padding:1px" >Rencana Hasil Kerja Tambahan 1</td> 
          <td rowspan="3" style="font-size:11px; border: 1px solid black;padding:1px">Indikator Kinerja Tambahan 1</td> 
  
          
          <td style="font-size:11px; border: 1px solid black;padding:1px">Kuantitas</td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px">1</td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px">1</td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px"></td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px"></td> 

          </tr>

          <tr>
          <td style="font-size:11px; border: 1px solid black;padding:1px">Kualitas</td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px">2</td>
          <td style="font-size:11px; border: 1px solid black;padding:1px">2</td>
          <td style="font-size:11px; border: 1px solid black;padding:1px"></td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px"></td> 
          </tr>

          <tr>
          <td style="font-size:11px; border: 1px solid black;padding:1px">Waktu</td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px">3</td>
          <td style="font-size:11px; border: 1px solid black;padding:1px">3</td>
          <td style="font-size:11px; border: 1px solid black;padding:1px"></td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px"></td> 
          
          </tr>
         
      
      </tr>
     
      <tr>
      
          <td rowspan="3" style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">2</td>
          <td rowspan="3"style="font-size:11px; border: 1px solid black;padding:1px;dontBreakRows: true" >Rencana Hasil Kerja Tambahan 2</td> 
          <td rowspan="3" style="font-size:11px; border: 1px solid black;padding:1px">Indikator Kinerja Tambahan 2</td> 
  
          
          <td style="font-size:11px; border: 1px solid black;padding:1px">Kuantitas</td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px">4</td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px">4</td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px"></td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px"></td> 
          
          </tr>

          <tr>
          <td style="font-size:11px; border: 1px solid black;padding:1px">Kualitas</td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px">5</td>
          <td style="font-size:11px; border: 1px solid black;padding:1px">5</td>
          <td style="font-size:11px; border: 1px solid black;padding:1px"></td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px"></td> 
          </tr>

          <tr>
          <td style="font-size:11px; border: 1px solid black;padding:1px">Waktu</td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px">6</td>
          <td style="font-size:11px; border: 1px solid black;padding:1px">6</td>
          <td style="font-size:11px; border: 1px solid black;padding:1px"></td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px"></td> 
          
          </tr>
         
      
      </tr>
          
      <tr>
        <td colspan="8" style="background-color:#b8cce4;border: 1px solid black;font-size:12px;padding:10px"><b>RATING HASIL KERJA :
             {{-- <br> {{$rating}}</b> --}}<br> <b>DIATAS EKSPETASI</b>  
        </td>
      </tr>
      <tr>
        <td colspan="5"  style="background-color:#b8cce4;border: 1px solid black;font-size:12px;padding:10px"><b>PERILAKU KERJA </b></td>
        <td colspan="3"  style="background-color:#b8cce4;border: 1px solid black;font-size:12px;padding:10px"><b>UMPAN BALIK BERKELANJUTAN BERDASARKAN BUKTI DUKUNG </b></td>
      </tr>
      <tr>
        <td rowspan="3" style="font-size:11px; border: 1px solid black;padding:6px;text-align:center;">1</td>
        <td colspan="7" style="font-size:11px; border: 1px solid black;padding:6px">Berorientasi Pelayanan</td>
      </tr>
      <tr>
        <td colspan="3" style="font-size:11px; border: 1px solid black;padding:6px">Ukuran Keberhasilan/Indikator Kinerja dan Target :</td>
        <td  style="font-size:11px; border: 1px solid black;padding:6px">Ekspetasi Khusus Pimpinan : </td>
        <td  colspan="3" style="font-size:11px; border: 1px solid black;padding:6px">Umpan Balik : </td>
      </tr>
      <tr>
        <td colspan="3" style="font-size:11px; border: 1px solid black;padding:6px">1. Memahami dan memenuhi kebutuhan masyarakat<br>
            2. Ramah, cekatan, solutif, dan dapat diandalkan<br>
            3. Melakukan perbaikan tiada henti</td>
        <td style="font-size:11px; border: 1px solid black;padding:6px">{{$ekspetasi1->ekspetasi}} </td>
        <td  colspan="3"  style="font-size:11px; border: 1px solid black;padding:6px">{{$ekspetasi1->umpan}} </td>
      
      </tr>
      <tr>
        <td rowspan="3" style="font-size:11px; border: 1px solid black;padding:6px;text-align:center;">2</td>
        <td colspan="7" style="font-size:11px; border: 1px solid black;padding:6px">Akuntabel</td>
      </tr>
      <tr>
        <td colspan="3" style="font-size:11px; border: 1px solid black;padding:6px">Ukuran Keberhasilan/Indikator Kinerja dan Target :</td>
        <td  style="font-size:11px; border: 1px solid black;padding:6px">Ekspetasi Khusus Pimpinan : </td>
        <td  colspan="3" style="font-size:11px; border: 1px solid black;padding:6px">Umpan Balik : </td>
      </tr>
      <tr>
        <td colspan="3" style="font-size:11px; border: 1px solid black;padding:6px">1. Melaksanakan tugas dengan jujur, bertanggung jawab, cermat, disiplin, dan berintegritas tinggi
          <br>2. Menggunakan kekayaan dan BMN secara bertanggung jawab, efektif, dan efisien
          <br>3. Tidak menyalahgunakan kewenangan jabatan</td>
        <td style="font-size:11px; border: 1px solid black;padding:6px">{{$ekspetasi2->ekspetasi}} </td>
        <td  colspan="3"  style="font-size:11px; border: 1px solid black;padding:6px">{{$ekspetasi2->umpan}} </td>
      
      </tr>
      <tr>
        <td rowspan="3" style="font-size:11px; border: 1px solid black;padding:6px;text-align:center;">3</td>
        <td colspan="7" style="font-size:11px; border: 1px solid black;padding:6px">Kompeten</td>
      </tr>
      <tr>
        <td colspan="3" style="font-size:11px; border: 1px solid black;padding:6px">Ukuran Keberhasilan/Indikator Kinerja dan Target :</td>
        <td  style="font-size:11px; border: 1px solid black;padding:6px">Ekspetasi Khusus Pimpinan : </td>
        <td  colspan="3" style="font-size:11px; border: 1px solid black;padding:6px">Umpan Balik : </td>
      </tr>
      <tr>
        <td colspan="3" style="font-size:11px; border: 1px solid black;padding:6px">1. Meningkatkan kompetensi diri untuk menjawab tantangan yang selalu berubah
          <br>2. Membantu orang lain belajar
          <br>3. Melaksanakan tugas dengan kualitas terbaik</td>
        <td style="font-size:11px; border: 1px solid black;padding:6px">{{$ekspetasi3->ekspetasi}} </td>
        <td  colspan="3"  style="font-size:11px; border: 1px solid black;padding:6px">{{$ekspetasi3->umpan}} </td>
      
      </tr>
      
      <tr>
        <td rowspan="3" style="font-size:11px; border: 1px solid black;padding:6px;text-align:center;">4</td>
        <td colspan="7" style="font-size:11px; border: 1px solid black;padding:6px">Harmonis</td>
      </tr>
      <tr>
        <td colspan="3" style="font-size:11px; border: 1px solid black;padding:6px">Ukuran Keberhasilan/Indikator Kinerja dan Target :</td>
        <td  style="font-size:11px; border: 1px solid black;padding:6px">Ekspetasi Khusus Pimpinan : </td>
        <td  colspan="3" style="font-size:11px; border: 1px solid black;padding:6px"> Umpan Balik :</td>
      </tr>
      <tr>
        <td colspan="3" style="font-size:11px; border: 1px solid black;padding:6px">1. Menghargai setiap orang apapun latar belakangnya
          <br>2. Suka menolong orang lain
          <br>3. Membangun lingkungan kerja yang kondusif</td>
        <td style="font-size:11px; border: 1px solid black;padding:6px">{{$ekspetasi4->ekspetasi}} </td>
        <td  colspan="3"  style="font-size:11px; border: 1px solid black;padding:6px">{{$ekspetasi4->umpan}} </td>
      
      </tr>
      
      <tr>
        <td rowspan="3" style="font-size:11px; border: 1px solid black;padding:6px;text-align:center;">5</td>
        <td colspan="7" style="font-size:11px; border: 1px solid black;padding:6px">Loyal</td>
      </tr>
      <tr>
        <td colspan="3" style="font-size:11px; border: 1px solid black;padding:6px">Ukuran Keberhasilan/Indikator Kinerja dan Target :</td>
        <td  style="font-size:11px; border: 1px solid black;padding:6px">Ekspetasi Khusus Pimpinan : </td>
        <td  colspan="3" style="font-size:11px; border: 1px solid black;padding:6px"> Umpan Balik :</td>
      </tr>
      <tr>
        <td colspan="3" style="font-size:11px; border: 1px solid black;padding:6px">1. Memegang teguh ideologi pancasila, UUD 1945, setia terhadap NKRI serta pemerintahan yang sah
          <br>2. Menjaga nama baik sesama ASN, Pimpinan, Instansi, dan Negara
          <br>3. Menjaga rahasia jabatan dan Negara</td>
        <td style="font-size:11px; border: 1px solid black;padding:6px">{{$ekspetasi5->ekspetasi}} </td>
        <td  colspan="3"  style="font-size:11px; border: 1px solid black;padding:6px">{{$ekspetasi5->umpan}} </td>
      
      </tr>
      
      
      </tr>
      
      <tr>
      <td rowspan="3" style="font-size:11px; border: 1px solid black;padding:6px;text-align:center;">6</td>
      <td colspan="7" style="font-size:11px; border: 1px solid black;padding:6px">Adaptif</td>
      </tr>
      <tr>
      <td colspan="3" style="font-size:11px; border: 1px solid black;padding:6px">Ukuran Keberhasilan/Indikator Kinerja dan Target :</td>
      <td  style="font-size:11px; border: 1px solid black;padding:6px">Ekspetasi Khusus Pimpinan : </td>
      <td  colspan="3" style="font-size:11px; border: 1px solid black;padding:6px">Umpan Balik :</td>
      </tr>
      <tr>
      <td colspan="3" style="font-size:11px; border: 1px solid black;padding:6px">1. Cepat Menyesuaikan diri menghadapi perubahan
       <br> 2. Terus berinovasi dan mengembangkan kreativitas
       <br>3. Bertindak proaktif</td>
      <td style="font-size:11px; border: 1px solid black;padding:6px">{{$ekspetasi6->ekspetasi}} </td>
      <td  colspan="3"  style="font-size:11px; border: 1px solid black;padding:6px">{{$ekspetasi6->umpan}} </td>
      
      </tr>
      <tr>
      <td rowspan="3" style="font-size:11px; border: 1px solid black;padding:6px;text-align:center;">7</td>
      <td colspan="7" style="font-size:11px; border: 1px solid black;padding:6px">Kolaboratif</td>
      </tr>
      <tr>
      <td colspan="3" style="font-size:11px; border: 1px solid black;padding:6px">Ukuran Keberhasilan/Indikator Kinerja dan Target :</td>
      <td  style="font-size:11px; border: 1px solid black;padding:6px">Ekspetasi Khusus Pimpinan : </td>
      <td  colspan="3" style="font-size:11px; border: 1px solid black;padding:6px"> Umpan Balik :</td>
      </tr>
      <tr>
      <td colspan="3" style="font-size:11px; border: 1px solid black;padding:6px">1. Memberi kesempatan kepada berbagai pihak untuk berkontribusi
        <br>2. Terbuka dalam bekerja sama untuk menghasilkan nilai tambah
        <br>3. Menggerakkan pemanfaatan berbagai sumberdaya untuk tujuan bersama</td>
      <td style="font-size:11px; border: 1px solid black;padding:6px">{{$ekspetasi7->ekspetasi}} </td>
      <td  colspan="3"  style="font-size:11px; border: 1px solid black;padding:6px">{{$ekspetasi7->umpan}} </td>
      
      </tr>
      
      <tr>
        <td colspan="8" style="background-color:#b8cce4;border: 1px solid black;font-size:11px;padding:1px"><b>RATING PERILAKU KERJA KERJA :
               {{-- <br> {{$rating}}</b> --}}<br> <b>DIATAS EKSPETASI</b>
        </td>
      </tr>
      <tr>
        <td colspan="8" style="background-color:#b8cce4;border: 1px solid black;font-size:11px;padding:1px"><b>PREDIKAT KINERJA PEGAWAI :<br> {{$pegawai}}</b></td>
      </tr>
      

    </tbody>
  </table>
  <br>
      <div class="float-right" style="text-align:center;font-size:12px">Bitung, {{$date}}. <br><b>Pejabat Penilai,</b><br><br><br><br><br><b>{{$atasans}}</b><br><b>{{$atasann->nip}}</b></div><br>

      


</body>

@else

{{-- --------------------------Indikator 3------------------------ --}}

<body style="font-size:9px">
  
 
  <h6 style="text-align:center">SASARAN KINERJA PEGAWAI</h6>
  <h6 style="text-align:center">JABATAN JA/STRUKTURAL</h6>
  <h6 style="text-align:center">PENDEKATAN HASIL KERJA KUALITATIF</h6>

  <div  class="float-right">
   PERIODE PENILAIAN : 1 JANUARI {{$skp->tahun}} - 31 DESEMBER {{$skp->tahun}}
 </div>
 <div  class="float-left">
    <b>SATUAN POLISI PAMONG PRAJA KOTA BITUNG</b>
 </div>

 
 <br>
 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size:9px; border: 2px solid black;padding:1px" >


   <tbody style="color:black">
       @php
       $no = 1;
       @endphp
       <tr>
         <td colspan="3" style="background-color:#b8cce4;text-align:center;border: 1px solid black;padding:1px"><b>PEGAWAI YANG DINILAI</b></td>
         <td colspan="3" style="background-color:#b8cce4;text-align:center;border: 1px solid black;padding:1px"><b>PEJABAT PENILAI KINERJA</b></td>
       </tr>
       <tr>
           <td style="font-size:9px; border: 1px solid black;padding:1px;text-align:center;">1</td>
           <td style="font-size:9px; border: 1px solid black;padding:1px">Nama</td>
           <td style="font-size:9px; border: 1px solid black;padding:1px" >{{$skp->user->name}}</td>
           <td style="font-size:9px; border: 1px solid black;padding:1px;text-align:center;">1</td>
           <td style="font-size:9px; border: 1px solid black;padding:1px">Nama</td>
           <td style="font-size:9px; border: 1px solid black;padding:1px">{{$atasans}}</td>
       </tr>
       <tr>
           <td style="font-size:9px; border: 1px solid black;padding:1px;text-align:center;">2</td>
           <td style="font-size:9px; border: 1px solid black;padding:1px">NIP</td>
           <td style="font-size:9px; border: 1px solid black;padding:1px" >{{$skp->user->nip}}</td>
           <td style="font-size:9px; border: 1px solid black;padding:1px;text-align:center;">2</td>
           <td style="font-size:9px; border: 1px solid black;padding:1px">NIP</td>
           <td style="font-size:9px; border: 1px solid black;padding:1px">{{$atasann->nip}}</td>
       </tr>
       <tr>
           <td style="font-size:9px; border: 1px solid black;padding:1px;text-align:center;">3</td>
           <td style="font-size:9px; border: 1px solid black;padding:1px">Pangkat / Gol Ruang</td>
           <td style="font-size:9px; border: 1px solid black;padding:1px" >{{$skp->user->golongan->name}}</td>
           <td style="font-size:9px; border: 1px solid black;padding:1px;text-align:center;">3</td>
           <td style="font-size:9px; border: 1px solid black;padding:1px">Pangkat / Gol Ruang</td>
           <td style="font-size:9px; border: 1px solid black;padding:1px">{{$atasann->golongan->name}}</td>
       </tr>
       <tr>
           <td style="font-size:9px; border: 1px solid black;padding:1px;text-align:center;">4</td>
           <td style="font-size:9px; border: 1px solid black;padding:1px">Jabatan</td>
           <td style="font-size:9px; border: 1px solid black;padding:1px" >{{$skp->user->level->name}}</td>
           <td style="font-size:9px; border: 1px solid black;padding:1px;text-align:center;">4</td>
           <td style="font-size:9px; border: 1px solid black;padding:1px">Jabatan</td>
           <td style="font-size:9px; border: 1px solid black;padding:1px">{{$atasann->level->name}}</td>
       </tr>
       <tr>
           <td style="font-size:9px; border: 1px solid black;padding:1px;text-align:center;">5</td>
           <td style="font-size:9px; border: 1px solid black;padding:1px">Unit Kerja</td>
           <td style="font-size:9px; border: 1px solid black;padding:1px" >Satuan Polisi Pamong Praja</td>
           <td style="font-size:9px; border: 1px solid black;padding:1px;text-align:center;">5</td>
           <td style="font-size:9px; border: 1px solid black;padding:1px">Unit Kerja</td>
           <td style="font-size:9px; border: 1px solid black;padding:1px">Satuan Polisi Pamong Praja</td>
       </tr>
       <tr>
           <td colspan="6" style="background-color:#b8cce4;border: 1px solid black;font-size:9px;padding:1px"><b>HASIL KERJA</b></td>
         </tr>
         <tr>
           <td style="background-color:#b8cce4;font-size:9px; border: 1px solid black;padding:1px;text-align:center;"><b>NO</b></td>
           <td style="background-color:#b8cce4;font-size:9px; border: 1px solid black;padding:1px;text-align:center;"><b>RENCANA HASIL KERJA PIMPINAN YANG DIINTERVENSI</b></td>
           <td style="background-color:#b8cce4;font-size:9px; border: 1px solid black;padding:1px;text-align:center;"><b>RENCANA HASIL KERJA</b></td>
           <td style="background-color:#b8cce4;font-size:9px; border: 1px solid black;padding:1px;text-align:center;"><b>ASPEK</b></td>
           <td style="background-color:#b8cce4;font-size:9px; border: 1px solid black;padding:1px;text-align:center;"><b>INDIKATOR KINERJA INDIVIDU</b></td>
           <td style="background-color:#b8cce4;font-size:9px; border: 1px solid black;padding:1px;text-align:center;"><b>TARGET</b></td>
         </tr>
         <tr>
           <td style="background-color:#b8cce4;font-size:9px; border: 1px solid black;padding:1px;text-align:center;">(1)</td>
           <td style="background-color:#b8cce4;font-size:9px; border: 1px solid black;padding:1px;text-align:center;">(2)</td>
           <td style="background-color:#b8cce4;font-size:9px; border: 1px solid black;padding:1px;text-align:center;">(3))</td>
           <td style="background-color:#b8cce4;font-size:9px; border: 1px solid black;padding:1px;text-align:center;">(4)</td>
           <td style="background-color:#b8cce4;font-size:9px; border: 1px solid black;padding:1px;text-align:center;">(5)</td>
           <td style="background-color:#b8cce4;font-size:9px; border: 1px solid black;padding:1px;text-align:center;">(6)</td>
         </tr>

         <tr>
           <td colspan="6" style="background-color:#b8cce4;border: 1px solid black;font-size:9px;padding:1px"><b>A. HASIL KERJA UTAMA</b></td>
         </tr>

         <tr>
           
               <td rowspan="{{$count}}" style="font-size:9px; border: 1px solid black;padding:1px;text-align:center;">1</td>
               <td rowspan="{{$count}}"style="font-size:9px; border: 1px solid black;padding:1px" >{{$datar->intervensi}}</td> 
               <td rowspan="{{$count}}" style="font-size:9px; border: 1px solid black;padding:1px">{{$datar->rencana}}</td> 
               @foreach($datai as $key => $items)
               
               <td style="font-size:9px; border: 1px solid black;padding:1px">Kuantitas</td> 
               <td style="font-size:9px; border: 1px solid black;padding:1px">{{$items->indikator}}</td> 
               <td style="font-size:9px; border: 1px solid black;padding:1px">{{$items->target}}</td> 
               
               </tr>

               <tr>
               <td style="font-size:9px; border: 1px solid black;padding:1px">Kualitas</td> 
               <td style="font-size:9px; border: 1px solid black;padding:1px"></td>
               <td style="font-size:9px; border: 1px solid black;padding:1px"></td>
               </tr>

               <tr>
               <td style="font-size:9px; border: 1px solid black;padding:1px">Waktu</td> 
               <td style="font-size:9px; border: 1px solid black;padding:1px"></td>
               <td style="font-size:9px; border: 1px solid black;padding:1px"></td>
               
               </tr>
              
               @endforeach
           </tr>
                       
           <tr>
               <td colspan="6" style="background-color:#b8cce4;border: 1px solid black;font-size:9px;padding:1px"><b>B. HASIL KERJA TAMBAHAN</b></td>
             </tr>

             <tr>
           
               <td rowspan="3" style="font-size:9px; border: 1px solid black;padding:1px;text-align:center;">1</td>
               <td rowspan="3"style="font-size:9px; border: 1px solid black;padding:1px" >Rencana Hasil Kerja Tambahan 1</td> 
               <td rowspan="3" style="font-size:9px; border: 1px solid black;padding:1px">Indikator Kinerja Tambahan 1</td> 
       
               
               <td style="font-size:9px; border: 1px solid black;padding:1px">Kuantitas</td> 
               <td style="font-size:9px; border: 1px solid black;padding:1px">1</td> 
               <td style="font-size:9px; border: 1px solid black;padding:1px">1</td> 
               
               </tr>

               <tr>
               <td style="font-size:9px; border: 1px solid black;padding:1px">Kualitas</td> 
               <td style="font-size:9px; border: 1px solid black;padding:1px">2</td>
               <td style="font-size:9px; border: 1px solid black;padding:1px">2</td>
               </tr>

               <tr>
               <td style="font-size:9px; border: 1px solid black;padding:1px">Waktu</td> 
               <td style="font-size:9px; border: 1px solid black;padding:1px">3</td>
               <td style="font-size:9px; border: 1px solid black;padding:1px">3</td>
               
               </tr>
              
           
           </tr>

           <tr>
           
               <td rowspan="3" style="font-size:9px; border: 1px solid black;padding:1px;text-align:center;">2</td>
               <td rowspan="3"style="font-size:9px; border: 1px solid black;padding:1px;dontBreakRows: true" >Rencana Hasil Kerja Tambahan 2</td> 
               <td rowspan="3" style="font-size:9px; border: 1px solid black;padding:1px">Indikator Kinerja Tambahan 2</td> 
       
               
               <td style="font-size:9px; border: 1px solid black;padding:1px">Kuantitas</td> 
               <td style="font-size:9px; border: 1px solid black;padding:1px">4</td> 
               <td style="font-size:9px; border: 1px solid black;padding:1px">4</td> 
               
               </tr>

               <tr>
               <td style="font-size:9px; border: 1px solid black;padding:1px">Kualitas</td> 
               <td style="font-size:9px; border: 1px solid black;padding:1px">5</td>
               <td style="font-size:9px; border: 1px solid black;padding:1px">5</td>
               </tr>

               <tr>
               <td style="font-size:9px; border: 1px solid black;padding:1px">Waktu</td> 
               <td style="font-size:9px; border: 1px solid black;padding:1px">6</td>
               <td style="font-size:9px; border: 1px solid black;padding:1px">6</td>
               
               </tr>
              
           
           </tr>
      
           <tr>
               <td colspan="6" style="background-color:#b8cce4;border: 1px solid black;font-size:9px;padding:1px"><b>PERILAKU KERJA</b></td>
             </tr>


             <tr>
               <td rowspan="3" style="font-size:9px; border: 1px solid black;padding:1px;text-align:center;">1</td>
               <td colspan="5" style="font-size:9px; border: 1px solid black;padding:1px">Berorientasi Pelayanan</td>
             </tr>
             <tr>
               <td colspan="3" style="font-size:9px; border: 1px solid black;padding:1px">Ukuran Keberhasilan/Indikator Kinerja dan Target :</td>
               <td colspan="2" style="font-size:9px; border: 1px solid black;padding:1px">Ekspetasi Khusus Pimpinan : </td>

             </tr>
             <tr>
               <td colspan="3" style="font-size:9px; border: 1px solid black;padding:1px">1. Memahami dan memenuhi kebutuhan masyarakat<br>
                   2. Ramah, cekatan, solutif, dan dapat diandalkan<br>
                   3. Melakukan perbaikan tiada henti</td>
               <td colspan="2" style="font-size:9px; border: 1px solid black;padding:1px">{{$ekspetasi1->ekspetasi}} </td>

             </tr>

          


             <tr>
               <td rowspan="3" style="font-size:9px; border: 1px solid black;padding:1px;text-align:center;">2</td>
               <td colspan="5" style="font-size:9px; border: 1px solid black;padding:1px">Akuntabel</td>
             </tr>
             <tr>
               <td colspan="3" style="font-size:9px; border: 1px solid black;padding:1px">Ukuran Keberhasilan/Indikator Kinerja dan Target :</td>
               <td colspan="2" style="font-size:9px; border: 1px solid black;padding:1px">Ekspetasi Khusus Pimpinan : </td>
           
             </tr>
             <tr>
               <td colspan="3" style="font-size:9px; border: 1px solid black;padding:1px">1. Melaksanakan tugas dengan jujur, bertanggung jawab, cermat, disiplin, dan berintegritas tinggi
                   <br>2. Menggunakan kekayaan dan BMN secara bertanggung jawab, efektif, dan efisien
                   <br>3. Tidak menyalahgunakan kewenangan jabatan</td>
               <td colspan="2" style="font-size:9px; border: 1px solid black;padding:1px">{{$ekspetasi2->ekspetasi}} </td>
           
             </tr>
           
             <tr>
               <td rowspan="3" style="font-size:9px; border: 1px solid black;padding:1px;text-align:center;">3</td>
               <td colspan="5" style="font-size:9px; border: 1px solid black;padding:1px">Kompeten</td>
             </tr>
             <tr>
               <td colspan="3" style="font-size:9px; border: 1px solid black;padding:1px">Ukuran Keberhasilan/Indikator Kinerja dan Target :</td>
               <td colspan="2" style="font-size:9px; border: 1px solid black;padding:1px">Ekspetasi Khusus Pimpinan : </td>
           
             </tr>
             <tr>
               <td colspan="3" style="font-size:9px; border: 1px solid black;padding:1px">1. Meningkatkan kompetensi diri untuk menjawab tantangan yang selalu berubah
                   <br>2. Membantu orang lain belajar
                   <br>3. Melaksanakan tugas dengan kualitas terbaik</td>
               <td colspan="2" style="font-size:9px; border: 1px solid black;padding:1px">{{$ekspetasi3->ekspetasi}} </td>
           
             </tr>
             <tr>
               <td rowspan="3" style="font-size:9px; border: 1px solid black;padding:1px;text-align:center;">4</td>
               <td colspan="5" style="font-size:9px; border: 1px solid black;padding:1px">Harmonis</td>
             </tr>
             <tr>
               <td colspan="3" style="font-size:9px; border: 1px solid black;padding:1px">Ukuran Keberhasilan/Indikator Kinerja dan Target :</td>
               <td colspan="2" style="font-size:9px; border: 1px solid black;padding:1px">Ekspetasi Khusus Pimpinan : </td>
           
             </tr>
             <tr>
               <td colspan="3" style="font-size:9px; border: 1px solid black;padding:1px">1. Menghargai setiap orang apapun latar belakangnya
                   <br>2. Suka menolong orang lain
                   <br>3. Membangun lingkungan kerja yang kondusif</td>
               <td colspan="2" style="font-size:9px; border: 1px solid black;padding:1px">{{$ekspetasi4->ekspetasi}} </td>
           
             </tr>
           
             <tr>
               <td rowspan="3" style="font-size:9px; border: 1px solid black;padding:1px;text-align:center;">5</td>
               <td colspan="5" style="font-size:9px; border: 1px solid black;padding:1px">Loyal</td>
             </tr>
             <tr>
               <td colspan="3" style="font-size:9px; border: 1px solid black;padding:1px">Ukuran Keberhasilan/Indikator Kinerja dan Target :</td>
               <td colspan="2" style="font-size:9px; border: 1px solid black;padding:1px">Ekspetasi Khusus Pimpinan : </td>
           
             </tr>
             <tr>
               <td colspan="3" style="font-size:9px; border: 1px solid black;padding:1px">1. Memegang teguh ideologi pancasila, UUD 1945, setia terhadap NKRI serta pemerintahan yang sah
                   <br>2. Menjaga nama baik sesama ASN, Pimpinan, Instansi, dan Negara
                   <br>3. Menjaga rahasia jabatan dan Negara</td>
               <td colspan="2" style="font-size:9px; border: 1px solid black;padding:1px">{{$ekspetasi5->ekspetasi}} </td>
           
             </tr>
           
             <tr>
               <td rowspan="3" style="font-size:9px; border: 1px solid black;padding:1px;text-align:center;">6</td>
               <td colspan="5" style="font-size:9px; border: 1px solid black;padding:1px">Adaptif</td>
             </tr>
             <tr>
               <td colspan="3" style="font-size:9px; border: 1px solid black;padding:1px">Ukuran Keberhasilan/Indikator Kinerja dan Target :</td>
               <td colspan="2" style="font-size:9px; border: 1px solid black;padding:1px">Ekspetasi Khusus Pimpinan : </td>
           
             </tr>
             <tr>
               <td colspan="3" style="font-size:9px; border: 1px solid black;padding:1px">1. Cepat Menyesuaikan diri menghadapi perubahan
                   <br>2. Terus berinovasi dan mengembangkan kreativitas
                   <br>3. Bertindak proaktif</td>
               <td colspan="2" style="font-size:9px; border: 1px solid black;padding:1px">{{$ekspetasi6->ekspetasi}} </td>
           
             </tr>
           
             <tr>
               <td rowspan="3" style="font-size:9px; border: 1px solid black;padding:1px;text-align:center;">7</td>
               <td colspan="5" style="font-size:9px; border: 1px solid black;padding:1px">Kolaboratif</td>
             </tr>
             <tr>
               <td colspan="3" style="font-size:9px; border: 1px solid black;padding:1px">Ukuran Keberhasilan/Indikator Kinerja dan Target :</td>
               <td colspan="2" style="font-size:9px; border: 1px solid black;padding:1px">Ekspetasi Khusus Pimpinan : </td>
           
             </tr>
             <tr>
               <td colspan="3" style="font-size:9px; border: 1px solid black;padding:1px">1. Memberi kesempatan kepada berbagai pihak untuk berkontribusi
                   <br>2. Terbuka dalam bekerja sama untuk menghasilkan nilai tambah
                   <br>3. Menggerakkan pemanfaatan berbagai sumberdaya untuk tujuan bersama</td>
               <td colspan="2" style="font-size:9px; border: 1px solid black;padding:1px">{{$ekspetasi7->ekspetasi}} </td>
           
             </tr>
           
           
           
             
           
           
           
           
           </tbody>
           </table>
<br>
<br>

<div class="float-left" style="text-align:center;font-size:12px"><br><br><b>PNS yang Dinilai,</b><br><br><br><br><br><b>{{$skp->user->name}}</b><br><b>{{$skp->user->nip}}</b></div>
<div class="float-right" style="text-align:center;font-size:12px">Bitung, {{$date}}. <br><b>Pejabat Penilai,</b><br><br><br><br><br><b>{{$atasans}}</b><br><b>{{$atasann->nip}}</b></div><br>

<div class="page-break"></div>

<h6 style="text-align:center">SASARAN KINERJA PEGAWAI</h6>
   <h6 style="text-align:center">JABATAN JA/STRUKTURAL</h6>
   <h6 style="text-align:center">PENDEKATAN HASIL KERJA KUALITATIF</h6>

   <div  class="float-right">
    PERIODE PENILAIAN : 1 JANUARI {{$skp->tahun}} - 31 DESEMBER {{$skp->tahun}}
  </div>
  <div  class="float-left">
     <b>SATUAN POLISI PAMONG PRAJA KOTA BITUNG</b>
  </div>

  
  <br>
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size:10px;margin-bottom:0" >


    <tbody style="color:black">
        @php
        $no = 1;
        @endphp
        <tr>
          <td  style="background-color:#b8cce4;text-align:center;border: 1px solid black;padding:1px"><b>NO</b></td>
          <td colspan="3" style="background-color:#b8cce4;text-align:center;border: 1px solid black;padding:1px"><b>PEGAWAI YANG DINILAI</b></td>
          <td  style="background-color:#b8cce4;text-align:center;border: 1px solid black;padding:1px"><b>NO</b></td>
          <td colspan="3" style="background-color:#b8cce4;text-align:center;border: 1px solid black;padding:1px"><b>PEJABAT PENILAI KINERJA</b></td>
        </tr>
        <tr>
            <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">1</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px">Nama</td>
            <td colspan="2" style="font-size:11px; border: 1px solid black;padding:1px" >{{$skp->user->name}}</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">1</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px">Nama</td>
            <td colspan="2" style="font-size:11px; border: 1px solid black;padding:1px">{{$atasans}}</td>
        </tr>
        <tr>
            <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">2</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px">NIP</td>
            <td colspan="2" style="font-size:11px; border: 1px solid black;padding:1px" >{{$skp->user->nip}}</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">2</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px">NIP</td>
            <td colspan="2" style="font-size:11px; border: 1px solid black;padding:1px">{{$atasann->nip}}</td>
        </tr>
        <tr>
            <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">3</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px">Pangkat / Gol Ruang</td>
            <td colspan="2" style="font-size:11px; border: 1px solid black;padding:1px" >{{$skp->user->golongan->name}}</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">3</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px">Pangkat / Gol Ruang</td>
            <td colspan="2" style="font-size:11px; border: 1px solid black;padding:1px">{{$atasann->golongan->name}}</td>
        </tr>
        <tr>
            <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">4</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px">Jabatan</td>
            <td colspan="2" style="font-size:11px; border: 1px solid black;padding:1px" >{{$skp->user->level->name}}</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">4</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px">Jabatan</td>
            <td colspan="2" style="font-size:11px; border: 1px solid black;padding:1px">{{$atasann->level->name}}</td>
        </tr>
        <tr>
            <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">5</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px">Unit Kerja</td>
            <td colspan="2" style="font-size:11px; border: 1px solid black;padding:1px" >Satuan Polisi Pamong Praja</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">5</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px">Unit Kerja</td>
            <td colspan="2" style="font-size:11px; border: 1px solid black;padding:1px">Satuan Polisi Pamong Praja</td>
        </tr>
       

          <tr>
            <td colspan="8" style="background-color:#b8cce4;border: 1px solid black;font-size:11px;padding:1px"><b>CAPAIAN KINERJA ORGANISASI :<br> {{$organisasi}}</b></td>
          </tr>
          <tr>
            <td colspan="8" style="background-color:#b8cce4;border-top: 1px solid black;border-left:1px solid black;border-right:1px solid black;font-size:11px;padding:1px"><b>POLA DISTRIBUSI</b>
            
           </td>
          </tr>
          <tr>
            <td colspan="8" style="background-color:#b8cce4;border: 1px solid black;font-size:11px;padding:1px;text-align:center">
              <br><br><img src="https://i.ibb.co/3NtwXkC/grafik37.jpg" style="width:500px;text-align:center">
            
           </td>
          </tr>

        </tbody>
  </table>
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size:10px; border-bottom: 2px solid black;" >


    <tbody style="color:black">

          <tr>
            <td colspan="8" style="background-color:#b8cce4;border: 1px solid black;font-size:11px;padding:1px"><b>HASIL KERJA</b></td>
          </tr>
          <tr>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;"><b>NO</b></td>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;"><b>RENCANA HASIL KERJA PIMPINAN YANG DIINTERVENSI</b></td>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;"><b>RENCANA HASIL KERJA</b></td>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;"><b>ASPEK</b></td>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;"><b>INDIKATOR KINERJA INDIVIDU</b></td>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;"><b>TARGET</b></td>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;"><b>REALISASI</b></td>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;"><b>UMPAN BALIK</b></td>
          </tr>
          <tr>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;">(1)</td>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;">(2)</td>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;">(3))</td>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;">(4)</td>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;">(5)</td>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;">(6)</td>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;"></td>
            <td style="background-color:#b8cce4;font-size:11px; border: 1px solid black;padding:1px;text-align:center;">(7)</td>

          </tr>
          <tr>
            <td colspan="8" style="background-color:#b8cce4;border: 1px solid black;font-size:11px;padding:1px"><b>A. HASIL KERJA UTAMA</b></td>
          </tr>

          <tr>
            
            <td rowspan="{{$count}}" style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">1</td>
            <td rowspan="{{$count}}"style="font-size:11px; border: 1px solid black;padding:1px" >{{$datar->intervensi}}</td> 
            <td rowspan="{{$count}}" style="font-size:11px; border: 1px solid black;padding:1px">{{$datar->rencana}}</td> 
            @foreach($datai as $key => $items)
            
            <td style="font-size:11px; border: 1px solid black;padding:1px">Kuantitas</td> 
            <td style="font-size:11px; border: 1px solid black;padding:1px">{{$items->indikator}}</td> 
            <td style="font-size:11px; border: 1px solid black;padding:1px">{{$items->target}}</td> 
            <td style="font-size:11px; border: 1px solid black;padding:1px">{{$items->realisasi}}</td> 
            <td style="font-size:11px; border: 1px solid black;padding:1px">{{$items->umpan}}</td> 

            </tr>

            <tr>
            <td style="font-size:11px; border: 1px solid black;padding:1px">Kualitas</td> 
            <td style="font-size:11px; border: 1px solid black;padding:1px">0</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px">0</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px">0</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px"></td>
            </tr>

            <tr>
            <td style="font-size:11px; border: 1px solid black;padding:1px">Waktu</td> 
            <td style="font-size:11px; border: 1px solid black;padding:1px">0</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px">0</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px">0</td>
            <td style="font-size:11px; border: 1px solid black;padding:1px"></td>
            
            </tr>
           
            @endforeach
        </tr>

        <tr>
          <td colspan="8" style="background-color:#b8cce4;border: 1px solid black;font-size:11px;padding:10px"><b>B. HASIL KERJA TAMBAHAN</b></td>
        </tr>

        <tr>
      
          <td rowspan="3" style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">1</td>
          <td rowspan="3"style="font-size:11px; border: 1px solid black;padding:1px" >Rencana Hasil Kerja Tambahan 1</td> 
          <td rowspan="3" style="font-size:11px; border: 1px solid black;padding:1px">Indikator Kinerja Tambahan 1</td> 
  
          
          <td style="font-size:11px; border: 1px solid black;padding:1px">Kuantitas</td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px">1</td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px">1</td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px"></td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px"></td> 

          </tr>

          <tr>
          <td style="font-size:11px; border: 1px solid black;padding:1px">Kualitas</td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px">2</td>
          <td style="font-size:11px; border: 1px solid black;padding:1px">2</td>
          <td style="font-size:11px; border: 1px solid black;padding:1px"></td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px"></td> 
          </tr>

          <tr>
          <td style="font-size:11px; border: 1px solid black;padding:1px">Waktu</td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px">3</td>
          <td style="font-size:11px; border: 1px solid black;padding:1px">3</td>
          <td style="font-size:11px; border: 1px solid black;padding:1px"></td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px"></td> 
          
          </tr>
         
      
      </tr>
     
      <tr>
      
          <td rowspan="3" style="font-size:11px; border: 1px solid black;padding:1px;text-align:center;">2</td>
          <td rowspan="3"style="font-size:11px; border: 1px solid black;padding:1px;dontBreakRows: true" >Rencana Hasil Kerja Tambahan 2</td> 
          <td rowspan="3" style="font-size:11px; border: 1px solid black;padding:1px">Indikator Kinerja Tambahan 2</td> 
  
          
          <td style="font-size:11px; border: 1px solid black;padding:1px">Kuantitas</td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px">4</td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px">4</td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px"></td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px"></td> 
          
          </tr>

          <tr>
          <td style="font-size:11px; border: 1px solid black;padding:1px">Kualitas</td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px">5</td>
          <td style="font-size:11px; border: 1px solid black;padding:1px">5</td>
          <td style="font-size:11px; border: 1px solid black;padding:1px"></td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px"></td> 
          </tr>

          <tr>
          <td style="font-size:11px; border: 1px solid black;padding:1px">Waktu</td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px">6</td>
          <td style="font-size:11px; border: 1px solid black;padding:1px">6</td>
          <td style="font-size:11px; border: 1px solid black;padding:1px"></td> 
          <td style="font-size:11px; border: 1px solid black;padding:1px"></td> 
          
          </tr>
         
      
      </tr>
          
      <tr>
        <td colspan="8" style="background-color:#b8cce4;border: 1px solid black;font-size:11px;padding:12px"><b>RATING HASIL KERJA :
          {{-- <br> {{$rating}}</b> --}}<br> <b>DIATAS EKSPETASI</b>
        </td>
      </tr>
      <tr>
        <td colspan="5"  style="background-color:#b8cce4;border: 1px solid black;font-size:11px;padding:12px"><b>PERILAKU KERJA </b></td>
        <td colspan="3"  style="background-color:#b8cce4;border: 1px solid black;font-size:11px;padding:12px"><b>UMPAN BALIK BERKELANJUTAN BERDASARKAN BUKTI DUKUNG </b></td>
      </tr>
      <tr>
        <td rowspan="3" style="font-size:11px; border: 1px solid black;padding:4px;text-align:center;">1</td>
        <td colspan="7" style="font-size:11px; border: 1px solid black;padding:4px">Berorientasi Pelayanan</td>
      </tr>
      <tr>
        <td colspan="3" style="font-size:11px; border: 1px solid black;padding:4px">Ukuran Keberhasilan/Indikator Kinerja dan Target :</td>
        <td  style="font-size:11px; border: 1px solid black;padding:4px">Ekspetasi Khusus Pimpinan : </td>
        <td  colspan="3" style="font-size:11px; border: 1px solid black;padding:4px">Umpan Balik : </td>
      </tr>
      <tr>
        <td colspan="3" style="font-size:11px; border: 1px solid black;padding:4px">1. Memahami dan memenuhi kebutuhan masyarakat<br>
            2. Ramah, cekatan, solutif, dan dapat diandalkan<br>
            3. Melakukan perbaikan tiada henti</td>
        <td style="font-size:11px; border: 1px solid black;padding:4px">{{$ekspetasi1->ekspetasi}} </td>
        <td  colspan="3"  style="font-size:11px; border: 1px solid black;padding:4px">{{$ekspetasi1->umpan}} </td>
      
      </tr>
      <tr>
        <td rowspan="3" style="font-size:11px; border: 1px solid black;padding:4px;text-align:center;">2</td>
        <td colspan="7" style="font-size:11px; border: 1px solid black;padding:4px">Akuntabel</td>
      </tr>
      <tr>
        <td colspan="3" style="font-size:11px; border: 1px solid black;padding:4px">Ukuran Keberhasilan/Indikator Kinerja dan Target :</td>
        <td  style="font-size:11px; border: 1px solid black;padding:4px">Ekspetasi Khusus Pimpinan : </td>
        <td  colspan="3" style="font-size:11px; border: 1px solid black;padding:4px">Umpan Balik : </td>
      </tr>
      <tr>
        <td colspan="3" style="font-size:11px; border: 1px solid black;padding:4px">1. Melaksanakan tugas dengan jujur, bertanggung jawab, cermat, disiplin, dan berintegritas tinggi
          <br>2. Menggunakan kekayaan dan BMN secara bertanggung jawab, efektif, dan efisien
          <br>3. Tidak menyalahgunakan kewenangan jabatan</td>
        <td style="font-size:11px; border: 1px solid black;padding:4px">{{$ekspetasi2->ekspetasi}} </td>
        <td  colspan="3"  style="font-size:11px; border: 1px solid black;padding:4px">{{$ekspetasi2->umpan}} </td>
      
      </tr>
      <tr>
        <td rowspan="3" style="font-size:11px; border: 1px solid black;padding:4px;text-align:center;">3</td>
        <td colspan="7" style="font-size:11px; border: 1px solid black;padding:4px">Kompeten</td>
      </tr>
      <tr>
        <td colspan="3" style="font-size:11px; border: 1px solid black;padding:4px">Ukuran Keberhasilan/Indikator Kinerja dan Target :</td>
        <td  style="font-size:11px; border: 1px solid black;padding:4px">Ekspetasi Khusus Pimpinan : </td>
        <td  colspan="3" style="font-size:11px; border: 1px solid black;padding:4px">Umpan Balik : </td>
      </tr>
      <tr>
        <td colspan="3" style="font-size:11px; border: 1px solid black;padding:4px">1. Meningkatkan kompetensi diri untuk menjawab tantangan yang selalu berubah
          <br>2. Membantu orang lain belajar
          <br>3. Melaksanakan tugas dengan kualitas terbaik</td>
        <td style="font-size:11px; border: 1px solid black;padding:4px">{{$ekspetasi3->ekspetasi}} </td>
        <td  colspan="3"  style="font-size:11px; border: 1px solid black;padding:4px">{{$ekspetasi3->umpan}} </td>
      
      </tr>
      
      <tr>
        <td rowspan="3" style="font-size:11px; border: 1px solid black;padding:4px;text-align:center;">4</td>
        <td colspan="7" style="font-size:11px; border: 1px solid black;padding:4px">Harmonis</td>
      </tr>
      <tr>
        <td colspan="3" style="font-size:11px; border: 1px solid black;padding:4px">Ukuran Keberhasilan/Indikator Kinerja dan Target :</td>
        <td  style="font-size:11px; border: 1px solid black;padding:4px">Ekspetasi Khusus Pimpinan : </td>
        <td  colspan="3" style="font-size:11px; border: 1px solid black;padding:4px"> Umpan Balik :</td>
      </tr>
      <tr>
        <td colspan="3" style="font-size:11px; border: 1px solid black;padding:4px">1. Menghargai setiap orang apapun latar belakangnya
          <br>2. Suka menolong orang lain
          <br>3. Membangun lingkungan kerja yang kondusif</td>
        <td style="font-size:11px; border: 1px solid black;padding:4px">{{$ekspetasi4->ekspetasi}} </td>
        <td  colspan="3"  style="font-size:11px; border: 1px solid black;padding:4px">{{$ekspetasi4->umpan}} </td>
      
      </tr>
      
      <tr>
        <td rowspan="3" style="font-size:11px; border: 1px solid black;padding:4px;text-align:center;">5</td>
        <td colspan="7" style="font-size:11px; border: 1px solid black;padding:4px">Loyal</td>
      </tr>
      <tr>
        <td colspan="3" style="font-size:11px; border: 1px solid black;padding:4px">Ukuran Keberhasilan/Indikator Kinerja dan Target :</td>
        <td  style="font-size:11px; border: 1px solid black;padding:4px">Ekspetasi Khusus Pimpinan : </td>
        <td  colspan="3" style="font-size:11px; border: 1px solid black;padding:4px"> Umpan Balik :</td>
      </tr>
      <tr>
        <td colspan="3" style="font-size:11px; border: 1px solid black;padding:4px">1. Memegang teguh ideologi pancasila, UUD 1945, setia terhadap NKRI serta pemerintahan yang sah
          <br>2. Menjaga nama baik sesama ASN, Pimpinan, Instansi, dan Negara
          <br>3. Menjaga rahasia jabatan dan Negara</td>
        <td style="font-size:11px; border: 1px solid black;padding:4px">{{$ekspetasi5->ekspetasi}} </td>
        <td  colspan="3"  style="font-size:11px; border: 1px solid black;padding:4px">{{$ekspetasi5->umpan}} </td>
      
      </tr>
      
      
      </tr>
      
      <tr>
      <td rowspan="3" style="font-size:11px; border: 1px solid black;padding:4px;text-align:center;">6</td>
      <td colspan="7" style="font-size:11px; border: 1px solid black;padding:4px">Adaptif</td>
      </tr>
      <tr>
      <td colspan="3" style="font-size:11px; border: 1px solid black;padding:4px">Ukuran Keberhasilan/Indikator Kinerja dan Target :</td>
      <td  style="font-size:11px; border: 1px solid black;padding:4px">Ekspetasi Khusus Pimpinan : </td>
      <td  colspan="3" style="font-size:11px; border: 1px solid black;padding:4px">Umpan Balik :</td>
      </tr>
      <tr>
      <td colspan="3" style="font-size:11px; border: 1px solid black;padding:4px">1. Cepat Menyesuaikan diri menghadapi perubahan
       <br> 2. Terus berinovasi dan mengembangkan kreativitas
       <br>3. Bertindak proaktif</td>
      <td style="font-size:11px; border: 1px solid black;padding:4px">{{$ekspetasi6->ekspetasi}} </td>
      <td  colspan="3"  style="font-size:11px; border: 1px solid black;padding:4px">{{$ekspetasi6->umpan}} </td>
      
      </tr>
      <tr>
      <td rowspan="3" style="font-size:11px; border: 1px solid black;padding:4px;text-align:center;">7</td>
      <td colspan="7" style="font-size:11px; border: 1px solid black;padding:4px">Kolaboratif</td>
      </tr>
      <tr>
      <td colspan="3" style="font-size:11px; border: 1px solid black;padding:4px">Ukuran Keberhasilan/Indikator Kinerja dan Target :</td>
      <td  style="font-size:11px; border: 1px solid black;padding:4px">Ekspetasi Khusus Pimpinan : </td>
      <td  colspan="3" style="font-size:11px; border: 1px solid black;padding:4px"> Umpan Balik :</td>
      </tr>
      <tr>
      <td colspan="3" style="font-size:11px; border: 1px solid black;padding:4px">1. Memberi kesempatan kepada berbagai pihak untuk berkontribusi
        <br>2. Terbuka dalam bekerja sama untuk menghasilkan nilai tambah
        <br>3. Menggerakkan pemanfaatan berbagai sumberdaya untuk tujuan bersama</td>
      <td style="font-size:11px; border: 1px solid black;padding:4px">{{$ekspetasi7->ekspetasi}} </td>
      <td  colspan="3"  style="font-size:11px; border: 1px solid black;padding:4px">{{$ekspetasi7->umpan}} </td>
      
      </tr>
      
      <tr>
        <td colspan="8" style="background-color:#b8cce4;border: 1px solid black;font-size:11px;padding:1px"><b>RATING PERILAKU KERJA KERJA :
             {{-- <br> {{$rating}}</b> --}}<br> <b>DIATAS EKSPETASI</b>  
        </td>
      </tr>
      <tr>
        <td colspan="8" style="background-color:#b8cce4;border: 1px solid black;font-size:11px;padding:1px"><b>PREDIKAT KINERJA PEGAWAI :<br> {{$pegawai}}</b></td>
      </tr>
      

    </tbody>
  </table>
  <br>
      <div class="float-right" style="text-align:center;font-size:12px">Bitung, {{$date}}. <br><b>Pejabat Penilai,</b><br><br><br><br><br><b>{{$atasans}}</b><br><b>{{$atasann->nip}}</b></div><br>

      




@endif