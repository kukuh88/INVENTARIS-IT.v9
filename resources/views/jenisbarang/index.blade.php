@extends('layouts.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>JENIS BARANG</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">JENIS BARANG</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="pagetitle">
            {{-- <h1>BARANG MASUK</h1> --}}
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title">All Jenis Barang</h5>
                                </div>
                                <div class="col-6">
                                    <div class="right float-end">
                                        <button type="button" class="btn btn-outline-primary" style="margin-top: 12px;"
                                            data-bs-toggle="modal" data-bs-target="#basicModal">
                                            Add TokoBarang
                                        </button>
                                    </div>
                                    <!-- Basic Modal -->
                                </div>
                            </div>
                            <!-- Table with hoverable rows -->
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <table class="table table-hover" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        NO
                                                    </th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        ID KATEGORI</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        NAMA KATEGORI</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        ACTION</th>
                                                </tr>
                                            </thead>
                                            @php
                                                $no = 1;
                                            @endphp
                                            <tbody>
                                                @foreach ($jenisbarang as $s)
                                                    <tr>
                                                        <td class="ps-4">
                                                            <p class="text-xs font-weight-bold mb-0">{{ $no++ }}</p>
                                                        </td>
                                                        <td>
                                                            <p class="text-xs font-weight-bold mb-0">
                                                                {{ $s->kategori_barang }}
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="text-xs font-weight-bold mb-0">{{ $s->nama_kategori }}
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <a href="/jenisbarang/{{ $s->id }}/edit"
                                                                class="btn btn-warning"><i
                                                                    class="bi bi-pencil-square"></i></a>

                                                            <a href="#" class="btn btn-danger delete"
                                                                book-id="{{ $s->id }}"
                                                                book_name="{{ $s->nama_kategori }}"><i
                                                                    class="bi bi-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <!-- End Table with hoverable rows -->
                                </div>
                            </div>
                        </div>
                    </div>
        </section>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Jenis Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <!-- General Form Elements -->
                        <form action="/jenisbarang/store" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- Alamat Toko --}}
                            <div class="row mb-3{{ $errors->has('id_kategori') ? ' has-error' : '' }}">
                                <label for="id_kategori" class="col-sm-2 col-form-label">Kategori Barang</label>
                                <div class="col-sm-10">
                                    <input name="kategori_barang" type="text" id="kategori_barang" class="form-control"
                                        value="{{ old('kategori_barang') }}" required>
                                    @if ($errors->has('kategori_barang'))
                                        <span class="help-block"
                                            style="color: red;">{{ $errors->first('kategori_barang') }}</span>
                                    @endif
                                </div>
                            </div>


                            {{-- Nama Toko --}}
                            <div class="row mb-3{{ $errors->has('nama_kategori') ? ' has-error' : '' }}">
                                <label for="nama_kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                                <div class="col-sm-10">
                                    <input name="nama_kategori" type="text" id="nama_kategori" class="form-control"
                                        value="{{ old('nama_kategori') }}" required>
                                    @if ($errors->has('nama_kategori'))
                                        <span class="help-block"
                                            style="color: red;">{{ $errors->first('nama_kategori') }}</span>
                                    @endif
                                </div>
                            </div>


                            <div class="row mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="/dashboard" type="button" class="btn btn-primary" style="margin-top: 12px;">
                                    Home
                                </a>
                                <a href="/jenisbarang" type="button" class="btn btn-primary" style="margin-top: 12px;">
                                    Back
                                </a>
                            </div>
                    </div>
                    </form><!-- End General Form Elements -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('sweetalert')
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
            $('body').on('click', '.delete', function() {
                var book_id = $(this).attr('book-id');
                var book_name = $(this).attr('book_name');

                swal({
                        title: "Are you sure?",
                        text: "The " + book_name + " wants to delete??",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        console.log(willDelete);
                        if (willDelete) {
                            //swal("Data siswa dengan id "+ siswa_id +" telah berhasil dihapus!", {
                            //icon: "success",
                            //});
                            window.location = "/jenisbarang/" + book_id + "/destroy";

                        } else {
                            swal("Data is not deleted");
                        }
                    });
            });
        });

        @if (session()->has('sukses'))
            Toast.fire({
                icon: 'success',
                title: '{{ session()->pull('sukses') }}'
            })
        @elseif (session()->has('danger'))
            Toast.fire({
                icon: 'error',
                title: '{{ session()->pull('danger') }}'
            })
        @endif
    </script>
@endsection
