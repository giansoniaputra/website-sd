<?php

namespace App\Http\Controllers;

use App\Models\PPDB;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PPDB $pPDB)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PPDB $pPDB)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PPDB $pPDB)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PPDB $pPDB)
    {
        //
    }
}
