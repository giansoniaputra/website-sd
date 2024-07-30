<?php

namespace App\Http\Controllers;

use App\Models\Sarana;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SaranaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sarana.index', ['saranas' => Sarana::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sarana.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'photo' => 'image|max:2048'
        ], [
            'nama.required' => 'Nama tidak Boleh kosong',
            'photo.image' => 'File harus berupa gambar',
            'photo.max' => 'Ukuran maksimal gambar adalah 2MB',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            $sarana = new Sarana($request->all());
            $sarana->uuid = Str::orderedUuid();
            if ($request->file('photo')) {
                $sarana->photo = $request->file('photo')->store('photo-sarana');
            }
            $sarana->save();
            return redirect('/sarana')->with('message', 'Sarana dan Prasarana Berhasil Ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Sarana $sarana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sarana $sarana)
    {
        return view('sarana.edit', ['sarana' => $sarana]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sarana $sarana)
    {
        // dd($request);
        $rules = [
            'nama' => 'required',
        ];
        $message = [
            'nama.required' => 'Nama tidak noleh kosong',
        ];
        if ($request->photo != null) {
            $rules['photo'] = 'image|max:2048';
            $message['photo.image'] = 'Image harus berupa gambar';
            $message['photo.max'] =  'Ukuran maksimal gambar adalah 2MB';
        }
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        } else {
            if ($request->photo != null && $sarana->photo != null) {
                $sarana->fill($request->all());
                Storage::delete($sarana->photo);
                $sarana->photo = $request->file('photo')->store('photo-sarana');
            } else {
                $sarana->fill($request->except('photo'));
            }
            $sarana->save();
            return redirect('/sarana')->with('message', 'Sarana dan Prasarana Berhasil Diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sarana $sarana)
    {
        if ($sarana->photo != null) {
            Storage::delete($sarana->photo);
        }
        Sarana::destroy($sarana->id);
        return redirect('/sarana')->with('message', 'Sarana dan Prasarana Berhasil Dihapus!');
    }
}
