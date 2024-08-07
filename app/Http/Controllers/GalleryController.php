<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('gallery.index', [
            'galleries' => Gallery::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'photo' => 'required|file|image|max:2048',
        ];
        $pesan = [
            'photo.required' => 'Photo tidak boleh kosong',
            'photo.image' => 'Photo tidak valid',
            'photo.max' => 'Maximal ukuran 2MB',
        ];
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $gallery = new Gallery($request->all());
            $gallery->uuid = Str::orderedUuid();
            $gallery->photo = $request->file('photo')->store('gallery');
            $gallery->save();
            return redirect('/gallery')->with('message', 'Photo Berhasil Diupload!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        Storage::delete($gallery->id);
        return redirect('/gallery')->with('message', 'Photo Berhasil Dihapus!');
    }
}
