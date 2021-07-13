@extends('layouts.app')

@section('title','Dashboard Admin | Data Kelas')
@section('dashboard','Dashboard Admin | Data Kelas')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-xl-6 order-lg-2">
                          <div class="card-box">
                              <h4 class="header-title mt-0 mb-3"><i class="mdi mdi-plus"></i>Tambah Kelas</h4>

                              <div class="p-2">
                                <form role="form"  action="{{ route('kelas.store') }}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                    <div class="form-group row">
                                      <label class="col-md-2 col-form-label" for="simpleinput">Kelas</label>
                                      <div class="col-md-10">
                                          <input type="text" name="kelas" class="form-control" placeholder="Masukkan Kelas" maxlength="25" required>
                                      </div>
                                    </div>

                                    <div class="form-group row">
                                      <label class="col-md-2 col-form-label" for="simpleinput">Jumlah Siswa</label>
                                      <div class="col-md-10">
                                          <input type="number" name="jumlah_siswa" class="form-control" placeholder="Masukkan Jumlah Siswa" required>
                                      </div>
                                    </div>

                                    <div class="form-group mb-0 justify-content-start row">
                                      <div class="col-sm-9">
                                        <input type="hidden" name="id_tahun_ajaran" value="{{$tahun->id_tahun_ajaran}}">
                                        <button type="submit" class="btn btn-info waves-effect waves-light">
                                          <i class="mdi mdi-content-save"></i> Simpan
                                         </button>
                                      </div>
                                  </div>
                                </form>
                            </div>
                          </div>
                        </div>
                          <div class="col-xl-6 order-lg-1">
                            <div class="card-box">
                                <h4 class="header-title mt-0 mb-3"><i class="mdi mdi-calendar"></i> Kelas <div class="badge badge-warning">{{$kelas->count() ?? ''}}</div> <div class="badge badge-primary">{{$tahun->periode ?? ''}}|{{$tahun->semester ?? ''}}</div></h4>

                                <div class="table-responsive">
                                  {{$kelas->links()}}
                                  <table class="table table-hover mb-0">
                                      <thead>
                                          <tr>
                                              <th>No</th>
                                              <th>Kelas</th>
                                              <th>Jumlah Siswa</th>
                                              <th>Opsi</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          @forelse ($kelas as $item)
                                          <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->kelas}}</td>
                                            <td>{{$item->jumlah_siswa}}</td>
                                            <td>
                                              <div class="btn-group mb-1">
                                                <button data-toggle="modal" data-target="#edit-{{$item->id_kelas}}" type="button" class="btn btn-warning waves-effect text-dark"><i class="fas fa-edit"></i></button>
                                                  <div id="edit-{{$item->id_kelas}}" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myCenterModalLabel">Edit Data</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                              <div class="card-box">
                                                                <div class="p-2">
                                                                  <form role="form"  action="{{ route('kelas.update',$item->id_kelas) }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group row">
                                                                      <label class="col-md-2 col-form-label" for="simpleinput">Kelas</label>
                                                                      <div class="col-md-10">
                                                                          <input type="text" name="kelas" class="form-control" value="{{$item->kelas}}" placeholder="Masukkan Kelas" maxlength="25" required>
                                                                      </div>
                                                                    </div>
                                
                                                                    <div class="form-group row">
                                                                      <label class="col-md-2 col-form-label" for="simpleinput">Jumlah Siswa</label>
                                                                      <div class="col-md-10">
                                                                          <input type="number" name="jumlah_siswa" class="form-control" value="{{$item->jumlah_siswa}}" placeholder="Masukkan Jumlah Siswa" required>
                                                                      </div>
                                                                    </div>
                                
                                                                    <div class="form-group mb-0 justify-content-start row">
                                                                      <div class="col-sm-9">
                                                                        <input type="hidden" name="id_tahun_ajaran" value="{{$tahun->id_tahun_ajaran}}">
                                                                        <button type="submit" class="btn btn-info waves-effect waves-light">
                                                                          <i class="mdi mdi-content-save"></i> Simpan
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
                                                  <button type="button" data-toggle="modal" data-target="#staticBackdrop-{{$item->id_kelas}}" class="btn btn-danger waves-effect"><i class="fas fa-trash"></i></button>

                                                  <div class="modal fade" id="staticBackdrop-{{$item->id_kelas}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h5 class="modal-title text-white" id="staticBackdropLabel">Yakin Ingin Menghapus Data Kelas {{ $item->kelas }} ?</h5>
                                                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer justify-content-center">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                            <form action="{{ route('kelas.delete',$item->id_kelas) }}"  method="POST" enctype="multipart/form-data">
                                                              @csrf
                                                              @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Ya</button>
                                                          </form>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                          @empty
                                              <tr>
                                                <td colspan="4" class="text-center"> <strong>Belum Ada Data</strong></td>
                                              </tr>
                                          @endforelse
                                      </tbody>
                                  </table>
                                  {{$kelas->links()}}
                              </div>
                            </div>
                          </div>
                          
                      </div>
                      <!-- end row -->
  
                  </div> 
                  <!-- container-fluid -->
@endsection