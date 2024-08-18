<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PelayananPublic;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PelayananPublicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Daftar Pelayanan Publik';
        return view('pelayanan.index', [
            'pageTitle' => $pageTitle,
            'Pelayanans' => PelayananPublic::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Tambah Pelayanan Publik';
        return view('pelayanan.create', [
            'pageTitle' => $pageTitle
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'pdf' => 'mimes:pdf|max:2048'
        ], [
            'nama.required' => 'Nama tidak Boleh kosong',
            'pdf.mimes' => 'File harus berupa PDF',
            'pdf.max' => 'Ukuran maksimal PDF adalah 2MB',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $pelayanan_public = new PelayananPublic($request->all());
            $pelayanan_public->uuid = Str::orderedUuid();
            if ($request->file('pdf')) {
                $pelayanan_public->pdf = $request->file('pdf')->store('pdf-pelayanan');
            }
            $pelayanan_public->save();
            return redirect('/pelayanan-public')->with('message', 'Data Berhasil Ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PelayananPublic $pelayanan_public)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PelayananPublic $pelayanan_public)
    {
        $pageTitle = 'Edit Pelayanan Publik';
        return view('pelayanan.edit', [
            'pageTitle' => $pageTitle,
            'pelayanan' => $pelayanan_public
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PelayananPublic $pelayanan_public)
    {
        // dd($request);
        $rules = [
            'nama' => 'required',
        ];
        $message = [
            'nama.required' => 'Nama tidak boleh kosong',
        ];
        if ($request->file('pdf')) {
            $rules['pdf'] = 'mimes:pdf|max:2048';
            $message['pdf.mimes'] = 'File Harus Berupa PDF';
            $message['pdf.max'] =  'Ukuran maksimal PDF adalah 2MB';
        }
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $pelayanan_public->fill($request->except('pdf'));
            if ($request->file('pdf')) {
                if ($pelayanan_public->pdf != null) {
                    Storage::delete($pelayanan_public->pdf);
                }
                $pelayanan_public->pdf = $request->file('pdf')->store('pdf-pelayanan');
            } else if ($request->file('pdf') && $pelayanan_public->pdf == null) {
                $pelayanan_public->pdf = $request->file('pdf')->store('pdf-pelayanan');
            }
            $pelayanan_public->save();
            return redirect('/pelayanan-public')->with('message', 'Data Berhasil Diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PelayananPublic $pelayanan_public)
    {
        if ($pelayanan_public->pdf != null) {
            Storage::delete($pelayanan_public->pdf);
        }
        PelayananPublic::destroy($pelayanan_public->id);
        return redirect('/pelayanan-public')->with('message', 'Data Berhasil Dihapus!');
    }
}
