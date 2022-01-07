<?php

namespace App\Http\Controllers;

use App\Penilaian;
use App\User;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penilaian = Penilaian::all();
        return view('penilaian.index', compact('penilaian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('penilaian.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = 'Penilaian stored!';
        $success = true;
        try{
            Penilaian::create($request->all());
        }catch(\Throwable $e){
            $status = $e->getMessage();
            $success = false;
        }

        return redirect()->route('penilaian.index')->with('status', $status)->with('success', $success);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function show(Penilaian $penilaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function edit(Penilaian $penilaian)
    {
        $users = User::all();
        return view('penilaian.edit', compact('users', 'penilaian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penilaian $penilaian)
    {
        $status = 'Penilaian updated!';
        $success = true;
        try{
            $penilaian->update($request->all());
        }catch(\Throwable $e){
            $status = $e->getMessage();
            $success = false;
        }

        return redirect()->route('penilaian.index')->with('status', $status)->with('success', $success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penilaian $penilaian)
    {
        $status = 'Penilaian deleted!';
        $success = true;
        try {
            $penilaian->delete();
        }catch(\Throwable $e){
            $status = $e->getMessage();
            $success = false;
        }
        return redirect()->route('penilaian.index')->with('status', $status)->with('success', $success);
    }
}
