@extends('layouts.app')

@section('title','Dashboard Admin | Data Jabatan')
@section('dashboard','Dashboard Admin | Data Jabatan')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-xl-6 order-lg-2">
                          <div class="card-box">
                              <h4 class="header-title mt-0 mb-3"><i class="mdi mdi-plus"></i>Tambah Jabatan</h4>

                              <div class="p-2">
                                <form role="form"  action="{{ route('jabatan.store') }}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                    <div class="form-group row">
                                      <label class="col-md-2 col-form-label" for="simpleinput">Jabatan</label>
                                      <div class="col-md-10">
                                          <input type="text" name="jabatan" class="form-control" placeholder="Masukkan Jabatan" maxlength="100" required>
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
                                <h4 class="header-title mt-0 mb-3"><i class="mdi mdi-calendar"></i> Jabatan <div class="badge badge-warning">{{$jabatans->count() ?? ''}}</div> <div class="badge badge-primary">{{$tahun->periode ?? ''}}|{{$tahun->semester ?? ''}}</div></h4>

                                <div class="table-responsive">
                                  {{$jabatans->links()}}
                                  <table class="table table-hover mb-0">
                                      <thead>
                                          <tr>
                                              <th>No</th>
                                              <th>Jabatan</th>
                                              <th>Opsi</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          @forelse ($jabatans as $item)
                                          <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->jabatan}}</td>
                                            <td>
                                              <div class="btn-group mb-1">
                                                <button data-toggle="modal" data-target="#edit-{{$item->id_jabatan}}" type="button" class="btn btn-warning waves-effect text-dark"><i class="fas fa-edit"></i></button>
                                                  <div id="edit-{{$item->id_jabatan}}" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myCenterModalLabel">Edit Data</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                              <div class="card-box">
                                                                <div class="p-2">
                                                                  <form role="form"  action="{{ route('jabatan.update',$item->id_jabatan) }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group row">
                                                                      <label class="col-md-2 col-form-label" for="simpleinput">Jabatan</label>
                                                                      <div class="col-md-10">
                                                                          <input type="text" name="jabatan" class="form-control" value="{{$item->jabatan}}" placeholder="Masukkan Jabatan" maxlength="100" required>
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
                                                <form action="{{ route('jabatan.delete',$item->id_jabatan) }}"  method="POST" enctype="multipart/form-data">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" class="btn btn-danger waves-effect"><i class="fas fa-trash"></i></button>
                                                  </form>
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
                                  {{$jabatans->links()}}
                              </div>
                            </div>
                          </div>
                          
                      </div>
                      <!-- end row -->
  
                  </div> 
                  <!-- container-fluid -->
@endsection