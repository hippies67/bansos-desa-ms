@extends('back.layouts.data')

@section('title')
    Pengaturan Profil
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
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile Akun</a></li>        
        </ol>
    </div>
    <!-- start form -->
        <!-- start row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Profile Anda</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user-setting.update', Auth::user()->id) }}" method="POST">
                            @csrf
    
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap<span class="text-danger">*</span></label>
                                <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" value="{{ Auth::user()->nama_lengkap }}" placeholder="Masukkan Nama Lengkap">
                            </div>

                            <div class="form-group">
                                <label for="username">Username<span class="text-danger">*</span></label>
                                <input type="text" name="username" class="form-control" id="username" value="{{ Auth::user()->username }}" placeholder="Masukkan Username">
                            </div>

                            <div class="form-group">
                                <label for="email">Email<span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" id="email" value="{{ Auth::user()->email }}" placeholder="Masukkan Email">
                            </div>

                            @if(!App\Models\UserAuthInfo::where('user_id', Auth::user()->id)->where('ip_address', Illuminate\Support\Facades\Request::ip())->exists())
                                <div class="form-group d-flex justify-content-end mt-5">
                                    <button class="btn btn-md btn-primary waves-effect waves-light mr-2" type="button" onclick="loginAnomalyAlert()"><i
                                            class="fa fa-save mr-1"></i> Simpan Perubahan</button>
                                </div>
                            @else
                                <div class="form-group d-flex justify-content-end mt-5">
                                    <button class="btn btn-md btn-primary waves-effect waves-light mr-2" type="submit"><i
                                            class="fa fa-save mr-1"></i> Simpan Perubahan</button>
                                </div>
                            @endif
                        </form>
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
