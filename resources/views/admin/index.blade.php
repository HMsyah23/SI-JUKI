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
                                @forelse ($agenda as $item)
                                <div class="alert alert-info fade show mb-1">
                                  <form action="{{ route('status.agenda',$item->id_agenda) }}"  method="POST" enctype="multipart/form-data">
                                    @csrf
                                  <button type="submit" class="close">×</button>
                                  </form>
                                  <h3 class="alert-heading"> <div class="badge badge-pill badge-purple"><i class="mdi mdi-teach"></i><strong>{{$item->guru->gelar_depan.' '.$item->guru->nama_depan.' '.$item->guru->nama_belakang.', '.$item->guru->gelar_belakang}}</strong></div> </h3>
                                  <p>Telah Mengisi Jurnal Mengajar Hari Ini Tanggal [ <strong>{{$item->created_at->format('d-m-Y')}}</strong> ] Mata Pelajaran <strong>{{$item->mapelGuru->mapel->mata_pelajaran}} | {{$item->mapelGuru->kelas->kelas}}</strong></p>
                                </div>
                                @empty
                                <div class="alert alert-success fade show mb-1">
                                  <h3 class="alert-heading"> <div class="badge badge-pill badge-success"><i class="mdi mdi-teach"></i><strong>Tidak Ada</strong></div> </h3>
                                  <p>Belum Ada Guru Yang Melakukan Pengisian Jurnal Mengajar</p>
                                </div>
                                @endforelse
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
                                              <h1 class="font-weight-bold text-white" data-plugin="counterup">{{$agen->count()}}</h1>
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