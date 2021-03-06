@extends('layouts.app')

@section('title','Dashboard Guru')
@section('dashboard','Dashboard Guru')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">
                      <div class="row">
                          <div class="col-xl-12">
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

                                <h4 class="header-title mt-0 mb-3">Informasi Terkini Hari {{\Carbon\Carbon::now()->isoFormat('dddd, DD MMMM Y')}} <div class="badge badge-primary">{{$periode->periode ?? ''}}|{{$periode->semester ?? ''}}</div></h4>
                                <h3 class="text-center">Sistem Kegiatan Harian Guru</h3>
                                <h4 class="text-center">Tahun Ajaran {{$periode->periode}}</h4>
                                <h5 class="text-center text-muted">Semester {{$periode->semester}}</h5>
                                <hr>
                                <img class="rounded mx-auto d-block" src="{{asset('images/logo-sm.png')}}" alt="">
                                <h4 class="text-center">Nama : {{Auth::user()->guru->gelar_depan}} {{Auth::user()->guru->nama_depan}} {{Auth::user()->guru->nama_belakang}}, {{Auth::user()->guru->gelar_belakang}}</h4>
                                <h4 class="text-center">NIP/NUPTK : {{Auth::user()->guru->nip}}</h4>
                                <hr>
                                <h1 class="text-center">SMP Muhammadiyah 1 Samarinda</h1>
                                <h5 class="text-center">Jl. Pangeran Hidayatullah Gg. Bakti No. 06, Kota Samarinda, Kalimantan Timur</h5>
                                <hr>
                                  <div class="card-box">
                                    <div class="inbox-widget">
                                      <div class="row">
                                        <div class="col-xl-2 offset-xl-2 col-lg-2 offset-lg-2">
                                          <a href="{{route('guru.mapel')}}">
                                            <div class="card-box widget-user bg-info">
                                              <div class="text-center">
                                                  <h1 class="font-weight-bold text-white"> <i class="mdi mdi-book"></i></h1>
                                                  <h5 class="text-white">Mata Pelajaran</h5>
                                              </div>
                                            </div>
                                          </a>
                                        </div>

                                        <div class="col-xl-2 col-lg-2">
                                          <a href="{{route('guru.jurnal')}}">
                                          <div class="card-box widget-user bg-warning">
                                            <div class="text-center">
                                                <h1 class="font-weight-bold text-dark"> <i class="mdi mdi-calendar"></i></h1>
                                                <h5 class="text-dark">Jurnal Mengajar</h5>
                                            </div>
                                          </div>
                                          </a>
                                        </div>
              
                                        <div class="col-xl-2 col-lg-2">
                                          <a href="{{route('guru.berkas')}}">
                                          <div class="card-box widget-user bg-success">
                                            <div class="text-center">
                                                <h1 class="font-weight-bold text-white"><i class="mdi mdi-folder-open"></i></h1>
                                                <h5 class="text-white">File Manager</h5>
                                            </div>
                                          </div>
                                          </a>
                                        </div>
              
                                        {{-- <div class="col-xl-2 col-lg-2">
                                          <div class="card-box widget-user bg-purple">
                                            <div class="text-center">
                                                <h1 class="font-weight-bold text-white"><i class="mdi mdi-calendar"></i></h1>
                                                <h5 class="text-white">Kegiatan Lainnya</h5>
                                            </div>
                                          </div>
                                        </div> --}}
              
                                        <div class="col-xl-2 col-lg-2">
                                          <a href="{{route('guru.laporan')}}">
                                          <div class="card-box widget-user bg-danger">
                                            <div class="text-center">
                                                <h1 class="font-weight-bold text-white"><i class="mdi mdi-file-multiple"></i></h1>
                                                <h5 class="text-white">Laporan Harian</h5>
                                            </div>
                                          </div>
                                          </a>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                      <!-- end row -->
  
                  </div> 
                  <!-- container-fluid -->
@endsection