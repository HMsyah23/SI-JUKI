@extends('layouts.app')

@section('title','Dashboard Guru | File Manager')
@section('dashboard','Dashboard Guru | File Manager')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-12">
                            <div class="card-box table-responsive">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h4 class="mt-0 header-title">File Manager Guru </h4>
                                    <a href="#" class="btn btn-purple btn-rounded w-md waves-effect waves-light mb-3" data-toggle="modal" data-target=".bs-example-modal-center"><i class="mdi mdi-upload"></i> Upload File</a>      
                                </div>
                              <div class="d-flex align-items-center justify-content-between">
                                  <h4 class="mt-0 header-title">File Manager</h4>
                                  {{-- <button type="button" class="btn btn-purple btn-rounded w-md waves-effect waves-light mb-3" data-toggle="modal" data-target=".bs-example-modal-center" ><i class="mdi mdi-plus"></i> Tambah Data</button>       --}}
                              </div>
                                <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Kelas</th>
                                        <th>File Perangkat</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($filePerangkats as $item)
                                      <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->mapelGuru->mapel->mata_pelajaran}}</td>
                                        <td>{{$item->mapelGuru->kelas->kelas}}</td>
                                      <td>
                                          <div class="btn-group mb-1">
                                            <a href="{{url('public/'.json_decode($item->file)->file)}}" type="button" class="btn btn-purple waves-effect" target="_blank"><i class="mdi mdi-eye"></i> {{json_decode($item->file)->nama}}</a>
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
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title" id="myCenterModalLabel"><i class="mdi mdi-upload"></i> Upload File</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              </div>
                              <form role="form"  action="{{ route('guru.filePerangkat.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                              <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                      <div class="col">
                                          <div class="form-group">
                                            <label for="golongan">Nama File</label>
                                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" value="{{old('nama')}}" maxlength="25">
                                          </div>
                                      </div>
                                      <div class="col">
                                        <div class="form-group">
                                          <label for="golongan">Mata Pelajaran</label>
                                          <select name="mapel" class="form-control">
                                            @forelse ($mapels as $item)
                                              <option value="{{$item->mapel->id_mapel}}">{{$item->mapel->mata_pelajaran}}</option>  
                                            @empty
                                              <option value="null">Tidak Ada</option>
                                            @endforelse
                                        </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                      <div class="col">
                                        <div class="form-group">
                                          <label for="">Unggah File</label>
                                            <input type="file" name="berkas" class="form-control">
                                          </div>
                                      </div>
                                      <div class="col">
                                          <div class="form-group">
                                          <label for="simpleinput">Kelas</label>
                                          <select name="kelas" class="form-control">
                                            @forelse ($mapels as $item)
                                              <option value="{{$item->kelas->id_kelas}}">{{$item->kelas->kelas}}</option>
                                            @empty
                                              <option value="null">Tidak Ada</option>
                                            @endforelse
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <div class="form-group mb-0 justify-content-end">
                                      <button type="submit" class="btn btn-purple waves-effect waves-light">
                                        <i class="mdi mdi-upload"></i> Unggah Berkas
                                       </button>
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