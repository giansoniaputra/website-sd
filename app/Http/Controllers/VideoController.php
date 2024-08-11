<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('video.index', ['videos' => Video::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('video.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'sampul' => 'file|image|max:2048',
            'link' => 'required',
        ];
        $pesan = [
            'sampul.image' => 'Format sampul tidak valid',
            'sampul.max' => 'Maximal ukuran sampul 2MB',
            'link.required' => 'Link tida boleh kosong',
        ];
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $video = new Video($request->all());
            $video->uuid = Str::orderedUuid();
            $video->sampul = $request->file('sampul')->store('sampul-video');
            $video->save();
            return redirect('/video')->with('message', 'Vidio Berhasil Ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        return view('video.edit', ['video' => $video]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        $rules = [
            'sampul' => 'file|image|max:2048',
            'link' => 'required',
        ];
        $pesan = [
            'sampul.image' => 'Format sampul tidak valid',
            'sampul.max' => 'Maximal ukuran sampul 2MB',
            'link.required' => 'Link tida boleh kosong',
        ];
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $video->fill($request->all());
            if ($request->file('sampul')) {
                Storage::delete($video->sampul);
                $video->sampul = $request->file('sampul')->store('sampul-video');
            }
            $video->save();
            return redirect('/video')->with('message', 'Vidio Berhasil Diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Video $video)
    {
        Storage::delete($video->sampul);
        Video::destroy($video->id);
        return redirect('/video')->with('message', 'Vidio Berhasil Dihapus!');
    }
}
