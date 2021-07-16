<?php

namespace App\Http\Controllers;

use Session;
use App\Model\Guru;
use App\Model\Agenda;
use App\Model\TahunAjaran;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KegiatanKepsekController extends Controller
{
    public function jurnal(){
        $tahun = $tahun = TahunAjaran::where('status',1)->first();
        $agendas = Agenda::where('id_tahun_ajaran',$tahun->id_tahun_ajaran)->get();
        $agenda  = Agenda::where('id_tahun_ajaran',$tahun->id_tahun_ajaran)->where('created_at',Carbon::now()->timezone('Asia/Singapore')->isoFormat('Y/M/D'))->get();
        return view('kepsek.agenda.index',compact('agenda','agendas','tahun'));
    }

    public function komentar($id){
        $agenda = Agenda::find($id);
        return view('kepsek.agenda.show',compact('agenda'));
    }

    public function komentarStore(Request $r,$id){
        $saran = collect(["komentar" => $r->komentar,"saran" => $r->saran]);
        $agenda = Agenda::find($id);
        $agenda->saran = json_encode($saran);
        $agenda->save();
        Session::flash('success', 'Komentar Dan Saran Berhasil Ditambahkan');
        return redirect()->back();
    }

    public function laporan(){
        $tahun = TahunAjaran::where('status',1)->first();
        $agendas = Agenda::where('id_tahun_ajaran',$tahun->id_tahun_ajaran)->get();
        $agenda  = Agenda::where('id_tahun_ajaran',$tahun->id_tahun_ajaran)->where('created_at',Carbon::now()->timezone('Asia/Singapore')->isoFormat('Y/M/D'))->get()->groupBy('id_guru');
        return view('kepsek.laporan.index',compact('agenda','agendas','tahun'));
    }

    public function laporanDetail($id){
        $tahun = TahunAjaran::where('status',1)->first();
        $agenda = Agenda::find($id);
        $agendas = Agenda::where('created_at',Carbon::now()->timezone('Asia/Singapore')->isoFormat('Y/M/D'))->where('id_guru',$agenda->id_guru)->get();
        $guru = Guru::find($agendas[0]->id_guru);
        return view('kepsek.laporan.show',compact('guru','tahun','agendas'));
    }

    public function laporanSemua($id){
        $tahun = TahunAjaran::where('status',1)->first();
        $agendas = Agenda::where('id_guru',$id)->get();
        $guru = Guru::find($agendas[0]->id_guru);
        return view('kepsek.laporan.semua',compact('guru','tahun','agendas'));
    }
}
