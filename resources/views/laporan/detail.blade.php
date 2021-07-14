<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Harian {{\Carbon\Carbon::now()->isoFormat('DD/MM/Y')}} </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>
<body>
  <style>
    #header,
    #footer {
      position: fixed;
      left: 0;
        right: 0;
        color: #aaa;
        font-size: 0.9em;
    }
    #header {
      top: 0;
        border-bottom: 0.1pt solid #aaa;
    }
    #footer {
      bottom: 0;
      border-top: 0.1pt solid #aaa;
    }
    .page-number:before {
        text-align: center;
        float: right;
        color: black;
      content: "SMP Muhammadiyah 1 Samarinda | Hal " counter(page);
    }

    .page-break {
        page-break-after: always;
    }

    h1 {
        font-size: 40px;
    }

    h2 {
        font-size: 30px;
    }

    p {
        font-size: 8px;
        line-height:0%;
    }

    td{
      font-size: 10px;
      text-align: center;
      vertical-align: middle;
    }

    th{
      text-align: center;
      font-size: 12px;
      height:2px;
    }
    .table > tbody > tr > td {
     vertical-align: middle;
    }
    </style>
<div>
  <div id="footer">
    <div class="page-number"></div>
  </div>
  <img src="{{$base64}}" width="100%" height="140"/>
  <table class="table table-sm table-borderless" style="line-height: 1">
    <tr>
      <th colspan="7">
        <strong style="font-size:18px;">Jurnal Mengajar Guru</strong>
      </th>
    </tr>
    <tr>
      <th colspan="7">
        <strong style="font-size:18px;">Tahun Pelajaran {{$periode->periode}}</strong>
      </th>
    </tr>
    <th colspan="7">
      <strong style="font-size:18px;">Semester {{$periode->semester}}</strong>
    </th>
  </tr>
  </table>
  <table class="table table-bordered">
    <tr>
      <th class="bg-light" colspan="4">Kegiatan Hari {{\Carbon\Carbon::parse($agenda->created_at)->timezone('Asia/Singapore')->isoFormat('dddd, DD MMMM Y')}}</th>
    </tr>
    <tr>
      <th>Guru</th>
      <td colspan="3"><strong>{{$agenda->guru->gelar_depan.' '.$agenda->guru->nama_depan.' '.$agenda->guru->nama_belakang.' '.$agenda->guru->gelar_belakang}}</strong></td>
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
    <tr>
      <th colspan="4" class="bg-light">
        Komentar dan Saran dari Kepsek
      </th>
    </tr>
    <tr>
      <th colspan="1">Komentar</th>
      <td colspan="3">{!! json_decode($agenda->saran)->komentar ?? "Tidak Ada" !!}</td>
    </tr>
    <tr>
      <th colspan="1">Saran</th>
      <td colspan="3">{!! json_decode($agenda->saran)->saran ?? "Tidak Ada" !!}</td>
    </tr>
  </table>

  <div style="text-align: left; position: absolute; right: 0; font-size:12px;">
    <span>Ditetapkan        : Di Samarinda </span> <br>
    <span>Pada Tanggal  : {{\Carbon\Carbon::now()->isoFormat('D MMMM Y')}}</span><br>
    <span>Kepala Sekolah,</span>
    <br>
    <br>
    <br>
    <br>
    <span><u>...........................................</u><br>NIP. <u>......................</u></span>
  </div>
</div>
<script src="{{url('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>