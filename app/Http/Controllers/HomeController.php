<?php

namespace App\Http\Controllers;

use Auth;
use App\Model\Agenda;
use App\Model\Guru;
use App\Model\TahunAjaran;
use App\Model\FilePerangkat;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getInformasi(){
        $tahun = $tahun = TahunAjaran::where('status',1)->first();
        if (Auth::user()->role == 0) {
            $agenda  = Agenda::where('id_tahun_ajaran',$tahun->id_tahun_ajaran)->where('created_at',Carbon::now()->timezone('Asia/Singapore')->isoFormat('Y/M/D'))->where('status', 'like', '%"admin":1%')->get();
        } else {
            $agenda  = Agenda::where('id_tahun_ajaran',$tahun->id_tahun_ajaran)->where('created_at',Carbon::now()->timezone('Asia/Singapore')->isoFormat('Y/M/D'))->where('status', 'like', '%"kepsek":1%')->get();
        }
        return view('admin.getInformasi',compact('agenda'));
    }

    public function admin()
    {
        $tahun = $tahun = TahunAjaran::where('status',1)->first();
        $agendas = Agenda::where('id_tahun_ajaran',$tahun->id_tahun_ajaran)->get();
        $gurus   = Guru::all();
        $agen  = Agenda::where('id_tahun_ajaran',$tahun->id_tahun_ajaran)->where('created_at',Carbon::now()->timezone('Asia/Singapore')->isoFormat('Y/M/D'))->get();
        $agenda  = Agenda::where('id_tahun_ajaran',$tahun->id_tahun_ajaran)->where('created_at',Carbon::now()->timezone('Asia/Singapore')->isoFormat('Y/M/D'))->where('status',1)->get();
        $filePerangkats  = FilePerangkat::whereHas('mapelGuru.mapel', function ($query) use($tahun) {
                                    return $query->where('id_tahun_ajaran', $tahun->id_tahun_ajaran);
                            })->get();
        return view('admin.index',compact('agendas','agenda','gurus','agen','filePerangkats','tahun'));
    }

    public function guru()
    {
        $periode = TahunAjaran::where('status',1)->first();
        return view('guru.index',compact('periode'));
    }

    public function agenda($id)
    {
        $agenda = Agenda::find($id);
        $stat = json_decode($agenda->status, true);
        if (Auth::user()->role == 0) {
            $stat['admin'] = 0;
        } else {
            $stat['kepsek'] = 0;
        }
        $agenda->status = json_encode($stat); 
        $agenda->save();
        return redirect()->back();
    }

}
