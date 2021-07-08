@extends('layouts.app')

@section('title','Dashboard Admin | History Agenda')
@section('dashboard','Dashboard Admin | History Agenda')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-12">
                            <div class="card-box table-responsive">
                              <div class="d-flex align-items-center justify-content-between">
                                  <h4 class="mt-0 header-title">History Agenda</h4>
                                  {{-- <button type="button" class="btn btn-purple btn-rounded w-md waves-effect waves-light mb-3" data-toggle="modal" data-target=".bs-example-modal-center" ><i class="mdi mdi-plus"></i> Tambah Data</button>       --}}
                              </div>
                              <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a href="#home1" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">History Agenda Hari Ini</span>            
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#profile1" data-toggle="tab" aria-expanded="true" class="nav-link">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">Semua Agenda</span> 
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="home1">
                                  <table id="responsive-datatable1" class="table table-bordered table-bordered dt-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Materi</th>
                                        <th>Absen</th>
                                        <th>Keterangan</th>
                                        <th>Opsi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>30-06-2021</td>
                                        <td>Bahasa Indonesia</td>
                                        <td>
                                          <p>Pertemuan Pertama :
                                            <ol>
                                              <li>Pengenalan Kalimat Imbuhan</li>
                                              <li>Belajar Membaut Pantun</li>
                                            </ol>
                                          </p>
                                        </td>
                                        <td>
                                          40 Siswa
                                        </td>
                                        <td>
                                          Seluruh Siswa Hadir
                                        </td>
                                        <td>
                                          <div class="btn-group mb-1">
                                            {{-- <button type="button" class="btn btn-primary waves-effect"><i class="fas fa-eye"></i> Lihat</button> --}}
                                            <button type="button" class="btn btn-warning text-dark waves-effect"><i class="fas fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger waves-effect"><i class="fas fa-trash"></i></button>
                                          </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="profile1">
                                  <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Materi</th>
                                        <th>Absen</th>
                                        <th>Keterangan</th>
                                        <th>Opsi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>30-06-2021</td>
                                        <td>Bahasa Indonesia</td>
                                        <td>
                                          <p>Pertemuan Pertama :
                                            <ol>
                                              <li>Pengenalan Kalimat Imbuhan</li>
                                              <li>Belajar Membaut Pantun</li>
                                            </ol>
                                          </p>
                                        </td>
                                        <td>
                                          40 Siswa
                                        </td>
                                        <td>
                                          Seluruh Siswa Hadir
                                        </td>
                                        <td>
                                          <div class="btn-group mb-1">
                                            {{-- <button type="button" class="btn btn-primary waves-effect"><i class="fas fa-eye"></i> Lihat</button> --}}
                                            <button type="button" class="btn btn-warning text-dark waves-effect"><i class="fas fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger waves-effect"><i class="fas fa-trash"></i></button>
                                          </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="messages1">
                                    <p class="mb-0">Etsy mixtape wayfarers, ethical
                                        wes anderson tofu before they sold out mcsweeney's organic lomo
                                        retro fanny pack lo-fi farm-to-table readymade. Messenger bag
                                        gentrify pitchfork tattooed craft beer, iphone skateboard locavore
                                        carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy
                                        irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg
                                        banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy
                                        retro mlkshk vice blog. Scenester cred you probably haven't heard of
                                        them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu
                                        synth chambray yr.</p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="settings1">
                                    <p class="mb-0">Trust fund seitan letterpress,
                                        keytar raw denim keffiyeh etsy art party before they sold out master
                                        cleanse gluten-free squid scenester freegan cosby sweater. Fanny
                                        pack portland seitan DIY, art party locavore wolf cliche high life
                                        echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before
                                        they sold out farm-to-table VHS viral locavore cosby sweater. Lomo
                                        wolf viral, mustache readymade thundercats keffiyeh craft beer marfa
                                        ethical. Wolf salvia freegan, sartorial keffiyeh echo park
                                        vegan.</p>
                                </div>
                            </div>
                                
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

@push('css')
  <link href="{{asset('libs/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('libs/datatables/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('libs/datatables/buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('libs/datatables/select.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
@endpush

@push('js')
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
@endpush