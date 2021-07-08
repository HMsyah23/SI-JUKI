@extends('layouts.app')

@section('title','Dashboard Admin')
@section('dashboard','Dashboard Admin')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">
                      <div class="row">
                          <div class="col-xl-6">
                            <div class="card-box">
                                <div class="dropdown float-right">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                    </div>
                                </div>

                                <h4 class="header-title mt-0 mb-3">Informasi Terkini</h4>

                                <div class="alert alert-info fade show mb-1">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                  <h3 class="alert-heading"> <div class="badge badge-pill badge-purple"><i class="mdi mdi-teach"></i><strong>Misri Harini, A.Md</strong></div> </h3>
                                  <p>Telah Mengisi Jurnal Mengajar Hari Ini Tanggal [ <strong>30-06-2021</strong> ] Mata Pelajaran <strong>Bahasa Indonesia</strong></p>
                                </div>

                                <div class="alert alert-info fade show mb-1">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                  <h3 class="alert-heading"> <div class="badge badge-pill badge-purple"><i class="mdi mdi-teach"></i><strong>Darmansyah, SE</strong></div> </h3>
                                  <p>Telah Mengisi Jurnal Mengajar Hari Ini Tanggal [ <strong>30-06-2021</strong> ] Mata Pelajaran <strong>Akuntansi</strong></p>
                                  {{-- <p class="mb-0 pt-1">
                                      <button type="button" class="btn btn-info waves-effect waves-light mr-1">Wanna do this</button>
                                      <button type="button" class="btn btn-light waves-effect">Or do this</button>
                                  </p> --}}
                              </div>
                            </div>
                          </div>
                          <div class="col-xl-6">
                              <div class="card-box">
                                  {{-- <div class="dropdown float-right">
                                      <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                                          aria-expanded="false">
                                          <i class="mdi mdi-dots-vertical"></i>
                                      </a>
                                      <div class="dropdown-menu dropdown-menu-right">
                                          <!-- item-->
                                          <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                          <!-- item-->
                                          <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                          <!-- item-->
                                          <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                          <!-- item-->
                                          <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                      </div>
                                  </div> --}}
  
                                  {{-- <h4 class="header-title mb-3">Inbox</h4> --}}
  
                                  <div class="inbox-widget">
                                    <div class="row">
                                      <div class="col-xl-6 col-lg-6">
                                        <div class="card-box widget-user bg-info">
                                          <div class="text-center">
                                              <h1 class="font-weight-bold text-white" data-plugin="counterup">{{$agenda->count()}}</h1>
                                              <h5 class="text-white"><i class="mdi mdi-calendar"></i> Jurnal Mengajar <br> Hari Ini</h5>
                                          </div>
                                        </div>
                                      </div>
            
                                      <div class="col-xl-6 col-lg-6">
                                        <div class="card-box widget-user bg-success">
                                          <div class="text-center">
                                              <h1 class="font-weight-bold text-white" data-plugin="counterup">{{$agendas->count()}}</h1>
                                              <h5 class="text-white"><i class="mdi mdi-calendar"></i> Semua <br> Jurnal Mengajar</h5>
                                          </div>
                                        </div>
                                      </div>
            
                                      <div class="col-xl-6 col-lg-6">
                                        <div class="card-box widget-user bg-purple">
                                          <div class="text-center">
                                              <h1 class="font-weight-bold text-white" data-plugin="counterup">{{$gurus->count()}}</h1>
                                              <h5 class="text-white"><i class="mdi mdi-account-group"></i> Jumlah Guru</h5>
                                          </div>
                                        </div>
                                      </div>
            
                                      <div class="col-xl-6 col-lg-6">
                                        <div class="card-box widget-user bg-danger">
                                          <div class="text-center">
                                              <h1 class="font-weight-bold text-white" data-plugin="counterup">25</h1>
                                              <h5 class="text-white"><i class="mdi mdi-clipboard-file"></i> File Perangkat</h5>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                          </div><!-- end col -->
                      </div>
                      <!-- end row -->
  
                  </div> 
                  <!-- container-fluid -->
@endsection