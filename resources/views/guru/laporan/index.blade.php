@extends('layouts.app')

@section('title','Dashboard Guru | Laporan Kegiatan Harian')
@section('dashboard','Dashboard Guru | Laporan Kegiatan Harian')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-12">
                          <div class="card-box table-responsive">
                            <h4 class="mt-0 header-title">Data Agenda</h4>
                            <div class="d-flex align-items-center justify-content-start">
                              <form action="{{ route('laporan.dariSampai') }}"  method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                  <div class="col-4">
                                    <div class="form-group">
                                      <label>Dari</label>
                                      <input id="periodeSelect" name="dari" type="date" class="form-control" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                                    </div>
                                  </div>
                                  <div class="col-4">
                                    <div class="form-group">
                                      <label>Sampai</label>
                                      <input   id="jenisSelect" name="sampai" type="date" class="form-control" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                                    </div>
                                  </div>
                                  <div class="col-4">
                                    <br>
                                    <button type="submit" class="btn btn-primary waves-effect" ><i class="mdi mdi-printer"></i> Cetak Laporan</button>      
                                  </div>
                                </div>
                            </form>    
                            </div>
                              <div class="col" id="spinner" style="visibility: hidden">
                                  <button type="button" name="btn-enviar" class="btn btn-primary w-100">
                                  <span class="spinner spinner-border spinner-border-sm mr-3" role="status" aria-hidden="true">
                                  </span>Tunggu Sebentar...  Sedang Memproses Data</button>
                                </div>
                              <div id="dataTable"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
                      <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title" id="myCenterModalLabel">Tambah Data</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              </div>
                              <div class="modal-body">
                                  ...
                              </div>
                          </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->
                  </div> 
                  <!-- container-fluid -->
@endsection

@section('css')
  <link href="{{asset('libs/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('libs/datatables/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('libs/datatables/buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('libs/datatables/select.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
    <!-- third party js -->
    <script src="{{asset('libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('libs/datatables/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('libs/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('libs/datatables/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('libs/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('libs/datatables/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('libs/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('libs/datatables/buttons.flash.min.js')}}"></script>
    <script src="{{asset('libs/datatables/buttons.print.min.js')}}"></script>
    <script src="{{asset('libs/datatables/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('libs/datatables/dataTables.select.min.js')}}"></script>
    <script src="{{asset('libs/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('libs/pdfmake/vfs_fonts.js')}}"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{asset('js/pages/datatables.init.js')}}"></script>
    <script>
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              cache: false
          }
      });
    
      function loadDataTable(x,validasi){
          $.ajax({
              url: 'laporan/getLaporan/'+x+'/'+validasi,
              success:function(data){
                  $('#dataTable').html(data);
                  let spinner = document.getElementById("spinner");
                  spinner.style.visibility = 'hidden';
              },
                beforeSend: function(){
                  let spinner = document.getElementById("spinner");
                  spinner.style.visibility = 'visible';
              },
          })
      }
      var id = $('#periodeSelect').val();
      loadDataTable(id,0);
    
      $(document).ready(function(){
      $('#periodeSelect').change(function(){
        var id = $(this).val();
        var valid = $('#jenisSelect').val();
        loadDataTable(id,valid);
      });
      $('#jenisSelect').change(function(){
        var id = $('#periodeSelect').val();
        var valid = $(this).val();
        loadDataTable(id,valid);
      });
    });
    
    </script>
@endsection