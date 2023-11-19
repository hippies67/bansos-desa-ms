@extends('back.layouts.data')

@section('title')
Penduduk
@endsection

@section('title_menu')
Daftar Data Penduduk
@endsection

@section('css')
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.1/css/fixedHeader.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">
<link href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
    integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    @media (min-width: 767.98px) {
        .dataTables_wrapper .dataTables_length {
            margin-bottom: -42px;
        }
    }

    label.error {
        color: #F94687;
        font-size: 13px;
        font-size: .875rem;
        font-weight: 400;
        line-height: 1.5;
        margin-top: 5px;
        padding: 0;
    }

    input.error {
        color: #F94687;
        border: 1px solid #F94687;
    }

    /* .bootstrap-select .btn {
        display: none;
    } */

    .indicator.online {
        background: #28B62C;
        display: inline-block;
        width: 0.6em;
        height: 0.6em;
        border-radius: 50%;
        -webkit-animation: pulse-animation 2s infinite linear;
    }

    @-webkit-keyframes pulse-animation {
        0% {
            -webkit-transform: scale(1);
        }

        25% {
            -webkit-transform: scale(1);
        }

        50% {
            -webkit-transform: scale(1.2)
        }

        75% {
            -webkit-transform: scale(1);
        }

        100% {
            -webkit-transform: scale(1);
        }
    }

    .indicator.offline {
        background: #FF4136;
        display: inline-block;
        width: 1em;
        height: 1em;

    }

</style>
@endsection

@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Penduduk</a></li>
    </ol>
</div>
<!-- row -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Penduduk</h4>
                <div class="button-list">
                   @if(!App\Models\UserAuthInfo::where('user_id', Auth::user()->id)->where('ip_address', Illuminate\Support\Facades\Request::ip())->exists())
                        <button type="button" onclick="loginAnomalyAlert()"
                        class="btn btn-primary btn-xs" data-animation="slide"
                        data-overlaySpeed="200" data-overlayColor="#36404a"><i class="fa fa-plus-circle mr-1"></i>
                        Tambah</button>
                   @else
                        <button type="button" data-toggle="modal" data-target="#addPendudukModal"
                        class="btn btn-primary btn-xs" data-animation="slide" data-plugin="custommodal"
                        data-overlaySpeed="200" data-overlayColor="#36404a"><i class="fa fa-plus-circle mr-1"></i>
                        Tambah</button>
                   @endif
                   
                </div>
            </div>
            <div class="card-body">
                {{-- <div class="table-responsive"> --}}
                <table id="example4" class="table dt-responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>No KTP</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Aalamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @php
                        $increment = 1;
                        @endphp

                        @foreach($penduduk as $data)
                        <tr>
                            <td>{{ $increment++ }} </td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->no_ktp }}</td>
                            <td>{{ $data->jenis_kelamin == 'laki-laki' ? 'Laki-Laki' : 'Perempuan' }}</td>
                            <td>{{ $data->tanggal_lahir }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>
                                <div class="form-group" style="display: block;">
                                    @if(!App\Models\UserAuthInfo::where('user_id', Auth::user()->id)->where('ip_address', Illuminate\Support\Facades\Request::ip())->exists())
                                        <button type="button" onclick="loginAnomalyAlert()" class="btn btn-warning btn-xs text-white"><i
                                            class="fa fa-edit mr-1"></i>
                                        Edit</button>
                                    @else
                                        <button type="button" data-toggle="modal" data-target="#editPenduduk"
                                        style="padding-bottom:2px;" data-ids="{{ $data->id }}"
                                        onclick="setEditData({{ $data }})" class="btn btn-warning btn-xs text-white"><i
                                            class="fa fa-edit mr-1"></i>
                                        Edit</button>
                                    @endif
                                   
                                    @if(!App\Models\UserAuthInfo::where('user_id', Auth::user()->id)->where('ip_address', Illuminate\Support\Facades\Request::ip())->exists())
                                        <button type="button"
                                            class="btn btn-danger btn-xs rounded waves-light waves-effect"
                                            onclick="loginAnomalyAlert()"><i class="fa fa-trash-o mr-1"></i> Hapus
                                        </button>
                                    @else
                                        <form style="margin-top:15px;" action="{{ route('penduduk.destroy', $data) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="button"
                                                class="btn btn-danger btn-xs rounded waves-light waves-effect"
                                                onclick="deleteAlert(this)"><i class="fa fa-trash-o mr-1"></i> Hapus
                                            </button>
                                        </form>
                                    @endif
                                    
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- </div> --}}
            </div>
        </div>
    </div>
</div>

{{-- MODAL --}}
<div class="modal fade" id="addPendudukModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Penduduk</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('penduduk.store') }}" method="post"
                    id="tambahPendudukForm">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <div class="col-12">
                            <label for="nama">Nama</label>
                            <input class="form-control mb-1 @error('nama') is-invalid @enderror" type="text"
                                id="nama" placeholder="Masukan Nama" name="nama"
                                value="{{ old('nama') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="no_ktp">No Ktp</label>
                            <input class="form-control mb-1 @error('no_ktp') is-invalid @enderror" type="text"
                                id="no_ktp" placeholder="Masukan No Ktp" name="no_ktp"
                                value="{{ old('no_ktp') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input class="form-control mb-1 @error('tanggal_lahir') is-invalid @enderror" type="date"
                                id="tanggal_lahir" placeholder="Masukan Tanggal Lahir" name="tanggal_lahir"
                                value="{{ old('tanggal_lahir') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="5">{{ old('alamat') }}</textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" id="tambahButton">Simpan Data</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editPenduduk">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Penduduk</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('penduduk.update', '') }}" id="editPendudukForm"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="checkNoKtp">

                    <div class="form-group">
                        <div class="col-12">
                            <label for="edit_nama">Nama</label>
                            <input class="form-control mb-1" type="text"
                                id="edit_nama" placeholder="Masukan Nama" name="edit_nama"
                                value="{{ old('edit_nama') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="edit_no_ktp">No Ktp</label>
                            <input class="form-control mb-1" type="text"
                                id="edit_no_ktp" placeholder="Masukan No Ktp" name="edit_no_ktp"
                                value="{{ old('edit_no_ktp') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="edit_jenis_kelamin">Jenis Kelamin</label>
                            <select name="edit_jenis_kelamin" class="form-control" id="edit_jenis_kelamin">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="edit_tanggal_lahir">Tanggal Lahir</label>
                            <input class="form-control mb-1" type="date"
                                id="edit_tanggal_lahir" placeholder="Masukan Tanggal Lahir" name="edit_tanggal_lahir"
                                value="{{ old('edit_tanggal_lahir') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="edit_alamat">Alamat</label>
                            <textarea name="edit_alamat" class="form-control" id="edit_alamat" cols="30" rows="5">{{ old('edit_alamat') }}</textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="editButton">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection

    @section('js')
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/deznav-init.js') }}"></script>

    <!-- Datatable -->
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.1/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
    <script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- Sweetalert --}}
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

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#tambahPendudukForm").validate({
                rules: {
                    no_ktp: {
                        required: true,
                        remote: {
                            url: "{{ route('penduduk.checkNoKtp') }}",
                            type: "post",
                        }
                    },
                    nama: {
                        required: true
                    },
                    jenis_kelamin: {
                        required: true
                    },
                    tanggal_lahir: {
                        required: true
                    },
                    alamat: {
                        required: true
                    }
                },
                messages: {
                    no_ktp: {
                        required: "No Ktp harus di isi",
                        remote: "No Ktp sudah tersedia"
                    },
                    nama: {
                        required: "Nama harus di isi",
                    },
                    jenis_kelamin: {
                        required: "Jenis Kelamin harus di isi",
                    },
                    tanggal_lahir: {
                        required: "Tanggal Lahir harus di isi",
                    },
                    alamat: {
                        required: "Alamat harus di isi",
                    }
                },
                submitHandler: function(form) {
                    $("#tambahButton").prop('disabled', true);
                    $(form).submit();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#editPendudukForm").validate({
                rules: {
                    edit_no_ktp: {
                        required: true,
                        remote: {
                            param: {
                                url: "{{ route('penduduk.checkNoKtp') }}",
                                type: "post",
                            },
                            depends: function (element) {
                                // compare name in form to hidden field
                                return ($(element).val() !== $('#checkNoKtp').val());
                            },

                        }
                    },
                    edit_nama: {
                        required: true
                    },
                    edit_jenis_kelamin: {
                        required: true
                    },
                    edit_tanggal_lahir: {
                        required: true
                    },
                    edit_alamat: {
                        required: true
                    },
                },
                messages: {
                    edit_no_ktp: {
                        required: "No Ktp harus di isi",
                        remote: "No Ktp sudah tersedia"
                    },
                    edit_nama: {
                        required: "Nama harus di isi",
                    },
                    edit_jenis_kelamin: {
                        required: "Jenis Kelamin harus di isi",
                    },
                    edit_tanggal_lahir: {
                        required: "Tanggal Lahir harus di isi",
                    },
                    edit_alamat: {
                        required: "Alamat harus di isi",
                    }
                },
                submitHandler: function(form) {
                    $("#editButton").prop('disabled', true);
                    $(form).submit();
                }
            });
        });

    </script>

    <script>
        //  passing data to edit modal pop up 
        const updateLink = $('#editPendudukForm').attr('action');

        function setEditData(data) {
            $('#editPendudukForm').attr('action', `${updateLink}/${data.id}`);

            $('#edit_nama').val(data.nama);
            $('#edit_no_ktp').val(data.no_ktp);
            $('#checkNoKtp').val(data.no_ktp);
            $('#edit_jenis_kelamin').val(data.jenis_kelamin);
            $('#edit_tanggal_lahir').val(data.tanggal_lahir);
            $('#edit_alamat').val(data.alamat);
        }

        // sweetalert delete one data
        function deleteAlert(e) {
            Swal.fire({
                title: "Hapus Penduduk?",
                text: `Seluruh data penduduk akan terhapus. Anda tidak akan dapat mengembalikan aksi
                ini!`,
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "rgb(11, 42, 151)",
                cancelButtonColor: "rgb(209, 207, 207)",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then(function (t) {
                if (t.value) {
                    e.parentNode.submit()
                }
            })
        }

    </script>
    @endsection
