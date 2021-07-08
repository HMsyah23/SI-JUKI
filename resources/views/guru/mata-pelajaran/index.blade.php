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
                                              <th>Kelas</th>
                                              <th>Jumlah Siswa</th>
                                              <th>Opsi</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          @forelse ($mapels as $item)
                                          <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->mapel->mata_pelajaran}}</td>
                                            <td>{{$item->kelas->kelas}}</td>
                                            <td>{{$item->kelas->jumlah_siswa}}</td>
                                            <td>
                                              <div class="btn-group mb-1">
                                                {{-- <button type="button" class="btn btn-warning waves-effect text-dark"><i class="fas fa-edit"></i></button> --}}
                                                <form action="{{ route('guru.mapel.delete',$item->id_mapel_guru) }}"  method="POST" enctype="multipart/form-data">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" class="btn btn-danger waves-effect"><i class="fas fa-trash"></i></button>
                                                  </form>
                                                </div>
                                            </td>
                                          </tr>
                                          @empty
                                              <tr>
                                                <td colspan="5" class="text-center"><strong>Belum Ada Data</strong></td>
                                              </tr>
                                          @endforelse
                                      </tbody>
                                  </table>
                              </div>
                            </div>
                          </div>
                          <div class="col-xl-6">
                            <div class="card-box">
                                <h4 class="header-title mt-0 mb-3"><i class="mdi mdi-plus"></i>Tambah Mata Pelajaran</h4>

                                <div class="p-2">
                                  <form role="form"  action="{{ route('guru.mapel.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                      <label class="col-md-2 col-form-label">Mata Pelajaran</label>
                                      <div class="col-md-10">
                                          <select name="mapel" class="form-control">
                                            @forelse ($mapel as $item)
                                              <option value="{{$item->id_mapel}}">{{$item->mata_pelajaran}}</option>
                                            @empty
                                              <option value="null">Tidak Ada</option>
                                            @endforelse
                                          </select>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Kelas</label>
                                    <div class="col-md-10">
                                        <select name="kelas" class="form-control">
                                          @forelse ($kelas as $item)
                                            <option value="{{$item->id_kelas}}">{{$item->kelas}}</option>
                                          @empty
                                            <option value="null">Tidak Ada</option>
                                          @endforelse
                                        </select>
                                    </div>
                                </div>

                                      <div class="form-group mb-0 justify-content-start row">
                                        <div class="col-sm-9">
                                          <button type="submit" class="btn btn-info waves-effect waves-light">
                                            <i class="mdi mdi-content-save"></i> Tambahkan
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