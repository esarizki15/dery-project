<?php

namespace App\Http\Controllers;

use App\StatusPerpanjang;
use Illuminate\Http\Request;
use \Carbon\Carbon;
use Auth;
class StatusPerpanjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData = StatusPerpanjang::all();
        if(Auth::user()->role_id == 4){
            $allData = StatusPerpanjang::whereHas('penilaian', function ($query){
                $query->whereHas('user', function ($queryUser){
                    $queryUser->where('role_id', Auth::user()->id);
                });
            })->get();
        }
        return view('status-perpanjang.index', compact('allData'));
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
            $data = StatusPerpanjang::where('penilaian_id', $request->penilaian_id)->whereDate('created_at', Carbon::today())->first();
            if(!empty($data)) {
                $data->update($request->all());
            }else{
                $data = StatusPerpanjang::Create($request->all());
            }
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
