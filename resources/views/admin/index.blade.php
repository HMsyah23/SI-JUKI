@extends('layouts.app')

@section('title','Dashboard Admin')
@section('dashboard','Dashboard Admin')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">
                      <div class="row">
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

                                <h4 class="header-title mt-0 mb-3">Informasi Terkini <div class="badge badge-primary">{{$tahun->periode ?? ''}}|{{$tahun->semester ?? ''}}</div></h4>
                                <div id="informasiTerkini"></div>
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
                                              <h1 class="font-weight-bold text-white" data-plugin="counterup">{{$filePerangkats->count()}}</h1>
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

@section('js')
  <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            cache: false
        }
    });

    
    function loadDataInformasi(){
        $.ajax({
            url: 'getInformasiTerkini',
            success:function(data){
                $('#informasiTerkini').html(data);
                // let spinner = document.getElementById("spinner");
                // spinner.style.visibility = 'hidden';
            },
              beforeSend: function(){
                // let spinner = document.getElementById("spinner");
                // spinner.style.visibility = 'visible';
            },
        })
    }

    loadDataInformasi();

    $(document).ready(function(){
    $('#barangSelect').change(function(){
      var id = $(this).val();
      let periode = $('#periodeSelect').val();
      loadDataInformasi();
    });
    $('#periodeSelect').change(function(){
      var id = $('#barangSelect').val();
      let periode = $(this).val();
      loadDataInformasi();
    });
  });

  </script>
@endsection