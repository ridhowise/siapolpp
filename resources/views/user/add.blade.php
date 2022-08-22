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
                                    <div class="card-header">Tambah User</div>
                                    <div class="card-body">

                                <div class="col-md-6">
                                <div class="panel panel-card margin-b-30">
                                 
                                    <div class="panel-body  p-xl-3">
                                        <form class="form-horizontal" action="{{ route('user.store') }}" method="post"  enctype="multipart/form-data">
										{{ csrf_field() }}
                                          
                                            <div class="form-group row"><label class="col-lg-3 form-control-label">Nama</label>

                                                <div class="col-lg-9">
												<input type="text" name="name" placeholder="Nama" class="form-control" required> 
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-lg-3 form-control-label">Username</label>

                                                <div class="col-lg-9">
                                                <input type="text" name="email" placeholder="username" class="form-control" required> 
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-lg-3 form-control-label">Password</label>

                                                <div class="col-lg-9">
                                                <input type="password"  placeholder="Password" name="password" class="form-control" required> 
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-lg-3 form-control-label">Jenis Kelamin</label>



                                                <div class="col-lg-9">
                                                <select name="gender" id="gender" onchange="yesnoCheck(this);" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}">
                                                    <option>Jenis Kelamin </option>
                
                                                    
                                                    <option value="Laki-laki"> Laki-Laki</option>
                                                    <option value="Perempuan"> Perempuan</option>
                                                    

                
                                                  </select>
                
                                                </div>
                                            </div>

                                            <div class="form-group row"><label class="col-lg-3 form-control-label">Tempat Lahir</label>

                                                <div class="col-lg-9">
                                                <input type="text" name="tempat" placeholder="Tempat Lahir" class="form-control" required> 
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-lg-3 form-control-label">Tanggal Lahir</label>

                                                <div class="col-lg-9">
                                                <input type="date" name="tanggal" placeholder="Tanggal Lahir" class="form-control" required> 
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-lg-3 form-control-label">Unit Kerja</label>

                                                <div class="col-lg-9">
                                                <input type="text" name="unit" placeholder="Unit Kerja" class="form-control" required> 
                                                </div>
                                            </div>
                
                                            
                                                
                                                <div class="form-group row"><label class="col-lg-3 form-control-label">NIP</label>

                                                    <div class="col-lg-9">
                                                    <input type="text" name="nip" placeholder="NIP" class="form-control" required> 
                                                    </div>
                                                </div>

                                                <div class="form-group row"><label class="col-lg-3 form-control-label">TPP</label>

                                                    <div class="col-lg-9">
                                                    <input type="text" name="salary" placeholder="TPP" class="form-control" required> 
                                                    </div>
                                                </div>
                                                <div class="form-group row"><label class="col-lg-3 form-control-label">Alamat</label>

                                                    <div class="col-lg-9">
                                                    <input type="text" name="alamat" placeholder="Alamat" class="form-control" required> 
                                                    </div>
                                                </div>
                                               
                                                <div class="form-group row"><label class="col-lg-3 form-control-label">Telepon</label>

                                                    <div class="col-lg-9">
                                                    <input type="text" name="telepon" placeholder="Nomor Telepon" class="form-control" required> 
                                                    </div>
                                                </div>
                                                <div class="form-group row"><label class="col-lg-3 form-control-label">Nomor SK</label>

                                                    <div class="col-lg-9">
                                                    <input type="text" name="nosk" placeholder="Nomor SK" class="form-control" required> 
                                                    </div>
                                                </div>
                                                <div class="form-group row"><label class="col-lg-3 form-control-label">Golongan</label>



                                                    <div class="col-lg-9">
                                                    <select name="golongan" id="golongan" onchange="yesnoCheck(this);" class="form-control{{ $errors->has('golongan') ? ' is-invalid' : '' }}">
                                                        <option>Golongan </option>
                    
                                                        
                                                        <option value="Juru Muda, I/a"> Juru Muda, I/a</option>
                                                        <option value="Juru Muda Tingkat I, I/b"> Juru Muda Tingkat I, I/b</option>
                                                        <option value="Juru, I/c"> Juru, I/c</option>
                                                        <option value="Juru Tingkat I, I/d"> Juru Tingkat I, I/d</option>
                                                        <option value="Pengatur Muda, II/a"> Pengatur Muda , II/a</option>
                                                        <option value="Pengatur Muda Tingkat I, II/b"> Pengatur Muda Tingkat I , II/b</option>
                                                        <option value="Pengatur, II/c"> Pengatur, II/c</option>
                                                        <option value="Pengatur Tingkat I , II/d"> Pengatur Tingkat I , II/d</option>
                                                        <option value="Penata Muda, III/a"> Penata Muda , III/a</option>
                                                        <option value="Penata Muda Tingkat I, III/b"> Penata Muda Tingkat I , III/b</option>
                                                        <option value="Penata, III/c"> Penata , III/c</option>
                                                        <option value="Penata Tingkat I , III/d"> Penata Tingkat I , III/d</option>
                                                        <option value="Pembina, IV/a"> Pembina, IV/a</option>
                                                        <option value="Pembina Tingkat I, IV/b"> Pembina Tingkat I, IV/b</option>
                                                        <option value="Pembina Utama Muda, IV/c"> Pembina Utama Muda, IV/c</option>
                                                        <option value="Pembina Utama Madya, IV/d"> Pembina Utama Madya, IV/d</option>
                                                        <option value="Pembina Utama, IV/e"> Pembina Utama, IV/e</option>

                    
                                                      </select>
                    
                                                    </div>
                                                </div>
                                                <div class="form-group row"><label class="col-lg-3 form-control-label">Pendidikan</label>



                                                    <div class="col-lg-9">
                                                    <select name="pendidikan" id="pendidikan" onchange="yesnoCheck(this);" class="form-control{{ $errors->has('pendidikan') ? ' is-invalid' : '' }}">
                                                        <option>Pendidikan </option>
                    
                                                        
                                                        <option value="1" >SARJANA  (S1)</option>
                                                        <option value="2" >PASCA SARJANA (S2)</option>
                                                        <option value="3" >DOKTOR (S3)</option>
                                                        <option value="4" >DIPLOMA IV</option>
                                                        <option value="5" >DIPLOMA III</option>
                                                        <option value="6" >DIPLOMA II</option>
                                                        <option value="7" >DIPLOMA I</option>
                                                        <option value="8" >SMA / Sederajat</option>
                                                        <option value="9" >SMP / Sederajat</option>
                                                        <option value="10" >SD / Sederajat</option>

                    
                                                      </select>
                    
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row"><label class="col-lg-3 form-control-label">Diklat</label>



                                                    <div class="col-lg-9">
                                                    <select name="diklat" id="diklat" onchange="yesnoCheck(this);" class="form-control{{ $errors->has('diklat') ? ' is-invalid' : '' }}">
                                                        <option>Diklat </option>
                                                
                                                        
                                                        <option value="1" >DIKLAT STRUKTURAL</option>
                                                        <option value="2" >DIKLAT FUNGSIONAL POL PP</option>
                                                        <option value="3" >DIKLAT PPNS</option>
                                                        <option value="4" >DIKLAT TEKNIS</option>
                                                        <option value="5" >DIKLAT DASAR POL.PP</option>
                                                        <option value="6" >DIKLAT LAINNYA</option>
                                                
                                                
                                                      </select>
                                                
                                                    </div>
                                                </div>

                                                <div class="form-group row"><label class="col-lg-3 form-control-label">Jenis Jabatan</label>



                                                    <div class="col-lg-9">
                                                    <select name="jenisjabatan" id="jenisjabatan" onchange="yesnoCheck(this);" class="form-control{{ $errors->has('jenisjabatan') ? ' is-invalid' : '' }}">
                                                        <option>Jenis Jabatan </option>
                                                
                                                        
                                                        <option value="1" >JFT</option>
                                                        <option value="2" >JFU</option>
                                                        <option value="3" >Struktural</option>
                                                
                                                
                                                      </select>
                                                
                                                    </div>
                                                </div>

                                                <div class="form-group row"><label class="col-lg-3 form-control-label">Jabatan</label>



                                                    <div class="col-lg-9">
                                                    <select name="level_id" id="level_id" onchange="yesnoCheck(this);" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}">
                                                        <option>Pilih jabatan </option>
                    
                                                        @foreach($data as $level)
                                                        <option value="{{ $level->id }}"> {{ $level->name }}</option>
                                                      @endforeach
                    
                                                      </select>
                    
                                                    </div>
                                                </div>
                                               
                    
                                            <div class="form-group row"><label class="col-lg-3 form-control-label">Foto</label>

                                                <div class="col-lg-9">
                                                <input type="file" name="image" class="form-control" required> 
                                                </div>
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
        <script type="text/javascript">
                function yesnoCheck(that) {
            if (that.value == "2") {
                document.getElementById("ifYes").style.display = "block";
            } else {
                document.getElementById("ifYes").style.display = "none";
            }
}
        </script>
@endsection
