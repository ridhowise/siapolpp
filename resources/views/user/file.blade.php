@extends('layouts.adm') 
@section('content')
<!-- BEGIN CONTENT BODY -->
                <div class="page-content-wrapper">
                    <div class="content-wrapper container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title">


                                    <ol class="breadcrumb float-left float-md-right">
                                        <li class="breadcrumb-item"><a href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i></a></li>
                                    
                                    </ol>

                                </div>
                            </div>
                        </div><!-- end .page title-->

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">Tambah File</div>
                                    <div class="card-body">

                                <div class="col-md-6">
                                <div class="panel panel-card margin-b-30">
                                    <!-- Start .panel -->
                                    
                                    <div class="panel-body  p-xl-3">
                                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="PATCH">

                                                
                                            </div>
                                           
                                            <div class="form-group row"><label class="col-lg-3 form-control-label">Tipe</label>



                                                <div class="col-lg-9">
                                                <select name="tipe" id="tipe" onchange="yesnoCheck(this);" class="form-control{{ $errors->has('tipe') ? ' is-invalid' : '' }}">
                
                                                    <option value="">Pilih Tipe Lampiran</option>
                                                    <option value="">----</option>
                                                    <option value="SK Terakhir"> SK Terakhir </option>
                                                    <option value="Ijazah Terakhir"> Ijazah Terakhir </option>
                                                    

                
                                                  </select>
                
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row"><label class="col-lg-3 form-control-label">File</label>

                                                <div class="col-lg-9">
                                                <input type="file" name="image" class="form-control"> 
                                                <br>
                                                {{-- Current pic : <img style="width:100px" src="{{ URL::asset('images/') }}/{{$data->images}}"> --}}
                                                </div>
                                            </div>
						
                                            
                                            <div class="form-group row">
                                                <div class="col-lg-offset-2 col-lg-9">
                                                    <button class="btn btn-sm btn-primary" type="submit">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="clearfix"></div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTAINER -->
        </div>
        <!-- /wrapper -->


        <!-- SCROLL TO TOP -->
        <a href="#" id="toTop"></a> 
@endsection