<?php

namespace App\Http\Controllers;

use App\Models\TahunAjaran;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Daftar Tahun Ajaran';  // Menentukan judul halaman untuk daftar tahun ajaran

        // Menggunakan paginate() untuk paginasi, bisa disesuaikan jumlah per halaman
        $tahunAjarans = TahunAjaran::paginate(10);

        return view('tahun-ajaran.index', [
            'tahunAjarans' => $tahunAjarans,
            'pageTitle' => $pageTitle
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Tambah Tahun Ajaran';  // Menentukan judul halaman untuk form tambah tahun ajaran
        return view('tahun-ajaran.create', [
            'pageTitle' => $pageTitle
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'tahun_awal' => 'required',
            'tahun_akhir' => 'required',
        ];
        $messages = [
            'tahun_awal.required' => 'Tahun awal tidak boleh kosong',
            'tahun_akhir.required' => 'Tahun akhir tidak boleh kosong',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $tahun_ajaran = new TahunAjaran($request->all());
            $tahun_ajaran->uuid = Str::orderedUuid();
            $tahun_ajaran->save();
            return redirect('/tahun-ajaran')->with('message', 'Tahun Ajaran Berhasil Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TahunAjaran $tahunAjaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TahunAjaran $tahunAjaran)
    {
        $pageTitle = 'Edit Tahun Ajaran';  // Menentukan judul halaman untuk form edit tahun ajaran
        return view('tahun-ajaran.edit', [
            'tahun_ajaran' => $tahunAjaran,
            'pageTitle' => $pageTitle
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TahunAjaran $tahunAjaran)
    {
        $rules = [
            'tahun_awal' => 'required',
            'tahun_akhir' => 'required',
        ];
        $messages = [
            'tahun_awal.required' => 'Tahun awal tidak boleh kosong',
            'tahun_akhir.required' => 'Tahun akhir tidak boleh kosong',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $tahunAjaran->fill($request->all());
            $tahunAjaran->save();
            return redirect('/tahun-ajaran')->with('message', 'Tahun Ajaran Berhasil Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TahunAjaran $tahunAjaran)
    {
        TahunAjaran::destroy($tahunAjaran->id);
        return redirect('/tahun-ajaran')->with('message', 'Tahun Ajaran Berhasil Dihapus');
    }
}
