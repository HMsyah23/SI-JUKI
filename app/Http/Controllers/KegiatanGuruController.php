<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Model\TahunAjaran;
use App\Model\Agenda;
use App\Model\MapelGuru;
use App\Model\MataPelajaran;
use App\Model\Kela;
use Illuminate\Http\Request;

class KegiatanGuruController extends Controller
{
    private $periode;

    public function __construct()
    {
        $this->periode = TahunAjaran::where('status',1)->first();
    }

    public function mapel() {
        $periode = $this->periode;
        $mapels = MapelGuru::where('id_guru',auth()->user()->guru->id_guru)->get();
        $mapel = MataPelajaran::where('id_tahun_ajaran',$periode->id_tahun_ajaran)->get();
        $kelas  = Kela::where('id_tahun_ajaran',$periode->id_tahun_ajaran)->get();
        return view('guru.mata-pelajaran.index',compact('periode','mapels','mapel','kelas'));
    }

    public function mapelStore(Request $r)
    {
        if (MapelGuru::where('id_guru',auth()->user()->guru->id_guru)->where('id_mapel',$r->mapel)->where('id_kelas',$r->kelas)->first() != NULL) {
            Session::flash('error', 'Terdapat Duplikasi Data');
            return redirect()->back();
        }

        MapelGuru::create([
            'id_guru' => auth()->user()->guru->id_guru,  
            'id_mapel' => $r->mapel,  
            'id_kelas' => $r->kelas,  
        ]);

        Session::flash('success', 'Data Mata Pelajaran Berhasil Ditambahkan');
        return redirect()->back();
    }

    public function mapelDestroy($id)
    {
        MapelGuru::destroy($id);
        
        Session::flash('success', 'Data Mata Pelajaran Berhasil Dihapus');
        return redirect()->back();
    }


    public function jurnal(){
        $agendas = Agenda::all();
        return view('guru.agenda.index',compact('agendas'));
    }

    public function addJurnal(){
        $mapels = MapelGuru::where('id_guru',auth()->user()->guru->id_guru)->distinct()->get('id_mapel');
        $kelas = MapelGuru::where('id_guru',auth()->user()->guru->id_guru)->distinct()->get('id_kelas');
        return view('guru.agenda.create',compact('mapels','kelas'));
    }

    public function jurnalStore(Request $r)
    {
        $r->validate([
            'tanggal' => 'required|date',
            'id_mapel' => 'required',
            'id_kelas' => 'required',
            'jam' => 'required',
            'absensi' => 'required',
        ]);

        $id_mapel_guru = MapelGuru::where('id_guru',auth()->user()->guru->id_guru)
                            ->where('id_mapel',$r->id_mapel)
                            ->where('id_kelas',$r->id_kelas)->first('id_mapel_guru')->id_mapel_guru;
        
        Agenda::create([
            'id_guru' => auth()->user()->guru->id_guru,  
            'id_tahun_ajaran' => $this->periode->id_tahun_ajaran,  
            'id_mapel_guru' => $id_mapel_guru,  
            'jam' => $r->jam,  
            'materi' => $r->materi,  
            'hambatan' => $r->hambatan,  
            'pemecahan' => $r->pemecahan,  
            'absen' => $r->absensi,  
            'keterangan' => $r->keterangan,  
        ]);

        Session::flash('success', 'Jurnal Kegiatan Berhasil Ditambahkan');
        return redirect()->route('guru.jurnal');
    }

    public function jurnalDestroy($id)
    {
        Agenda::destroy($id);
        
        Session::flash('success', 'Jurnal Mengajar Berhasil Dihapus');
        return redirect()->back();
    }

    public function jurnalShow($id)
    {
        $agenda = Agenda::where('id_agenda',$id)->first();
        $mapels = MapelGuru::where('id_guru',auth()->user()->guru->id_guru)->distinct()->get('id_mapel');
        $kelas = MapelGuru::where('id_guru',auth()->user()->guru->id_guru)->distinct()->get('id_kelas');
        return view('guru.agenda.show',compact('agenda','mapels','kelas'));
    }

    public function jurnalUpdate(Request $r,$id)
    {
        $agenda = Agenda::find($id);
        $r->validate([
            'tanggal' => 'required|date',
            'id_mapel' => 'required',
            'id_kelas' => 'required',
            'jam' => 'required',
            'absensi' => 'required',
        ]);

        $id_mapel_guru = MapelGuru::where('id_guru',auth()->user()->guru->id_guru)
                            ->where('id_mapel',$r->id_mapel)
                            ->where('id_kelas',$r->id_kelas)->first('id_mapel_guru')->id_mapel_guru;
        $agenda->id_mapel_guru = $id_mapel_guru;
        $agenda->jam = $r->jam;
        $agenda->materi = $r->materi;
        $agenda->hambatan = $r->hambatan;
        $agenda->pemecahan = $r->pemecahan;
        $agenda->absen = $r->absensi;
        $agenda->keterangan = $r->keterangan;
        $agenda->save();

        Session::flash('success', 'Jurnal Kegiatan Berhasil Diperbarui');
        return redirect()->route('guru.jurnal');
    }
}
