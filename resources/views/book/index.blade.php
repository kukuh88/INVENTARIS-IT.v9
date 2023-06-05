@extends('layouts.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>BARANG MASUK</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Inventaris</li>
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
                                    <h5 class="card-title">SEMUA BARANG</h5>
                                    @if (Session::has('sukses'))
                                        <div class="alert alert-success" role="alert">
                                            {{ Session::get('sukses') }}
                                    @endif
                                </div>
                                <div class="col-6">
                                    <div class="right float-end">
                                        <button type="button" class="btn btn-primary" style="margin-top: 12px;"
                                            data-bs-toggle="modal" data-bs-target="#basicModal">
                                            Tambah Barang
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
                                                        KODE BARANG
                                                    </th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        QR CODE
                                                    </th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        KATEGORI
                                                    </th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        STATUS BARANG
                                                    </th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        NO SERIAL
                                                    </th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        NAMA BARANG
                                                    </th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        TANGGAL MASUK
                                                    </th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        TERIMA DARI
                                                    </th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        KETERANGAN BARANG
                                                    </th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        ANYDESK
                                                    </th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        KETERANGAN EMAIL
                                                    </th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        KOMPUTER NAME PASSWORD
                                                    </th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        LOKASI
                                                    </th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        STATUS
                                                    </th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            @php
                                                $no = 1;
                                            @endphp
                                            <tbody>
                                                @foreach ($book as $b)
                                                    <tr>
                                                        <td class="ps-4">
                                                            <p class="text-xs font-weight-bold mb-0">{{ $no++ }}</p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p class="text-xs font-weight-bold mb-0">{{ $b->kode_barang }}
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <div class="visible-print text-center">
                                                                {!! QrCode::size(80)->generate($b->kode_barang) !!}
                                                                <p>Inv. Ir</p>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <p class="text-xs font-weight-bold mb-0">
                                                                {{ $b->kategori_barang }}
                                                            </p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p class="text-xs font-weight-bold mb-0">{{ $b->status_barang }}
                                                            </p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p class="text-xs font-weight-bold mb-0">{{ $b->no_serial }}
                                                            </p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p class="text-xs font-weight-bold mb-0">{{ $b->nama_barang }}
                                                            </p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p class="text-xs font-weight-bold mb-0">{{ $b->tgl_masuk }}</p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p class="text-xs font-weight-bold mb-0">{{ $b->terima_dari }}
                                                            </p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p class="text-xs font-weight-bold mb-0">{{ $b->kt_barang }}
                                                            </p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p class="text-xs font-weight-bold mb-0">{{ $b->anydesk }}
                                                            </p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p class="text-xs font-weight-bold mb-0">{{ $b->kt_email }}
                                                            </p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p class="text-xs font-weight-bold mb-0">{{ $b->kp_name }}
                                                            </p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p class="text-xs font-weight-bold mb-0">{{ $b->lokasi }}
                                                            </p>
                                                        </td>
                                                        <td class="text-center">
                                                            <span
                                                                class="text-secondary text-xs font-weight-bold">{{ $b->status }}</span>
                                                        </td>
                                                        <td>
                                                            <a href="/book/{{ $b->id }}/edit"
                                                                class="btn btn-warning"><i
                                                                    class="bi bi-pencil-square"></i></a>

                                                            <a href="/book/{{ $b->id }}/edit"
                                                                class="btn btn-primary"> <i
                                                                    class="bi bi-arrow-bar-right"></i></a>

                                                            <a href="#" class="btn btn-danger delete"
                                                                book-id="{{ $b->id }}"
                                                                book_name="{{ $b->name }}"><i
                                                                    class="bi bi-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </table> <!-- End Table with hoverable rows -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Barang Masuk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <!-- General Form Elements -->


                        <form action="/book/create" method="POST" class="row">
                            {{ csrf_field() }}


                            {{-- Kategori Barang --}}
                            <div class="col-6 mb-3{{ $errors->has('kategori_barang') ? ' has-error' : '' }}">
                                <label class="col-form-label">Kategori Barang</label>
                                <div>
                                    <select name="kategori_barang" class="form-select" id="#"
                                        aria-label="Floating label select example" onchange="enableBarang()">
                                        @foreach ($jenisbarang as $jb)
                                            <option value="{{ $jb->id }}"
                                                data-exclude="{{ $jb->kategori_barang }}">
                                                {{ $jb->nama_kategori }}
                                            </option>
                                            {{-- <option value="{{ $jb->id }}" data-exclude="1">
                                                {{ $jb->nama_kategori }}</option> --}}
                                        @endforeach
                                    </select>
                                    @if ($errors->has('kategori_barang'))
                                        <span class="help-block"
                                            style="color: red;">{{ $errors->first('kategori_barang') }}</span>
                                    @endif
                                </div>
                            </div>

                            {{-- Status Barang --}}
                            <div class="col-6 mb-3{{ $errors->has('status_barang') ? ' has-error' : '' }}">
                                <label class="col-form-label">Status Barang</label>
                                <div>
                                    <select name="status_barang" class="form-select" id="#"
                                        aria-label="Floating label select example">
                                        <option value="O"{{ old('O') == 'O' ? 'selected' : '' }}>OLD
                                        </option>
                                        <option value="N"{{ old('N') == 'N' ? 'selected' : '' }}>
                                            NEW
                                        </option>
                                        {{-- <option value="03"{{ old('Printer') == 'Printer' ? 'selected' : '' }}>
                                            Printer</option>
                                        <option value="04"{{ old('Ups') == 'Ups' ? 'selected' : '' }}>
                                            Ups</option> --}}
                                        {{-- <option value="Magazine"{{ old('type') == 'Magazine' ? 'selected' : '' }}>
                                        Magazine</option> --}}
                                    </select>
                                    @if ($errors->has('status_barang'))
                                        <span class="help-block"
                                            style="color: red;">{{ $errors->first('status_barang') }}</span>
                                    @endif
                                </div>
                            </div>

                            {{-- No Serial --}}
                            <div class="col-sm-6 mb-3{{ $errors->has('no_serial') ? ' has-error' : '' }}">
                                <label for="inputText" class="col-form-label">No Serial</label>
                                <div>
                                    <input name="no_serial" type="text" id="rupiah" class="form-control"
                                        value="{{ old('no_serial') }}">
                                    @if ($errors->has('no_serial'))
                                        <span class="help-block"
                                            style="color: red;">{{ $errors->first('no_serial') }}</span>
                                    @endif
                                </div>
                            </div>

                            {{-- Nama Barang --}}
                            <div class="col-sm-6 mb-3{{ $errors->has('nama_barang') ? ' has-error' : '' }}">
                                <label for="inputText" class="col-form-label">Nama Barang</label>
                                <div>
                                    <input name="nama_barang" type="text" id="rupiah" class="form-control"
                                        value="{{ old('nama_barang') }}">
                                    @if ($errors->has('nama_barang'))
                                        <span class="help-block"
                                            style="color: red;">{{ $errors->first('nama_barang') }}</span>
                                    @endif
                                </div>
                            </div>

                            {{-- Tanggal Masuk --}}
                            <div class="col-sm-6 mb-3{{ $errors->has('tgl_masuk') ? ' has-error' : '' }}">
                                <label for="date" class="col-form-label">Tanggal Masuk</label>
                                <div>
                                    <input name="tgl_masuk" type="date" id="tgl_masuk" class="form-control"
                                        value="{{ old('tgl_masuk') }}">
                                    @if ($errors->has('tgl_masuk'))
                                        <span class="help-block"
                                            style="color: red;">{{ $errors->first('tgl_masuk') }}</span>
                                    @endif
                                </div>
                            </div>

                            {{-- Terima Dari --}}
                            <div class="col-sm-6 mb-3{{ $errors->has('terima_dari') ? ' has-error' : '' }}">
                                <label for="inputText" class="col-form-label">Terima Dari Toko</label>
                                <div>
                                    <input name="terima_dari" type="text" id="rupiah" class="form-control"
                                        value="{{ old('terima_dari') }}">
                                    @if ($errors->has('terima_dari'))
                                        <span class="help-block"
                                            style="color: red;">{{ $errors->first('terima_dari') }}</span>
                                    @endif
                                </div>
                            </div>

                            {{-- Keterangan Barang --}}
                            <div class="col-sm-6 mb-3{{ $errors->has('kt_barang') ? ' has-error' : '' }}">
                                <label for="inputText" class="col-form-label">Keterangan Barang</label>
                                <div>
                                    <input name="kt_barang" type="text" id="rupiah" class="form-control"
                                        value="{{ old('kt_barang') }}">
                                    @if ($errors->has('kt_barang'))
                                        <span class="help-block"
                                            style="color: red;">{{ $errors->first('kt_barang') }}</span>
                                    @endif
                                </div>
                            </div>

                            {{-- Anydesk --}}
                            <div class="col-sm-6 mb-3{{ $errors->has('anydesk') ? ' has-error' : '' }}" id="anydesk">
                                <label for="inputText" class="col-form-label">Anydesk</label>
                                <div>
                                    <input name="anydesk" type="text" class="form-control"
                                        value="{{ old('anydesk') }}">
                                    @if ($errors->has('anydesk'))
                                        <span class="help-block"
                                            style="color: red;">{{ $errors->first('anydesk') }}</span>
                                    @endif
                                </div>
                            </div>

                            {{-- Keterangan Email --}}
                            <div class="col-sm-6 mb-3{{ $errors->has('kt_email') ? ' has-error' : '' }}">
                                <label for="inputText" class="col-form-label">Keterangan Email</label>
                                <div>
                                    <input name="kt_email" type="text" id="rupiah" class="form-control"
                                        value="{{ old('kt_email') }}">
                                    @if ($errors->has('kt_email'))
                                        <span class="help-block"
                                            style="color: red;">{{ $errors->first('kt_email') }}</span>
                                    @endif
                                </div>
                            </div>

                            {{-- Komputer Nmae Password --}}
                            <div class="col-sm-6 mb-3{{ $errors->has('kp_name') ? ' has-error' : '' }}">
                                <label for="inputText" class="col-form-label">Komputer Name</label>
                                <div>
                                    <input name="kp_name" type="text" id="rupiah" class="form-control"
                                        value="{{ old('kp_name') }}">
                                    @if ($errors->has('kp_name'))
                                        <span class="help-block"
                                            style="color: red;">{{ $errors->first('kp_name') }}</span>
                                    @endif
                                </div>
                            </div>

                            {{-- Lokasi Barang --}}
                            <div class="col-sm-6 mb-3{{ $errors->has('lokasi') ? ' has-error' : '' }}">
                                <label class="col-form-label">Lokasi Barang</label>
                                <div>
                                    <select name="lokasi" class="form-select" id="#"
                                        aria-label="Floating label select example">
                                        @foreach ($tokobarang as $b)
                                            <option value="{{ $b->id }}">{{ $b->alamat_toko }}</option>
                                        @endforeach

                                    </select>
                                    @if ($errors->has('lokasi'))
                                        <span class="help-block"
                                            style="color: red;">{{ $errors->first('lokasi') }}</span>
                                    @endif
                                </div>
                            </div>

                            {{-- Hostname --}}
                            <div class="col-sm-6 mb-3{{ $errors->has('hostname') ? ' has-error' : '' }}">
                                <label for="inputText" class="col-form-label">Hostname Komputer/Laptop</label>
                                <div>
                                    <input name="hostname" type="text" id="hostname" class="form-control"
                                        value="{{ old('hostname') }}">
                                    @if ($errors->has('hostname'))
                                        <span class="help-block"
                                            style="color: red;">{{ $errors->first('hostname') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <button type="submit" class="btn btn-outline-primary">Save</button>
                                <a href="/dashboard" type="button" class="btn btn-outline-primary"
                                    style="margin-top: 12px;">
                                    Home
                                </a>
                                <a href="/book" type="button" class="btn btn-outline-primary"
                                    style="margin-top: 12px;">
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
                            window.location = "/book/" + book_id + "/delete";

                        } else {
                            swal("Data is not deleted");
                        }
                    });
            });
        });

        $(function() {
            $('#floatingSelect').hide();
            $('#type').change(function() {
                if ($('#type').val() == '') {
                    $('#floatingSelect').show();
                } else {
                    $('#floatingSelect').hide();
                }
            });
        });
    </script>
@endsection
