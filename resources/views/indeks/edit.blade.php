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
                                    <div class="card-header">Edit Role</div>
                                    <div class="card-body">
                                <div class="col-md-6">
                                <div class="panel panel-card margin-b-30">
                                    <!-- Start .panel -->
                                   
                                        <div class="float-right">
                                        </div>
                                    </div>
                                    <div class="panel-body  p-xl-3">
                                       
										<form class="form-horizontal" action="{{ route('indeks.update', $data->id) }}" method="post">
										{{ csrf_field() }}
										{{ method_field('PUT') }}
                                            <div class="form-group row"><label class="col-lg-2 form-control-label">Role</label>

                                                <div class="col-lg-10">
												<input type="text" name="kode" placeholder="Kode" value="{{ $data->kode}}" class="form-control"> 
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-lg-2 form-control-label">Role</label>

                                                <div class="col-lg-10">
												<input type="text" name="judul" placeholder="judul" value="{{ $data->judul}}" class="form-control"> 
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-offset-2 col-lg-10">
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