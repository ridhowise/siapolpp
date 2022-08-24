
@extends('layouts.adm')
@section('content')

    <link href="{{ URL::asset('adm/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->

           
                @if($status->status == 0)
                <h1 class="h3 mb-2 text-gray-800">Total <a href="" class="btn btn-sm btn-primary"
                    data-toggle="modal" data-target="#add">Selesai </a>
                </h1>
               @elseif($status->status == 1 and Auth::User()->level_id == '2')
               <h1 class="h3 mb-2 text-gray-800">Total <a href="" class="btn btn-sm btn-primary"
                data-toggle="modal" data-target="#addlates">Check </a>
                </h1>
                @elseif($status->status == 2 and Auth::User()->level_id == '1' )
                <h1 class="h3 mb-2 text-gray-800">Total <a href="" class="btn btn-sm btn-primary"
                    data-toggle="modal" data-target="#addlate">Approve </a>
                </h1>
                @else
                
               @endif 
            </h1> 
       
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Total</h6>
            </div>
            <div class="card-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }} <br />
                            @endforeach
                        </div>
                    @endif

                   

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size:12px">

                            <thead style="color:black">
                                <tr>
                                    <th rowspan="2" style="text-align:center;vertical-align : middle">No.</th>
                                    <th rowspan="2" style="text-align:center;vertical-align : middle">Nama</th>
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
                            </tbody>
                        </table>

                    </div>
                    

            </div>
        </div>
        </section>
        </main>
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="border:1px solid black;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="form-edit" class="form-horizontal" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <input type="hidden" name="id">
                        <div class="modal-body">

                            <div class="form-group row"><label class="col-lg-3 form-control-label">Tipe Ujian</label>

                                <div class="col-lg-9">
                                    <select name="types" id="types" class="form-control select" required>
                                        <option value="0">-- Pilih Tipe Ujian --</option>
                                        <option value="1">Quiz</option>
                                        <option value="2">UTS</option>
                                        <option value="3">UAS</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row"><label class="col-lg-3 form-control-label">Nama Ujian</label>

                                <div class="col-lg-9">
                                    <textarea name="name" placeholder="Nama Ujian" class="form-control"> </textarea>
                                </div>
                            </div>

                            
                         
                        </div>
                        <div class="modal-footer">
                            <button type="button" style="border:1px solid black;" class="btn btn-default"
                                data-dismiss="modal">Close</button>
                            <button type="submit" style="border:1px solid black;" class="btn btn-default">Save
                                changes</button>
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
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="upload-image-form" class="form-horizontal" action=""" method="post"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-body" style=" display: flex;
            justify-content: center;
            align-items: center;
            height: 50px;">
                
                    <h3>Apakah anda yakin data sudah benar?</h3>
                
            </div>
            <input type="hidden" name="status" value="1" class="form-control"> 

         
                                         

                                            
                                        
                           
                            <div  style=" display: flex;
                            justify-content: center!important;
                            align-items: center!important;
                            height: 50px!important;
                            margin-top:12px">
                            
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Belum</button>
                                <button type="submit" class="btn btn-success"
                                    style="">Selesai</button>
                            </div>
        </form>
    </div>
</div>
</div>
    

<div class="modal fade bd-example-modal-lg" id="addlate" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="border:1px solid black;">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">APPROVEMENT</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="upload-image-form" class="form-horizontal" action=""" method="post"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-body" style=" display: flex;
            justify-content: center;
            align-items: center;
            height: 50px;">
                
                    <h3>Apakah anda yakin menyetujui data ini?</h3>
                
            </div>
            <input type="hidden" name="status" value="3" class="form-control"> 

         
                                         

                                            
                                        
                           
                            <div  style=" display: flex;
                            justify-content: center!important;
                            align-items: center!important;
                            height: 50px!important;
                            margin-top:12px">
                            
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Belum</button>
                                <button type="submit" class="btn btn-success"
                                    style="">Setuju</button>
                            </div>
        </form>
    </div>
</div>
</div>

<div class="modal fade bd-example-modal-lg" id="addlates" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="border:1px solid black;">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">APPROVEMENT</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="upload-image-form" class="form-horizontal" action=""" method="post"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-body" style=" display: flex;
            justify-content: center;
            align-items: center;
            height: 50px;">
                
                    <h3>Apakah anda yakin menyetujui data ini?</h3>
                
            </div>
            <input type="hidden" name="status" value="2" class="form-control"> 

         
                                         

                                            
                                        
                           
                            <div  style=" display: flex;
                            justify-content: center!important;
                            align-items: center!important;
                            height: 50px!important;
                            margin-top:12px">
                            
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Belum</button>
                                <button type="submit" class="btn btn-success"
                                    style="">Setuju</button>
                            </div>
        </form>
    </div>
</div>
</div>
        <!-- Add -->
        <div class="modal fade bd-example-modal-lg" id="adds" tabindex="-1" role="dialog"
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

                            <div class="form-group row"><label class="col-lg-3 form-control-label">Periode</label>

                                <div class="col-lg-8">
                                                <table class="col-lg-12" >
                                                    <tr>

                                                       
                                                        <td> <input value="" name="awal" type="date"  class="form-control"> </td>                                                                                                        
                                                        <td> <input value="" name="akhir" type="date"  class="form-control"> </td>                                                        
                                                   

                                                    </tr>
                                                </table>


                                            </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div>
                                        <div class="form-group row">

                                                <label class="col-lg-3 form-control-label">Tanggal </label>

                                            <div class="col-lg-8">
                                                <table class="col-lg-12" id="dynamic_field">
                                                    <tr>

                                                       
                                                        <td> <input value="" name="date[]" type="date"  class="form-control"> </td>
                                                        <td> <input value="08:00" name="timet[]" type="time"  class="form-control"> </td>                                                                                                        
                                                        <td> <input value="17:00" name="timep[]" type="time"  class="form-control"> </td>                                                        
                                                   

                                                        <td><button type="button" name="add" id="add"
                                                                class="btn btn-success">+</button></td>
                                                    </tr>
                                                </table>


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



        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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
        </div>


        <script type="text/javascript">
            $(document).ready(function() {
                var postURL = "<?php echo url('addmore'); ?>";
                var i = 1;


                $('#add').click(function() {
                    i++;
                    $('#dynamic_field').append('<tr id="row' + i +
                        '" class="dynamic-added"><td> <input value="" name="date[]" type="date"  class="form-control"> </td><td> <input value="08:00" name="timet[]" type="time"  class="form-control"> </td><td> <input value="17:00" name="timep[]" type="time"  class="form-control"> </td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
                });


                $(document).on('click', '.btn_remove', function() {
                    var button_id = $(this).attr("id");
                    $('#row' + button_id + '').remove();
                });
            });
        </script>
    @endsection


    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
            $('#myModal').on('shown.bs.modal', function() {
                $('#myInput').trigger('focus')
            });

        });

        function showEdit(id) {
            $.ajax({
                url: "{{ url('total') }}/" + id + "/edit",
                success: function(res) {
                    $("#form-edit [name='id']").val(id);
                    $("#form-edit [name='types']").val(res.data.types);
                    $("#form-edit [name='name']").val(res.data.name);
                    $("#form-edit [name='class_id']").val(res.data.class_id);
                    $("#form-edit [name='soal']").val(res.data.soal);


                    $('#form-edit').attr('action', "./total/" + id);
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
                    prevTD = $this; // store current td 
                    prevTDVal = $this.text();
                    span = 1;
                }
            });
        });
    </script>
