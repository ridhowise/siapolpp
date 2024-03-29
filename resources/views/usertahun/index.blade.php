@extends('layouts.adm')
@section('content')

    <link href="{{ URL::asset('adm/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->

            <h1 class="h3 mb-2 text-gray-800">Daftar Nominatif Pegawai <a href="{{ url('usertahun/create') }}" class="btn btn-sm btn-primary"
                    data-toggle="modal" data-target="#adds">Daftar Pegawai+ </a>
            </h1>
       
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Nominatif Pegawai</h6>
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
                                    <th>Action</th>

                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($data as $key => $items)
                                    <td>{{ $items->tahun }} </td>
                                
                                    <td><a class="btn btn-sm btn-info" type="submit"
                                        href="users/{{ $items->id }}"><i class="fas fa-eye"></i> Lihat Detail</a></td>
                                    <td>
                                        <form action="{{ route('usertahun.destroy', $items->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            {{-- <a href="{{ route('usertahun.show',$items->id) }}">Show</a> --}}

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
                    <form id="upload-image-form" class="form-horizontal" action="{{ route('usertahun.store') }}" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">

                            <div class="form-group row"><label class="col-lg-3 form-control-label">Tahun</label>

                                <div class="col-lg-4">
                                    <input type="text" name="tahun" placeholder="tahun" class="form-control" > 
                                </div>
                            </div>


                           
                            
                          
                            <div class="row">
                                <div class="col">
                                    <div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 form-control-label">User :</label>

                                            <div class="col-lg-9">
                                                <table class="col-lg-12" id="dynamic_field">
                                                    <tr>
                                                       
                                                        <td> <select name="user[]" id="user" class="form-control select" required>
                                                            <option value="0">-- Pilih Nama --</option>
                                                            @foreach ($users as $user)
                                                            <option value="{{ $user->id }}"> {{ $user->name }} </option>
                                                            @endforeach
                                                           
                                                        </select></td>
                                    
                                                        

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
                        '" class="dynamic-added"><td><select name="user[]" id="user" class="form-control select" required><option value="0">-- Pilih Nama --</option>@foreach ($users as $user)<option value="{{ $user->id }}"> {{ $user->name }} </option>@endforeach</select></td></tr>');
                       
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
                url: "{{ url('rekapan') }}/" + id + "/edit",
                success: function(res) {
                    $("#form-edit [name='id']").val(id);
                    $("#form-edit [name='types']").val(res.data.types);
                    $("#form-edit [name='name']").val(res.data.name);
                    $("#form-edit [name='class_id']").val(res.data.class_id);
                    $("#form-edit [name='soal']").val(res.data.soal);


                    $('#form-edit').attr('action', "./rekapan/" + id);
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
