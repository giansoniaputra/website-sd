<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class KurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'List Kurikulum';
        return view('kurikulum.index', [
            'pageTitle' => $pageTitle,
            'kurikulum' => Kurikulum::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Tambah Kurikulum';
        return view('kurikulum.create', [
            'pageTitle' => $pageTitle
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'photo' => 'required|file|image|max:2048',
            'pdf' => 'required|mimes:pdf|max:2048',
        ];
        $pesan = [
            'nama.required' => 'Tidak boleh kosong',
            'photo.required' => 'Photo tidak boleh kosong',
            'photo.image' => 'Format photo tidak valid',
            'photo.max' => 'Ukuran photo maximal 2MB',
            'pdf.required' => 'PDF tidak boleh kosong',
            'pdf.mimes' => 'Pastikan yang anda upload adalah pdf',
            'pdf.max' => 'Ukuran PDF maximal 2MB',
        ];
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $kurikulum = new Kurikulum($request->all());
            $kurikulum->uuid = Str::orderedUuid();
            $kurikulum->photo = $request->file('photo')->store('photo-kurikulum');
            $kurikulum->pdf = $request->file('pdf')->store('pdf-kurikulum');
            $kurikulum->save();
            return redirect('/kurikulum')->with('message', 'Data Berhasil Dibuat!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kurikulum $kurikulum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kurikulum $kurikulum)
    {
        $pageTitle = 'Edit Kurikulum';
        return view('kurikulum.edit', [
            'pageTitle' => $pageTitle,
            'kurikulum' => $kurikulum
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kurikulum $kurikulum)
    {
        $rules = [
            'nama' => 'required',
            'photo' => 'file|image|max:2048',
            'pdf' => 'mimes:pdf|max:2048',
        ];
        $pesan = [
            'nama.required' => 'Tidak boleh kosong',
            'photo.image' => 'Format photo tidak valid',
            'photo.max' => 'Ukuran photo maximal 2MB',
            'pdf.mimes' => 'Pastikan yang anda upload adalah pdf',
            'pdf.max' => 'Ukuran PDF maximal 2MB',
        ];
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $kurikulum->fill($request->all());
            if ($request->file('photo')) {
                Storage::delete($kurikulum->photo);
                $kurikulum->photo = $request->file('photo')->store('photo-kurikulum');
            }
            if ($request->file('pdf')) {
                Storage::delete($kurikulum->pdf);
                $kurikulum->pdf = $request->file('pdf')->store('pdf-kurikulum');
            }
            $kurikulum->save();
            return redirect('/kurikulum')->with('message', 'Data Berhasil Diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kurikulum $kurikulum)
    {
        Storage::delete($kurikulum->photo);
        Storage::delete($kurikulum->pdf);
        Kurikulum::destroy($kurikulum->id);
        return redirect('/kurikulum')->with('message', 'Data Berhasil Dihapus!');
    }
}
