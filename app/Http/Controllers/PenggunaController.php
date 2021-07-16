<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use App\Model\Guru;
use App\Model\Agenda;
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
        $user = User::find($id);
        if($user->role == 1){}
        else{
            $guru = Guru::where('id_user',$id)->first();
            if (Agenda::where('id_guru',$guru->id_guru)->exists()) {
                Session::flash('error', 'Data Pengguna Gagal Dihapus, Terdapat Data Yang Terkait dengan guru terkait pada akun ini');
                return redirect()->back();
                $guru->delete();
            }
        }
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

    public function perbarui(Request $r,$id)
    {

        if ($r->role == 2) {
            $r->validate([
                'gelar_depan'    => 'required',
                'nama_depan'     => 'required',
                'nama_belakang'  => 'required',
                'gelar_belakang' => 'required',
                'email' => 'required',
                'alamat' => 'required',
            ]);

    
            $user = User::find($id);
            $user->email          = $r->email;
            $user->name           = $r->nama_depan;

            $guru     = Guru::find($user->guru->id_guru);            
            $guru->gelar_depan    = $r->gelar_depan;
            $guru->nama_depan     = $r->nama_depan;
            $guru->nama_belakang  = $r->nama_belakang;
            $guru->gelar_belakang = $r->gelar_belakang;
            $guru->jenis_kelamin  = $r->jenis_kelamin;
            $guru->tanggal_lahir  = $r->tanggal_lahir;
            $guru->alamat  = $r->alamat;

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
                $guru->foto = $new_name;
                $user->foto = $new_name;
            }
            
            $guru->save();
            $user->save();

        } elseif (($r->role == 1) || ($r->role == 0)) {
                $r->validate([
                    'name'     => 'required',
                    'email' => 'required',
                ]);
    
                $user = User::find($id);
                $user->email          = $r->email;
                $user->name           = $r->name;
    
                if($r->file('foto') == null){
                    $new_name = "default-user.png";
                } else {
                    $new_name = date('dmy').rand() . '.jpg';
                    $destinationPath = public_path('gurus');
                    File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
                    $img = Image::make($r->file('foto')->path())->encode('jpg', 75);
                    $img->resize(256, 256, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath.'/'.$new_name);
                    $user->foto = $new_name;
                }
                
                $user->save();
    }
        
        Session::flash('success', 'Data '.$user->name.' Berhasil Diubah');
        return redirect()->back();
    }
}
