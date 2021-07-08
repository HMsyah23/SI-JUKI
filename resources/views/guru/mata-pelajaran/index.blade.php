@extends('layouts.app')

@section('title','Dashboard Guru | Data Mata Pelajaran')
@section('dashboard','Dashboard Guru | Data Mata Pelajaran')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">
                      <div class="row">
                          <div class="col-xl-6">
                            <div class="card-box">
                                <h4 class="header-title mt-0 mb-3"><i class="mdi mdi-calendar"></i> Mata Pelajaran</h4>

                                <div class="table-responsive">
                                  <table class="table table-hover mb-0">
                                      <thead>
                                          <tr>
                                              <th>No</th>
                                              <th>Mata Pelajaran</th>
                                              <th>Jurusan</th>
                                              <th>Tingkat</th>
                                              <th>Opsi</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <td>1</td>
                                              <td>Bahasa Indonesia</td>
                                              <td>SMP/MTs</td>
                                              <td>1</td>
                                              <td>
                                                <div class="btn-group mb-1">
                                                  <button type="button" class="btn btn-warning waves-effect text-dark"><i class="fas fa-edit"></i></button>
                                                  <button type="button" class="btn btn-danger waves-effect"><i class="fas fa-trash"></i></button>
                                                  </div>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>2</td>
                                              <td>Bahasa Inggris</td>
                                              <td>SMP/MTs</td>
                                              <td>1</td>
                                              <td>
                                                <div class="btn-group mb-1">
                                                  <button type="button" class="btn btn-warning waves-effect text-dark"><i class="fas fa-edit"></i></button>
                                                  <button type="button" class="btn btn-danger waves-effect"><i class="fas fa-trash"></i></button>
                                                  </div>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>3</td>
                                              <td>Matematika</td>
                                              <td>SMP/MTs</td>
                                              <td>2</td>
                                              <td>
                                                <div class="btn-group mb-1">
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
                                <h4 class="header-title mt-0 mb-3"><i class="mdi mdi-plus"></i>Tambah Mata Pelajaran</h4>

                                <div class="p-2">
                                  <form class="form-horizontal" role="form">
                                    <div class="form-group row">
                                      <label class="col-md-2 col-form-label">Mata Pelajaran</label>
                                      <div class="col-md-10">
                                          <select class="form-control">
                                              <option>Bahasa Indonesia</option>
                                              <option>Genap</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Jurusan</label>
                                    <div class="col-md-10">
                                        <select class="form-control">
                                            <option>SMP/Mts</option>
                                            <option>Genap</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-md-2 col-form-label">Tingkat</label>
                                  <div class="col-md-10">
                                      <select class="form-control">
                                          <option>1</option>
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