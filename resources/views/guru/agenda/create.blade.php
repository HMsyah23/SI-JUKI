@extends('layouts.app')

@section('title','Dashboard Guru | Jurnal Mengajar Guru')
@section('dashboard','Dashboard Guru | Jurnal Mengajar Guru')
@section('content')
                    <!-- Start Content-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
          <div class="card-box">
              <div class="d-flex align-items-center justify-content-between">
                <h4 class="header-title">Tambahkan Data Kegiatan</h4>
                <a href="{{route('guru.jurnal')}}" class="btn btn-secondary btn-rounded w-md waves-effect waves-light mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>      
            </div>
              <p class="sub-header">
                  Kegiatan Hari {{\Carbon\Carbon::now()->timezone('Asia/Singapore')->isoFormat('dddd, DD MMMM Y')}}
              </p>

              <div class="row">
                  <div class="col-12">
                      <div class="p-2">
                        <form role="form"  action="{{ route('guru.jurnal.store') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                            <div class="form-group row">
                              <label class="col-md-2 col-form-label" for="example-date">Tanggal</label>
                              <div class="col-md-10">
                                  <input class="form-control" id="example-date" type="date" name="tanggal" value="{{ \Carbon\Carbon::now()->timezone('Asia/Singapore')->format('Y-m-d') }}" >
                              </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-md-2 col-form-label">Mata Pelajaran</label>
                            <div class="col-md-10">
                                <select name="id_mapel" class="form-control">
                                    @forelse ($mapels as $item)
                                      <option value="{{$item->mapel->id_mapel}}">{{$item->mapel->mata_pelajaran}}</option>
                                    @empty
                                      <option value="null">Tidak Ada</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-md-2 col-form-label">Kelas</label>
                          <div class="col-md-10">
                              <select name="id_kelas" class="form-control">
                                @forelse ($kelas as $item)
                                <option value="{{$item->kelas->id_kelas}}">{{$item->kelas->kelas}}</option>
                              @empty
                                <option value="null">Tidak Ada</option>
                              @endforelse
                              </select>
                          </div>
                      </div>
                        <div class="form-group row">
                          <label class="col-md-2 col-form-label" for="simpleinput">Jam Ke</label>
                          <div class="col-md-10">
                              <input name="jam" type="text" id="simpleinput" class="form-control" placeholder="Masukkan Jam Ke...." required>
                          </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="example-textarea">Materi</label>
                        <div class="col-md-10">
                            <textarea name="materi" id="summernote" class="form-control" rows="2" ></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="example-textarea">Hambatan</label>
                      <div class="col-md-10">
                          <textarea name="hambatan" id="summernote2" class="form-control" rows="2" ></textarea>
                      </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="example-textarea">Pemecahan</label>
                    <div class="col-md-10">
                        <textarea name="pemecahan" id="summernote3" class="form-control" rows="2" ></textarea>
                    </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-2 col-form-label" for="example-number">Absensi Siswa</label>
                  <div class="col-md-10">
                      <input name="absensi" class="form-control" type="number" name="number" placeholder="Masukkan jumlah siswa yang hadir..." max="99" require>
                  </div>
              </div>
              
              <div class="form-group row">
                <label class="col-md-2 col-form-label" for="example-textarea">Keterangan</label>
                <div class="col-md-10">
                    <textarea name="keterangan" class="form-control" rows="2" placeholder="Keterangan Tambahan (Optional)"></textarea>
                </div>
            </div>
            
            <div class="form-group row">
              <div class="col-md-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-purple"> <i class="mdi mdi-content-save"></i> Simpan</button>
              </div>
          </div>

                          </form>
                      </div>
                  </div>

              </div>
              <!-- end row -->

          </div> <!-- end card-box -->
      </div><!-- end col -->
  </div>                  
  </div> 
                  <!-- container-fluid -->
@endsection

@section('css')
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
  <script>
    $('#summernote').summernote({
        placeholder: 'Rincian Materi Hari Ini...',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });

      $('#summernote2').summernote({
        placeholder: 'Hambatan yang terjadi saat melaksanakan materi...',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });

      $('#summernote3').summernote({
        placeholder: 'Pemecahan yang dilakukan...',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
  </script>
@endsection