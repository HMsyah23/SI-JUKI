<?php

namespace App\Http\Controllers;

use App\Model\FilePerangkat;
use App\Model\TahunAjaran;
use App\Model\Guru;
use App\Model\Jabatan;
use App\Model\StatusKepegawaian;
use Illuminate\Http\Request;

class FilePerangkatController extends Controller
{

    public function index()
    {
        $tahun = TahunAjaran::where('status',1)->first();
        $filePerangkats = FilePerangkat::whereHas('mapelGuru.mapel', function ($query) use($tahun) {
                return $query->where('id_tahun_ajaran', $tahun->id_tahun_ajaran);
        })->get()->groupBy('mapelGuru.id_guru');
        return view('admin.berkas.index',compact('filePerangkats','tahun'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $tahun = TahunAjaran::where('status',1)->first();
        $guru = Guru::find($id);
        $jabatans = Jabatan::all();
        $status_pegawai = StatusKepegawaian::all();
        $filePerangkats = FilePerangkat::whereHas('mapelGuru', function($query) use ($id) {
            $query->where('id_guru', $id);
        })->with('mapelGuru')->get();
        return view('admin.berkas.show',compact('filePerangkats','guru','tahun','status_pegawai','jabatans'));
    }

    public function edit(FilePerangkat $filePerangkat)
    {
        //
    }

    public function update(Request $request, FilePerangkat $filePerangkat)
    {
        //
    }

    public function destroy(FilePerangkat $filePerangkat)
    {
        //
    }
}
