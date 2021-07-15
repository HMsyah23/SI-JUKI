<?php

namespace App\Http\Controllers;

use Session;
use App\Model\TahunAjaran;
use App\Model\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    public function index(){
        $tahun = TahunAjaran::where('status',1)->first();
        $mapels = MataPelajaran::where('id_tahun_ajaran',$tahun->id_tahun_ajaran)->paginate(10);
        return view('admin.mata-pelajaran.index',compact('mapels','tahun'));
    }

    public function store(Request $r)
    {
        $r->validate([
            'id_tahun_ajaran' => 'required',
            'mata_pelajaran' => 'required',
        ]);
        if (MataPelajaran::where('mata_pelajaran',$r->mata_pelajaran)->where('id_tahun_ajaran',$r->id_tahun_ajaran)->first() != NULL) {
            Session::flash('error', 'Terdapat Duplikasi Data');
            return redirect()->back();
        }

        MataPelajaran::create([
            'id_tahun_ajaran' => $r->id_tahun_ajaran, 
            'mata_pelajaran' => $r->mata_pelajaran, 
        ]);
        
        Session::flash('success', 'Data Mata Pelajaran Berhasil Ditambahkan');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $mapel = MataPelajaran::find($id);
        if($mapel->mapel != null) {
            Session::flash('error', 'Data Mata Pelajaran Memiliki Relasi Terkait');
            return redirect()->back();
        }

        MataPelajaran::destroy($id);
        
        Session::flash('success', 'Data mata Pelajaran Berhasil Dihapus');
        return redirect()->back();
    }

    public function update(Request $r,$id)
    {

        $r->validate([
            'mata_pelajaran' => 'required',
        ]);

        $mapel = MataPelajaran::find($id);

        $mapel->mata_pelajaran  = $r->mata_pelajaran;
        $mapel->save();
        
        Session::flash('success', 'Data mata Pelajaran Berhasil Diperbarui');
        return redirect()->back();
    }
}
