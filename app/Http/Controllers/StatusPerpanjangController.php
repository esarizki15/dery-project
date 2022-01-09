<?php

namespace App\Http\Controllers;

use App\StatusPerpanjang;
use Illuminate\Http\Request;
use \Carbon\Carbon;

class StatusPerpanjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = 'Data stored!';
        $success = true;
        try{
            StatusPerpanjang::updateOrCreate(
                [
                    'penilaian_id' => $request->penilaian_id,
                    'created_at' => Carbon::today(),
                ], 
                $request->all());
        }catch(\Throwable $e){
            $status = $e->getMessage();
            $success = false;
        }
        return redirect()->back()->with('status', $status)->with('success', $success);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StatusPerpanjang  $statusPerpanjang
     * @return \Illuminate\Http\Response
     */
    public function show(StatusPerpanjang $statusPerpanjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StatusPerpanjang  $statusPerpanjang
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusPerpanjang $statusPerpanjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StatusPerpanjang  $statusPerpanjang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusPerpanjang $statusPerpanjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StatusPerpanjang  $statusPerpanjang
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusPerpanjang $statusPerpanjang)
    {
        //
    }
}
