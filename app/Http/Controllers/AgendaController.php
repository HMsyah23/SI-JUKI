<?php

namespace App\Http\Controllers;

use Session;
use App\Model\TahunAjaran;
use App\Model\Agenda;
use App\Model\Guru;
use App\Model\Jabatan;
use App\User;
use Carbon\Carbon;
use App\Model\StatusKepegawaian;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AgendaController extends Controller
{
    public function index(){
        $tahun = TahunAjaran::where('status',1)->first();
        $agendas = Agenda::where('id_tahun_ajaran',$tahun->id_tahun_ajaran)->get();
        $agendaT = Agenda::where('id_tahun_ajaran',$tahun->id_tahun_ajaran)->whereDate('created_at', '=', Carbon::now()->timezone('Asia/Singapore')->isoFormat('Y/M/D'))->get();
        return view('admin.agenda.index',compact('agendas','agendaT','tahun'));
    }
}
