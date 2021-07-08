@extends('layouts.app')

@section('title','Dashboard Admin | Data Tahun Ajaran')
@section('dashboard','Dashboard Admin | Data Tahun Ajaran')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">
                      <div class="row">
                          <div class="col-xl-6">
                            <div class="card-box">
                                <h4 class="header-title mt-0 mb-3"><i class="mdi mdi-calendar"></i> Tahun Ajaran</h4>

                                <div class="table-responsive">
                                  <table class="table table-hover mb-0">
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
                                          <tr>
                                              <td>1</td>
                                              <td>2018/2019</td>
                                              <td>Ganjil</td>
                                              <td> <div class="badge badge-secondary">Tidak Aktif</div> </td>
                                              <td>
                                                <div class="btn-group mb-1">
                                                  <button type="button" class="btn btn-success waves-effect">Aktifkan</button>
                                                  <button type="button" class="btn btn-warning waves-effect text-dark"><i class="fas fa-edit"></i></button>
                                                  <button type="button" class="btn btn-danger waves-effect"><i class="fas fa-trash"></i></button>
                                                  </div>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>2</td>
                                              <td>2018/2019</td>
                                              <td>Genap</td>
                                              <td> <div class="badge badge-secondary">Tidak Aktif</div> </td>
                                              <td>
                                                <div class="btn-group mb-1">
                                                  <button type="button" class="btn btn-success waves-effect">Aktifkan</button>
                                                  <button type="button" class="btn btn-warning waves-effect text-dark"><i class="fas fa-edit"></i></button>
                                                  <button type="button" class="btn btn-danger waves-effect"><i class="fas fa-trash"></i></button>
                                                  </div>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>3</td>
                                              <td>2019/2020</td>
                                              <td>Ganjil</td>
                                              <td> <div class="badge badge-secondary">Tidak Aktif</div> </td>
                                              <td>
                                                <div class="btn-group mb-1">
                                                  <button type="button" class="btn btn-success waves-effect">Aktifkan</button>
                                                  <button type="button" class="btn btn-warning waves-effect text-dark"><i class="fas fa-edit"></i></button>
                                                  <button type="button" class="btn btn-danger waves-effect"><i class="fas fa-trash"></i></button>
                                                  </div>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>4</td>
                                              <td>2019/2020</td>
                                              <td>Genap</td>
                                              <td> <div class="badge badge-secondary">Tidak Aktif</div> </td>
                                              <td>
                                                <div class="btn-group mb-1">
                                                  <button type="button" class="btn btn-success waves-effect">Aktifkan</button>
                                                  <button type="button" class="btn btn-warning waves-effect text-dark"><i class="fas fa-edit"></i></button>
                                                  <button type="button" class="btn btn-danger waves-effect"><i class="fas fa-trash"></i></button>
                                                  </div>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>5</td>
                                              <td>2020/2021</td>
                                              <td>Ganjil</td>
                                              <td> <div class="badge badge-success">Aktif</div> </td>
                                              <td>
                                                <div class="btn-group mb-1">
                                                  <button type="button" class="btn btn-success waves-effect">Aktifkan</button>
                                                  <button type="button" class="btn btn-warning waves-effect text-dark"><i class="fas fa-edit"></i></button>
                                                  <button type="button" class="btn btn-danger waves-effect"><i class="fas fa-trash"></i></button>
                                                  </div>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>6</td>
                                              <td>2020/2021</td>
                                              <td>Genap</td>
                                              <td> <div class="badge badge-secondary">Tidak Aktif</div> </td>
                                              <td>
                                                <div class="btn-group mb-1">
                                                  <button type="button" class="btn btn-success waves-effect">Aktifkan</button>
                                                  <button type="button" class="btn btn-warning waves-effect text-dark"><i class="fas fa-edit"></i></button>
                                                  <button type="button" class="btn btn-danger waves-effect"><i class="fas fa-trash"></i></button>
                                                  </div>
                                              </td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>
                            </div>
                          </div>
                          <div class="col-xl-6">
                            <div class="card-box">
                                <h4 class="header-title mt-0 mb-3"><i class="mdi mdi-plus"></i>Tambah Tahun Ajaran</h4>

                                <div class="p-2">
                                  <form class="form-horizontal" role="form">
                                      <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="simpleinput">Tahun Ajaran</label>
                                        <div class="col-md-10">
                                            <input type="text" id="simpleinput" class="form-control" placeholder="Masukkan Tahun Ajaran">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-md-2 col-form-label">Semester</label>
                                          <div class="col-md-10">
                                              <select class="form-control">
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
                      </div>
                      <!-- end row -->
  
                  </div> 
                  <!-- container-fluid -->
@endsection