@extends('layouts.master')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>DASHBOARD INVENTARIS</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/error">Dashboard</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Sales Card -->
                    <div class="col-md-12">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <center>
                                    <h1 class="card-title" style="margin-bottom: -25px;">WELCOME TO PT DOK DAN PERKAPALAN
                                        AIR KANTUNG</h1>
                                    <h1 class="card-title" style="margin-bottom: -25px;">YOUTUBE<a
                                            href="https://www.youtube.com/@dakofficial2788"> MORE...</a></h1>
                                </center>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->
                </div>
            </div>
            </div>
        </section>

    </main><!-- End #main -->
@section('sweetalert')
    <script>
        swal("Welcome Insan PT DOK DAN PERKAPALAN AIR KANTUNG");
    </script>
@endsection
