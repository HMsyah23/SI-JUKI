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
                                  <h4 class="mt-0 header-title">Daftar Guru <div class="badge badge-warning">{{$gurus->count() ?? ''}}</div> <div class="badge badge-primary">{{$tahun->periode ?? ''}}|{{$tahun->semester ?? ''}}</div></h4>
                                  <button type="button" class="btn btn-purple btn-rounded w-md waves-effect waves-light mb-3" data-toggle="modal" data-target=".bs-example-modal-center" ><i class="mdi mdi-plus"></i> Tambah Data</button>      
                              </div>
                              <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Agama</th>
                                        <th>Opsi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                      @forelse ($gurus as $item)
                                      <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->nip}}</td>
                                        <td>{{$item->gelar_depan.' '.$item->nama_depan.' '.$item->nama_belakang.' '.$item->gelar_belakang}}</td>
                                        <td>
                                          @if ($item->jenis_kelamin == 1)
                                              Laki - Laki
                                          @else
                                              Perempuan
                                          @endif
                                        </td>
                                        <td>{{$item->agama}}</td>
                                        <td>
                                          <div class="btn-group mb-1">
                                            {{-- <button type="button" class="btn btn-primary waves-effect"><i class="fas fa-eye"></i> Lihat</button> --}}
                                            <a href="{{route('guru.show',$item->id_guru)}}" type="button" class="btn btn-warning waves-effect"><i class="fas fa-pen"></i> Edit</a>
                                            <button type="button" data-toggle="modal" data-target="#staticBackdrop-{{$item->id_guru}}" class="btn btn-danger waves-effect"><i class="fas fa-trash"></i></button>

            
                                          </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="staticBackdrop-{{$item->id_guru}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header bg-danger">
                                              <h5 class="modal-title text-white" id="staticBackdropLabel">Yakin Ingin Menghapus Data Guru {{ $item->gelar_depan.' '.$item->nama_depan.' '.$item->nama_belakang.' '.$item->gelar_belakang }} ?</h5>
                                              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-footer justify-content-center">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                              <form action="{{ route('guru.delete',$item->id_guru) }}"  method="POST" enctype="multipart/form-data">
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
                                            <td colspan="6" class="text-center"><strong>Belum Ada Data</strong></td>
                                          </tr>
                                      @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
                      <div class="modal-dialog modal-dialog-centered modal-lg">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title" id="myCenterModalLabel">Tambah Data</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              </div>
                              <div class="modal-body">
                                <form role="form"  action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  <div class="row">
                                    <div class="col-sm-12 col-lg-6">
                                      <div class="form-group">
                                      <label for="id_kepegawaian">Status Kepegawaian</label>
                                        <select name="id_kepegawaian" class="form-control">
                                          @forelse ($status_pegawai as $item)
                                            <option value="{{$item->id_status_kepegawaian}}">{{$item->nama}}</option>   
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
                                            <option value="{{$item->id_jabatan}}">{{$item->jabatan}}</option>   
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
                                          <input type="text" name="nbm" class="form-control @error('nbm') is-invalid @enderror" placeholder="Masukkan NBM" value="{{old('nbm')}}" maxlength="7" required>
                                          @error('nbm') <span class="text-danger">{{ $message }}</span> @enderror
                                      </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                      <div class="form-group">
                                        <label for="nip">NIP</label>
                                        <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" placeholder="Masukkan NIP" value="{{old('nip')}}" maxlength="18" required>
                                        @error('nip') <span class="text-danger">{{ $message }}</span> @enderror
                                      </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-4">
                                      <div class="form-group">
                                        <label for="email">Email </label>
                                          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email" value="{{old('email')}}" maxlength="50" required>
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
                                          <input type="text" name="gelar_depan" class="form-control" placeholder="Masukkan Gelar Depan" value="{{old('gelar_depan')}}" maxlength="25">
                                        </div>
                                      </div>
                                      <div class="col">
                                        <div class="form-group">
                                            <label for="">Nama Depan</label>
                                              <input type="text" name="nama_depan" class="form-control" placeholder="Masukkan Nama Depan" value="{{old('nama_depan')}}" maxlength="25" required>
                                          </div>
                                      </div>
                                      <div class="col">
                                        <div class="form-group">
                                          <label for="">Nama Belakang</label>
                                              <input type="text" name="nama_belakang" class="form-control" placeholder="Masukkan Nama Belakang" value="{{old('nama_belakang')}}" maxlength="25" >
                                          </div>
                                        </div>
                                      <div class="col">
                                       <div class="form-group">
                                          <label for="">Gelar Belakang</label>
                                            <input type="text" name="gelar_belakang" class="form-control" placeholder="Masukkan Gelar Belakang" value="{{old('gelar_belakang')}}" maxlength="25" >
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                      <div class="form-group">
                                            <label for="customFile">Foto</label> <br>
                                            <img id='img-upload' class="img-fluid img-thumbnail mb-1" src="{{asset('images/dummy.png')}}" alt="" style="width: 50%"><br>
                                                  <input type="file" id="imgInp" name="foto" class="form-control">
                                              </span>
                                              <input type="hidden" class="form-control" readonly>
                                      </div>
                                    </div>
                                  </div>
<hr>
                                  <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                      <div class="col">
                                        <div class="form-group">
                                          <label for="agama">Agama </label>
                                          <select name="agama" class="form-control">
                                              <option>Islam</option>
                                              <option>Protestan</option>
                                              <option>Katolik</option>
                                              <option>Hindu</option>
                                              <option>Buddha</option>
                                              <option>Khonghucu</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col">
                                        <div class="form-group">
                                          <label for="">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control">
                                                <option value="1">Laki = Laki</option>
                                                <option value="2">Perempuan</option>
                                            </select>
                                          </div>
                                      </div>
                                        <div class="col">
                                          <div class="form-group">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input type="date" name="tanggal_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir" value="{{\Carbon\Carbon::parse(old('tanggal_lahir'))->format('Y-m-d')}}" required>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                      <div class="col">
                                        <div class="form-group">
                                          <label for="golongan">Pangkat/Golongan <sup>(Khusus PNS)</sup> </label>
                                          <input type="text" name="golongan" class="form-control" placeholder="Masukkan Pangkat/Golongan" value="{{old('golongan')}}" maxlength="25">
                                        </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                          <label for="simpleinput">Alamat</label>
                                            <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat" cols="30" rows="5" required>{!!old('alamat')!!}</textarea>
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
                                            <input type="text" name="universitas" class="form-control" placeholder="Masukkan Universitas" value="{{old('universitas')}}" maxlength="100" required>
                                        </div>
                                      </div>
  
                                      <div class="col-sm-12 col-lg-6">
                                      <div class="form-group">
                                          <label for="simpleinput">Jenjang</label>
                                            <input type="text" name="jenjang" class="form-control" placeholder="Masukkan Jenjang" value="{{old('jenjang')}}" maxlength="15" required>
                                        </div>
                                      </div>
  
                                      <div class="col-sm-12 col-lg-6">
                                      <div class="form-group">
                                          <label for="simpleinput">Jurusan</label>
                                            <input type="text" name="jurusan" class="form-control" placeholder="Masukkan Jurusan" value="{{old('jurusan')}}" maxlength="50" required>
                                        </div>
                                      </div>
                                      <div class="col-sm-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="simpleinput">Tanggal Lulus</label>
                                              <input type="date" name="tanggal_lulus" class="form-control" placeholder="Masukkan Tanggal Lulus" value="{{\Carbon\Carbon::parse(old('tanggal_lulus'))->format('Y-m-d') ?? \Carbon\Carbon::now()->format('Y-m-d')}}" required>
                                          </div>
                                        </div>
                                  </div>
                                    <div class="form-group mb-0 justify-content-start row">
                                      <div class="col-sm-9">
                                        <button type="submit" class="btn btn-info waves-effect waves-light">
                                          <i class="mdi mdi-content-save"></i> Simpan
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