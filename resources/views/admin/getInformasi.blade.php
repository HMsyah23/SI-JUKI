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