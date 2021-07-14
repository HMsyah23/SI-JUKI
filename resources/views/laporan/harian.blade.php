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
  <table class="table table-sm table-borderless" style="line-height: 0.5">
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
  </table>
  <table class="text-left">
    <tr>
      <td><strong>Semester</strong> 
      </td>
      <td><strong>: {{$periode->semester}}</strong></td>
    </tr>
    <tr>
      <td><strong>Hari</strong></td>
      <td><strong>: {{\Carbon\Carbon::now()->timezone('Asia/Singapore')->isoFormat('dddd, DD MMMM Y')}}</strong></td>
    </tr>
    
  </table>
  <table class="table table-bordered dt-responsive table-responsive-sm nowrap" style="width:100%;">
    <thead>
    <tr>
        <th style="height:2px; width:5%; font-size:10px;">No</th>
        <th style="width:13%; font-size:10px;">Pengajar</th>
        <th style="width:10%; font-size:10px;">Mata Pelajaran</th>
        <th style="width:10%; font-size:10px;">Kelas</th>
        <th style="width:10%; font-size:10px;">Jam Ke</th>
        <th style="width:10%; font-size:10px;">Materi</th>
        <th style="width:10%; font-size:10px;">Hambatan</th>
        <th style="width:10%; font-size:10px;">Pemecahan</th>
        <th style="width:10%; font-size:10px;">Absen</th>
        <th style="width:10%; font-size:10px;">Keterangan</th>
    </tr>
    </thead>
    <tbody>
      @forelse ($agenda as $item)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td style="font-size:8px;"><strong>{{$item->guru->gelar_depan.' '.$item->guru->nama_depan.' '.$item->guru->nama_belakang.' '.$item->guru->gelar_belakang}}</strong> </td>
        <td style="font-size:8px;">
          <strong>{{$item->mapelGuru->mapel->mata_pelajaran}}</strong>
        </td>
        <td style="font-size:8px;">
         <strong>{{$item->mapelGuru->kelas->kelas}}</strong> 
        </td>
        <td style="font-size:8px;">
          <strong>{{$item->jam}}</strong>
        </td>
        <td style="font-size:8px;">
          {!! $item->materi !!}
        </td>
        <td style="font-size:8px;">
          {!! $item->hambatan !!}
        </td>
        <td style="font-size:8px;">
          {!! $item->pemecahan !!}
        </td>
        <td style="font-size:8px;">
          {{$item->absen}} / {{$item->mapelGuru->kelas->jumlah_siswa}} Siswa <br>
        </td>
        <td style="font-size:8px;">
          {!! $item->keterangan !!}
        </td>
    </tr>
      @empty
          <tr>
            <td colspan="10" class="text-center">
              Belum ada Data
            </td>
          </tr>
      @endforelse
    </tbody>
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