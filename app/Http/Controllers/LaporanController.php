<?php

namespace App\Http\Controllers;

use PDF;
use App\Model\Agenda;
use App\Model\TahunAjaran;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporanHarian(){
        $periode = TahunAjaran::where('status',1)->first();
        $agenda = Agenda::whereDate('created_at', '=', Carbon::now()->timezone('Asia/Singapore')->isoFormat('Y/M/D'))->get();

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
        $agenda = Agenda::all();

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
}
