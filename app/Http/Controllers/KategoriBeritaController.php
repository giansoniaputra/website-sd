<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoriBerita;
use Illuminate\Support\Facades\Validator;

class KategoriBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $pageTitle = 'List Kategori Berita';
    return view('kategori.index', [
        'pageTitle' => $pageTitle,
        'kategori' => KategoriBerita::all()
    ]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $pageTitle = 'Tambah Kategori Berita';
    return view('kategori.create', [
        'pageTitle' => $pageTitle
    ]);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'kategori' => 'required',
        ];
        $pesan = [
            'kategori.required' => 'Kategori tidak boleh kosong',
        ];
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $kategori = new KategoriBerita($request->all());
            $kategori->uuid = Str::orderedUuid();
            $kategori->save();
            return redirect('/kategori')->with('message', 'Kategori Berhasil Ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriBerita $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriBerita $kategori)
{
    $pageTitle = 'Edit Kategori Berita';
    return view('kategori.edit', [
        'pageTitle' => $pageTitle,
        'kategori' => $kategori
    ]);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriBerita $kategori)
    {
        $rules = [
            'kategori' => 'required',
        ];
        $pesan = [
            'kategori.required' => 'Kategori tidak boleh kosong',
        ];
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $kategori->fill($request->all());
            $kategori->save();
            return redirect('/kategori')->with('message', 'Kategori Berhasil Diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriBerita $kategori)
    {
        KategoriBerita::destroy($kategori->id);
        return redirect('/kategori')->with('message', 'Kategori Berhasil Dihapus!');
    }
}
