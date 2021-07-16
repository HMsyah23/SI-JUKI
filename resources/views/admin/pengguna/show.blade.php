@extends('layouts.app')

@section('title','Dashboard Admin | Manajemen Data Pengguna')
@section('dashboard','Dashboard Admin | Manajemen Data Pengguna')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="bg-picture card-box">
                                    <div class="profile-info-name">
                                        <img id="img-upload" src="{{asset('gurus/'.Auth::user()->foto)}}"
                                                class="rounded-circle avatar-xl img-thumbnail float-left mr-3" alt="profile-image">

                                        <div class="profile-info-detail overflow-hidden">
                                            <h4 class="m-0">{{Auth::user()->name}}</h4>
                                            @if (Auth::user()->role == 0)
                                            <p class="text-muted"><i>Administrator</i></p>
                                            <h4 class="m-0">{{Auth::user()->email}}</h4>
                                            @elseif(Auth::user()->role == 1)
                                            <p class="text-muted"><i>Kepala Sekolah</i></p>
                                            <h4 class="m-0">{{Auth::user()->email}}</h4>
                                            @else
                                            <p class="text-muted"><i>Guru</i></p>
                                            <h5 class="m-0">{{Auth::user()->guru->gelar_depan.' '.Auth::user()->guru->nama_depan.' '.Auth::user()->guru->nama_belakang.' '.Auth::user()->guru->gelar_belakang}}</h5>
                                            @endif
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                @if (Auth::user()->role == 2)
                                    <div class="bg-picture card-box">
                                        <div class="profile-info-name">
                                            <div class="profile-info-detail overflow-hidden">
                                                <h4 class="m-0">Status Kepegawaian</h4>
                                                <p class="text-muted">{{Auth::user()->guru->status->nama}} ({{Auth::user()->guru->status->kode}})</p>
                                                <h4 class="m-0">Jabatan</h4>
                                                <p class="text-muted">{{Auth::user()->guru->jabatan->jabatan}}</p>
                                                <h4 class="m-0">NBM</h4>
                                                <p class="text-muted">{{Auth::user()->guru->nbm}}</p>
                                                <h4 class="m-0">NIP</h4>
                                                <p class="text-muted">{{Auth::user()->guru->nip}}</p>
                                                <h4 class="m-0">golongan</h4>
                                                <p class="text-muted">{{Auth::user()->guru->golongan}}</p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                    <div class="bg-picture card-box">
                                        <div class="profile-info-name">
                                            <div class="profile-info-detail overflow-hidden">
                                                <h4 class="m-0">Jenis Kelamin</h4>
                                                <p class="text-muted">@if (Auth::user()->guru->jenis_kelamin == 1)
                                                    Pria
                                                @else
                                                    Wanita
                                                @endif</p>
                                                <h4 class="m-0">Agama</h4>
                                                <p class="text-muted">{{Auth::user()->guru->agama}}</p>
                                                <h4 class="m-0">Tanggal Lahir</h4>
                                                <p class="text-muted">{{\Carbon\Carbon::parse(Auth::user()->guru->tanggal_lahir)->isoFormat('dddd, D MMMM Y')}}</p>
                                                <h4 class="m-0">Email</h4>
                                                <p class="text-muted">{{Auth::user()->guru->email}}</p>
                                                <h4 class="m-0">Alamat</h4>
                                                <p class="text-muted">{!!Auth::user()->guru->alamat!!}</p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="bg-picture card-box">
                                        <div class="profile-info-name">
                                            <div class="profile-info-detail overflow-hidden">
                                                <h4 class="m-0">Universitas</h4>
                                                <p class="text-muted">{{Auth::user()->guru->universitas}}</p>
                                                <h4 class="m-0">Jenjang</h4>
                                                <p class="text-muted">{{Auth::user()->guru->jenjang}}</p>
                                                <h4 class="m-0">Jurusan</h4>
                                                <p class="text-muted">{{Auth::user()->guru->jurusan}}</p>
                                                <h4 class="m-0">Tanggal Lulus</h4>
                                                <p class="text-muted">{{\Carbon\Carbon::parse(Auth::user()->guru->tanggal_lulus)->isoFormat('dddd, D MMMM Y')}}</p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-sm-8">
                                @if (Auth::user()->role == 2)
                                <form role="form"  action="{{ route('guru.perbarui',Auth::user()->id_user) }}" method="POST" enctype="multipart/form-data" class="card-box">
                                    @csrf
                                    <h3 class="text-info text-center mb-3 mt-0"><strong> <i class="fas fa-user"></i> Ubah Informasi</strong></h3>
                                    <div class="form-group row">
                                      <label for="gelar_depan" class="col-md-4 col-form-label text-md-right">{{ __('Gelar Depan') }}</label>
          
                                      <div class="col-md-6">
                                          <input type="text" class="form-control @error('gelar_depan') is-invalid @enderror" name="gelar_depan" value="{{Auth::user()->guru->gelar_depan}}" required>
          
                                          @error('gelar_depan')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_depan" class="col-md-4 col-form-label text-md-right">{{ __('Nama Depan') }}</label>
            
                                        <div class="col-md-6">
                                            <input type="text" class="form-control @error('nama_depan') is-invalid @enderror" name="nama_depan" value="{{Auth::user()->guru->nama_depan}}" required>
            
                                            @error('nama_depan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="nama_belakang" class="col-md-4 col-form-label text-md-right">{{ __('Nama Depan') }}</label>
            
                                        <div class="col-md-6">
                                            <input type="text" class="form-control @error('nama_belakang') is-invalid @enderror" name="nama_belakang" value="{{Auth::user()->guru->nama_belakang}}" required>
            
                                            @error('nama_belakang')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="gelar_belakang" class="col-md-4 col-form-label text-md-right">{{ __('Nama Depan') }}</label>
            
                                        <div class="col-md-6">
                                            <input type="text" class="form-control @error('gelar_belakang') is-invalid @enderror" name="gelar_belakang" value="{{Auth::user()->guru->gelar_belakang}}" required>
            
                                            @error('gelar_belakang')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                      </div>


                                    <hr>
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" required autocomplete="new-password">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>
                                        <div class="col-md-6">
                                            <select name="jenis_kelamin" class="form-control">
                                                <option @if(Auth::user()->guru->jenis_kelamin == 1) selected @endif value="1">Pria</option>
                                                <option @if(Auth::user()->guru->jenis_kelamin == 2) selected @endif value="2">Wanita</option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>
                                        <div class="col-md-6">
                                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{\Carbon\Carbon::parse(Auth::user()->guru->tanggal_lahir)->format('Y-m-d')}}" required>
                                            @error('tanggal_lahir')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>
                                        <div class="col-md-6">
                                            <textarea name="alamat" class="form-control" id="" cols="30" rows="3">{!!Auth::user()->guru->alamat!!}
                                            </textarea>
                                            @error('alamat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>
                                        <div class="col-md-6">
                                              <input type="file" id="imgInp" name="foto" class="form-control">
                                          </span>
                                          <input type="hidden" class="form-control" readonly>
                                        </div>
                                  </div>

                                  <div class="form-group row mb-0">
                                      <div class="col-md-6 offset-md-4">
                                          <button type="submit" name="role" value="2" class="btn btn-primary">
                                              {{ __('Simpan') }}
                                          </button>
                                      </div>
                                  </div>
                                </form>
                                @elseif (Auth::user()->role == 1)
                                <form role="form"  action="{{ route('kepsek.perbarui',Auth::user()->id_user) }}" method="POST" enctype="multipart/form-data" class="card-box">
                                    @csrf
                                    <h3 class="text-info text-center mb-3 mt-0"><strong> <i class="fas fa-user"></i> Ubah Informasi</strong></h3>
                         
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
            
                                        <div class="col-md-6">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Auth::user()->name}}" required>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                      </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" required autocomplete="new-password">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>
                                        <div class="col-md-6">
                                              <input type="file" id="imgInp" name="foto" class="form-control">
                                          </span>
                                          <input type="hidden" class="form-control" readonly>
                                        </div>
                                  </div>

                                  <div class="form-group row mb-0">
                                      <div class="col-md-6 offset-md-4">
                                          <button type="submit" name="role" value="1" class="btn btn-primary">
                                              {{ __('Simpan') }}
                                          </button>
                                      </div>
                                  </div>
                                </form>
                                @elseif (Auth::user()->role == 0)
                                <form role="form"  action="{{ route('pengguna.perbarui',Auth::user()->id_user) }}" method="POST" enctype="multipart/form-data" class="card-box">
                                    @csrf
                                    <h3 class="text-info text-center mb-3 mt-0"><strong> <i class="fas fa-user"></i> Ubah Informasi</strong></h3>
                         
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
            
                                        <div class="col-md-6">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Auth::user()->name}}" required>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                      </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" required autocomplete="new-password">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>
                                        <div class="col-md-6">
                                              <input type="file" id="imgInp" name="foto" class="form-control">
                                          </span>
                                          <input type="hidden" class="form-control" readonly>
                                        </div>
                                  </div>

                                  <div class="form-group row mb-0">
                                      <div class="col-md-6 offset-md-4">
                                          <button type="submit" name="role" value="0" class="btn btn-primary">
                                              {{ __('Simpan') }}
                                          </button>
                                      </div>
                                  </div>
                                </form>
                                @endif



                                @if (Auth::user()->role == 0)
                                    <form role="form"  action="{{ route('pengguna.ganti',Auth::user()->id_user) }}" method="POST" enctype="multipart/form-data" class="card-box">
                                @elseif(Auth::user()->role == 1)
                                    <form role="form"  action="{{ route('kepsek.ganti',Auth::user()->id_user) }}" method="POST" enctype="multipart/form-data" class="card-box">
                                @elseif(Auth::user()->role == 2)
                                    <form role="form"  action="{{ route('guru.ganti',Auth::user()->id_user) }}" method="POST" enctype="multipart/form-data" class="card-box"> 
                                @endif
                                    @csrf
                                    <h3 class="text-info text-center mb-3 mt-0"><strong> <i class="fas fa-key"></i> Ganti Password</strong></h3>
                                    <div class="form-group row">
                                      <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
          
                                      <div class="col-md-6">
                                          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
          
                                          @error('password')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
          
                                  <div class="form-group row">
                                      <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Ulangi Password') }}</label>
          
                                      <div class="col-md-6">
                                          <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                      </div>
                                  </div>
                                    <hr>
                                  <div class="form-group row">
                                    <label for="password_baru" class="col-md-4 col-form-label text-md-right">{{ __('Password Baru') }}</label>
        
                                    <div class="col-md-6">
                                        <input type="password" class="form-control @error('password_baru') is-invalid @enderror" name="password_baru" required autocomplete="new-password">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    </div>

                                  <div class="form-group row mb-0">
                                      <div class="col-md-6 offset-md-4">
                                          <button type="submit" class="btn btn-primary">
                                              {{ __('Simpan') }}
                                          </button>
                                      </div>
                                  </div>
                                </form>
                            </div>

                            {{-- <div class="col-sm-4">
                                <div class="card-box">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title mt-0 mb-3">My Team Members</h4>

                                    <ul class="list-group mb-0 user-list">
                                        <li class="list-group-item">
                                            <a href="#" class="user-list-item">
                                                <div class="user avatar-sm float-left mr-2">
                                                    <img src="assets/images/users/user-2.jpg" alt="" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="user-desc">
                                                    <h5 class="name mt-0 mb-1">Michael Zenaty</h5>
                                                    <p class="desc text-muted mb-0 font-12">CEO</p>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="list-group-item">
                                            <a href="#" class="user-list-item">
                                                <div class="user avatar-sm float-left mr-2">
                                                    <img src="assets/images/users/user-3.jpg" alt="" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="user-desc">
                                                    <h5 class="name mt-0 mb-1">James Neon</h5>
                                                    <p class="desc text-muted mb-0 font-12">Web Designer</p>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="list-group-item">
                                            <a href="#" class="user-list-item">
                                                <div class="user avatar-sm float-left mr-2">
                                                    <img src="assets/images/users/user-5.jpg" alt="" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="user-desc">
                                                    <h5 class="name mt-0 mb-1">John Smith</h5>
                                                    <p class="desc text-muted mb-0 font-12">Web Developer</p>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="list-group-item">
                                            <a href="#" class="user-list-item">
                                                <div class="user avatar-sm float-left mr-2">
                                                    <img src="assets/images/users/user-6.jpg" alt="" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="user-desc">
                                                    <h5 class="name mt-0 mb-1">Michael Zenaty</h5>
                                                    <p class="desc text-muted mb-0 font-12">Programmer</p>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="list-group-item">
                                            <a href="#" class="user-list-item">
                                                <div class="user avatar-sm float-left mr-2">
                                                    <img src="assets/images/users/user-1.jpg" alt="" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="user-desc">
                                                    <h5 class="name mt-0 mb-1">Mat Helme</h5>
                                                    <p class="desc text-muted mb-0 font-12">Manager</p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="card-box">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title mt-0 mb-3"><i class="mdi mdi-notification-clear-all mr-1"></i> Upcoming Reminders</h4>

                                    <ul class="list-group mb-0 user-list">
                                        <li class="list-group-item">
                                            <a href="#" class="user-list-item">
                                                <div class="user float-left mr-3">
                                                    <i class="mdi mdi-circle text-primary"></i>
                                                </div>
                                                <div class="user-desc overflow-hidden">
                                                    <h5 class="name mt-0 mb-1">Meet Manager</h5>
                                                    <span class="desc text-muted font-12 text-truncate d-block">February 24, 2019 - 10:30am to 12:45pm</span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="list-group-item">
                                            <a href="#" class="user-list-item">
                                                <div class="user float-left mr-3">
                                                    <i class="mdi mdi-circle text-success"></i>
                                                </div>
                                                <div class="user-desc overflow-hidden">
                                                    <h5 class="name mt-0 mb-1">Project Discussion</h5>
                                                    <span class="desc text-muted font-12 text-truncate d-block">February 25, 2019 - 10:30am to 12:45pm</span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="list-group-item">
                                            <a href="#" class="user-list-item">
                                                <div class="user float-left mr-3">
                                                    <i class="mdi mdi-circle text-pink"></i>
                                                </div>
                                                <div class="user-desc overflow-hidden">
                                                    <h5 class="name mt-0 mb-1">Meet Manager</h5>
                                                    <span class="desc text-muted font-12 text-truncate d-block">February 26, 2019 - 10:30am to 12:45pm</span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="list-group-item">
                                            <a href="#" class="user-list-item">
                                                <div class="user float-left mr-3">
                                                    <i class="mdi mdi-circle text-muted"></i>
                                                </div>
                                                <div class="user-desc overflow-hidden">
                                                    <h5 class="name mt-0 mb-1">Project Discussion</h5>
                                                    <span class="desc text-muted font-12 text-truncate d-block">February 27, 2019 - 10:30am to 12:45pm</span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="list-group-item">
                                            <a href="#" class="user-list-item">
                                                <div class="user float-left mr-3">
                                                    <i class="mdi mdi-circle text-danger"></i>
                                                </div>
                                                <div class="user-desc overflow-hidden">
                                                    <h5 class="name mt-0 mb-1">Meet Manager</h5>
                                                    <span class="desc text-muted font-12 text-truncate d-block">February 28, 2019 - 10:30am to 12:45pm</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>


                            </div> --}}
                        </div>        
                        
                    </div> <!-- container-fluid -->
@endsection

@section('css')
  <link href="{{asset('libs/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('libs/datatables/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('libs/datatables/buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('libs/datatables/select.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
<script>
  
    $(document).ready( function() {
        $(document).on('change', '.btn-file :file', function() {
      var input = $(this),
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      input.trigger('fileselect', [label]);
      });
  
      $('.btn-file :file').on('fileselect', function(event, label) {
          
          var input = $(this).parents('.input-group').find(':text'),
              log = label;
          
          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }
        
      });
  
      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              
              reader.onload = function (e) {
                  $('#img-upload').attr('src', e.target.result);
              }
              
              reader.readAsDataURL(input.files[0]);
          }
      }
  
      $("#imgInp").change(function(){
          readURL(this);
      }); 
  
    });
  </script>
    <!-- third party js -->
    <script src="{{asset('libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('libs/datatables/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('libs/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('libs/datatables/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('libs/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('libs/datatables/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('libs/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('libs/datatables/buttons.flash.min.js')}}"></script>
    <script src="{{asset('libs/datatables/buttons.print.min.js')}}"></script>
    <script src="{{asset('libs/datatables/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('libs/datatables/dataTables.select.min.js')}}"></script>
    <script src="{{asset('libs/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('libs/pdfmake/vfs_fonts.js')}}"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{asset('js/pages/datatables.init.js')}}"></script>
@endsection