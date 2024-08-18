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
        // Title for the index page
        $pageTitle = 'Video List';

        return view('video.index', [
            'pageTitle' => $pageTitle,
            'videos' => Video::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Title for the create page
        $pageTitle = 'Tambah Video Baru';

        return view('video.create', compact('pageTitle'));
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
            if ($request->sampul) {
                $video->sampul = $request->file('sampul')->store('sampul-video');
            }
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
        // Title for the edit page
        $pageTitle = 'Edit Video';

        return view('video.edit', compact('pageTitle', 'video'));
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
                if ($video->sampul != null) {
                    Storage::delete($video->sampul);
                }
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
        if ($video->sampul != null) {
            Storage::delete($video->sampul);
        }
        Video::destroy($video->id);
        return redirect('/video')->with('message', 'Vidio Berhasil Dihapus!');
    }
}
