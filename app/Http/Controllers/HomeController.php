<?php

namespace App\Http\Controllers;

use App\Model\Agenda;
use App\Model\Guru;
use App\Model\TahunAjaran;
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin()
    {
        $agendas = Agenda::all();
        $gurus   = Guru::all();
        $agen  = Agenda::where('created_at',Carbon::now()->timezone('Asia/Singapore')->isoFormat('Y/M/D'))->get();
        $agenda  = Agenda::where('created_at',Carbon::now()->timezone('Asia/Singapore')->isoFormat('Y/M/D'))->where('status',1)->get();
        return view('admin.index',compact('agendas','agenda','gurus','agen'));
    }

    public function guru()
    {
        $periode = TahunAjaran::where('status',1)->first();
        return view('guru.index',compact('periode'));
    }

    public function agenda($id)
    {
        $agenda = Agenda::find($id);
        $agenda->status = 0;
        $agenda->save();
        return redirect()->back();
    }

}
