<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\TokoBarang;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $book = Book::all();
        return view('book.index',compact(['book']), [
            'tokobarang' => TokoBarang::get(),
        ]);
    }

    public function create(Request $request)
    {
        $attributes = $request->validate([
            // 'kode_barang' => 'required|max:255|unique:book',
            'kategori_barang' => 'required|max:255',
            'status_barang' => 'required|in:O,N',
            // 'status' => 'required|max:255',
            'nama_barang' => 'required|max:255',
            'kt_barang' => 'required|max:255',
            'no_serial' => 'required|max:255',
            'tgl_masuk' => 'required|max:255',
            'terima_dari' => 'required|max:255',
            'lokasi' => 'required|max:255',
            'anydesk' => 'required|max:255',
            'kt_email' => 'required|max:255',
            'kp_name' => 'required|max:255',
        ]);
        $attributes['status'] = 1;

        $column = "kode_barang";
        $date = strtotime($request->tgl_masuk);
        $bulan = date('m', $date);
        $tahun = date('y', $date);
        if ($request->status_barang == "O") {
            $bulan = "00";
            $tahun = "00";
        }
        $book = Book::latest($column)->first();

        $info_barang = Book::select(['kode_barang'])->orderBy('kode_barang', 'desc')->first();
        $auto_number = '0001';

        if ($info_barang) {
            $data_explode = explode(".", $info_barang->kode_barang);
            $sequence = (int) $data_explode[4] + 1;
            $auto_number = str_pad($sequence, 4, '0', STR_PAD_LEFT);
        }

        $template_kode_barang = '%s.%s.%s.%s.%s';
        $attributes['kode_barang'] = sprintf(
            $template_kode_barang,
            $request->status_barang,
            $request->kategori_barang,
            $bulan,
            $tahun,
            $auto_number
        );

        Book::create($attributes);

        return redirect('/book')->with('success','Data has been saved successfully!');
    }

    public function edit($id){
        $book = Book::find($id);
        return view('book.edit',compact(['book']));
    }

    public function update(Request $request,$id){
        $book = Book::find($id);
        $book->update($request->all());
        toastr()->success('Data has been updated successfully!');
        return redirect('/book')->with('success','Data has been updated successfully!');
    }

    public function delete($id){
        $book = Book::find($id);
        $book->delete();
        return redirect('/book')->with('success','Data has been deleted successfully!');
    }

}
