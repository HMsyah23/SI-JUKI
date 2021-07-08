@extends('layouts.app')

@section('title','Dashboard Admin | Data Mata Pelajaran')
@section('dashboard','Dashboard Admin | Data Mata Pelajaran')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-xl-6 order-lg-2">
                          <div class="card-box">
                              <h4 class="header-title mt-0 mb-3"><i class="mdi mdi-plus"></i>Tambah Mata Pelajaran</h4>

                              <div class="p-2">
                                <form role="form"  action="{{ route('mata-pelajaran.store') }}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                    <div class="form-group row">
                                      <label class="col-md-2 col-form-label" for="simpleinput">Mata Pelajaran</label>
                                      <div class="col-md-10">
                                          <input type="hidden" name="id_tahun_ajaran" value="{{$tahun->id_tahun_ajaran}}">
                                          <input type="text" name="mata_pelajaran" class="form-control" placeholder="Masukkan Mata Pelajaran">
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
                                <h4 class="header-title mt-0 mb-3"><i class="mdi mdi-calendar"></i> Mata Pelajaran <div class="badge badge-warning">{{$mapels->count() ?? ''}}</div> <div class="badge badge-primary">{{$tahun->periode ?? ''}}|{{$tahun->semester ?? ''}}</div></h4>

                                <div class="table-responsive">
                                  {{$mapels->links()}}
                                  <table class="table table-hover mb-0">
                                      <thead>
                                          <tr>
                                              <th>No</th>
                                              <th>Mata Pelajaran</th>
                                              <th>Opsi</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          @forelse ($mapels as $item)
                                          <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->mata_pelajaran}}</td>
                                            <td>
                                              <div class="btn-group mb-1">
                                                <button data-toggle="modal" data-target="#edit-{{$item->id_mapel}}" type="button" class="btn btn-warning waves-effect text-dark"><i class="fas fa-edit"></i></button>
                                                  <div id="edit-{{$item->id_mapel}}" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myCenterModalLabel">Edit Data</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                              <div class="card-box">
                                                                <div class="p-2">
                                                                  <form role="form"  action="{{ route('mata-pelajaran.update',$item->id_mapel) }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group row">
                                                                      <label class="col-md-2 col-form-label" for="simpleinput">Mata Pelajaran</label>
                                                                      <div class="col-md-10">
                                                                          <input type="hidden" name="id_tahun_ajaran" value="{{$tahun->id_tahun_ajaran}}">
                                                                          <input type="text" name="mata_pelajaran" value="{{$item->mata_pelajaran}}" class="form-control" placeholder="Masukkan Mata Pelajaran">
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
                                              <form action="{{ route('mata-pelajaran.delete',$item->id_mapel) }}"  method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger waves-effect"><i class="fas fa-trash"></i></button>
                                                </form>
                                              </div>
                                            </td>
                                        </tr>
                                        <tr>
                                          @empty
                                              <tr>
                                                <td colspan="3" class="text-center"><strong>Belum Ada Data</strong></td>
                                              </tr>
                                          @endforelse
                                      </tbody>
                                  </table>
                                  {{$mapels->links()}}
                              </div>
                            </div>
                          </div>
                          
                      </div>
                      <!-- end row -->
  
                  </div> 
                  <!-- container-fluid -->
@endsection