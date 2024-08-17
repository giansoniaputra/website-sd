<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('carousel.index', [
            'carousels_home' => Carousel::where('type', 'home')->latest()->get(),
            'carousels_yayasan' => Carousel::where('type', 'yayasan')->latest()->get(),
            'carousels_sekolah' => Carousel::where('type', 'sekolah')->latest()->get(),
            'carousels_wakasek' => Carousel::where('type', 'wakasek')->latest()->get(),
            'carousels_guru' => Carousel::where('type', 'guru')->latest()->get(),
            'carousels_ppdb' => Carousel::where('type', 'ppdb')->latest()->get(),
            'carousels_layanan' => Carousel::where('type', 'layanan_publik')->latest()->get(),
            'carousels_berita' => Carousel::where('type', 'berita')->latest()->get(),
            'carousels_galeri' => Carousel::where('type', 'galeri')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('carousel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'photo' => 'required|file|image|max:2048',
            'type' => 'required'
        ];
        $pesan = [
            'photo.required' => 'Photo tidak boleh kosong',
            'photo.image' => 'Photo tidak valid',
            'photo.max' => 'Maximal ukuran 2MB',
            'type.required' => 'Type tidak boleh kosong',
        ];
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $carousel = new Carousel($request->all());
            $carousel->uuid = Str::orderedUuid();
            $carousel->photo = $request->file('photo')->store('carousel');
            $carousel->save();
            return redirect('/carousel')->with('message', 'Photo Berhasil Diupload!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Carousel $carousel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carousel $carousel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carousel $carousel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carousel $carousel)
    {
        Storage::delete($carousel->photo);
        Carousel::destroy($carousel->id);
        return redirect('/carousel')->with('message', 'Photo Berhasil Dihapus!');
    }
}
