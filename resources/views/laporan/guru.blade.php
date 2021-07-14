<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Guru </title>
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
  <div class="col-12">
    <label>Informasi Guru</label>
    <table class="table table-bordered table-sm text-left">
      <thead>
        <tr>
          <th>NBM</th>
          <td>{{$guru->nbm}}</td>
          <th rowspan="7" class="text-center">
            <img src="{{url('gurus/'.$guru->foto)}}" style="width: 20%;" alt="">
          </th>
        </tr>
        <tr>
          <th>NIP</th>
          <td>{{$guru->nip}}</td>
        </tr>
        <tr>
          <th>Nama</th>
          <td>{{$guru->gelar_depan.' '.$guru->nama_depan.' '.$guru->nama_belakang.' '.$guru->gelar_belakang}}</td>
        </tr>
        <tr>
          <th>Jabatan</th>
          <td>{{$guru->jabatan->jabatan}}</td>
        </tr>
        <tr>
          <th>Status Kepegawaian</th>
          <td>{{$guru->status->nama}} ({{$guru->status->kode}})</th>
        </tr>
        <tr>
          <th>Golongan</th>
          <td>{{$guru->golongan}}</td>
        </tr>
        <tr>
          <th>Email</th>
          <td>{{$guru->email}}</td>
        </tr>
      </thead>
    </table>
    <label>Informasi Pribadi</label>
    <table class="table  table-bordered table-sm text-left">
      <thead>
        <tr>
          <th>Jenis Kelamin</th>
          <td>
            @if ($guru->jenis_kelamin == 1)
                Pria
            @else
                Wanita
            @endif
          </td>
          <th>Agama</th>
          <td>{{$guru->agama}}</td>
        </tr>
        <tr>
          <th>Tanggal Lahir</th>
          <td>{{\Carbon\Carbon::parse($guru->tanggal_lahir)->isoFormat(' dddd, DD MMMM Y')}}</td>
          <th>Usia</th>
          <td>{{\Carbon\Carbon::parse($guru->tanggal_lahir)->diffInYears(\Carbon\Carbon::now())}}</td>
        </tr>
        <tr>
          <th>Universitas</th>
          <td colspan="3">{{$guru->universitas}}</td>
        </tr>
        <tr>
          <th>Jenjang</th>
          <td>{{$guru->jenjang}}</td>
          <th>Jurusan</th>
          <td>{{$guru->jurusan}}</td>
        </tr>
        <tr>
          <th>Tanggal Lulus</th>
          <td colspan="3">{{\Carbon\Carbon::parse($guru->tanggal_lulus)->isoFormat(' dddd, DD MMMM Y')}}</td>
        </tr>
        <tr class="text-left">
          <th colspan="4">Alamat</th>
        </tr>
        <tr class="text-center">
          <td colspan="4">
            {{$guru->alamat}}
          </td>
        </tr>
      </thead>
    </table>
  </div>
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