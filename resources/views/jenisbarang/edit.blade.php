@extends('layouts.master')
@section('content')
    @if (session('sukses'))
        <div class="alert alert-success" role="alert">
            {{ session('sukses') }}
        </div>
    @endif
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Edit Jenis Barang </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/jenisbarang">Jenis Barang</a></li>
                    <li class="breadcrumb-item active">Edit Jenis Barang</li>
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
                                    <h5 class="card-title">EDIT Jenis Barang</h5>
                                    @if (Session::has('sukses'))
                                        <div class="alert alert-success" role="alert">
                                            {{ Session::get('sukses') }}
                                    @endif
                                </div>
                                <div class="col-6">
                                    <div class="right float-end">
                                        <a href="/jenisbarang" type="button" class="btn btn-primary"
                                            style="margin-top: 12px;">
                                            Back
                                        </a>
                                    </div>
                                    <!-- Basic Modal -->
                                </div>
                            </div>


                            <form action="/jenisbarang/{{ $jenisbarang->id }}/update" method="POST">
                                {{ csrf_field() }}

                                <div class="row mb-3">
                                    <label for="text" class="col-sm-2 col-form-label">Kategori Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kategori_barang"
                                            id="kategori_barang" value="{{ $jenisbarang->kategori_barang }}" disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="text" class="col-sm-2 col-form-label">Nama Kategori</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_kategori"
                                            value="{{ $jenisbarang->nama_kategori }}">
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
