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
        $agenda  = Agenda::where('created_at',Carbon::today())->get();
        return view('admin.index',compact('agendas','agenda','gurus'));
    }

    public function guru()
    {
        $periode = TahunAjaran::where('status',1)->first();
        return view('guru.index',compact('periode'));
    }

}
