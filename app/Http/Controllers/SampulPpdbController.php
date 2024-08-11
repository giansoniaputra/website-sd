<?php

namespace App\Http\Controllers;

use App\Models\SampulPpdb;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SampulPpdbController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sampul-ppdb.index', ['sampuls' => SampulPpdb::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $cek = SampulPpdb::first();
        if ($cek) {
            return view('sampul-ppdb.create', ['sampul' => $cek]);
        } else {
            return view('sampul-ppdb.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $cek = SampulPpdb::first();
        if (!$cek) {
            $rules = [
                'sampul_depan' => 'required|file|image|max:2048',
                'sampul_belakang' => 'required|file|image|max:2048',
            ];
            $pesan = [
                'sampul_depan.required' => 'Tidak boleh kosong',
                'sampul_belakang.required' => 'Tidak boleh kosong',
                'sampul_depan.image' => 'Format photo tidak valid',
                'sampul_depan.max' => 'Ukuran photo maximal 2MB',
                'sampul_belakang.image' => 'Format photo tidak valid',
                'sampul_belakang.max' => 'Ukuran photo maximal 2MB',
            ];
            $validator = Validator::make($request->all(), $rules, $pesan);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator->errors());
            } else {
                $sampul = new SampulPpdb($request->all());
                $sampul->uuid = Str::orderedUuid();
                $sampul->sampul_depan = $request->file('sampul_depan')->store('sampul');
                $sampul->sampul_belakang = $request->file('sampul_belakang')->store('sampul');
                $sampul->save();
                return redirect('/cover-ppdb')->with('message', 'Sampul Berhasil Dibuat!');
            }
        } else {
            $rules = [
                'sampul_depan' => 'file|image|max:2048',
                'sampul_belakang' => 'file|image|max:2048',
            ];
            $pesan = [
                'sampul_depan.image' => 'Format photo tidak valid',
                'sampul_depan.max' => 'Ukuran photo maximal 2MB',
                'sampul_belakang.image' => 'Format photo tidak valid',
                'sampul_belakang.max' => 'Ukuran photo maximal 2MB',
            ];
            $validator = Validator::make($request->all(), $rules, $pesan);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator->errors());
            } {

                $cek->fill($request->except(['sampul_depan', 'sampul_belakang']));
                if ($request->file('sampul_depan')) {
                    if ($cek->sampul_depan != null) {
                        Storage::delete($cek->sampul_depan);
                    }
                    $cek->sampul_depan = $request->file('sampul_depan')->store('sampul');
                }
                if ($request->file('sampul_belakang')) {
                    if ($cek->sampul_belakang != null) {
                        Storage::delete($cek->sampul_belakang);
                    }
                    $cek->sampul_belakang = $request->file('sampul_belakang')->store('sampul');
                }
                $cek->save();
                return redirect('/cover-ppdb')->with('message', 'Sampul Berhasil Diubah!');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SampulPpdb $sampulPpdb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SampulPpdb $sampulPpdb)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SampulPpdb $sampulPpdb)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SampulPpdb $sampulPpdb)
    {
        //
    }
}
