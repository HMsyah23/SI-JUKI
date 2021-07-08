<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Model\TahunAjaran;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index(){
        $tahun = TahunAjaran::where('status',1)->first();
        $users = User::where('role','!=',2)->get();
        $gurus = User::where('role',2)->get();
        return view('admin.pengguna.index',compact('users','gurus','tahun'));
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

        if($r->file('foto') == null)
        {
            $new_name = "default-user.png";
        } else {
            $new_name = date('dmy').rand() . '.jpg';
            $destinationPath = public_path('gurus');
            File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
            $img = Image::make($r->file('foto')->path())->encode('jpg', 75);
            $img->resize(256, 256, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$new_name);
        }

        User::create([
            'name' => $r->name, 
            'email' => $r->email, 
            'role' => $r->role, 
            'password' => $pass, 
            'foto' => $new_name
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
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        $pengguna = User::find($id);

        $pengguna->name  = $r->name;
        $pengguna->email  = $r->email;
        $pengguna->role  = $r->role;
        $pengguna->save();
        
        Session::flash('success', 'Data '. $pengguna->name .' Berhasil Diperbarui');
        return redirect()->back();
    }

    public function show($id){
        $pengguna = User::find($id);
        return view('admin.pengguna.show',compact('pengguna'));
    }

    public function ganti(Request $r,$id)
    {
        $r->validate([
            'password_baru'         => 'required',
        ]);

        $pengguna = User::find($id);

        $pengguna->password  = Hash::make($r->password_baru);
        $pengguna->save();
        
        Session::flash('success', 'Kata Sandi '.$pengguna->name.' Berhasil Diubah');
        return redirect()->back();
    }
}
