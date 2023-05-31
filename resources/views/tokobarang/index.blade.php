@extends('layouts.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>LOKASI TOKO BARANG</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">TOKO BARANG</li>
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
                                    <h5 class="card-title">All Toko Barang</h5>
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
                                                        NAMA TOKO</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        ALAMAT TOKO</th>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        NOMOR TELPON TOKO</th>

                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        ACTION</th>
                                                </tr>
                                            </thead>
                                            @php
                                                $no = 1;
                                            @endphp
                                            <tbody>
                                                @foreach ($tokobarang as $s)
                                                    <tr>
                                                        <td class="ps-4">
                                                            <p class="text-xs font-weight-bold mb-0">{{ $no++ }}</p>
                                                        </td>
                                                        <td>
                                                            <p class="text-xs font-weight-bold mb-0">{{ $s->nama_toko }}</p>
                                                        </td>
                                                        <td>
                                                            <p class="text-xs font-weight-bold mb-0">{{ $s->alamat_toko }}
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="text-xs font-weight-bold mb-0">{{ $s->nomor_hp }}</p>
                                                        </td>
                                                        <td>
                                                            <a href="/tokobarang/{{ $s->id }}/edit"
                                                                class="btn btn-outline-warning bi bi-pencil-square"></a>

                                                            <a href="/tokobarang/{{ $s->id }}/destroy"
                                                                class="btn btn-outline-danger btn-action delete bi bi-trash"
                                                                data-url="{{ $s->nama_toko }}"
                                                                data-text="{{ $s->nama_toko }}"></a>
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
                    <h5 class="modal-title">Add Lokasi Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <!-- General Form Elements -->
                        <form action="/tokobarang/store" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- Alamat Toko --}}
                            <div class="row mb-3{{ $errors->has('alamat_toko') ? ' has-error' : '' }}">
                                <label for="alamat_toko" class="col-sm-2 col-form-label">Nama Toko</label>
                                <div class="col-sm-10">
                                    <input name="alamat_toko" type="text" id="alamat_toko" class="form-control"
                                        value="{{ old('alamat_toko') }}" required>
                                    @if ($errors->has('alamat_toko'))
                                        <span class="help-block"
                                            style="color: red;">{{ $errors->first('alamat_toko') }}</span>
                                    @endif
                                </div>
                            </div>


                            {{-- Nama Toko --}}
                            <div class="row mb-3{{ $errors->has('nama_toko') ? ' has-error' : '' }}">
                                <label for="nama_toko" class="col-sm-2 col-form-label">Nama Toko</label>
                                <div class="col-sm-10">
                                    <input name="nama_toko" type="text" id="nama_toko" class="form-control"
                                        value="{{ old('nama_toko') }}" required>
                                    @if ($errors->has('nama_toko'))
                                        <span class="help-block"
                                            style="color: red;">{{ $errors->first('nama_toko') }}</span>
                                    @endif
                                </div>
                            </div>

                            {{-- Nomor Hp Toko --}}
                            <div class="row mb-3{{ $errors->has('nomor_hp') ? ' has-error' : '' }}">
                                <label for="min_gol" class="col-sm-2 col-form-label">Nomor Hp Toko</label>
                                <div class="col-sm-10">
                                    <input name="nomor_hp" type="number" id="nomor_hp" class="form-control"
                                        value="{{ old('nomor_hp') }}" required>
                                    @if ($errors->has('nomor_hp'))
                                        <span class="help-block"
                                            style="color: red;">{{ $errors->first('nomor_hp') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="/dashboard" type="button" class="btn btn-primary" style="margin-top: 12px;">
                                    Home
                                </a>
                                <a href="/tokobarang" type="button" class="btn btn-primary" style="margin-top: 12px;">
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
                var tokobarang = $(this).attr('tokobarang');

                swal({
                        title: "Are you sure?",
                        text: "The " + tokobarang + " wants to delete??",
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
                            window.location = "/tokobarang" + "/destroy/" + book_id;

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
