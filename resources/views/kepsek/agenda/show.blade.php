@extends('layouts.app')

@section('title','Dashboard Kepala Sekolah | Detail Jurnal Mengajar Guru')
@section('dashboard','Dashboard Kepala Sekolah | Detail Jurnal Mengajar Guru')
@section('content')
                    <!-- Start Content-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
          <div class="card-box">
              <div class="d-flex align-items-center justify-content-between">
                <h4 class="header-title">Detail Kegiatan Guru <div class="badge badge-purple">{{$agenda->guru->gelar_depan.' '.$agenda->guru->nama_depan.' '.$agenda->guru->nama_belakang.' '.$agenda->guru->gelar_belakang}}</div></h4>
                <a href="{{route('kepsek.jurnal')}}" class="btn btn-secondary btn-rounded w-md waves-effect waves-light mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>      
            </div>
              <div class="row">
                  <div class="col-12">
                    <table class="table table-bordered">
                      <tr>
                        <th colspan="4">Kegiatan Hari {{\Carbon\Carbon::parse($agenda->created_at)->timezone('Asia/Singapore')->isoFormat('dddd, DD MMMM Y')}}</th>
                      </tr>
                      <tr>
                        <th>Guru</th>
                        <td colspan="3">{{$agenda->guru->gelar_depan.' '.$agenda->guru->nama_depan.' '.$agenda->guru->nama_belakang.' '.$agenda->guru->gelar_belakang}}</td>
                      </tr>
                      <tr>
                        <th>Mata Pelajaran</th>
                        <td>{{$agenda->mapelGuru->mapel->mata_pelajaran}}</td>
                        <th>Kelas</th>
                        <td>{{$agenda->mapelGuru->kelas->kelas}}</td>
                      </tr>
                      <tr>
                        <th>Jam Ke</th>
                        <td>{{$agenda->jam}}</td>
                        <th>Absensi</th>
                        <td>{{$agenda->absen}} / {{$agenda->mapelGuru->kelas->jumlah_siswa}} Siswa</td>
                      </tr>
                      <tr>
                        <th colspan="1">Materi</th>
                        <td colspan="3">{!! $agenda->materi !!}</td>
                      </tr>
                      <tr>
                        <th colspan="2">Pemecahan</th>
                        <th colspan="2">Hambatan</th>
                      </tr>
                      <tr>
                        <td colspan="2">{!! $agenda->hambatan !!}</td>
                        <td colspan="2">{!! $agenda->pemecahan !!}</td>
                      </tr>
                      <tr>
                        <th colspan="1">Keterangan</th>
                        <td colspan="3">{!! $agenda->keterangan !!}</td>
                      </tr>
                    </table>


                      <h4 class="text-dark">
                        <strong>Berikan Komentar & Saran :</strong>
                      </h4>
                      <div class="p-2">
                        <form role="form"  action="{{ route('komentar.store',$agenda->id_agenda) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="example-textarea">Komentar</label>
                            <div class="col-md-10">
                                <textarea name="komentar" id="summernote2" class="form-control" rows="2" >{!! json_decode($agenda->saran)->komentar ?? '' !!}</textarea>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="example-textarea">Saran</label>
                            <div class="col-md-10">
                              <textarea name="saran" id="summernote3" class="form-control" rows="2" >{!! json_decode($agenda->saran)->saran ?? '' !!}</textarea>
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
        placeholder: 'Komentar Terkait Kegiatan Hari Ini...',
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
        placeholder: 'Saran Terkait Kegiatan Hari Ini...',
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