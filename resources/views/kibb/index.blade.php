@extends('layouts.adm')
@section('content')

    <link href="{{ URL::asset('adm/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->

            <h1 class="h3 mb-2 text-gray-800">KIB B <a href="{{ url('tahun/create') }}" class="btn btn-sm btn-primary"
                    data-toggle="modal" data-target="#adds">Tambah </a>
            </h1>
       
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Rekap Tahunan KIB B </h6>
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
                                    <th>Tahun</th>
                                    <th>List aset</th>
                                    <th>Action</th>

                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($data as $key => $items)
                                    <td>{{ $items->tahun }} </td>
                                    <td><a class="btn btn-sm btn-info" type="submit"
                                        href="kibbdetail/{{ $items->id }}"><i class="fas fa-eye"></i> Lihat Detail</a></td>
                                    <td>
                                        <form action="{{ route('kibb.destroy', $items->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            {{-- <a href="{{ route('kibb.show',$items->id) }}">Show</a> --}}

                                            {{-- <button type="button" onclick="showEdit({{$items->id}})" class="btn btn-sm btn-success" >Edit</a> --}}

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
                    <form id="upload-image-form" class="form-horizontal" action="{{ route('kibb.store') }}" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">

                            <div class="form-group row"><label class="col-lg-3 form-control-label">Tahun</label>
                                <div class="col-lg-4">
                                <select name="tahun_id" id="tahun_id" class="form-control" id="exampleFormControlSelect1" >
                                <option   value="0">--Pilih tahun--</option>
                                @foreach($data as $tahun)
                                <option value="{{ $tahun->id }}"> {{ $tahun->tahun }}</option>
                                @endforeach
                            
                                </select>
                              </div>
                            </div>

                            <div class="form-group row"><label class="col-lg-3 form-control-label">Kode Barang</label>

                                <div class="col-lg-4">
                                    <input type="text" name="kode" placeholder="Kode Barang" class="form-control" > 
                                </div>
                            </div>

                            <div class="form-group row"><label class="col-lg-3 form-control-label">Nama Barang</label>

                                <div class="col-lg-4">
                                    <input type="text" name="nama" placeholder="Nama Barang" Barang" class="form-control" > 
                                </div>
                            </div>

                            <div class="form-group row"><label class="col-lg-3 form-control-label">Nomor Register</label>

                                <div class="col-lg-4">
                                    <input type="text" name="register" placeholder="Nomor Register" Barang" class="form-control" > 
                                </div>
                            </div>

                            <div class="form-group row"><label class="col-lg-3 form-control-label">Merk/Type</label>

                                <div class="col-lg-4">
                                    <input type="text" name="merk" placeholder="Merk/Type" Barang" class="form-control" > 
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-3 form-control-label">Ukuran</label>

                                <div class="col-lg-4">
                                    <input type="text" name="ukuran" placeholder="Ukuran" Barang" class="form-control" > 
                                </div>
                            </div>

                            <div class="form-group row"><label class="col-lg-3 form-control-label">Bahan</label>

                                <div class="col-lg-4">
                                    <input type="text" name="bahan" placeholder="Ukuran" Barang" class="form-control" > 
                                </div>
                            </div>

                            <div class="form-group row"><label class="col-lg-3 form-control-label">Pabrik</label>

                                <div class="col-lg-4">
                                    <input type="text" name="pabrik" placeholder="Pabrik" Barang" class="form-control" > 
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-3 form-control-label">Rangka</label>

                                <div class="col-lg-4">
                                    <input type="text" name="rangka" placeholder="Rangka" Barang" class="form-control" > 
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-3 form-control-label">Mesin</label>

                                <div class="col-lg-4">
                                    <input type="text" name="mesin" placeholder="Mesin" Barang" class="form-control" > 
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-3 form-control-label">Polisi</label>

                                <div class="col-lg-4">
                                    <input type="text" name="polisi" placeholder="Polisi" Barang" class="form-control" > 
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-3 form-control-label">BPKB</label>

                                <div class="col-lg-4">
                                    <input type="text" name="bpkb" placeholder="BPKB" Barang" class="form-control" > 
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-3 form-control-label">Asal Usul</label>

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
                            <div class="form-group row"><label class="col-lg-3 form-control-label">Nomor Serial</label>

                                <div class="col-lg-4">
                                    <input type="text" name="serial" placeholder="Nomor Serial" Barang" class="form-control" > 
                                </div>
                            </div>

                            <div class="form-group row"><label class="col-lg-3 form-control-label">Status</label>
                                <div class="col-lg-4">
                                <select name="status" id="status" class="form-control" id="exampleFormControlSelect1" >
                                <option   value="0">--Pilih Status--</option>
                                  <option value="1">Aktif</option>
                                  <option value="2">Tidak Aktif</option>
                            
                                </select>
                              </div>
                            </div>
                            <div  class="form-group row"><label class="col-lg-3 form-control-label">SPJ Pengadaan Barang </label>
                                <div class="col-lg-9">
                                  <input type="file" name="file">
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
