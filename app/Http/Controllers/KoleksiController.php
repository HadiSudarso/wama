<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koleksi;


class KoleksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $koleksi = Koleksi::with('user','buku')->orderBy('id','desc')->get();
        return view('koleksi.index', compact('koleksi'));
    }

    public function input(Request $request)
    {
        return view('koleksi.fromInput');
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
    public function store(Request $request, $id)
    {
        $cekuser = auth()->user()->id;
        
        Koleksi::create([
            'user_id' => $cekuser,
            'buku_id' => $id,
        ]);

        return redirect()->route('koleksi')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $koleksi = koleksi::with('user','buku')->orderBy('id','desc')->get();
        return view('koleksi.formEdit', compact('koleksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $koleksi = Koleksi::findorfail($id);
        $koleksi->update($request->all());

        return redirect()->route('koleksi')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $koleksi = Koleksi::findorfail($id);

        $koleksi->delete();

        return redirect()->route('koleksi')->with('success', 'Data berhasil dihapus');
    }
}