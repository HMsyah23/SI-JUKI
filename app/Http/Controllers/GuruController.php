<?php

namespace App\Http\Controllers;

use Session;
use App\Model\TahunAjaran;
use App\Model\Agenda;
use App\Model\Guru;
use App\Model\Jabatan;
use App\User;
use App\Model\StatusKepegawaian;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class GuruController extends Controller
{
    public function index(){
        $tahun = TahunAjaran::where('status',1)->first();
        $gurus = Guru::paginate(10);
        $jabatans = Jabatan::all();
        $status_pegawai = StatusKepegawaian::all();
        return view('admin.guru.index',compact('gurus','tahun','status_pegawai','jabatans'));
    }

    public function store(Request $r)
    {
        
        $r->validate([
            'id_jabatan' => 'required',
            'id_kepegawaian' => 'required',
            'nbm' => 'required|numeric',
            'nip' => 'required|numeric',
            // 'gelar_depan' => 'required',
            // 'gelar_belakang' => 'required',
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required|unique:users,email',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'tanggal_lulus' => 'required',
            'universitas' => 'required',
            'jenjang' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
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

        // dd($r->all());
        
        $user = User::create([ 
            'name' => $r->nama_depan, 
            'role' => 2, 
            'email' => $r->email,  
            'password' => Hash::make('password'),
            'foto' => $new_name,
        ]);

        Guru::create([
            'id_user' => $user->id_user, 
            'id_kepegawaian' => $r->id_kepegawaian, 
            'id_jabatan' => $r->id_jabatan, 
            'nama_depan' => $r->nama_depan, 
            'nama_belakang' => $r->nama_belakang, 
            'gelar_depan' => $r->gelar_depan, 
            'gelar_belakang' => $r->gelar_belakang, 
            'jenis_kelamin' => $r->jenis_kelamin, 
            'nbm' => $r->nbm, 
            'nip' => $r->nip, 
            'golongan' => $r->golongan, 
            'agama' => $r->agama, 
            'tanggal_lulus' => $r->tanggal_lulus, 
            'tanggal_lahir' => $r->tanggal_lahir, 
            'email' => $r->email, 
            'universitas' => $r->universitas, 
            'jenjang' => $r->jenjang, 
            'jurusan' => $r->jurusan, 
            'alamat' => $r->alamat, 
            'foto' => $new_name, 
        ]);
        
        Session::flash('success', 'Data Guru Berhasil Ditambahkan');
        return redirect()->back();
    }

    public function show($id){
        $tahun = TahunAjaran::where('status',1)->first();
        $guru = Guru::find($id);
        $jabatans = Jabatan::all();
        $status_pegawai = StatusKepegawaian::all();
        return view('admin.guru.show',compact('guru','tahun','status_pegawai','jabatans'));
    }

    public function destroy($id)
    {
        if (Agenda::where('id_guru',$id)->exists()) {
            Session::flash('error', 'Data Guru Gagal Dihapus, Terdapat Data Yang Terkait dengan guru terkait');
            return redirect()->back();
        }
        User::destroy(Guru::find($id)->id_user);
        Guru::destroy($id);
        
        Session::flash('success', 'Data Guru Berhasil Dihapus');
        return redirect()->back();
    }

    public function update(Request $r,$id)
    {
        $guru = Guru::find($id);
        $r->validate([
            'id_jabatan' => 'required',
            'id_kepegawaian' => 'required',
            'nbm' => 'required|numeric',
            'nip' => 'required|numeric',
            // 'gelar_depan' => 'required',
            // 'gelar_belakang' => 'required',
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'tanggal_lulus' => 'required',
            'universitas' => 'required',
            'jenjang' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
        ]);

        $guru->id_kepegawaian  = $r->id_kepegawaian;
        $guru->id_jabatan  = $r->id_jabatan;
        $guru->nama_depan  = $r->nama_depan;
        $guru->nama_belakang  = $r->nama_belakang;
        $guru->gelar_depan  = $r->gelar_depan;
        $guru->gelar_belakang  = $r->gelar_belakang;
        $guru->jenis_kelamin  = $r->jenis_kelamin;
        $guru->agama  = $r->agama;
        $guru->nbm  = $r->nbm;
        $guru->nip  = $r->nip;
        $guru->golongan  = $r->golongan;
        $guru->alamat  = $r->alamat;
        $guru->tanggal_lulus  = $r->tanggal_lulus;
        $guru->tanggal_lahir  = $r->tanggal_lahir;
        $guru->universitas  = $r->universitas;
        $guru->jenjang  = $r->jenjang;
        $guru->jurusan  = $r->jurusan;
        $guru->alamat  = $r->alamat;
        
        if($r->file('foto') != null){
            $new_name = date('dmy').rand() . '.jpg';
            $destinationPath = public_path('gurus');
            File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
            $img = Image::make($r->file('foto')->path())->encode('jpg', 75);
            $img->resize(256, 256, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$new_name);
        $guru->foto = $new_name;
        }

        $guru->save();
        
        Session::flash('success', 'Data Guru Berhasil Diperbarui');
        return redirect()->back();
    }
}
