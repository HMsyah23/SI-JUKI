<?php

namespace App\Http\Controllers;

use Session;
use App\Model\TahunAjaran;
use App\Model\StatusKepegawaian;
use Illuminate\Http\Request;

class StatusKepegawaianController extends Controller
{
    public function index(){
        $tahun = TahunAjaran::where('status',1)->first();
        $kepegawaians = StatusKepegawaian::paginate(10);
        return view('admin.status_kepegawaian.index',compact('kepegawaians','tahun'));
    }

    public function store(Request $r)
    {
        $r->validate([
            'kode' => 'required',
            'nama' => 'required',
        ]);

        if (StatusKepegawaian::where('kode',$r->kode)->where('nama',$r->nama)->first() != NULL) {
            Session::flash('error', 'Terdapat Duplikasi Data');
            return redirect()->back();
        }

        StatusKepegawaian::create([
            'kode' => $r->kode, 
            'nama' => $r->nama, 
        ]);
        
        Session::flash('success', 'Data Status Kepegawaian Berhasil Ditambahkan');
        return redirect()->back();
    }

    public function destroy($id)
    {
        StatusKepegawaian::destroy($id);
        
        Session::flash('success', 'Data Status Kepegawaian Berhasil Dihapus');
        return redirect()->back();
    }

    public function update(Request $r,$id)
    {

        $r->validate([
            'kode' => 'required',
            'nama' => 'required',
        ]);

        $kela = StatusKepegawaian::find($id);

        $kela->kode  = $r->kode;
        $kela->nama  = $r->nama;
        $kela->save();
        
        Session::flash('success', 'Data Status Kepegawaian Berhasil Diperbarui');
        return redirect()->back();
    }
}
