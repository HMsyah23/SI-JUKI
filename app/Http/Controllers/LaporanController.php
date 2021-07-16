<?php

namespace App\Http\Controllers;

use PDF;
use App\Model\Agenda;
use App\Model\Guru;
use App\Model\TahunAjaran;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporanHarian(){
        $periode = TahunAjaran::where('status',1)->first();
        $agenda = Agenda::where('id_tahun_ajaran',$periode->id_tahun_ajaran)->whereDate('created_at', '=', Carbon::now()->timezone('Asia/Singapore')->isoFormat('Y/M/D'))->get();

        $path = 'image/logo-land.jpg';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('laporan.harian',compact('agenda','base64','periode'))
        // ->setOptions(['isPhpEnabled' => true])
        ->setPaper('a4', 'landscape');
        return $pdf->stream();
	}

    public function laporanSemua(){
        $periode = TahunAjaran::where('status',1)->first();
        $agenda = Agenda::where('id_tahun_ajaran',$periode->id_tahun_ajaran)->get();

        $path = 'image/logo-land.jpg';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('laporan.semua',compact('agenda','base64','periode'))
        // ->setOptions(['isPhpEnabled' => true])
        ->setPaper('a4', 'landscape');
        return $pdf->stream();
	}

    public function laporanDetail($id){
        $periode = TahunAjaran::where('status',1)->first();
        $agenda = Agenda::find($id);

        $path = 'image/logo.jpg';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('laporan.detail',compact('agenda','base64','periode'))
        // ->setOptions(['isPhpEnabled' => true])
        ->setPaper('a4', 'portrait');
        return $pdf->stream();
	}

    public function laporanGuru($id){
        $periode = TahunAjaran::where('status',1)->first();
        $guru = Guru::find($id);
        $path = 'image/logo.jpg';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('laporan.guru',compact('guru','base64','periode'))
        // ->setOptions(['isPhpEnabled' => true])
        ->setPaper('a4', 'portrait');
        return $pdf->stream();
	}

    public function laporanDariSampai(Request $r){
        $periode = TahunAjaran::where('status',1)->first();
        $agenda = Agenda::where('id_tahun_ajaran',$periode->id_tahun_ajaran)->whereBetween('created_at', [$r->dari, $r->sampai])->where('id_guru',Auth::user()->guru->id_guru)->get();

        $path = 'image/logo-land.jpg';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('laporan.semua',compact('agenda','base64','periode'))
        // ->setOptions(['isPhpEnabled' => true])
        ->setPaper('a4', 'landscape');
        return $pdf->stream();
	}
}
