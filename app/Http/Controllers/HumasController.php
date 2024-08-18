<?php

namespace App\Http\Controllers;

use App\Models\Humas;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HumasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'List Humas';
        return view('humas.index', [
        'pageTitle' => $pageTitle,
        'humas' => Humas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $pageTitle = 'Tambah Humas';
    return view('humas.create', [
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
            'link' => 'required',
            'photo' => 'required|file|image|max:2048',
        ];
        $pesan = [
            'nama.required' => 'Nama tidak boleh kosong',
            'link.required' => 'Link tidak boleh kosong',
            'photo.required' => 'Photo tidak boleh kosong',
            'photo.image' => 'Format photo tidak valid',
            'photo.max' => 'Photo maximal berukuran 2MB',
        ];
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $humas = new Humas($request->all());
            $humas->uuid = Str::orderedUuid();
            $humas->photo = $request->file('photo')->store('photo-humas');
            $humas->save();
            return redirect('/humas')->with('message', 'Data Berhasil Ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Humas $huma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Humas $huma)
    {
        $pageTitle = 'Edit Humas';
        return view('humas.edit', [
            'pageTitle' => $pageTitle,
            'humas' => $huma
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Humas $huma)
    {
        $rules = [
            'nama' => 'required',
            'link' => 'required',
        ];
        $pesan = [
            'nama.required' => 'Nama tidak boleh kosong',
            'link.required' => 'Link tidak boleh kosong',
        ];
        if ($request->file('photo')) {
            $rules['photo'] = 'file|image|max:2048';
            $pesan['photo.image'] = 'Format photo tidak valid';
            $pesan['photo.max'] = 'Photo maximal berukuran 2MB';
        }
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $huma->fill($request->except('photo'));
            if ($request->file('photo')) {
                Storage::delete($huma->photo);
                $huma->photo = $request->file('photo')->store('photo-humas');
            }
            $huma->save();
            return redirect('/humas')->with('message', 'Data Berhasil Diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Humas $huma)
    {
        Humas::destroy($huma->id);
        return redirect('/humas')->with('message', 'Data Berhasil Dihapus!');
    }
}
