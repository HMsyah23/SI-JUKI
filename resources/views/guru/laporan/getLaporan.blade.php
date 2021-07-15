<table class="table table-bordered table-bordered dt-responsive nowrap">
  <thead>
  <tr>
      <th>No</th>
      <th>Tanggal</th>
      <th>Materi</th>
      <th>Hambatan</th>
      <th>Pemecahan</th>
      <th>Keterangan</th>
      <th colspan="2">Komentar & Saran</th>
  </tr>
  </thead>
  <tbody>
  @forelse ($agendas as $item)
  <tr>
    <td>{{$loop->iteration}} <a href="{{route('laporan.harian.detail',$item->id_agenda)}}" class="btn btn-sm btn-primary waves-effect"><i class="fas fa-print"></i></a></td>
    <td>{{$item->created_at->isoFormat('dddd, DD MMMM Y')}} <br>
      <strong> Jam : {{$item->jam}}</strong> <br>
      @php
          $presentase = ($item->absen / $item->mapelGuru->kelas->jumlah_siswa) * 100;
      @endphp
      <strong> Jumlah Siswa Hadir :<br> {{$item->absen}} / {{$item->mapelGuru->kelas->jumlah_siswa}} Siswa</strong> 
      @if ($presentase == 100)
        <div class="badge badge-success">{{$presentase}}%</div> 
      @elseif($presentase >= 75 && $presentase  < 100)
        <div class="badge badge-primary">{{$presentase}}%</div> 
      @elseif($presentase >= 60 && $presentase < 74)
        <div class="badge badge-warning">{{$presentase}}%</div> 
      @elseif($presentase >= 0 && $presentase < 59)
        <div class="badge badge-danger">{{$presentase}}%</div> 
      @endif
    </td>
    <td>
      <div class="alert alert-secondary"><strong>{!! $item->materi ?? 'Tidak Ada Materi' !!}</strong></div>
    </td>
    <td>
      <div class="alert alert-secondary">{!! $item->hambatan ?? 'Tidak Ada Hambatan' !!}</div>
    </td>
    <td>
      <div class="alert alert-secondary"><strong>{!! $item->pemecahan ?? 'Tidak Ada Pemecahan' !!}</strong></div>
    </td>
    <td>
      <div class="alert alert-secondary"><strong>{!! $item->keterangan ?? 'Tidak Ada Keterangan' !!}</strong></div>
    </td>
    <td>
      <div class="alert alert-secondary"><strong>{!! json_decode($item->saran)->komentar ?? 'Belum Ada Komentar' !!}</strong></div>
    </td>
    <td>
      <div class="alert alert-secondary"><strong>{!! json_decode($item->saran)->saran ?? 'Belum Ada Saran' !!}</strong></div>
    </td>
</tr>
  @empty
      <tr>
        <th colspan="5" class="text-center">Belum Ada Data</th>
      </tr>
  @endforelse
  </tbody>
</table>