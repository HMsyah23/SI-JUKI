@extends('layouts.app')

@section('title','Dashboard Kepala Sekolah | History Jurnal Kegiatan')
@section('dashboard','Dashboard Kepala Sekolah | History Jurnal Kegiatan')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-12">
                            <div class="card-box table-responsive">
                              <div class="d-flex align-items-center justify-content-between">
                                  <h4 class="mt-0 header-title">History Jurnal Kegiatan</h4>
                                  {{-- <button type="button" class="btn btn-purple btn-rounded w-md waves-effect waves-light mb-3" data-toggle="modal" data-target=".bs-example-modal-center" ><i class="mdi mdi-plus"></i> Tambah Data</button>       --}}
                              </div>
                              <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a href="#home1" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">History Jurnal Kegiatan Hari Ini</span>            
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#profile1" data-toggle="tab" aria-expanded="true" class="nav-link">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">Semua Jurnal Kegiatan</span> 
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="home1">
                                  <div class="row mb-1">
                                    <div class="col d-flex justify-content-between">
                                      <span>Jurnal Kegiatan Pada Hari : {{\Carbon\Carbon::now()->isoFormat('dddd, DD MMMM Y')}} <div class="badge badge-primary">{{$agenda->count()}}</div></span>
                                      <a href="{{route('laporan.harian')}}" class="btn btn-primary waves-effect"><i class="fas fa-print"></i> Cetak Laporan Harian</a>
                                    </div>
                                  </div> 
                                  <table id="responsive-datatable1" class="table table-bordered table-bordered dt-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Materi</th>
                                        <th>Hambatan</th>
                                        <th>Pemecahan</th>
                                        <th>Absen</th>
                                        <th>Keterangan</th>
                                        <th>Opsi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($agenda as $item)
                                    <tr>
                                      <td>{{$loop->iteration}}</td>
                                      <td>{{$item->created_at->isoFormat('dddd, DD/MM/Y')}}</td>
                                      <td>
                                        <strong>{{$item->mapelGuru->mapel->mata_pelajaran}}</strong><br>
                                              Nama Guru : <strong>{{$item->guru->gelar_depan.' '.$item->guru->nama_depan.' '.$item->guru->nama_belakang.' '.$item->guru->gelar_belakang}}</strong> <br>
                                              Kelas : <strong>{{$item->mapelGuru->kelas->kelas}}</strong>  
                                      </td>
                                      <td>
                                        {!! $item->materi !!}
                                      </td>
                                      <td>
                                        {!! $item->hambatan !!}
                                      </td>
                                      <td>
                                        {!! $item->pemecahan !!}
                                      </td>
                                      <td>
                                        <strong>{{$item->absen}}</strong>/{{$item->mapelGuru->kelas->jumlah_siswa}} Siswa
                                      </td>
                                      <td>
                                        {{$item->keterangan}}
                                      </td>
                                      <td>
                                        <div class="btn-group mb-1">
                                          @if ($item->saran != null)
                                            <a href="#" type="button" class="btn btn-purple waves-effect"><i class="fas fa-print"></i> Cetak</a>  
                                          @endif
                                          <a href="{{route('kepsek.komentar',$item->id_agenda)}}" type="button" class="btn btn-info waves-effect"><i class="fas fa-edit"></i>Berikan Saran/Komentar</a>
                                          <button type="button" class="btn btn-danger waves-effect"><i class="fas fa-trash"></i></button>
                                        </div>
                                      </td>
                                  </tr>
                                    @empty
                                        <tr>
                                          <td colspan="6" class="text-center"><strong>Belum Ada Data</strong></td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="profile1">
                                  <div class="col-12 mb-1 d-flex justify-content-between">
                                    <span>Semua Laporan <div class="badge badge-primary">{{$agendas->count()}}</div></span>
                                    <a href="{{route('laporan.semua')}}" class="btn btn-primary waves-effect"><i class="fas fa-print"></i> Cetak Laporan</a>
                                  </div>
                                  <div class="col">
                                  <table id="responsive-datatable" class="table table-bordered ">
                                    <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Tanggal</th>
                                          <th>Mata Pelajaran</th>
                                          <th>Materi</th>
                                          <th>Absen</th>
                                          <th>Keterangan</th>
                                          <th>Opsi</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      @forelse ($agendas as $item)
                                      <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->created_at->isoFormat('dddd, DD/MM/Y')}}</td>
                                        <td>{{$item->mapelGuru->mapel->mata_pelajaran}}</td>
                                        <td>
                                          {!! $item->materi !!}
                                        </td>
                                        <td>
                                          <strong>{{$item->absen}}</strong>/{{$item->mapelGuru->kelas->jumlah_siswa}} Siswa
                                        </td>
                                        <td>
                                          {{$item->keterangan}}
                                        </td>
                                        <td>
                                          <div class="btn-group mb-1">
                                            <a href="{{route('laporan.harian.detail',$item->id_agenda)}}" class="btn btn-purple waves-effect"><i class="fas fa-print"></i></a> 
                                            <a href="{{route('kepsek.komentar',$item->id_agenda)}}" type="button" class="btn btn-info waves-effect"><i class="fas fa-eye"></i></a>
                                            {{-- <button type="button" class="btn btn-danger waves-effect"><i class="fas fa-trash"></i></button> --}}
                                          </div>
                                        </td>
                                    </tr>
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
                            </div> 
                            </div>
                        </div>
                    </div>
                    <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
                      <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title" id="myCenterModalLabel">Tambah Data</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              </div>
                              <div class="modal-body">
                                  ...
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
      $('#responsive-datatable1').DataTable( {
          responsive: true
      } );
    </script>
    <script src="{{asset('js/pages/datatables.init.js')}}"></script>
@endsection