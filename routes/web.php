<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::group(['prefix' => 'admin','middleware' => 'can:admin'], function () {
    Route::get('/dashboard', 'HomeController@admin')->name('admin.home');
    
    // Tahun Ajaran
    Route::get('/master/tahun-ajaran','TahunAjaranController@index')->name('admin.tahun-ajaran');
    Route::post('/master/tahun-ajaran','TahunAjaranController@store')->name('tahun-ajaran.store');
    Route::delete('/master/tahun-ajaran/{id}','TahunAjaranController@destroy')->name('tahun-ajaran.delete');
    Route::post('/master/tahun-ajaran/status/{id}','TahunAjaranController@status')->name('tahun-ajaran.status');
    Route::post('/master/tahun-ajaran/update/{id}','TahunAjaranController@update')->name('tahun-ajaran.update');

    // Mata Pelajaran
    Route::get('/master/mata-pelajaran','MataPelajaranController@index')->name('admin.mata-pelajaran');
    Route::post('/master/mata-pelajaran','MataPelajaranController@store')->name('mata-pelajaran.store');
    Route::delete('/master/mata-pelajaran/{id}','MataPelajaranController@destroy')->name('mata-pelajaran.delete');
    Route::post('/master/mata-pelajaran/update/{id}','MataPelajaranController@update')->name('mata-pelajaran.update');

    // Kelas
    Route::get('/master/kelas','KelasController@index')->name('admin.kelas');
    Route::post('/master/kelas','KelasController@store')->name('kelas.store');
    Route::delete('/master/kelas/{id}','KelasController@destroy')->name('kelas.delete');
    Route::post('/master/kelas/update/{id}','KelasController@update')->name('kelas.update');

    //Jabatan
    Route::get('/master/jabatan','JabatanController@index')->name('admin.jabatan');
    Route::post('/master/jabatan','JabatanController@store')->name('jabatan.store');
    Route::delete('/master/jabatan/{id}','JabatanController@destroy')->name('jabatan.delete');
    Route::post('/master/jabatan/update/{id}','JabatanController@update')->name('jabatan.update');

    //Status Kepegawaian
    Route::get('/master/status_kepegawaiaan','StatusKepegawaianController@index')->name('admin.kepegawaian');
    Route::post('/master/status_kepegawaiaan','StatusKepegawaianController@store')->name('kepegawaian.store');
    Route::delete('/master/status_kepegawaiaan/{id}','StatusKepegawaianController@destroy')->name('kepegawaian.delete');
    Route::post('/master/status_kepegawaiaan/update/{id}','StatusKepegawaianController@update')->name('kepegawaian.update');

    //Guru
    Route::get('/master/guru','GuruController@index')->name('admin.guru');
    Route::post('/master/guru','GuruController@store')->name('guru.store');
    Route::delete('/master/guru/{id}','GuruController@destroy')->name('guru.delete');
    Route::post('/master/guru/update/{id}','GuruController@update')->name('guru.update');

    //Pengguna
    Route::get('/master/pengguna','PenggunaController@index')->name('admin.pengguna');
    Route::get('/master/pengguna/{id}','PenggunaController@show')->name('admin.detail');
    Route::post('/master/pengguna','PenggunaController@store')->name('pengguna.store');
    Route::delete('/master/pengguna/{id}','PenggunaController@destroy')->name('pengguna.delete');
    Route::post('/master/pengguna/ganti/{id}','PenggunaController@ganti')->name('pengguna.ganti');
    Route::post('/master/pengguna/update/{id}','PenggunaController@update')->name('pengguna.update');

    Route::get('/berkas', function () {
        return view('admin.berkas.index');
    })->name('admin.berkas');
    Route::get('/agenda', function () {
        return view('admin.agenda.index');
    })->name('admin.agenda');
});

Route::group(['prefix' => 'guru','middleware' => 'can:guru'], function () {
    Route::get('/dashboard', 'HomeController@guru')->name('guru.home');
    Route::get('/mata-pelajaran','KegiatanGuruController@mapel')->name('guru.mapel');
    Route::post('/mata-pelajaran', 'KegiatanGuruController@mapelStore')->name('guru.mapel.store');
    Route::delete('/mata-pelajaran/{id}', 'KegiatanGuruController@mapelDestroy')->name('guru.mapel.delete');
    Route::get('/jurnal','KegiatanGuruController@jurnal')->name('guru.jurnal');
    Route::get('/jurnal/{id}', 'KegiatanGuruController@jurnalShow')->name('guru.jurnal.show');
    Route::get('/jurnal/tambah','KegiatanGuruController@addJurnal')->name('guru.addKegiatan');
    Route::post('/jurnal', 'KegiatanGuruController@jurnalStore')->name('guru.jurnal.store');
    Route::post('/jurnal/{id}', 'KegiatanGuruController@jurnalUpdate')->name('guru.jurnal.update');
    Route::delete('/jurnal/{id}', 'KegiatanGuruController@jurnalDestroy')->name('guru.jurnal.delete');



    Route::get('/ganti-password', function () {
        return view('guru.gantiPassword');
    })->name('guru.ganti');

    Route::get('/laporan', function () {
        return view('guru.laporan.index');
    })->name('guru.laporan');


    Route::get('/lainnya', function () {
        return view('guru.agenda.lain');
    })->name('guru.lain');

    Route::get('/berkas', function () {
        return view('guru.berkas.index');
    })->name('guru.berkas');
});

Route::group(['prefix' => 'kepsek','middleware' => 'can:kepsek'], function () {
    Route::get('/dashboard', function () {
        return view('kepsek.index');
    })->name('kepsek.home');

    Route::get('/master/tahun-ajaran', function () {
        return view('kepsek.tahun-ajaran.index');
    })->name('kepsek.tahun-ajaran');

    Route::get('/master/mata-pelajaran', function () {
        return view('kepsek.mata-pelajaran.index');
    })->name('kepsek.mata-pelajaran');

    Route::get('/master/kelas', function () {
        return view('kepsek.kelas.index');
    })->name('kepsek.kelas');

    Route::get('/guru', function () {
        return view('kepsek.guru.index');
    })->name('kepsek.guru');

    Route::get('/pengguna', function () {
        return view('kepsek.pengguna.index');
    })->name('kepsek.pengguna');

    Route::get('/berkas', function () {
        return view('kepsek.berkas.index');
    })->name('kepsek.berkas');

    Route::get('/agenda', function () {
        return view('kepsek.agenda.index');
    })->name('kepsek.agenda');

    Route::get('/laporan', function () {
        return view('kepsek.laporan.index');
    })->name('kepsek.laporan');
});

Auth::routes();
Route::get('auth/logout', 'Auth\LoginController@logout')->name('auth.logout');


