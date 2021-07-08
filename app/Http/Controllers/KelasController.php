<?php

namespace App\Http\Controllers;

use Session;
use App\Model\TahunAjaran;
use App\Model\Kela;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(){
        $tahun = TahunAjaran::where('status',1)->first();
        $kelas = Kela::where('id_tahun_ajaran',$tahun->id_tahun_ajaran)->paginate(10);
        return view('admin.kelas.index',compact('kelas','tahun'));
    }

    public function store(Request $r)
    {
        $r->validate([
            'id_tahun_ajaran' => 'required',
            'kelas' => 'required',
            'jumlah_siswa' => 'required',
        ]);

        if (Kela::where('kelas',$r->kelas)->first() != NULL) {
            Session::flash('error', 'Terdapat Duplikasi Data');
            return redirect()->back();
        }

        Kela::create([
            'id_tahun_ajaran' => $r->id_tahun_ajaran, 
            'kelas' => $r->kelas, 
            'jumlah_siswa' => $r->jumlah_siswa, 
        ]);
        
        Session::flash('success', 'Data Kelas Berhasil Ditambahkan');
        return redirect()->back();
    }

    public function destroy($id)
    {
        Kela::destroy($id);
        
        Session::flash('success', 'Data Kelas Berhasil Dihapus');
        return redirect()->back();
    }

    public function update(Request $r,$id)
    {

        $r->validate([
            'kelas' => 'required',
            'jumlah_siswa' => 'required',
        ]);

        $kela = Kela::find($id);

        $kela->kelas  = $r->kelas;
        $kela->jumlah_siswa  = $r->jumlah_siswa;
        $kela->save();
        
        Session::flash('success', 'Data Kelas Berhasil Diperbarui');
        return redirect()->back();
    }
}
