<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'List Pegawai';
        return view('pegawai.index', [
            'pageTitle' => $pageTitle,
            'teachers' => Pegawai::where('type', 'guru')->get(),
            'staffs' => Pegawai::where('type', 'staff')->get(),
            'pengurus' => Pegawai::where('type', 'pengurus')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Tambah Pegawai';
        return view('pegawai.create', [
            'pageTitle' => $pageTitle
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required',
            'nama' => 'required',
            'status' => 'required',
            'jabatan' => 'required',
            'pendidikan' => 'required',
            'ampuan' => 'required',
            'photo' => 'required|file|image|max:2048',
        ], [
            'type.required' => 'Tipe pegawai tidak boleh kosong',
            'nama.required' => 'Nama tidak boleh kosong',
            'status.required' => 'Status tidak boleh kosong',
            'jabatan.required' => 'Jabatan tidak boleh kosong',
            'pendidikan.required' => 'Pendidikan tidak boleh kosong',
            'ampuan.required' => 'Ampuan tidak boleh kosong',
            'photo.required' => 'Photo tidak boleh kosong',
            'photo.image' => 'Format photo tidak valid',
            'photo.max' => 'Maximal ukuran photo adalah 2MB',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $pegawai = new Pegawai($request->all());
            $pegawai->photo = $request->file('photo')->store('photo-pegawai');
            $pegawai->uuid = Str::orderedUuid();
            $pegawai->save();
            return redirect('/pegawai')->with('message', 'Data Pegawai Berhasil Ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        $pageTitle = 'Edit Pegawai';
        return view('pegawai.edit', [
            'pageTitle' => $pageTitle,
            'pegawai' => $pegawai
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $rules = [
            'type' => 'required',
            'nama' => 'required',
            'status' => 'required',
            'jabatan' => 'required',
            'pendidikan' => 'required',
            'ampuan' => 'required',
        ];
        $message = [
            'type.required' => 'Tipe pegawai tidak boleh kosong',
            'nama.required' => 'Nama tidak boleh kosong',
            'status.required' => 'Status tidak boleh kosong',
            'jabatan.required' => 'Jabatan tidak boleh kosong',
            'pendidikan.required' => 'Pendidikan tidak boleh kosong',
            'ampuan.required' => 'Ampuan tidak boleh kosong',
        ];
        if ($request->file('photo')) {
            $rules['photo'] = 'file|image|max:2048';
            $message['photo.image'] = 'Format photo tidak valid';
            $message['photo.max'] = 'Maximal ukuran photo adalah 2MB';
        }
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $pegawai->fill($request->all());
            if ($request->file('photo')) {
                Storage::delete($pegawai->photo);
                $pegawai->photo = $request->file('photo')->store('photo-pegawai');
            }
            $pegawai->save();
            return redirect('/pegawai')->with('message', 'Data Pegawai Berhasil Diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        Storage::delete($pegawai->photo);
        Pegawai::destroy($pegawai->id);
        return redirect('/pegawai')->with('message', 'Data Pegawai Berhasil Dihapus!');
    }
}
