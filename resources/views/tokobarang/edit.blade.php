@extends('layouts.master')
@section('content')
    @if (session('sukses'))
        <div class="alert alert-success" role="alert">
            {{ session('sukses') }}
        </div>
    @endif
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Edit Lokasi Toko Barang </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/tokobarang">Toko Barang</a></li>
                    <li class="breadcrumb-item active">Edit Barang</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title">EDIT BARANG MASUK</h5>
                                    @if (Session::has('sukses'))
                                        <div class="alert alert-success" role="alert">
                                            {{ Session::get('sukses') }}
                                    @endif
                                </div>
                                <div class="col-6">
                                    <div class="right float-end">
                                        <a href="/tokobarang" type="button" class="btn btn-primary"
                                            style="margin-top: 12px;">
                                            Back
                                        </a>
                                    </div>
                                    <!-- Basic Modal -->
                                </div>
                            </div>


                            <form action="/tokobarang/{{ $tokobarang->id }}/update" method="POST">
                                {{ csrf_field() }}

                                <div class="row mb-3">
                                    <label for="text" class="col-sm-2 col-form-label">Nama Toko</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_toko" id="nama_toko"
                                            value="{{ $tokobarang->nama_toko }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="text" class="col-sm-2 col-form-label">Alamat Toko</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="alamat_toko"
                                            value="{{ $tokobarang->alamat_toko }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="text" class="col-sm-2 col-form-label">Nomor Hp Toko</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="nomor_hp" id="nomor_hp"
                                            value="{{ $tokobarang->nomor_hp }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Submit Button</label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Save Update</button>
                                    </div>
                                </div>

                            </form><!-- End General Form Elements -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
