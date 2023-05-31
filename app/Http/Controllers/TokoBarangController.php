<?php

namespace App\Http\Controllers;

use App\Models\TokoBarang;
use Illuminate\Http\Request;

class TokoBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tokobarang = TokoBarang::all();
        return view('tokobarang.index', compact('tokobarang'));
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
        $attributes = $request->validate([
            'nama_toko' => 'required|max:255',
            'alamat_toko' => 'required|max:255',
            'nomor_hp' => 'required|max:255'
        ]);

        TokoBarang::create($attributes);

        return redirect('/tokobarang')->with('success', 'Data has been saved successfully!!');
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
    public function edit(Tokobarang $tokobarang)
    {
        return view('tokobarang.edit', compact('tokobarang'));
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tokobarang $tokobarang)
    {
        $tokobarang->delete();
        if(request()->ajax()){
            return response()->json([
                'code' => 0,
                'message' => ('message berhasil')
            ]);
        }
        return redirect('/tokobarang')->with('success','Data has been deleted successfully!');
    }
}
