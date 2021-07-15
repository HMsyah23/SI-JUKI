@extends('layouts.app')

@section('title','Dashboard Guru | Jurnal Mengajar Guru')
@section('dashboard','Dashboard Guru | Jurnal Mengajar Guru')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-12">
                          <div class="card-box table-responsive">
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="mt-0 header-title">Jurnal Mengajar Hari {{\Carbon\Carbon::now()->isoFormat('dddd, DD MMMM Y')}}</h4>
                                <a href="{{route('guru.addKegiatan')}}" class="btn btn-purple btn-rounded w-md waves-effect waves-light mb-3"><i class="mdi mdi-plus"></i> Tambah Kegiatan</a>      
                            </div>
                            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Tanggal | Kelas</th>
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
                                @forelse ($agendas as $item)
                                <tr>
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{$item->created_at->isoFormat('dddd, DD/MM/Y')}} | {{$item->mapelGuru->kelas->kelas}}</td>
                                  <td>{{$item->mapelGuru->mapel->mata_pelajaran}}</td>
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
                                    <strong>{{$item->absen}}</strong>/{{$item->mapelGuru->kelas->jumlah_siswa}} Siswa
                                  </td>
                                  <td>
                                    {!!$item->keterangan ?? 'Tidak Ada Keterangan' !!}
                                  </td>
                                  <td>
                                    <div class="btn-group mb-1">
                                      {{-- <button type="button" class="btn btn-primary waves-effect"><i class="fas fa-eye"></i> Lihat</button> --}}
                                      <a href="{{route('guru.jurnal.show',$item->id_agenda)}}" class="btn btn-warning text-dark waves-effect"><i class="fas fa-edit"></i></a>
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
                    <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
                      <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title" id="myCenterModalLabel">Kegiatan</h4>
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
    <script src="{{asset('js/pages/datatables.init.js')}}"></script>
@endsection
