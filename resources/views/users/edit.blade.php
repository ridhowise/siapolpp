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
                                    <div class="card-header">Edit User</div>
                                    <div class="card-body">

                                <div class="col-md-6">
                                <div class="panel panel-card margin-b-30">
                                    <!-- Start .panel -->
                                    
                                    <div class="panel-body  p-xl-3">
                                        <form class="form-horizontal" action="{{ route('user.update', $data->id) }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="PATCH">

                                                
                                            </div>
                                            <div class="form-group row"><label class="col-lg-3 form-control-label">Nama</label>

                                                <div class="col-lg-9">
                                                <input type="text" name="name" placeholder="Nama" value="{{ $data->name }}" class="form-control" required> 
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-lg-3 form-control-label">Username</label>

                                                <div class="col-lg-9">
                                                <input type="text" name="email" value="{{ $data->email }}" placeholder="Username" class="form-control" required> 
                                                </div>
                                            </div>

                                            <div class="form-group row"><label class="col-lg-3 form-control-label">Jenis Kelamin</label>



                                                <div class="col-lg-9">
                                                <select name="gender" id="gender" onchange="yesnoCheck(this);" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}">
                
                                                    <option value="{{$data->gender}}">{{$data->gender}}</option>
                                                    <option value="">----</option>
                                                    <option value="Laki-laki"> Laki-Laki</option>
                                                    <option value="Perempuan"> Perempuan</option>
                                                    

                
                                                  </select>
                
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-lg-3 form-control-label">Tempat Lahir</label>

                                                <div class="col-lg-9">
                                                <input type="text" name="tempat" value="{{ $data->tempat }}" placeholder="Tempat Lahir" class="form-control" required> 
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-lg-3 form-control-label">Tanggal Lahir</label>

                                                <div class="col-lg-9">
                                                <input type="date" name="tanggal" value="{{ $data->tanggal }}" placeholder="Tanggal" class="form-control" required> 
                                                </div>
                                            </div>

                                            <div class="form-group row"><label class="col-lg-3 form-control-label">Unit Kerja</label>

                                                <div class="col-lg-9">
                                                <input type="text" name="unit" value="{{ $data->unit }}" placeholder="Unit Kerja" class="form-control" required> 
                                                </div>
                                            </div>

                                            <div class="form-group row"><label class="col-lg-3 form-control-label">NIP</label>

                                                <div class="col-lg-9">
                                                <input type="text" name="nip" value="{{ $data->nip }}" placeholder="NIP" class="form-control" required> 
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-lg-3 form-control-label">TPP</label>

                                                <div class="col-lg-9">
                                                <input type="text" name="salary" value="{{ $data->salary }}" placeholder="TPP" class="form-control" required> 
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-lg-3 form-control-label">Alamat</label>

                                                <div class="col-lg-9">
                                                <input type="text" name="alamat" value="{{ $data->alamat }}" placeholder="alamat" class="form-control" required> 
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-lg-3 form-control-label">Telepon</label>

                                                <div class="col-lg-9">
                                                <input type="text" value="{{ $data->telepon }}" name="telepon" placeholder="Nomor Telepon" class="form-control" required> 
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-lg-3 form-control-label">Nomor SK</label>

                                                <div class="col-lg-9">
                                                <input type="text" name="nosk" value="{{ $data->nosk }}" placeholder="Nomor SK" class="form-control" required> 
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-lg-3 form-control-label">Golongan</label>



                                                <div class="col-lg-9">
                                                <select name="golongan_id" id="golongan" onchange="yesnoCheck(this);" class="form-control{{ $errors->has('golongan') ? ' is-invalid' : '' }}">
                
                                                    <option value="{{$data->golongan->id}}">{{$data->golongan->name}}</option>
                                                    <option value="">----</option>
                                                    <option value="1"> Juru Muda, I/a</option>
                                                    <option value="2"> Juru Muda Tingkat I, I/b</option>
                                                    <option value="3"> Juru, I/c</option>
                                                    <option value="4"> Juru Tingkat I, I/d</option>
                                                    <option value="5"> Pengatur Muda , II/a</option>
                                                    <option value="6"> Pengatur Muda Tingkat I , II/b</option>
                                                    <option value="7"> Pengatur, II/c</option>
                                                    <option value="8"> Pengatur Tingkat I , II/d</option>
                                                    <option value="9"> Penata Muda , III/a</option>
                                                    <option value="10"> Penata Muda Tingkat I , III/b</option>
                                                    <option value="11"> Penata , III/c</option>
                                                    <option value="12"> Penata Tingkat I , III/d</option>
                                                    <option value="13"> Pembina, IV/a</option>
                                                    <option value="14"> Pembina Tingkat I, IV/b</option>
                                                    <option value="15"> Pembina Utama Muda, IV/c</option>
                                                    <option value="16"> Pembina Utama Madya, IV/d</option>
                                                    <option value="17"> Pembina Utama, IV/e</option>
                                                    

                
                                                  </select>
                
                                                </div>
                                            </div>

                                            <div class="form-group row"><label class="col-lg-3 form-control-label">Pendidikan</label>



                                                <div class="col-lg-9">
                                                <select name="pendidikan" id="pendidikan" onchange="yesnoCheck(this);" class="form-control{{ $errors->has('pendidikan') ? ' is-invalid' : '' }}">
                                            
                                                    <option value="{{$data->pendidikan}}">{{$data->pendidikan}}</option>
                                                    <option value="">----</option>
                                                    <option value="SARJANA  (S1)" >SARJANA  (S1)</option>
                                                    <option value="PASCA SARJANA (S2)" >PASCA SARJANA (S2)</option>
                                                    <option value="DOKTOR (S3)" >DOKTOR (S3)</option>
                                                    <option value="DIPLOMA IV" >DIPLOMA IV</option>
                                                    <option value="DIPLOMA III" >DIPLOMA III</option>
                                                    <option value="DIPLOMA II" >DIPLOMA II</option>
                                                    <option value="DIPLOMA I<" >DIPLOMA I</option>
                                                    <option value="SMA / Sederajat" >SMA / Sederajat</option>
                                                    <option value="SMP / Sederajat" >SMP / Sederajat</option>
                                                    <option value="SD / Sederajat" >SD / Sederajat</option>
                                                    
                                            
                                            
                                                  </select>
                                            
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row"><label class="col-lg-3 form-control-label">Diklat</label>



                                                <div class="col-lg-9">
                                                <select name="diklat" id="diklat" onchange="yesnoCheck(this);" class="form-control{{ $errors->has('diklat') ? ' is-invalid' : '' }}">
                                            
                                                    <option value="{{$data->diklat}}">{{$data->diklat}}</option>
                                                    <option value="-">----</option>
                                                    <option value="DIKLAT STRUKTURAL" >DIKLAT STRUKTURAL</option>
                                                    <option value="DIKLAT FUNGSIONAL POL PP" >DIKLAT FUNGSIONAL POL PP</option>
                                                    <option value="DIKLAT PPNS" >DIKLAT PPNS</option>
                                                    <option value="DIKLAT TEKNIS" >DIKLAT TEKNIS</option>
                                                    <option value="DIKLAT DASAR POL.PP" >DIKLAT DASAR POL.PP</option>
                                                    <option value="DIKLAT LAINNYA" >DIKLAT LAINNYA</option>
                                                    
                                            
                                            
                                                  </select>
                                            
                                                </div>
                                            </div>
                                           

                                            <div class="form-group row"><label class="col-lg-3 form-control-label">Jenis Jabatan</label>



                                                <div class="col-lg-9">
                                                <select name="jenisjabatan" id="jenisjabatan" onchange="yesnoCheck(this);" class="form-control{{ $errors->has('jenisjabatan') ? ' is-invalid' : '' }}">
                                            
                                                    <option value="{{$data->jenisjabatan}}">{{$data->jenisjabatan}}</option>
                                                    <option value="-">----</option>
                                                    <option value="JFT" >JFT</option>
                                                    <option value="JFU" >JFU</option>
                                                    <option value="Struktural" >Struktural</option>
                                                    
                                            
                                            
                                                  </select>
                                            
                                                </div>
                                            </div>

                                            <div class="form-group row"><label class="col-lg-3 form-control-label">Jabatan</label>



                                                <div class="col-lg-9">
                                                <select name="level_id" id="level_id" onchange="yesnoCheck(this);" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}">
                                                    <option value="{{$data->level->id}}">{{$data->level->name}}</option>
                                                    <option value="">----</option>
                
                                                    @foreach($levels as $level)
                                                    <option value="{{ $level->id }}"> {{ $level->name }}</option>
                                                  @endforeach
                
                                                  </select>
                
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-lg-3 form-control-label">Foto</label>

                                                <div class="col-lg-9">
                                                <input type="file" name="image" class="form-control"> 
                                                <br>
                                                Current pic : <img style="width:100px" src="{{ URL::asset('images/') }}/{{$data->images}}">
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