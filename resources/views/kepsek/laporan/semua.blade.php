@extends('layouts.app')

@section('title','Dashboard Admin | Manajemen Data Guru')
@section('dashboard','Dashboard Admin | Manajemen Data Guru')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card-box table-responsive">
          <div class="d-flex align-items-center justify-content-between">
            <h4 class="mt-0 header-title">Data Guru <div class="badge badge-warning">{{$guru->gelar_depan.' '.$guru->nama_depan.' '.$guru->nama_belakang.' '.$guru->gelar_belakang ?? ''}}</div> <div class="badge badge-primary">{{$tahun->periode ?? ''}}|{{$tahun->semester ?? ''}}</div></h4>
            <button type="button" class="btn btn-purple btn-rounded w-md waves-effect waves-light mb-3"><i class="fas fa-print"></i> Cetak Laporan</button>      
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="row">
                <div class="col-12">
                  <div class="form-group text-center">
                    <label for="customFile">Profil Guru</label> <br>
                    <img id='img-upload' class="img-fluid img-thumbnail mb-1 " src="{{asset('gurus/'.$guru->foto)}}" alt="" style="width: 50%"><br>
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
              <div class="d-flex justify-content-between">
                <label for="">Daftar Seluruh Kegiatan</label>
              </div>
              <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Pelajaran | Kelas</th>
                    <th>Absen</th>
                    <th>Materi</th>
                    <th>Hambatan</th>
                    <th>Pemecahan</th>
                    <th>Keterangan</th>
                    <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                  @forelse ($agendas as $item)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->mapelGuru->mapel->mata_pelajaran}} | {{$item->mapelGuru->kelas->kelas}}</td>
                    <td>
                      <strong>{{$item->absen}}</strong>/{{$item->mapelGuru->kelas->jumlah_siswa}} Siswa
                    </td>
                    <td>
                      {!!$item->materi ?? 'Tidak Ada Materi' !!}
                    </td>
                    <td>
                      {!!$item->hambatan ?? 'Tidak Ada Hambatan' !!}
                    </td>
                    <td>
                      {!!$item->pemecahan ?? 'Tidak Ada Pemecahan' !!}
                    </td>
                    <td>
                      {!!$item->keterangan ?? 'Tidak Ada Keterangan' !!}
                    </td>
                    <td>
                      <div class="btn-group mb-1">
                        @if ($item->saran != null)
                          <a href="#" type="button" class="btn btn-purple waves-effect"><i class="fas fa-print"></i> Cetak</a>  
                        @endif
                        <a href="{{route('kepsek.komentar',$item->id_agenda)}}" type="button" class="btn btn-info waves-effect"><i class="fas fa-edit"></i>Berikan Saran/Komentar</a>
                          <form action="{{ route('guru.jurnal.delete',$item->id_agenda) }}"  method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger waves-effect"><i class="fas fa-trash"></i></button>
                          </form>
                      </div>
                    </td>
                </tr>
                  @empty
                      
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
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