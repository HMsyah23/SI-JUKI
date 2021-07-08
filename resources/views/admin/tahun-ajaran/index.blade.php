@extends('layouts.app')

@section('title','Dashboard Admin | Data Tahun Ajaran')
@section('dashboard','Dashboard Admin | Data Tahun Ajaran')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-xl-5 order-lg-2">
                          <div class="card-box">
                              <h4 class="header-title mt-0 mb-3"><i class="mdi mdi-plus"></i>Tambah Tahun Ajaran</h4>

                              <div class="p-2">
                                <form role="form"  action="{{ route('tahun-ajaran.store') }}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                    <div class="form-group row">
                                      <label class="col-md-3 col-form-label" for="periode">Tahun Ajaran</label>
                                      <div class="col-md-9">
                                          <input type="text" name="periode" class="form-control" placeholder="Masukkan Tahun Ajaran" required maxlength="9">
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Semester</label>
                                        <div class="col-md-9">
                                            <select name="semester" class="form-control">
                                                <option>Ganjil</option>
                                                <option>Genap</option>
                                            </select>
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
                          <div class="col-xl-7 order-lg-1">
                            <div class="card-box">
                                <h4 class="header-title mt-0 mb-3"><i class="mdi mdi-calendar"></i> Tahun Ajaran <div class="badge badge-success"> {{$tahuns->count()}} </div> </h4>

                                <div class="table-responsive">
                                  {{$tahuns->links()}}
                                  <table id="datatable" class="table table-hover mb-0">
                                      <thead>
                                          <tr>
                                              <th>No</th>
                                              <th>Tahun Ajaran</th>
                                              <th>Semester</th>
                                              <th>Status</th>
                                              <th>Opsi</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          @forelse ($tahuns as $item)
                                          <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->periode }}</td>
                                            <td>{{ $item->semester }}</td>
                                            <td>
                                              @if ($item->status == 1)
                                                <div class="badge badge-success">Aktif</div> 
                                              @else
                                                <div class="badge badge-secondary">Tidak Aktif</div>     
                                              @endif 
                                            </td>
                                            <td>
                                              <div class="btn-group mb-1">
                                                @if ($item->status == 1)
                                                  <button type="button" class="btn btn-secondary waves-effect">Aktifkan</button>
                                                @else
                                                <form action="{{ route('tahun-ajaran.status',$item->id_tahun_ajaran) }}"  method="POST" enctype="multipart/form-data">
                                                  @csrf
                                                  <button type="submit" class="btn btn-success waves-effect">Aktifkan</button>
                                                </form>
                                                @endif
                                                  <button data-toggle="modal" data-target="#edit-{{$item->id_tahun_ajaran}}" type="button" class="btn btn-warning waves-effect text-dark"><i class="fas fa-edit"></i></button>
                                                  <div id="edit-{{$item->id_tahun_ajaran}}" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myCenterModalLabel">Edit Data</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                              <div class="card-box">
                                                                <div class="p-2">
                                                                  <form role="form"  action="{{ route('tahun-ajaran.update',$item->id_tahun_ajaran) }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                      <div class="form-group row">
                                                                        <label class="col-md-2 col-form-label" for="periode">Tahun Ajaran</label>
                                                                        <div class="col-md-10">
                                                                            <input type="text" name="periode" class="form-control" value="{{$item->periode}}" placeholder="Masukkan Tahun Ajaran" required maxlength="9">
                                                                        </div>
                                                                      </div>
                                                                      <div class="form-group row">
                                                                          <label class="col-md-2 col-form-label">Semester</label>
                                                                          <div class="col-md-10">
                                                                              <select name="semester" class="form-control">
                                                                                <option @if ($item->semester == "Ganjil") selected @endif>Ganjil</option>
                                                                                <option @if ($item->semester == "Genap") selected @endif>Genap</option>
                                                                              </select>
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
                                                </div><!-- /.modal -->
                                                  <form action="{{ route('tahun-ajaran.delete',$item->id_tahun_ajaran) }}"  method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger waves-effect"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                          @empty
                                          <tr>
                                            <td colspan="5" class="text-center"> <strong>Belum Ada Data</strong> </td>
                                          </tr> 
                                          @endforelse
                                      </tbody>
                                  </table>
                                  {{$tahuns->links()}}
                              </div>
                            </div>
                          </div>
                      </div>
                      <!-- end row -->
  
                  </div> 
                  <!-- container-fluid -->
@endsection