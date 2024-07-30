<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_yayasan()
    {
        $data = Profile::where('type', 'yayasan')->first();
        if ($data) {
            return view('profil.yayasan.index', ['data' =>  $data]);
        } else {
            return view('profil.yayasan.index');
        }
    }

    public function index_sekolah()
    {
        $data = Profile::where('type', 'sekolah')->first();
        if ($data) {
            return view('profil.sekolah.index', ['data' =>  $data]);
        } else {
            return view('profil.sekolah.index');
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create_yayasan()
    {
        $cekData = Profile::where("type", "yayasan")->first();
        if (!$cekData) {
            return view('profil.yayasan.create');
        } else {
            return view('profil.yayasan.create', ['data' => $cekData]);
        }
    }

    public function create_sekolah()
    {
        $cekData = Profile::where("type", "sekolah")->first();
        if (!$cekData) {
            return view('profil.sekolah.create');
        } else {
            return view('profil.sekolah.create', ['data' => $cekData]);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cekData = Profile::where("type", $request->type)->first();
        if (!$cekData) {
            $profil = new Profile($request->all());
            $profil->uuid = Str::orderedUuid();
            $profil->save();

            return redirect('/profil/' . $request->type )->with('message', 'Profile Berhasil Dibuat!');
        } else {
            $cekData->fill($request->all());
            $cekData->save();
            return redirect('/profil/' . $request->type )->with('message', 'Profile Berhasil Diubah!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
