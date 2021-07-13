@extends('layouts.app')

@section('title','Dashboard Admin | Manajemen Data Pengguna')
@section('dashboard','Dashboard Admin | Manajemen Data Pengguna')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-12">
                            <div class="card-box table-responsive">
                              <div class="d-flex align-items-center justify-content-between">
                                  <h4 class="mt-0 header-title">Daftar Pengguna</h4>
                                  <button type="button" class="btn btn-purple btn-rounded w-md waves-effect waves-light mb-3" data-toggle="modal" data-target=".bs-example-modal-center" ><i class="mdi mdi-plus"></i> Tambah Data</button>      
                              </div>
                                <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Peran</th>
                                        <th>Email</th>
                                        <th>Opsi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      @forelse ($users as $item)
                                      <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->name}}</td>
                                        @if ($item->role == 0)
                                          <td> <div class="badge badge-danger">Administrator</div> </td>
                                        @elseif($item->role == 1)
                                          <td> <div class="badge badge-purple">Kepala Sekolah</div> </td>
                                        @else
                                          <td> <div class="badge badge-info">Guru</div> </td>
                                        @endif
                                        <td>
                                          {{$item->email}}
                                        </td>
                                        <td>
                                          <div class="btn-group mb-1">
                                            {{-- <button type="button" class="btn btn-primary waves-effect"><i class="fas fa-eye"></i> Lihat</button> --}}
                                            <button data-toggle="modal" data-target="#ganti-{{$item->id_user}}" type="button" class="btn btn-info waves-effect text-white"><i class="fas fa-key"></i></button>
                                            <button data-toggle="modal" data-target="#edit-{{$item->id_user}}" type="button" class="btn btn-warning waves-effect text-dark"><i class="fas fa-edit"></i></button>
                                            @if (Auth::user()->id_user == $item->id_user)
                                            @else
                                            <button type="button" data-toggle="modal" data-target="#staticBackdrop-{{$item->id_user}}" class="btn btn-danger waves-effect"><i class="fas fa-trash"></i></button>

                                                  
                                            @endif
                                            
                                          </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="staticBackdrop-{{$item->id_user}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title text-white" id="staticBackdropLabel">Yakin Ingin Menghapus Data Pengguna {{ $item->name }} ?</h5>
                                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                <form action="{{ route('pengguna.delete',$item->id_user) }}"  method="POST" enctype="multipart/form-data">
                                                  @csrf
                                                  @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Ya</button>
                                              </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                      @empty
                                          <tr>
                                            <td colspan="5" class="text-ceneter">
                                              <strong>Belum Ada Data</strong>
                                            </td>
                                          </tr>
                                      @endforelse
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    @if ($gurus->count() > 0)
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box table-responsive">
                              <div class="d-flex align-items-center justify-content-between">
                                  <h4 class="mt-0 header-title">Daftar Guru</h4> <small class="text-muted">(Kata Sandi Default : "password")</small>
                              </div>
                                <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Peran</th>
                                        <th>Email</th>
                                        <th>Opsi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      @forelse ($gurus as $item)
                                      <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->name}}</td>
                                        @if ($item->role == 0)
                                          <td> <div class="badge badge-danger">Administrator</div> </td>
                                        @elseif($item->role == 1)
                                          <td> <div class="badge badge-purple">Kepala Sekolah</div> </td>
                                        @else
                                          <td> <div class="badge badge-info">Guru</div> </td>
                                        @endif
                                        <td>
                                          {{$item->email}}
                                        </td>
                                        <td>
                                          <div class="btn-group mb-1">
                                            {{-- <button type="button" class="btn btn-primary waves-effect"><i class="fas fa-eye"></i> Lihat</button> --}}
                                            <button data-toggle="modal" data-target="#ganti-{{$item->id_user}}" type="button" class="btn btn-info waves-effect text-white"><i class="fas fa-key"></i></button>
                                            <button data-toggle="modal" data-target="#edit-{{$item->id_user}}" type="button" class="btn btn-warning waves-effect text-dark"><i class="fas fa-edit"></i></button>
                                            @if (Auth::user()->id_user == $item->id_user)
                                            @else
                                            <button type="button" data-toggle="modal" data-target="#staticBackdrop-{{$item->id_user}}" class="btn btn-danger waves-effect"><i class="fas fa-trash"></i></button>

                                                  <div class="modal fade" id="staticBackdrop-{{$item->id_user}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h5 class="modal-title text-white" id="staticBackdropLabel">Yakin Ingin Menghapus Data Pengguna {{ $item->name }} ?</h5>
                                                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer justify-content-center">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                            <form action="{{ route('pengguna.delete',$item->id_user) }}"  method="POST" enctype="multipart/form-data">
                                                              @csrf
                                                              @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Ya</button>
                                                          </form>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            @endif
                                            
                                          </div>
                                        </td>
                                    </tr>
                                      @empty
                                          <tr>
                                            <td colspan="5" class="text-ceneter">
                                              <strong>Belum Ada Data</strong>
                                            </td>
                                          </tr>
                                      @endforelse
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
                      <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title" id="myCenterModalLabel">Tambah Data</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              </div>
                              <div class="modal-body">
                                <form method="POST" action="{{ route('pengguna.store') }}">
                                  @csrf
          
                                  <div class="row">
                                      <div class="col">
                                  <div class="form-group">
                                      <div class="col">
                                      <label for="name">{{ __('Nama') }}</label>
          
                                          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
          
                                          @error('name')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
          
                                  <div class="form-group">
                                      <div class="col">
                                      <label for="email">{{ __('Alamat Email') }}</label>
          
                                          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
          
                                          @error('email')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                  
                                    <div class="form-group">
                                        <div class="col">
                                        <label for="role">{{ __('Peran') }}</label>
                                        
                                             <select name="role" class="form-control @error('role') is-invalid @enderror">
                                              <option value="0">Administrator</option>
                                              <option value="1">Kepala Sekolah</option>
                                            </select>
                                            @error('role')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>
                                    </div> 
                                      </div>
                                      <div class="col">
                                            <div class="form-group">
                                                  <label for="customFile">Foto</label> <br>
                                                  <img id='img-upload' class="img-fluid img-thumbnail mb-1" src="{{asset('images/dummy.png')}}" alt="" style="width: 60%"><br>
                                                        <input type="file" id="imgInp" name="foto" class="form-control">
                                                    </span>
                                                    <input type="hidden" class="form-control" readonly>
                                            </div>
                                          </div>
                                  </div>
                                
                                      <hr>
          
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

                                  <div class="form-group row mb-0">
                                      <div class="col-md-6 offset-md-4">
                                          <button type="submit" class="btn btn-primary">
                                              {{ __('Simpan') }}
                                          </button>
                                      </div>
                                  </div>
                              </form>
                              </div>
                          </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->
                  </div> 
                  <!-- container-fluid -->

                  @forelse ($users as $item)
                  <div id="ganti-{{$item->id_user}}" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myCenterModalLabel">Ganti Password Pengguna {{$item->name}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                              <div class="card-box">
                                <div class="p-2">
                                  <form role="form"  action="{{ route('pengguna.ganti',$item->id_user) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                  {{-- <div class="form-group row">
                                      <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password Lama') }}</label>
          
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
                                  </div> --}}
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
                            </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div>
                  <div id="edit-{{$item->id_user}}" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myCenterModalLabel">Edit Data</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                              <div class="card-box">
                                <div class="p-2">
                                  <form role="form" action="{{ route('pengguna.update',$item->id_user) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
          
                                      <div class="col-md-6">
                                          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $item->name }}" required autocomplete="name" autofocus>
          
                                          @error('name')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
          
                                  <div class="form-group row">
                                      <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Alamat Email') }}</label>
          
                                      <div class="col-md-6">
                                          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $item->email }}" required autocomplete="email">
          
                                          @error('email')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                  @if (Auth::user()->id_user == $item->id_user)
                                  <input type="hidden" name="role" value="{{$item->role}}">
                                  @else
                                  <div class="form-group row">
                                    <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Peran') }}</label>
        
                                    <div class="col-md-6">
                                         <select name="role" class="form-control @error('role') is-invalid @enderror">
                                          <option @if ($item->role == 0) selected @endif value="0">Administrator</option>
                                          <option @if ($item->role == 1) selected @endif value="1">Kepala Sekolah</option>
                                        </select>
                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                @endif
                

                                  <div class="form-group row mb-0">
                                      <div class="col-md-6 offset-md-4">
                                          <button type="submit" class="btn btn-primary">
                                              {{ __('Simpan') }}
                                          </button>
                                      </div>
                                  </div>
                                  </form>
                              </div>
                            </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div>
                  @empty
                      
                  @endforelse

                  @forelse ($gurus as $item)
                  <div id="ganti-{{$item->id_user}}" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myCenterModalLabel">Ganti Password Pengguna {{$item->name}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                              <div class="card-box">
                                <div class="p-2">
                                  <form role="form"  action="{{ route('pengguna.ganti',$item->id_user) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                  {{-- <div class="form-group row">
                                      <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password Lama') }}</label>
          
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
                                  </div> --}}
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
                            </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div>
                  <div id="edit-{{$item->id_user}}" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myCenterModalLabel">Edit Data</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                              <div class="card-box">
                                <div class="p-2">
                                  <form role="form" action="{{ route('pengguna.update',$item->id_user) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
          
                                      <div class="col-md-6">
                                          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $item->name }}" required autocomplete="name" autofocus>
          
                                          @error('name')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
          
                                  <div class="form-group row">
                                      <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Alamat Email') }}</label>
          
                                      <div class="col-md-6">
                                          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $item->email }}" required autocomplete="email">
          
                                          @error('email')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <input type="hidden" name="role" value="{{$item->role}}">
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
                            </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div>
                  @empty
                      
                  @endforelse
@endsection

@section('css')
  <link href="{{asset('libs/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('libs/datatables/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('libs/datatables/buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('libs/datatables/select.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
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