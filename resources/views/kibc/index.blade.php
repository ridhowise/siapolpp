@extends('layouts.adm')
@section('content')

    <link href="{{ URL::asset('adm/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->

            <h1 class="h3 mb-2 text-gray-800">KIB C <a href="{{ url('tahun/create') }}" class="btn btn-sm btn-primary"
                    data-toggle="modal" data-target="#adds">Tambah </a>
            </h1>
       
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Rekap Tahunan KIB C </h6>
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
                        <table class="display table table-bordered" id="dataTable" width="100%" cellspacing="0">
  
                            <thead style="">
                              <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Nama Barang</th>
                                <th colspan="2" style="text-align:center;">Nomor</th>
                                <th rowspan="2">Kondisi</th>
                                <th colspan="2" style="text-align:center;">Kontruksi</th>
                                <th rowspan="2" >Luas Lantai</th>
                                <th rowspan="2">Lokasi Alamat</th>
                                <th colspan="2" style="text-align:center;">Dokumen Gedung
                                <th rowspan="2">Luas </th>
                                <th rowspan="2">Status Tanah</th>
                                <th rowspan="2">Nomor Kode Tanah</th>
                                <th rowspan="2">Asal Usul</th>
                                <th rowspan="2">Harga</th>
                                <th rowspan="2">Keterangan</th>

                              </tr>
                              <tr>
                                <th>Kode Barang</th>
                                <th>Register</th>
                                <th>Bertingkat/Tidak</th>
                                <th>Beton/Tidak</th>
                                <th>Tanggal</th>
                                <th>Nomor</th>
                              </tr>
                            </thead>
                            
                            <tbody>
                              @php
                              $no = 1;
                            @endphp
                             
                           @foreach($data as $key => $items)
                                  <td>{{ $no++ }}</td>
                                  <td>{{ $items->nama }} </td>
                                  <td>{{ $items->kode }} </td>
                                  <td>{{ $items->register}} </td>
                                  <td>{{ $items->kondisi}}</td>
                                  <td>{{ $items->bertingkat}}</td>
                                  <td>{{ $items->beton}}</td>
                                  <td>{{ $items->luaslantai }} </td>
                                  <td>{{ $items->letak}}</td>
                                  <td>{{ $items->tanggal}}</td>
                                  <td>{{ $items->nomor}}</td>
                                  <td>{{ $items->luas}}</td>
                                  <td>{{ $items->statustanah}}</td>
                                  <td>{{ $items->kodetanah}}</td>
                                  <td>{{ $items->asal}}</td>
                                  <td>{{ $items->harga}}</td>
                                  <td>{{ $items->keterangan}}</td>
                  
                                
                            </tr>
                  
                                  @endforeach
                  {{--               
                                  <tr><td colspan="15"></td><td>TOTAL</td><td><b>{{$total}}</b></td>
                                  </tr> --}}
                                
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

                               <div  class="form-group row"><label class="col-lg-3 form-control-label">File </label>
                                <div class="col-lg-9">
                                  <input required type="file" name="filee">
                                </div>
                              </div>

                              {{-- <input required type="hidden" name="file"> --}}


                            
                         
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
                    <form id="upload-image-form" class="form-horizontal" action="{{ route('kibc.store') }}" method="post"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">


                       

                        <div class="form-group row"><label class="col-lg-3 form-control-label">Nama Barang</label>

                            <div class="col-lg-4">
                                <input type="text" name="nama" placeholder="Nama Barang" Barang" class="form-control" > 
                            </div>
                        </div>

                        <div class="form-group row"><label class="col-lg-3 form-control-label">Kode Barang</label>

                            <div class="col-lg-4">
                                <input type="text" name="kode" placeholder="Kode Barang" class="form-control" > 
                            </div>
                        </div>

                        <div class="form-group row"><label class="col-lg-3 form-control-label">Nomor Register</label>

                            <div class="col-lg-4">
                                <input type="text" name="register" placeholder="Nomor Register" Barang" class="form-control" > 
                            </div>
                        </div>

                        <div class="form-group row"><label class="col-lg-3 form-control-label">Kondisi</label>

                            <div class="col-lg-4">
                                <input type="text" name="kondisi" placeholder="kondisi" Barang" class="form-control" > 
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-lg-3 form-control-label">Bertingkat/Tingkat</label>

                            <div class="col-lg-4">
                                <input type="text" name="bertingkat" placeholder="Bertingkat" Barang" class="form-control" > 
                            </div>
                        </div>

                        <div class="form-group row"><label class="col-lg-3 form-control-label">Beton/Tidak</label>

                            <div class="col-lg-4">
                                <input type="text" name="beton" placeholder="Beton" Barang" class="form-control" > 
                            </div>
                        </div>

                        <div class="form-group row"><label class="col-lg-3 form-control-label">Luas lantai</label>

                            <div class="col-lg-4">
                                <input type="text" name="luaslantai" placeholder="Luas Lantai" Barang" class="form-control" > 
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-lg-3 form-control-label">Letak</label>

                            <div class="col-lg-4">
                                <input type="text" name="letak" placeholder="Letak" Barang" class="form-control" > 
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-lg-3 form-control-label">Tanggal</label>

                            <div class="col-lg-4">
                                <input type="date" name="tanggal" placeholder="tanggal" Barang" class="form-control" > 
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-lg-3 form-control-label">Nomor</label>

                            <div class="col-lg-4">
                                <input type="text" name="nomor" placeholder="Nomor" Barang" class="form-control" > 
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-lg-3 form-control-label">Luas</label>

                            <div class="col-lg-4">
                                <input type="text" name="luas" placeholder="Luas" Barang" class="form-control" > 
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-lg-3 form-control-label">Status Tanah</label>

                            <div class="col-lg-4">
                                <input type="text" name="statustanah" placeholder="Status Tanah" Barang" class="form-control" > 
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-lg-3 form-control-label">Kode Tanah</label>

                            <div class="col-lg-4">
                                <input type="text" name="kodetanah" placeholder="Kode Tanah" Barang" class="form-control" > 
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-lg-3 form-control-label">Asal</label>

                            <div class="col-lg-4">
                                <input type="text" name="asal" placeholder="Asal" Barang" class="form-control" > 
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-lg-3 form-control-label">Harga</label>

                            <div class="col-lg-4">
                                <input type="text" name="harga" placeholder="Harga" Barang" class="form-control" > 
                            </div>
                        </div>

                        <div class="form-group row"><label class="col-lg-3 form-control-label">Keterangan</label>

                            <div class="col-lg-4">
                                <input type="text" name="keterangan" placeholder="Keterangan" Barang" class="form-control" > 
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
                        '" class="dynamic-added"><td><input name="jumlah[]" placeholder="jumlah" class="form-control"></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
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
                url: "{{ url('tahun') }}/" + id + "/edit",
                success: function(res) {
                    $("#form-edit [name='id']").val(id);
                    $("#form-edit [name='file']").val(res.data.file);


                    $('#form-edit').attr('action', "./tahun/" + id);
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
