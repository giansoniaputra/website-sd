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
        return view('tahun-ajaran.index', ['tahunAjarans' => TahunAjaran::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tahun-ajaran.create');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TahunAjaran $tahunAjaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TahunAjaran $tahunAjaran)
    {
        //
    }
}
