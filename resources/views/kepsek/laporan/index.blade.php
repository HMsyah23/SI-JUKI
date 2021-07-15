@extends('layouts.app')

@section('title','Dashboard Kepala Sekolah | Laporan Kegiatan Harian')
@section('dashboard','Dashboard Kepala Sekolah | Laporan Kegiatan Harian')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-12">
                          <div class="card-box table-responsive">
                            <h4 class="mt-0 header-title">Laporan Kegiatan Harian <div class="badge badge-primary">{{$agenda->count()}}</div></h4>
                            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Nama</th>
                                  <th>Jumlah Penginputan Agenda</th>
                                  <th>Aksi</th>
                              </tr>
                              </thead>
                              <tbody>
                              @forelse ($agenda as $key => $item)
                              <tr>
                                <td>{{$loop->iteration}}</td>
                                {{-- <td>{{$item->mapelGuru->guru->gelar_depan.' '.$item->mapelGuru->guru->nama_depan.''.$item->mapelGuru->guru->nama_belakang.', '.$item->mapelGuru->guru->gelar_belakang}}</td> --}}
                                <td>{{$item[0]->guru->gelar_depan.' '.$item[0]->guru->nama_depan.' '.$item[0]->guru->nama_belakang.', '.$item[0]->guru->gelar_belakang}}</td>
                                <td><strong class="text-danger">{{$item->count()}}</strong> Kali Mengisi Agenda Hari Ini</td>
                                <td>
                                  <div class="btn-group mb-1">
                                    {{-- <button type="button" class="btn btn-primary waves-effect"><i class="fas fa-eye"></i> Lihat</button> --}}
                                    <a href="{{route('kepsek.laporan.detail',$item[0]->id_agenda)}}" type="button" class="btn btn-purple waves-effect"><i class="mdi mdi-book-search"></i> Lihat Detail</a>
                                  </div>
                                </td>
                            </tr>
                              @empty
                                  <tr>
                                    <th colspan="4" class="text-center">
                                      Belum Ada Data
                                    </th>
                                  </tr>
                              @endforelse
                              </tbody>
                          </table>
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

@push('css')
  <link href="{{asset('libs/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('libs/datatables/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('libs/datatables/buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('libs/datatables/select.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
@endpush

@push('js')
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
@endpush