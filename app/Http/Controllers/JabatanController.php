<?php

namespace App\Http\Controllers;

use Session;
use App\Model\TahunAjaran;
use App\Model\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index(){
        $tahun = TahunAjaran::where('status',1)->first();
        $jabatans = Jabatan::paginate(10);
        return view('admin.jabatan.index',compact('jabatans','tahun'));
    }

    public function store(Request $r)
    {
        $r->validate([
            'jabatan' => 'required',
        ]);

        if (Jabatan::where('jabatan',$r->jabatan)->first() != NULL) {
            Session::flash('error', 'Terdapat Duplikasi Data');
            return redirect()->back();
        }

        Jabatan::create([
            'jabatan' => $r->jabatan, 
        ]);
        
        Session::flash('success', 'Data Jabatan Berhasil Ditambahkan');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $jabatan = Jabatan::find($id);
        if($jabatan->guru != null) {
            Session::flash('error', 'Data Jabatan Memiliki Relasi Terkait');
            return redirect()->back();
        }
        Jabatan::destroy($id);
        
        Session::flash('success', 'Data Jabatan Berhasil Dihapus');
        return redirect()->back();
    }

    public function update(Request $r,$id)
    {

        $r->validate([
            'jabatan' => 'required',
        ]);

        $jabatan = Jabatan::find($id);

        $jabatan->jabatan  = $r->jabatan;
        $jabatan->save();
        
        Session::flash('success', 'Data Jabatan Berhasil Diperbarui');
        return redirect()->back();
    }
}
