<?php

namespace App\Http\Controllers;

use App\Model\Agenda;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KegiatanKepsekController extends Controller
{
    public function jurnal(){
        $agendas = Agenda::all();
        $agenda  = Agenda::where('created_at',Carbon::now()->timezone('Asia/Singapore')->isoFormat('Y/M/D'))->get();
        return view('kepsek.agenda.index',compact('agenda','agendas'));
    }

    public function laporan(){
        $agendas = Agenda::all();
        $agenda  = Agenda::where('created_at',Carbon::now()->timezone('Asia/Singapore')->isoFormat('Y/M/D'))->get()->groupBy('id_guru');
        return view('kepsek.laporan.index',compact('agenda','agendas'));
    }
}
