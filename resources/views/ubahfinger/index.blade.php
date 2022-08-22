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
                                            
                                            
                                        <div class="modal-body">

                                            <div class="form-group row"><label class="col-lg-3 form-control-label">Nama</label>
                            
                                                <div class="col-lg-8">
                                                    <td> <input readonly value="{{$user->user->name}}" name="nama" type="text"  class="form-control"> </td>                                                                                                        

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
                                                                        
                            
                                                                        @foreach($data as $key =>$items)
                                                                        <tr>
                                                                            <td> <input value="{{$items->timet}}" name="timet[]" type="hidden"  class="form-control"> </td>                                                                                                        
                                                                            <td> <input value="{{$items->timep}}" name="timep[]" type="hidden"  class="form-control"> </td>
                                                                        <td> <input value="{{$items->date}}" readonly name="date[]" type="date"  class="form-control"> </td>
                                                                        <td> <input value="{{$items->timetf}}" name="timetf[]" type="time"  class="form-control"> </td>                                                                                                        
                                                                        <td> <input value="{{$items->timepf}}" name="timepf[]" type="time"  class="form-control"> </td>     
                                                                        </tr>                                                   
                                                                        @endforeach
                            
                                                                        
                                                                    </tr>
                                                                </table>
                            
                            
                                                            </div>
                            
                                                        </div>
                            
                                                        
                                                        
                                                            <button type="submit" class="btn btn-default"
                                                                style="border:1px solid black;">Save changes</button>
                                                       
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