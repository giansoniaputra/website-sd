<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Daftar Prestasi';  // Menentukan judul halaman untuk daftar prestasi
        return view('prestasi.index', [
            'prestasi' => Prestasi::all(),
            'pageTitle' => $pageTitle
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Tambah Prestasi';  // Menentukan judul halaman untuk form tambah prestasi
        return view('prestasi.create', [
            'pageTitle' => $pageTitle
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'acara' => 'required',
            'penyelenggara' => 'required',
            'tanggal' => 'required',
            'prestasi' => 'required',
        ];
        $pesan = [
            'acara.required' => 'Acara tidak boleh kosong',
            'penyelenggara.required' => 'Penyelenggara tidak boleh kosong',
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'prestasi.required' => 'Prestasi tidak boleh kosong',
        ];
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $prestasi = new Prestasi($request->all());
            $prestasi->uuid = Str::orderedUuid();
            $prestasi->save();
            return redirect('/prestasi')->with('message', 'Prestasi Berhasil Ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestasi $prestasi)
    {
        $pageTitle = 'Detail Prestasi';  // Menentukan judul halaman untuk detail prestasi
        return view('prestasi.show', [
            'prestasi' => $prestasi,
            'pageTitle' => $pageTitle
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestasi $prestasi)
    {
        $pageTitle = 'Edit Prestasi';  // Menentukan judul halaman untuk form edit prestasi
        return view('prestasi.edit', [
            'prestasi' => $prestasi,
            'pageTitle' => $pageTitle
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestasi $prestasi)
    {
        $rules = [
            'acara' => 'required',
            'penyelenggara' => 'required',
            'tanggal' => 'required',
            'prestasi' => 'required',
        ];
        $pesan = [
            'acara.required' => 'Acara tidak boleh kosong',
            'penyelenggara.required' => 'Penyelenggara tidak boleh kosong',
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'prestasi.required' => 'Prestasi tidak boleh kosong',
        ];
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $prestasi->fill($request->all());
            $prestasi->save();
            return redirect('/prestasi')->with('message', 'Prestasi Berhasil Diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestasi $prestasi)
    {
        Prestasi::destroy($prestasi->id);
        return redirect('/prestasi')->with('message', 'Prestasi Berhasil Dihapus!');
    }
}
