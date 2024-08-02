<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\TahunAjaran;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kelas = Kelas::getKelas($request->filter_tahun, $request->filter_kelas);
        return view('kelas.index', [
            'kelas' => $kelas,
            'tahunAjaran' => TahunAjaran::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'tahun_ajaran_uuid' => 'required',
            'kelas' => 'required',
            'nama_kelas' => 'required',
            'jumlah_lk' => 'required',
            'jumlah_pr' => 'required',
        ];
        $pesan = [
            'tahun_ajaran_uuid.required' => 'Tahun ajaran tidak boleh kosong',
            'kelas.required' => 'Kelas tidak boleh kosong',
            'nama_kelas.required' => 'Nama Kelas tidak boleh kosong',
            'jumlah_lk.required' => 'Jumlah laki-laki tidak boleh kosong',
            'jumlah_pr.required' => 'Jumlah perempuan tidak boleh kosong',
        ];
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $kelas = new Kelas($request->all());
            $kelas->uuid = Str::orderedUuid();
            $kelas->save();
            return redirect('/kelas')->with('message', 'Kelas Berhasil Ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kela)
    {
        return view('kelas.edit', ['kelas' => $kela]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kela)
    {
        $rules = [
            'tahun_ajaran_uuid' => 'required',
            'kelas' => 'required',
            'nama_kelas' => 'required',
            'jumlah_lk' => 'required',
            'jumlah_pr' => 'required',
        ];
        $pesan = [
            'tahun_ajaran_uuid.required' => 'Tahun ajaran tidak boleh kosong',
            'kelas.required' => 'Kelas tidak boleh kosong',
            'nama_kelas.required' => 'Nama Kelas tidak boleh kosong',
            'jumlah_lk.required' => 'Jumlah laki-laki tidak boleh kosong',
            'jumlah_pr.required' => 'Jumlah perempuan tidak boleh kosong',
        ];
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $kela->fill($request->all());
            $kela->save();
            return redirect('/kelas')->with('message', 'Kelas Berhasil Diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kela)
    {
        Kelas::destroy($kela->id);
        return redirect('/kelas')->with('message', 'Kelas Berhasil Dihapus!');
    }
}
