@extends('layouts.master')
@section('content')
    @if (session('sukses'))
        <div class="alert alert-success" role="alert">
            {{ session('sukses') }}
        </div>
    @endif
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>TAMBAH BARANG INVENTARIS</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/book">Inventaris</a></li>
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
                                        <a href="/book" type="button" class="btn btn-primary" style="margin-top: 12px;">
                                            Back
                                        </a>
                                    </div>
                                    <!-- Basic Modal -->
                                </div>
                            </div>


                            <form action="/book/{{ $book->id }}/update" method="POST">
                                {{ csrf_field() }}
                                <div class="row mb-3">
                                    <label for="text" class="col-sm-2 col-form-label">Kode Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kode_barang" id="kode_barang"
                                            value="{{ $book->kode_barang }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="text" class="col-sm-2 col-form-label">Terima Dari</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="terima_dari" id="terima_dari"
                                            value="{{ $book->terima_dari }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Kategori Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kategori_barang"
                                            id="kategori_barang" value="{{ $book->kategori_barang }}" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Lokasi Dibeli</label>
                                    <div class="col-sm-10">
                                        <select name="lokasi" class="form-control" id="lokasi">
                                            <option value="lokasi" @if ($book->lokasi == 'lokasi') selected @endif>lokasi
                                            </option>
                                            <option value="Kota Banda Aceh"
                                                @if ($book->lokasi == 'Kota Banda Aceh') selected @endif>
                                                Aceh
                                            </option>
                                            <option value="Kota Denpasar" @if ($book->lokasi == 'Kota Denpasar') selected @endif>
                                                Bali
                                            </option>
                                            <option value="Kota Bengkulu" @if ($book->lokasi == 'Kota Bengkulu') selected @endif>
                                                Bengkulu
                                            </option>
                                            <option value="Kota Pangkalpinang"
                                                @if ($book->lokasi == 'Kota Pangkalpinang') selected @endif>
                                                Bangka Belitung
                                            </option>
                                            <option value="Ibu Kota Jakarta"
                                                @if ($book->lokasi == 'Ibu Kota Jakarta') selected @endif>
                                                Jakarta
                                            </option>
                                            <option value="Kota Jambi" @if ($book->lokasi == 'Kota Jambi') selected @endif>
                                                Jambi
                                            </option>
                                            <option value="Kota Semarang" @if ($book->lokasi == 'Kota Semarang') selected @endif>
                                                Jawa Tengah
                                            </option>
                                            <option value="Kota Surabaya"
                                                @if ($book->lokasi == 'Kota Surabaya') selected @endif>
                                                Jawa Timur
                                            </option>
                                            <option value="Jawa Barat" @if ($book->lokasi == 'Jawa Barat') selected @endif>
                                                Jawa Barat
                                            </option>
                                            <option value="Yogyakarta" @if ($book->lokasi == 'Yogyakarta') selected @endif>
                                                Yogyakarta
                                            </option>
                                            <option value="Kalimatan Barat"
                                                @if ($book->lokasi == 'Kalimatan Barat') selected @endif>
                                                Kalimatan Barat
                                            </option>
                                            <option value="Kalimatan Selatan"
                                                @if ($book->lokasi == 'Kalimatan Selatan') selected @endif>
                                                Kalimatan Selatan
                                            </option>
                                            <option value="Kalimatan Tengah"
                                                @if ($book->lokasi == 'Kalimatan Tengah') selected @endif>
                                                Kalimatan Tengah
                                            </option>
                                            <option value="Kalimatan Timur"
                                                @if ($book->lokasi == 'Kalimatan Timur') selected @endif>
                                                Kalimatan Timur
                                            </option>
                                            <option value="Lampung" @if ($book->lokasi == 'Lampung') selected @endif>
                                                Lampung
                                            </option>
                                            <option value="NTB" @if ($book->lokasi == 'NTB') selected @endif>
                                                Nusa Tenggara Barat
                                            </option>
                                            <option value="NTT" @if ($book->lokasi == 'NTT') selected @endif>
                                                Nusa Tenggara Timur
                                            </option>
                                            <option value="Riau" @if ($book->lokasi == 'Riau') selected @endif>
                                                Riau
                                            </option>
                                            <option value="Sulawesi Selatan"
                                                @if ($book->lokasi == 'Sulawesi Selatan') selected @endif>
                                                Sulawesi Selatan
                                            </option>
                                            <option value="Sulawesi Tengah"
                                                @if ($book->lokasi == 'Sulawesi Tengah') selected @endif>
                                                Sulawesi Tengah
                                            </option>
                                            <option value="Sulawesi Utara"
                                                @if ($book->lokasi == 'Sulawesi Utara') selected @endif>
                                                Sulawesi Utara
                                            </option>
                                            <option value="Sumatra Barat"
                                                @if ($book->lokasi == 'Sumatra Barat') selected @endif>
                                                Sumatra Barat
                                            </option>
                                            <option value="Sumatra Utara"
                                                @if ($book->lokasi == 'Sumatra Utara') selected @endif>
                                                Sumatra Utara
                                            </option>
                                            <option value="Maluku Utara"
                                                @if ($book->lokasi == 'Maluku Utara') selected @endif>
                                                Maluku Utara
                                            </option>
                                            <option value="Baten" @if ($book->lokasi == 'Baten') selected @endif>
                                                Baten
                                            </option>
                                            <option value="Gorontalo" @if ($book->lokasi == 'Gorontalo') selected @endif>
                                                Gorontalo
                                            </option>
                                            <option value="Papua" @if ($book->lokasi == 'Papua') selected @endif>
                                                Papua
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                {{-- <div class="form-group">
                                    <label for="exampleFormControlSelect1">lokasi Barang Dibeli</label>
                                    <select name="lokasi" class="form-control" id="exampleFormControlSelect1">
                                        <option value="lokasi" @if ($book->lokasi == 'lokasi') selected @endif>lokasi
                                        </option>
                                        <option value="Kota Banda Aceh" @if ($book->lokasi == 'Kota Banda Aceh') selected @endif>
                                            Aceh
                                        </option>
                                        <option value="Kota Denpasar" @if ($book->lokasi == 'Kota Denpasar') selected @endif>
                                            Bali
                                        </option>
                                        <option value="Kota Bengkulu" @if ($book->lokasi == 'Kota Bengkulu') selected @endif>
                                            Bengkulu
                                        </option>
                                        <option value="Kota Pangkalpinang"
                                            @if ($book->lokasi == 'Kota Pangkalpinang') selected @endif>
                                            Bangka Belitung
                                        </option>
                                        <option value="Ibu Kota Jakarta"
                                            @if ($book->lokasi == 'Ibu Kota Jakarta') selected @endif>
                                            Jakarta
                                        </option>
                                        <option value="Kota Jambi" @if ($book->lokasi == 'Kota Jambi') selected @endif>
                                            Jambi
                                        </option>
                                        <option value="Kota Semarang" @if ($book->lokasi == 'Kota Semarang') selected @endif>
                                            Jawa Tengah
                                        </option>
                                        <option value="Kota Surabaya" @if ($book->lokasi == 'Kota Surabaya') selected @endif>
                                            Jawa Timur
                                        </option>
                                        <option value="Jawa Barat" @if ($book->lokasi == 'Jawa Barat') selected @endif>
                                            Jawa Barat
                                        </option>
                                        <option value="Yogyakarta" @if ($book->lokasi == 'Yogyakarta') selected @endif>
                                            Yogyakarta
                                        </option>
                                        <option value="Kalimatan Barat"
                                            @if ($book->lokasi == 'Kalimatan Barat') selected @endif>
                                            Kalimatan Barat
                                        </option>
                                        <option value="Kalimatan Selatan"
                                            @if ($book->lokasi == 'Kalimatan Selatan') selected @endif>
                                            Kalimatan Selatan
                                        </option>
                                        <option value="Kalimatan Tengah"
                                            @if ($book->lokasi == 'Kalimatan Tengah') selected @endif>
                                            Kalimatan Tengah
                                        </option>
                                        <option value="Kalimatan Timur"
                                            @if ($book->lokasi == 'Kalimatan Timur') selected @endif>
                                            Kalimatan Timur
                                        </option>
                                        <option value="Lampung" @if ($book->lokasi == 'Lampung') selected @endif>
                                            Lampung
                                        </option>
                                        <option value="NTB" @if ($book->lokasi == 'NTB') selected @endif>
                                            Nusa Tenggara Barat
                                        </option>
                                        <option value="NTT" @if ($book->lokasi == 'NTT') selected @endif>
                                            Nusa Tenggara Timur
                                        </option>
                                        <option value="Riau" @if ($book->lokasi == 'Riau') selected @endif>
                                            Riau
                                        </option>
                                        <option value="Sulawesi Selatan"
                                            @if ($book->lokasi == 'Sulawesi Selatan') selected @endif>
                                            Sulawesi Selatan
                                        </option>
                                        <option value="Sulawesi Tengah"
                                            @if ($book->lokasi == 'Sulawesi Tengah') selected @endif>
                                            Sulawesi Tengah
                                        </option>
                                        <option value="Sulawesi Utara" @if ($book->lokasi == 'Sulawesi Utara') selected @endif>
                                            Sulawesi Utara
                                        </option>
                                        <option value="Sumatra Barat" @if ($book->lokasi == 'Sumatra Barat') selected @endif>
                                            Sumatra Barat
                                        </option>
                                        <option value="Sumatra Utara" @if ($book->lokasi == 'Sumatra Utara') selected @endif>
                                            Sumatra Utara
                                        </option>
                                        <option value="Maluku Utara" @if ($book->lokasi == 'Maluku Utara') selected @endif>
                                            Maluku Utara
                                        </option>
                                        <option value="Baten" @if ($book->lokasi == 'Baten') selected @endif>
                                            Baten
                                        </option>
                                        <option value="Gorontalo" @if ($book->lokasi == 'Gorontalo') selected @endif>
                                            Gorontalo
                                        </option>
                                        <option value="Papua" @if ($book->lokasi == 'Papua') selected @endif>
                                            Papua
                                        </option>
                                    </select>
                                    </select>
                                </div> --}}

                                <div class="row mb-3">
                                    <label for="text" class="col-sm-2 col-form-label">No Serial</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="no_serial"
                                            value="{{ $book->no_serial }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="text" class="col-sm-2 col-form-label">Nama Barang/Merek</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_barang" id="nama_barang"
                                            value="{{ $book->nama_barang }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="text" class="col-sm-2 col-form-label">Keterangan Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kt_barang" id="kt_barang"
                                            value="{{ $book->kt_barang }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Status Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="status_barang"
                                            id="status_barang" value="{{ $book->status_barang }}" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="text" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="status" id="status"
                                            value="{{ $book->status }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="text" class="col-sm-2 col-form-label">Anydesk</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="anydesk" id="anydesk"
                                            value="{{ $book->anydesk }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="text" class="col-sm-2 col-form-label">Komputer Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kp_name" id="kp_name"
                                            value="{{ $book->kp_name }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="text" class="col-sm-2 col-form-label">Keterangan Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kt_email" id="kt_email"
                                            value="{{ $book->kt_email }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Masuk Barang</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tgl_masuk" id="tgl_masuk"
                                            value="{{ $book->tgl_masuk }}">
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
