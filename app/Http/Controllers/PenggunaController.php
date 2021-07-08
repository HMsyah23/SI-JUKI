<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Model\TahunAjaran;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index(){
        $tahun = TahunAjaran::where('status',1)->first();
        $users = User::all();
        return view('admin.pengguna.index',compact('users','tahun'));
    }

    public function store(Request $r)
    {
        $pass = Hash::make($r->password);

        if(!Hash::check($r->password_confirmation, $pass)) {
            Session::flash('error', 'Kata Sandi Tidak Cocok');
            return redirect()->back();
        }
        $r->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'role' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);

        User::create([
            'name' => $r->name, 
            'email' => $r->email, 
            'role' => $r->role, 
            'password' => $pass, 
        ]);
        
        Session::flash('success', 'Data Pengguna Berhasil Ditambahkan');
        return redirect()->back();
    }

    public function destroy($id)
    {
        User::destroy($id);
        
        Session::flash('success', 'Data Pengguna Berhasil Dihapus');
        return redirect()->back();
    }

    public function update(Request $r,$id)
    {

        $r->validate([
            'users' => 'required',
            'jumlah_siswa' => 'required',
        ]);

        $kela = User::find($id);

        $kela->users  = $r->users;
        $kela->jumlah_siswa  = $r->jumlah_siswa;
        $kela->save();
        
        Session::flash('success', 'Data Pengguna Berhasil Diperbarui');
        return redirect()->back();
    }
}
