<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $siswa = Siswa::getDataSiswa($request->kelas_uuid);
        return view('siswa.index', [
            'siswas' => $siswa,
            'kelas_uuid' => $request->kelas_uuid
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('siswa.create', [
            'kelas_uuid' => $request->kelas_uuid
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'kelas_uuid' => 'required',
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',
        ];
        $pesan = [
            'kelas_uuid.required' => 'Kelas tidak boleh kosong',
            'nama_siswa.required' => 'Nama siswa tidak boleh kosong',
            'jenis_kelamin.required' => 'Jenis kelamin tidak boleh kosong',
        ];
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $siswa = new Siswa($request->all());
            $siswa->uuid = Str::orderedUuid();
            $siswa->save();
            return redirect('/siswa?kelas_uuid=' . $request->kelas_uuid)->with('message', 'Data Siswa Berhasil Ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa, Request $request)
    {
        return view('siswa.edit', [
            'kelas_uuid' => $request->kelas_uuid,
            'siswa' => $siswa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $rules = [
            'kelas_uuid' => 'required',
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',
        ];
        $pesan = [
            'kelas_uuid.required' => 'Kelas tidak boleh kosong',
            'nama_siswa.required' => 'Nama siswa tidak boleh kosong',
            'jenis_kelamin.required' => 'Jenis kelamin tidak boleh kosong',
        ];
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $siswa->fill($request->all());
            $siswa->save();
            return redirect('/siswa?kelas_uuid=' . $request->kelas_uuid)->with('message', 'Data Siswa Berhasil Diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa, Request $request)
    {
        Siswa::destroy($siswa->id);
        return redirect('/siswa?kelas_uuid=' . $request->kelas_uuid)->with('message', 'Data Siswa Berhasil Dihapus!');
    }
}
