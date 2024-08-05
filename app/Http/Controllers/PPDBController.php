<?php

namespace App\Http\Controllers;

use App\Models\PPDB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PPDBController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ppdb.index', ['ppdbs' => PPDB::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ppdb.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_kegiatan' => 'required',
            'tanggal_regular' => 'required',
        ];
        $pesan = [
            'nama_kegiatan.required' => 'Nama kegiatan tidak boleh kosong',
            'tanggal_regular.required' => 'Tanggal regular tidak boleh kosong',
        ];
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $ppdb = new PPDB($request->all());
            $ppdb->uuid = Str::orderedUuid();
            $ppdb->save();
            return redirect('/ppdb')->with('message', 'Kegiatan Berhasil Ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PPDB $ppdb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PPDB $ppdb)
    {
        return view('ppdb.edit', ['ppdb' => $ppdb]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PPDB $ppdb)
    {
        $rules = [
            'nama_kegiatan' => 'required',
            'tanggal_regular' => 'required',
        ];
        $pesan = [
            'nama_kegiatan.required' => 'Nama kegiatan tidak boleh kosong',
            'tanggal_regular.required' => 'Tanggal regular tidak boleh kosong',
        ];
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $ppdb->fill($request->all());
            $ppdb->save();
            return redirect('/ppdb')->with('message', 'Kegiatan Berhasil Diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PPDB $ppdb)
    {
        PPDB::destroy($ppdb->id);
        return redirect('/ppdb')->with('message', 'Kegiatan Berhasil Dihapus!');
    }
}
