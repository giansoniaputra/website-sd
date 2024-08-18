<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\InformasiUmum;
use Illuminate\Support\Facades\Validator;

class InformasiUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'List Informasi Umum';
        return view('profil.sekolah.informasi-umum.index', [
            'pageTitle' => $pageTitle,
            'informasi' => InformasiUmum::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Tambah Informasi Umum';
        return view('profil.sekolah.informasi-umum.create', [
            'pageTitle' => $pageTitle
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'keterangan' => 'required',
        ], [
            'title.required' => 'Title tidak noleh kosong',
            'keterangan.required' => 'Keterangan tidak noleh kosong',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $informasi = new InformasiUmum($request->all());
            $informasi->uuid = Str::orderedUuid();
            $informasi->save();
            return redirect('/informasi-umum')->with("message", "Informasi Berhasil Ditambahkan!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(InformasiUmum $informasiUmum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InformasiUmum $informasiUmum)
    {
        $pageTitle = 'Edit Informasi Umum';
        return view('profil.sekolah.informasi-umum.edit', [
            'pageTitle' => $pageTitle,
            'data' => $informasiUmum
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InformasiUmum $informasiUmum)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'keterangan' => 'required',
        ], [
            'title.required' => 'Title tidak noleh kosong',
            'keterangan.required' => 'Keterangan tidak noleh kosong',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $informasiUmum->fill($request->all());
            $informasiUmum->save();
            return redirect('/informasi-umum')->with("message", "Informasi Berhasil Diubah!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InformasiUmum $informasiUmum)
    {
        InformasiUmum::destroy($informasiUmum->id);
        return redirect('/informasi-umum')->with("message", "Informasi Berhasil Dihapus!");
    }
}
