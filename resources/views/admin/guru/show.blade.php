@extends('layouts.app')

@section('title','Dashboard Admin | Manajemen Data Guru')
@section('dashboard','Dashboard Admin | Manajemen Data Guru')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-12">
                            <div class="card-box table-responsive">
                              <div class="d-flex align-items-center justify-content-between">
                                  <h4 class="mt-0 header-title">Data Guru <div class="badge badge-warning">{{$guru->gelar_depan.' '.$guru->nama_depan.' '.$guru->nama_belakang.' '.$guru->gelar_belakang ?? ''}}</div> <div class="badge badge-primary">{{$tahun->periode ?? ''}}|{{$tahun->semester ?? ''}}</div></h4>
                                  <a href="{{route('laporan.guru',$guru->id_guru)}}" class="btn btn-purple btn-rounded w-md waves-effect waves-light mb-3"><i class="fas fa-print"></i> Cetak Data</a>      
                              </div>
                              <form role="form"  action="{{ route('guru.update',$guru->id_guru) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="row">
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="customFile">Foto</label> <br>
                                        <img id='img-upload' class="img-fluid img-thumbnail mb-1" src="{{asset('gurus/'.$guru->foto)}}" alt="" style="width: 50%"><br>
                                              <input type="file" id="imgInp" name="foto" class="form-control">
                                          </span>
                                          <input type="hidden" class="form-control" readonly>
                                      </div>
                                    </div>
                                    <div class="col-12">
                                      <label>Informasi Guru</label>
                                      <table class="table table-striped table-sm">
                                        <thead>
                                          <tr>
                                            <th>NBM</th>
                                            <th>{{$guru->nbm}}</th>
                                          </tr>
                                          <tr>
                                            <th>NIP</th>
                                            <th>{{$guru->nip}}</th>
                                          </tr>
                                          <tr>
                                            <th>Nama</th>
                                            <th>{{$guru->gelar_depan.' '.$guru->nama_depan.' '.$guru->nama_belakang.' '.$guru->gelar_belakang}}</th>
                                          </tr>
                                          <tr>
                                            <th>Jabatan</th>
                                            <th>{{$guru->jabatan->jabatan}}</th>
                                          </tr>
                                          <tr>
                                            <th>Status Kepegawaian</th>
                                            <th>{{$guru->status->nama}} ({{$guru->status->kode}})</th>
                                          </tr>
                                          <tr>
                                            <th>Golongan</th>
                                            <th>{{$guru->golongan}}</th>
                                          </tr>
                                          <tr>
                                            <th>Email</th>
                                            <th>{{$guru->email}}</th>
                                          </tr>
                                        </thead>
                                      </table>
                                      <label>Informasi Pribadi</label>
                                      <table class="table table-striped table-sm">
                                        <thead>
                                          <tr>
                                            <th>Jenis Kelamin</th>
                                            <th>
                                              @if ($guru->jenis_kelamin == 1)
                                                  Pria
                                              @else
                                                  Wanita
                                              @endif
                                            </th>
                                          </tr>
                                          <tr>
                                            <th>Tanggal Lahir</th>
                                            <th>{{\Carbon\Carbon::parse($guru->tanggal_lahir)->isoFormat(' dddd, DD MMMM Y')}}</th>
                                          </tr>
                                          <tr>
                                            <th>Usia</th>
                                            <th>{{\Carbon\Carbon::parse($guru->tanggal_lahir)->diffInYears(\Carbon\Carbon::now())}}</th>
                                          </tr>
                                          <tr>
                                            <th>Agama</th>
                                            <th>{{$guru->agama}}</th>
                                          </tr>
                                          <tr>
                                            <th>Universitas</th>
                                            <th>{{$guru->universitas}}</th>
                                          </tr>
                                          <tr>
                                            <th>Jenjang</th>
                                            <th>{{$guru->jenjang}}</th>
                                          </tr>
                                          <tr>
                                            <th>Jurusan</th>
                                            <th>{{$guru->jurusan}}</th>
                                          </tr>
                                          <tr>
                                            <th>Tanggal Lulus</th>
                                            <th>{{\Carbon\Carbon::parse($guru->tanggal_lulus)->isoFormat(' dddd, DD MMMM Y')}}</th>
                                          </tr>
                                          <tr class="text-center">
                                            <th colspan="2">Alamat</th>
                                          </tr>
                                          <tr class="text-center">
                                            <th colspan="2">
                                              {{$guru->alamat}}
                                            </th>
                                          </tr>
                                        </thead>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              <div class="col-lg-8">
                                  
                                    {{-- @method('PUT') --}}
                                    <div class="row">
                                      <div class="col-sm-12 col-lg-6">
                                        <div class="form-group">
                                        <label for="id_kepegawaian">Status Kepegawaian</label>
                                          <select name="id_kepegawaian" class="form-control">
                                            @forelse ($status_pegawai as $item)
                                              <option @if($guru->status->id_status_kepegawaian == $item->id_status_kepegawaian) selected @endif value="{{$item->id_status_kepegawaian}}">{{$item->nama}}</option>   
                                            @empty
                                              <option value="null">Tidak Ada</option>
                                            @endforelse
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-sm-12 col-lg-6">
                                        <div class="form-group">
                                        <label for="id_jabatan">Jabatan</label>
                                          <select name="id_jabatan" class="form-control">
                                            @forelse ($jabatans as $item)
                                              <option @if($guru->jabatan->id_jabatan == $item->id_jabatan) selected @endif value="{{$item->id_jabatan}}">{{$item->jabatan}}</option>   
                                            @empty
                                              <option value="null">Tidak Ada</option>
                                            @endforelse
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    
                                    <div class="row">
                                      <div class="col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label for="nbm">NBM</label>
                                            <input type="text" name="nbm" class="form-control @error('nbm') is-invalid @enderror" placeholder="Masukkan NBM" value="{{$guru->nbm}}" maxlength="7" required>
                                            @error('nbm') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                      </div>
                                      <div class="col-sm-12 col-lg-4">
                                        <div class="form-group">
                                          <label for="nip">NIP</label>
                                          <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" placeholder="Masukkan NIP" value="{{$guru->nip}}" maxlength="18" required>
                                          @error('nip') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                      </div>
                                      <div class="col-sm-12 col-lg-4">
                                        <div class="form-group">
                                          <label for="email">Email </label>
                                            <input disabled type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email" value="{{$guru->email}}" maxlength="50" required>
                                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror 
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                      <div class="col-lg-6 col-sm-12">
                                        <div class="col">
                                          <div class="form-group">
                                            <label for="gelar_depan">Gelar Depan</label>
                                            <input type="text" name="gelar_depan" class="form-control" placeholder="Masukkan Gelar Depan" value="{{$guru->gelar_depan}}" maxlength="25">
                                          </div>
                                        </div>
                                        <div class="col">
                                          <div class="form-group">
                                              <label for="">Nama Depan</label>
                                                <input type="text" name="nama_depan" class="form-control" placeholder="Masukkan Nama Depan" value="{{$guru->nama_depan}}" maxlength="25" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                          <div class="form-group">
                                            <label for="">Nama Belakang</label>
                                                <input type="text" name="nama_belakang" class="form-control" placeholder="Masukkan Nama Belakang" value="{{$guru->nama_belakang}}" maxlength="25" >
                                            </div>
                                          </div>
                                        <div class="col">
                                         <div class="form-group">
                                            <label for="">Gelar Belakang</label>
                                              <input type="text" name="gelar_belakang" class="form-control" placeholder="Masukkan Gelar Belakang" value="{{$guru->gelar_belakang}}" maxlength="25" >
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-6 col-sm-12">
                                        <div class="col">
                                          <div class="form-group">
                                            <label for="agama">Agama </label>
                                            <select name="agama" class="form-control">
                                                <option @if($guru->agama == "Islam") selected @endif>Islam</option>
                                                <option @if($guru->agama == "Protesta") selected @endif>Protestan</option>
                                                <option @if($guru->agama == "Katolik") selected @endif>Katolik</option>
                                                <option @if($guru->agama == "Hindu") selected @endif>Hindu</option>
                                                <option @if($guru->agama == "Buddha") selected @endif>Buddha</option>
                                                <option @if($guru->agama == "Khonghucu") selected @endif>Khonghucu</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="col">
                                          <div class="form-group">
                                            <label for="">Jenis Kelamin</label>
                                              <select name="jenis_kelamin" class="form-control">
                                                  <option @if($guru->jenis_kelamin == 1) selected @endif value="1">Laki = Laki</option>
                                                  <option @if($guru->jenis_kelamin == 2) selected @endif  value="2">Perempuan</option>
                                              </select>
                                            </div>
                                        </div>
                                          <div class="col">
                                            <div class="form-group">
                                              <label for="tanggal_lahir">Tanggal Lahir</label>
                                              <input type="date" name="tanggal_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir" value="{{\Carbon\Carbon::parse($guru->tanggal_lahir)->format('Y-m-d')}}" required>
                                            </div>
                                          </div>
                                          <div class="col">
                                            <div class="form-group">
                                              <label for="golongan">Pangkat/Golongan <sup>(Khusus PNS)</sup> </label>
                                              <input type="text" name="golongan" class="form-control" placeholder="Masukkan Pangkat/Golongan" value="{{$guru->golongan}}" maxlength="25">
                                            </div>
                                          </div>
                                      </div>
                                    </div>
                              
                                    <div class="row">
                                      <div class="col-lg-12 col-sm-12">
                                        <div class="col">
                                            <div class="form-group">
                                            <label for="simpleinput">Alamat</label>
                                              <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat" cols="30" rows="5" required>{!!$guru->alamat!!}</textarea>
                                          </div>
                                      </div>
                                    </div>
                                    </div>
                                    <hr>
                                    <h5><strong>Informasi Pendidikan</strong></h5>
                                    <hr>
                                    <div class="row">
                                      <div class="col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="simpleinput">Universitas</label>
                                              <input type="text" name="universitas" class="form-control" placeholder="Masukkan Universitas" value="{{$guru->universitas}}" maxlength="100" required>
                                          </div>
                                        </div>
    
                                        <div class="col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="simpleinput">Jenjang</label>
                                              <input type="text" name="jenjang" class="form-control" placeholder="Masukkan Jenjang" value="{{$guru->jenjang}}" maxlength="15" required>
                                          </div>
                                        </div>
    
                                        <div class="col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="simpleinput">Jurusan</label>
                                              <input type="text" name="jurusan" class="form-control" placeholder="Masukkan Jurusan" value="{{$guru->jurusan}}" maxlength="50" required>
                                          </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-6">
                                          <div class="form-group">
                                              <label for="simpleinput">Tanggal Lulus</label>
                                                <input type="date" name="tanggal_lulus" class="form-control" placeholder="Masukkan Tanggal Lulus" value="{{\Carbon\Carbon::parse($guru->tanggal_lulus)->format('Y-m-d') ?? \Carbon\Carbon::now()->format('Y-m-d')}}" required>
                                            </div>
                                          </div>
                                    </div>
                                      <div class="form-group mb-0 justify-content-start row">
                                        <div class="col-12">
                                          <a href="{{route('admin.guru')}}" type="button" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                                          <button type="submit" class="btn btn-info waves-effect waves-light">
                                            <i class="mdi mdi-content-save"></i> Perbarui
                                           </button>
                                        </div>
                                    </div>
                                  </form>
                              </div>
                            </div>
                              
                            </div>
                        </div>
                    </div>
                  </div> 
                  <!-- container-fluid -->
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

    <script>
      $(document).ready(function() {
          $('#responsive-datatable').DataTable();
      } );
    </script>

    <script src="{{asset('js/pages/datatables.init.js')}}"></script>
@endsection