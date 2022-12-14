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
                                    <div class="card-header">Edit Finger</div>
                                    <div class="card-body">
                                <div class="col-md-6">
                                <div class="panel panel-card margin-b-30">
                                    <!-- Start .panel -->
                                   
                                        <div class="float-right">
                                        </div>
                                    </div>
                                    <div class="panel-body  p-xl-3">
                                       
										<form class="form-horizontal" action="" method="post">
										{{ csrf_field() }}
										{{ method_field('PUT') }}
                                            <div class="form-group row"><label class="col-lg-2 form-control-label">Date</label>

                                                <div class="col-lg-10">
												<input type="date" readonly name="date" placeholder="Name" value="{{ $data->date }}" class="form-control"> 
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-lg-2 form-control-label">Jam Masuk</label>

                                              <div class="col-lg-10">
                      <input type="time"  name="timet" placeholder="Name" value="{{ $data->timet }}" class="form-control"> 
                                              </div>
                                          </div>
  
                                          <div class="form-group row"><label class="col-lg-2 form-control-label">Jam keluar</label>
  
                                            <div class="col-lg-10">
                    <input type="time" name="timep" placeholder="Name" value="{{ $data->timep }}" class="form-control"> 
                                            </div>
                                        </div>

                                          <div class="form-group row"><label class="col-lg-2 form-control-label">Scan Masuk</label>

                                            <div class="col-lg-10">
                    <input type="time" name="timetf" placeholder="Name" value="{{ $data->timetf }}" class="form-control"> 
                                            </div>
                                        </div>

                                        <div class="form-group row"><label class="col-lg-2 form-control-label">Scan keluar</label>

                                          <div class="col-lg-10">
                  <input type="time" name="timepf" placeholder="Name" value="{{ $data->timepf }}" class="form-control"> 
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