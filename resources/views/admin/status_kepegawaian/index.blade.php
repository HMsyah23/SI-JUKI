@extends('layouts.app')

@section('title','Dashboard Admin | Data Status Kepegawaiaan')
@section('dashboard','Dashboard Admin | Data Status Kepegawaiaan')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-xl-6 order-lg-2">
                          <div class="card-box">
                              <h4 class="header-title mt-0 mb-3"><i class="mdi mdi-plus"></i>Tambah Status Kepegawaiaan</h4>

                              <div class="p-2">
                                <form role="form"  action="{{ route('kepegawaian.store') }}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                    <div class="form-group row">
                                      <label class="col-md-2 col-form-label" for="simpleinput">Kode</label>
                                      <div class="col-md-10">
                                          <input type="text" name="kode" class="form-control" placeholder="Masukkan Kode" maxlength="5" required>
                                      </div>
                                    </div>

                                    <div class="form-group row">
                                      <label class="col-md-2 col-form-label" for="simpleinput">Nama</label>
                                      <div class="col-md-10">
                                          <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" maxlength="100" required>
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
                          </div>
                        </div>
                          <div class="col-xl-6 order-lg-1">
                            <div class="card-box">
                                <h4 class="header-title mt-0 mb-3"><i class="mdi mdi-calendar"></i> Status Kepegawaiaan <div class="badge badge-warning">{{$kepegawaians->count() ?? ''}}</div> <div class="badge badge-primary">{{$tahun->periode ?? ''}}|{{$tahun->semester ?? ''}}</div></h4>

                                <div class="table-responsive">
                                  {{$kepegawaians->links()}}
                                  <table class="table table-hover mb-0">
                                      <thead>
                                          <tr>
                                              <th>No</th>
                                              <th>Kode</th>
                                              <th>Nama</th>
                                              <th>Opsi</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          @forelse ($kepegawaians as $item)
                                          <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->kode}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>
                                              <div class="btn-group mb-1">
                                                <button data-toggle="modal" data-target="#edit-{{$item->id_status_kepegawaian}}" type="button" class="btn btn-warning waves-effect text-dark"><i class="fas fa-edit"></i></button>
                                                  <div id="edit-{{$item->id_status_kepegawaian}}" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myCenterModalLabel">Edit Data</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                                                            </div>
                                                            <div class="modal-body">
                                                              <div class="card-box">
                                                                <div class="p-2">
                                                                  <form role="form"  action="{{ route('kepegawaian.update',$item->id_status_kepegawaian) }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group row">
                                                                      <label class="col-md-2 col-form-label" for="simpleinput">Kode</label>
                                                                      <div class="col-md-10">
                                                                          <input type="text" name="kode" class="form-control" value="{{$item->kode}}" placeholder="Masukkan Kode" maxlength="5" required>
                                                                      </div>
                                                                    </div>
                                
                                                                    <div class="form-group row">
                                                                      <label class="col-md-2 col-form-label" for="simpleinput">Nama</label>
                                                                      <div class="col-md-10">
                                                                          <input type="text" name="nama" class="form-control" value="{{$item->nama}}" placeholder="Masukkan Nama" maxlength="100" required>
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
                                                            </div>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                  </div>
                                                  <button type="button" data-toggle="modal" data-target="#staticBackdrop-{{$item->id_status_kepegawaian}}" class="btn btn-danger waves-effect"><i class="fas fa-trash"></i></button>

                                                  <div class="modal fade" id="staticBackdrop-{{$item->id_status_kepegawaian}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h5 class="modal-title text-white" id="staticBackdropLabel">Yakin Ingin Menghapus Data Status Kepegawaian {{ $item->nama }} ?</h5>
                                                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer justify-content-center">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                            <form action="{{ route('kepegawaian.delete',$item->id_status_kepegawaian) }}"  method="POST" enctype="multipart/form-data">
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
                                  {{$kepegawaians->links()}}
                              </div>
                            </div>
                          </div>
                          
                      </div>
                      <!-- end row -->
  
                  </div> 
                  <!-- container-fluid -->
@endsection