@extends('layouts.app')

@section('title','Dashboard Kepala Sekolah | Bank Data Agenda')
@section('dashboard','Dashboard Kepala Sekolah | Bank Data Agenda')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-12">
                            <div class="card-box table-responsive">
                              <div class="d-flex align-items-center justify-content-between">
                                  <h4 class="mt-0 header-title">Daftar Bank Agenda Para Guru</h4>
                                  {{-- <button type="button" class="btn btn-purple btn-rounded w-md waves-effect waves-light mb-3" data-toggle="modal" data-target=".bs-example-modal-center" ><i class="mdi mdi-plus"></i> Tambah Data</button>       --}}
                              </div>
                                <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama Guru</th>
                                        <th>Kelas</th>
                                        <th>Agenda | Mata Pelajaran</th>
                                        <th>File Perangkat</th>
                                        <th>Agenda Lain</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>8244751654200000</td>
                                        <td>Muhammad Arwani, S.Ag</td>
                                        <td> <div class="badge badge-primary">1.</div> VII-A</td>
                                        <td> <a href="#" class="text-bold text-primary"> <div class="badge badge-primary">1.</div> Bahasa Indonesia</a></td>
                                        <td> <a href="#" class="text-bold text-primary"> <div class="badge badge-primary">1.</div> Bahasa Indonesia</a></td>
                                        <td>
                                          <div class="btn-group mb-1">
                                            {{-- <button type="button" class="btn btn-primary waves-effect"><i class="fas fa-eye"></i> Lihat</button> --}}
                                            <button type="button" class="btn btn-purple waves-effect"><i class="mdi mdi-calendar"></i> Agenda Lain</button>
                                          </div>
                                        </td>
                                    </tr>
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