@extends('layouts.adm')
@section('content')

    <link href="{{ URL::asset('adm/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->

            <h1 class="h3 mb-2 text-gray-800">Surat Masuk <a href="{{ url('suratmasuk/create') }}" class="btn btn-sm btn-primary"
                    data-toggle="modal" data-target="#adds">Input Surat Masuk + </a>
            </h1>
       
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Surat Masuk</h6>
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
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <thead style="">
                                <tr>
                                    <th>Nomor Surat</th>
                                    <th>Judul Surat</th>
                                    <th>Indeks</th>
                                    <th>Asal Surat</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Tanggal Terima</th>
                                    <th>Keterangan</th>
                                    <th>File</th>

                                    <th>Action</th>

                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($data as $key => $items)
                                    <td>{{ $items->nosurat }} </td>
                                    <td>{{ $items->judulsurat }} </td>
                                    <td>{{ $items->indeks->judul }} </td>
                                    <td>{{ $items->asalsurat }} </td>
                                    <td>{{ $items->tanggalmasuk }} </td>
                                    <td>{{ $items->tanggalterima }} </td>
                                    <td>{{ $items->keterangan }} </td>
                                    <td> <a href="{{ url('data_file') }}/{{ $items->file }}"
                                        download="{{ $items->file }}">
                                        <button type="button" class="btn btn-success">
                                         <i class="glyphicon glyphicon-download">
                                          Download
                                          </i>
                                        </button>
                                        </a></td>
                                        <td>
                                        <form action="{{ route('suratmasuk.destroy', $items->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            {{-- <a href="{{ route('masuk.show',$items->id) }}">Show</a> --}}

                                            <button type="button" onclick="showEdit({{$items->id}})" class="btn btn-sm btn-success" >Edit</a>

                                                <button class="btn btn-sm btn-danger" type="submit"
                                                    onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                                        </form>
                                    </td>
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
                    <form id="upload-image-form" class="form-horizontal" action="{{ route('suratmasuk.store') }}" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group row"><label class="col-lg-3 form-control-label">Indeks</label>
  
                                <div class="col-lg-4">
                                  <select name="indeks_id" id="indeks_id" class="form-control select" required>
                                  <option value="0">-- PILIH --</option>
                                  @foreach($indeks as $key)
                                  <option value="{{$key->id}}">{{$key->judul}}</option>
                                  @endforeach

                                  </select>
                                  </div>
                                  </div>
                            <div class="form-group row"><label class="col-lg-3 form-control-label">Nomor Surat</label>

                                <div class="col-lg-4">
                                    <input type="text" name="nosurat" placeholder="Nomor Surat" class="form-control" > 
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-3 form-control-label">Judul Surat</label>

                                <div class="col-lg-4">
                                    <input type="text" name="judulsurat" placeholder="Judul Surat" class="form-control" > 
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-3 form-control-label">Asal Surat</label>

                                <div class="col-lg-4">
                                    <input type="text" name="asalsurat" placeholder="Asal Surat" class="form-control" > 
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-3 form-control-label">Tanggal Masuk</label>

                                <div class="col-lg-4">
                                    <input type="date" name="tanggalmasuk" placeholder="tanggalmasuk" class="form-control" > 
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-3 form-control-label">Tanggal Terima</label>

                                <div class="col-lg-4">
                                    <input type="date" name="tanggalterima" placeholder="tanggalterima" class="form-control" > 
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-3 form-control-label">Keterangan</label>

                                <div class="col-lg-4">
                                    <input type="text" name="keterangan" placeholder="Keterangan" class="form-control" > 
                                </div>
                            </div>
                            <div  class="form-group row"><label class="col-lg-3 form-control-label">File </label>
                                <div class="col-lg-9">
                                  <input required type="file" name="file">
                                </div>
                              </div>


                           
                            
                          
                            {{-- <div class="row">
                                <div class="col">
                                    <div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label">Barang :</label>

                                            <div class="col-lg-9">
                                                <table class="col-lg-12" id="dynamic_field">
                                                    <tr>
                                                       
                                                        <td> <select name="barang[]" id="nama" class="form-control select" required>
                                                            <option value="0">-- Pilih Nama --</option>
                                                            {{-- @foreach ($barangs as $barang)
                                                            <option value="{{ $barang->id }}"> {{ $barang->nama }} || MAX : {{$barang->max}}</option>
                                                            @endforeach
                                                            --}}
                                                        {{-- </select></td>
                                                        <td> <input name="jumlah[]" placeholder="jumlah" class="form-control"> </td>
                                                        

                                                        <td><button type="button" name="add" id="add"
                                                                class="btn btn-success">+</button></td>
                                                    </tr>
                                                </table>


                                            </div>

                                        </div>  --}}

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
                url: "{{ url('suratmasuk') }}/" + id + "/edit",
                success: function(res) {
                    $("#form-edit [name='id']").val(id);
                    $("#form-edit [name='file']").val(res.data.file);


                    $('#form-edit').attr('action', "./suratmasuk/" + id);
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
