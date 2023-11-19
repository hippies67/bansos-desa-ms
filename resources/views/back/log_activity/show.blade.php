@extends('back.layouts.data')

@section('title')
    Log Aktifitas User
@endsection
@section('css')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">

    <style>
        .cke_chrome {
            border: 1px solid #e3eaef !important;
        }

    </style>
@endsection

@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Log Activity</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail</a></li>        
        </ol>
    </div>
    <!-- start form -->
        <!-- start row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Aktifitas User</h4>
                    </div>
                    <div class="card-body">
                        <p>Log aktifikas yang tersedia di sini hanya aktifitas yang dilakukan akun ketika terjadi <b>login anomali</b>.</p>
                        
                        <hr>
                        <div class="row mt-4 mb-2">
                            <div class="col-sm-3">
                                <h6>Waktu</h6>
                            </div>
                            <div class="col-sm-3">
                                <h6>Judul Halaman</h6>
                            </div>
                            <div class="col-sm-6">
                                <h6>Link</h6>
                            </div>
                           
                        </div>  
                        @foreach($log_activity as $data)
                            <div class="row mb-2">
                                <div class="col-sm-3">
                                    {{ $data->created_at }}
                                </div>
                                <div class="col-sm-3">
                                    {{ $data->page_title }}
                                </div>
                                <div class="col-sm-6">
                                    {{ $data->url }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('js')
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/deznav-init.js') }}"></script>

    <script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>

    <script>
        function loginAnomalyAlert() {
                Swal.fire({
                    title: "Peringatan!",
                    html: `Kami telah mendeteksi adanya <b>anomali</b> login pada akun Anda! Silahkan cek email untuk konfirmasi akun Anda.`,
                    type: "info",
                    showCancelButton: false,
                    confirmButtonColor: "rgb(11, 42, 151)",
                    confirmButtonText: "Ok",
                })
            }
    </script>

@endsection
