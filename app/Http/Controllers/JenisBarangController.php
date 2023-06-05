<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
    public function index(){

        $jenisbarang = JenisBarang::all();
        return view('jenisbarang.index', compact('jenisbarang'));
    }

    public function store(Request $request){

        $attributes = $request->validate([
            'kategori_barang' => 'required|max:255',
            'nama_kategori' => 'required|max:255',
        ]);

        JenisBarang::create($attributes);

        return redirect('/jenisbarang')->with('success', 'Data has been saved successfuly!!');
    }
    
    public function edit($id){
        $jenisbarang = JenisBarang::find($id);
        return view('jenisbarang.edit', compact('jenisbarang'));
    }

    public function update(Request $request, $id){
        $jenisbarang = JenisBarang::find($id);
        $jenisbarang->update($request->all());
        toastr()->success('Data has been updated successfully!!');
        return redirect('/jenisbarang')->with('success', 'Data has been updated successfully!!');

    }

    public function destroy($id){
        $jenisbarang = JenisBarang::find($id);
        $jenisbarang->delete();
        return redirect('/jenisbarang')->with('success', 'Data has been deleted successfully!!');
    }
}
