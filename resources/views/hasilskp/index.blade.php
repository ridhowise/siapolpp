@extends('layouts.adm') 
@section('content')

<link href="{{ URL::asset('adm/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Pertemuan <a href="{{ url('pertemuan/create') }}" class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#add">Tambah Pertemuan</a> -->
</h1>
<!-- DataTales Example -->
<div class="card" style="background-color:f8f9fc;border-color:f8f9fc;">
  

    @if(count($errors) > 0)
    <div class="alert alert-danger">
      @foreach ($errors->all() as $error)
      {{ $error }} <br/>
      @endforeach
    </div>
    @endif

   <svg display="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<defs>
<symbol id="icon-bubble" viewBox="0 0 1024 1024">
  <title>bubble</title>
  <path class="path1" d="M512 224c8.832 0 16 7.168 16 16s-7.2 16-16 16c-170.464 0-320 89.728-320 192 0 8.832-7.168 16-16 16s-16-7.168-16-16c0-121.408 161.184-224 352-224zM512 64c-282.784 0-512 171.936-512 384 0 132.064 88.928 248.512 224.256 317.632 0 0.864-0.256 1.44-0.256 2.368 0 57.376-42.848 119.136-61.696 151.552 0.032 0 0.064 0 0.064 0-1.504 3.52-2.368 7.392-2.368 11.456 0 16 12.96 28.992 28.992 28.992 3.008 0 8.288-0.8 8.16-0.448 100-16.384 194.208-108.256 216.096-134.88 31.968 4.704 64.928 7.328 98.752 7.328 282.72 0 512-171.936 512-384s-229.248-384-512-384zM512 768c-29.344 0-59.456-2.24-89.472-6.624-3.104-0.512-6.208-0.672-9.28-0.672-19.008 0-37.216 8.448-49.472 23.36-13.696 16.672-52.672 53.888-98.72 81.248 12.48-28.64 22.24-60.736 22.912-93.824 0.192-2.048 0.288-4.128 0.288-5.888 0-24.064-13.472-46.048-34.88-56.992-118.592-60.544-189.376-157.984-189.376-260.608 0-176.448 200.96-320 448-320 246.976 0 448 143.552 448 320s-200.992 320-448 320z"></path>
</symbol>
<symbol id="icon-star" viewBox="0 0 1024 1024">
  <title>star</title>
  <path class="path1" d="M1020.192 401.824c-8.864-25.568-31.616-44.288-59.008-48.352l-266.432-39.616-115.808-240.448c-12.192-25.248-38.272-41.408-66.944-41.408s-54.752 16.16-66.944 41.408l-115.808 240.448-266.464 39.616c-27.36 4.064-50.112 22.784-58.944 48.352-8.8 25.632-2.144 53.856 17.184 73.12l195.264 194.944-45.28 270.432c-4.608 27.232 7.2 54.56 30.336 70.496 12.704 8.736 27.648 13.184 42.592 13.184 12.288 0 24.608-3.008 35.776-8.992l232.288-125.056 232.32 125.056c11.168 5.984 23.488 8.992 35.744 8.992 14.944 0 29.888-4.448 42.624-13.184 23.136-15.936 34.88-43.264 30.304-70.496l-45.312-270.432 195.328-194.944c19.296-19.296 25.92-47.52 17.184-73.12zM754.816 619.616c-16.384 16.32-23.808 39.328-20.064 61.888l45.312 270.432-232.32-124.992c-11.136-6.016-23.424-8.992-35.776-8.992-12.288 0-24.608 3.008-35.744 8.992l-232.32 124.992 45.312-270.432c3.776-22.56-3.648-45.568-20.032-61.888l-195.264-194.944 266.432-39.68c24.352-3.616 45.312-18.848 55.776-40.576l115.872-240.384 115.84 240.416c10.496 21.728 31.424 36.928 55.744 40.576l266.496 39.68-195.264 194.912z"></path>
</symbol>
</defs>
</svg>

<div class="blog-container">
  
  <div class="blog-header">
    <div class="blog-cover">
      <div class="blog-author">
        <h3>SATPOL PP KOTA BITUNG</h3>
        <ol class="breadcrumb float-left float-md-right">
          <li class="breadcrumb-item"><a href="{{ url()->previous() }}">BACK <i class="fa fa-arrow-left"></i></a></li>
      
      </ol>      </div>
    </div>
  </div>

  <div class="blog-body">
    <br>
    <div class="blog-title">
      <a class="btn btn-sm btn-primary" style="color:white" type="submit"
      href="" data-toggle="modal" data-target="#add"><i class="fas fa-eye"></i> Input Hasil SKP</a></h4><br>
      Nama : {{ $data->user->name}}
      <br>
      Periode 1 JANUARI {{$data->tahun}} - 31 DESEMBER {{$data->tahun}}
      
     
    </div>
    <br>
    <div class="blog-summary">
     
      <div class="table-responsive" style="font-size:10px">
        <table style="font-size:12px" class="display table table-bordered" id="dataTable" width="100%" cellspacing="0">
          @php
          $no = 1;
          @endphp
          <thead  >
            <tr>
              <th>Organisasi</th>
              <th>Pegawai</th>
              <th>Rating</th>
              <th>Grafik</th>
              <th>Dukungan Sumber Daya</th>
              <th>Skema Pertanggung Jawaban</th>
              <th>Konsekuensi</th>
              <th>Action</th>
              
            </tr>
          </thead>
          
          <tbody>
           
         @foreach($dataz as $key => $items)
              <tr>
              <td rowspan="2">{{$items->organisasi}}</td> 
              <td rowspan="2">{{$items->pegawai}}</td> 
              <td rowspan="2">{{$items->rating}}</td> 
              <td rowspan="2">
                <div id="curve_chart" style="width: 450px; height: 250px"></div>
              </td>
              
              <td>
                @php 
                foreach($datad as $itemd){
                echo $itemd->dukungan;}
                @endphp
              </td>
              <td> @php 
                foreach($datas as $itemss){
                  echo $itemss->skema;}
                @endphp</td>
              <td>@php 
                foreach($datak as $itemk){
                  echo $itemk->konsekuensi;}
                @endphp</td>
              
            
              <td >
             

                <a class="btn btn-sm btn-success" style="color:white;font-size:10px" type="submit"
                href="/ubahfinger/{{ $items->id }}"><i class="fas fa-edit"></i>Edit</a>
              </td>
             </tr>
              @endforeach
          </tbody>
      </table>
    </div>
    
    </div>
  <div class="blog-body">
    
       
</div>
    <div class="blog-tags">
      <ul>

        <li></li>
      </ul>
    </div>
  </div>
  
  <div class="blog-footer">
    <ul>
      
    </ul>
  </div>

</div>



<script type="text/javascript" src="//use.typekit.net/wtt0gtr.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

    
  
  </div>
    		
    </section>
</main>

<!-- Add -->
<div  class="modal fade" id="addlate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content" style="border:1px solid black;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Tugas Terlambat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="upload-image-form" class="form-horizontal" action=""  method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-body">
           sdsd
         
          <input type="hidden" name="status" value="2" class="form-control"> 


         
          <p>
  
 
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" onclick="return confirm('Apakah data sudah benar?');" class="btn btn-default" style="border:1px solid black;">Save changes</button>

        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" id="add" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="border:1px solid black;">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="upload-image-form" class="form-horizontal" action="" method="post"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-body">
              <div class="form-group row"><label class="col-lg-2 form-control-label">Pegawai</label>

                <div class="col-lg-3">

                <select name="pegawai" id="pegawai" class="">
                    <option>Penilaian</option>
                    <option value="SANGAT BAIK">SANGAT BAIK</option>
                    <option value="BAIK">BAIK</option>
                    <option value="BUTUH PERBAIKAN">BUTUH PERBAIKAN</option>
                    <option value="KURANG">KURANG</option>
                    <option value="SANGAT KURANG">SANGAT KURANG</option>

                  </select>

                </div>
            </div>
          </div>
            <div class="modal-body">
              <div class="form-group row"><label class="col-lg-2 form-control-label">Organisasi</label>

                <div class="col-lg-3">

                <select name="organisasi" id="organisasi" class="">
                    <option>Penilaian</option>
                    <option value="SANGAT BAIK">ISTIMEWA</option>
                    <option value="BAIK">BAIK</option>
                    <option value="BUTUH PERBAIKAN">CUKUP</option>
                    <option value="KURANG">KURANG</option>
                    <option value="SANGAT KURANG">SANGAT KURANG</option>

                  </select>

                </div>
            </div>
          </div>
         
            <div class="modal-body">
              <div class="form-group row"><label class="col-lg-2 form-control-label">Rating</label>

                <div class="col-lg-3">

                <select name="rating" id="rating" class="">
                    <option>Penilaian</option>
                    <option value="DIATAS EKSPETASI">DIATAS EKSPETASI</option>
                    <option value="SESUAI EKSPETASI">SESUAI EKSPETASI</option>
                    <option value="DIBAWAH EKSPETASI">DIBAWAH EKSPETASI</option>

                  </select>

                </div>
            </div>
          </div>

           

              <div class="modal-body">
                <div class="form-group row"><label class="col-lg-2 form-control-label">Organisasi</label>
  
                  <div class="col-lg-8">

            
              
              
                <table class="col-lg-12" id="dynamic_field" >
                  
                    <tr >
                        <tr>
                        <td> <textarea value="" placeholder="Dukungan Sumber Daya" name="dukungan[]" type="text"  class="form-control"></textarea></td>
                        <td><button type="button" name="adds" id="adds"
                          class="btn btn-success">+</button></td>
                      
                      </tr>                                               
                       
                    </tr>

                </table>


            </div>
        </div>
      </div>
     
       
      <div class="modal-body">
        <div class="form-group row"><label class="col-lg-2 form-control-label">Skema</label>

          <div class="col-lg-8">
        
          
          
            <table class="col-lg-12" id="dynamic_field2" >
              
                <tr >
                    <tr>
                    <td> <textarea value="" placeholder="Skema Pertanggung Jawaban" name="skema[]" type="text"  class="form-control"></textarea></td>
                    <td><button type="button" name="addss" id="addss"
                      class="btn btn-success">+</button></td>
                  
                  </tr>                                               
                   
                </tr>

            </table>


        </div>

    </div>
  </div>

    <div class="modal-body">
      <div class="form-group row"><label class="col-lg-2 form-control-label">Konsekuensi</label>

        <div class="col-lg-8">

    
      
      
        <table class="col-lg-12" id="dynamic_field3" >
          
            <tr >
                <tr>
                <td> <textarea value="" placeholder="Konsekuensi" name="konsekuensi[]" type="text"  class="form-control"></textarea></td>
                <td><button type="button" name="addsss" id="addsss"
                  class="btn btn-success">+</button></td>
              
              </tr>                                               
               
            </tr>

        </table>


    </div>

</div>
        
</div>       
              
            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-default"
                                    style="border:1px solid black;">Save changes</button>
                            </div>
        </form>
    </div>
</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div>
             <label>Name : </label>
             <input type="text" class="form-control">
        </div>
        
        <div>
             <label>Description : </label>
             <textarea class="form-control"></textarea>
        </div>
        
        <div>
             <label>Unit : </label>
             <input type="text" class="form-control">
        </div>
        
        <div>
             <label>Qty : </label>
             <input type="number" class="form-control">
        </div>
        
        <div>
             <label>From : </label>
             <input type="text" class="form-control">
        </div>
        
        <div>
             <label>Photos : </label>
             <input type="file" class="form-control">
        </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> <script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Year', 'Frekuensi Pegawai'],
      ['Sangat Kurang',  0  ],
      ['Kurang',  0   ],
      ['Butuh Perbaikan',  0     ],
      ['Baik',  27      ],
      ['Sangat Baik',  10      ]
    ]);

    var options = {
      title: 'Frekuensi Pegawai' ,
      curveType: 'function',
      legend: { position: 'top', alignment: 'center' },
    };

    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

    chart.draw(data, options);
  }
</script>
<script>

  $(document).ready(function() {
      $('#myModal').on('shown.bs.modal', function () {
          $('#myInput').trigger('focus')
      });
      
  } );
  function showEdit(id){
    $.ajax({
      url:"{{url('pertemuan')}}/"+id+"/edit",
      success:function(res){
        $("#form-edit [name='id']").val(id);
        $("#form-edit [name='name']").val(res.data.name);
        $("#form-edit [name='tanggal']").val(res.data.tanggal);
        $("#form-edit [name='debit']").val(res.data.debit);
        $("#form-edit [name='credit']").val(res.data.credit);
        $("#form-edit [name='balance']").val(res.data.balance);
        $("#form-edit [name='pic']").val(res.data.pic);
        $("#current_pic").html(res.data.pic);
        $('#form-edit').attr('action',"./pertemuan/"+id);
        $("#edit").modal('show');
      }
    })
  }
  $(document).ready(function() {
       var span = 1;
       var prevTD = "";
       var prevTDVal = "";
       $("#myTable tr td:first-child").each(function() { //for each first td in every tr
          var $this = $(this);
          if ($this.text() == prevTDVal) { // check value of previous td text
             span++;
             if (prevTD != "") {
                prevTD.attr("rowspan", span); // add attribute to previous td
                $this.remove(); // remove current td
             }
          } else {
             prevTD     = $this; // store current td 
             prevTDVal  = $this.text();
             span       = 1;
          }
       });
    });

  
</script>

<script type="text/javascript">
  $(document).ready(function() {
      var postURL = "<?php echo url('addmore'); ?>";
      var i = 1;


      $('#adds').click(function() {
          i++;
          $('#dynamic_field').append('<tr id="row' + i +
              '" class="dynamic-added"><td> <textarea value="" placeholder="Dukungan Sumber Daya" name="dukungan[]" type="text"  class="form-control"></textarea></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr> ');
      });


      $(document).on('click', '.btn_remove', function() {
          var button_id = $(this).attr("id");
          $('#row' + button_id + '').remove();
      });

      $('#addss').click(function() {
          i++;
          $('#dynamic_field2').append('<tr id="row' + i +
              '" class="dynamic-added"><td> <textarea value="" placeholder="Skema Pertanggung Jawaban" name="skema[]" type="text"  class="form-control"></textarea></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr> ');
      });

      $('#addsss').click(function() {
          i++;
          $('#dynamic_field3').append('<tr id="row' + i +
              '" class="dynamic-added"><td> <textarea value="" placeholder="Konsekuensi" name="konsekuensi[]" type="text"  class="form-control"></textarea></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr> ');
      });
  });
</script>
@endsection

<script>
  
</script>

<style>
body {
   background: #e5ded8;
   box-sizing: border-box;
}
 .blog-container {
   background: #fff;
   border-radius: 5px;
   box-shadow: rgba(0, 0, 0, .2) 0 4px 2px -2px;
   font-family: "adelle-sans", sans-serif;
   font-weight: 100;
   margin: 10px auto;
   width: 75%;
}
 
 .blog-container a {
   color: #4d4dff;
   text-decoration: none;
   transition: 0.25s ease;
}
 .blog-container a:hover {
   border-color: #ff4d4d;
   color: #ff4d4d;
}
 .blog-cover {
   background: url("https://i.ibb.co/MgC1QXw/red.jpg");
   background-size: cover;
   border-radius: 5px 5px 0 0;
   height: 15rem;
   box-shadow: inset rgba(0, 0, 0, .2) 0 64px 64px 16px;
}
 .blog-author, .blog-author--no-cover {
   margin: 0 auto;
   padding-top: 0.125rem;
   width: 80%;
}
 .blog-author h3::before, .blog-author--no-cover h3::before {
    margin: 0 auto;
   padding-top: 0.125rem;
   width: 80%;
}
 .blog-author h3 {
   color: #fff;
   font-weight: 100;
}
 .blog-author--no-cover h3 {
   color: #999;
   font-weight: 100;
}
 .blog-body {
   margin: 0 auto;
   width: 80%;
}
 .video-body {
   height: 100%;
   width: 100%;
}
 .blog-title h1 a {
   color: #333;
   font-weight: 100;
}
 .blog-summary p {
   color: #4d4d4d;
}
 .blog-tags ul {
   display: flex;
   flex-direction: row;
   flex-wrap: wrap;
   list-style: none;
   padding-left: 0;
}
 .blog-tags li + li {
   margin-left: 0.5rem;
}
 .blog-tags a {
   border: 1px solid #999;
   border-radius: 3px;
   color: blue;
   font-size: 0.75rem;
   height: 1.5rem;
   line-height: 1.5rem;
   letter-spacing: 1px;
   padding: 0 0.5rem;
   text-align: center;
   text-transform: uppercase;
   white-space: nowrap;
   width: 5rem;
}
 .blog-footer {
   border-top: 1px solid #e6e6e6;
   margin: 0 auto;
   padding-bottom: 0.125rem;
   width: 80%;
}
 .blog-footer ul {
   list-style: none;
   display: flex;
   flex: row wrap;
   justify-content: flex-end;
   padding-left: 0;
}
 .blog-footer li:first-child {
   margin-right: auto;
}
 .blog-footer li + li {
   margin-left: 0.5rem;
}
 .blog-footer li {
   color: #999;
   font-size: 0.75rem;
   height: 1.5rem;
   letter-spacing: 1px;
   line-height: 1.5rem;
   text-align: center;
   text-transform: uppercase;
   position: relative;
   white-space: nowrap;
}
 .blog-footer li a {
   color: #999;
}
 .comments {
   margin-right: 1rem;
}
 .published-date {
   border: 1px solid #999;
   border-radius: 3px;
   padding: 0 0.5rem;
}
 .numero {
   position: relative;
   top: -0.5rem;
}
 .icon-star, .icon-bubble {
   fill: #999;
   height: 24px;
   margin-right: 0.5rem;
   transition: 0.25s ease;
   width: 24px;
}
 .icon-star:hover, .icon-bubble:hover {
   fill: #ff4d4d;
}

.link{
  margin-top: 40px;
}

/* a{
  display: inline-block;
  color: #fff;
  font-size: 20px;
  padding: 20px;
  background: #265;
  border-radius: 10px;
  text-decoration: none;
}

a:hover{
  background: #487;
} */
.centerx {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 50px;
}
#clockdiv{
	font-family: sans-serif;
	color: #fff;
	display: inline-block;
	font-weight: 100;
	text-align: center;
	font-size: 30px;
}


#clockdiv > div{
	padding: 10px;
	border-radius: 3px;
	background: #74b9ff;
	display: inline-block;
  font-size: 40px;

}

#clockdiv div > span{
	padding: 10px;
	border-radius: 3px;
	background: #0984e3;
	display: inline-block;

}

.smalltext{
	padding-top: 5px;
	font-size: 16px;
}

</style>