<?php

namespace App\Http\Controllers;

use Session;
use App\Model\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    public function index(){
        $tahuns = TahunAjaran::paginate(10);
        return view('admin.tahun-ajaran.index',compact('tahuns'));
    }

    public function store(Request $r)
    {
        $r->validate([
            'periode' => 'required|max:9',
            'semester' => 'required|max:6',
        ]);

        if (TahunAjaran::where('periode',$r->periode)->where('semester',$r->semester)->first() != NULL) {
            Session::flash('error', 'Terdapat Duplikasi Data');
            return redirect()->back();
        }

        TahunAjaran::create([
            'periode' => $r->periode, 
            'semester' => $r->semester, 
            'status' => 0, 
        ]);
        
        Session::flash('success', 'Data Tahun Ajaran Berhasil Ditambahkan');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $tahun = TahunAjaran::find($id);
        
        if ($tahun->status == 1) {
            Session::flash('error', 'Data Tahun Ajaran Sedang Dalam Status Aktif');
            return redirect()->back();
        }
        if($tahun->agenda != null) {
            Session::flash('error', 'Data Tahun Ajaran Memiliki Relasi Terkait');
            return redirect()->back();
        }
        TahunAjaran::destroy($id);
        
        Session::flash('success', 'Data Tahun Ajaran Berhasil Dihapus');
        return redirect()->back();
    }

    public function status($id)
    {
        TahunAjaran::query()->update(['status' => 0]);

        $tahun = TahunAjaran::find($id);

        $tahun->status = 1;
        $tahun->save();
        
        Session::flash('success', 'Data Tahun Ajaran Berhasil Diaktifkan');
        return redirect()->back();
    }

    public function update(Request $r,$id)
    {

        $r->validate([
            'periode' => 'required|max:9',
            'semester' => 'required|max:6',
        ]);

        $tahun = TahunAjaran::find($id);

        $tahun->periode  = $r->periode;
        $tahun->semester = $r->semester;
        $tahun->save();
        
        Session::flash('success', 'Data Tahun Ajaran Berhasil Diperbarui');
        return redirect()->back();
    }
}
