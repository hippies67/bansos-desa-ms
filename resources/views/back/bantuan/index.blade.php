@extends('back.layouts.data')

@section('title')
    Bantuan
@endsection

@section('title_menu')
    Daftar Data Bantuan
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
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Bantuan</a></li>
        </ol>
    </div>
    <!-- row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Bantuan</h4>
                    <div class="button-list">

                        @php
                            $user_atuh_info = App\Models\UserAuthInfo::where('user_id', Auth::user()->id)->first();
                        @endphp

                        @if($user_atuh_info->ip_address != Illuminate\Support\Facades\Request::ip())
                            <button type="button" onclick="loginAnomalyAlert()"
                            class="btn btn-primary btn-xs" data-animation="slide"
                            data-overlaySpeed="200" data-overlayColor="#36404a"><i class="fa fa-plus-circle mr-1"></i>
                            Tambah</button>
                        @else
                            <button type="button" data-toggle="modal" data-target="#addBantuanModal"
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
                                <th>Nama Bantuan</th>
                                <th>Jenis Bantuan</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @php
                                $increment = 1;
                            @endphp

                            @foreach ($bantuan as $data)
                                <tr>
                                    <td>{{ $increment++ }} </td>
                                    <td>{{ $data->nama_bantuan }}</td>
                                    <td>{{ $data->jenis_bantuan->nama_jenis_bantuan }}</td>
                                    <td>{{ $data->keterangan }}</td>
                                    <td>
                                        <div class="form-group" style="display: block;">
                                            @if($user_atuh_info->ip_address != Illuminate\Support\Facades\Request::ip())
                                                <button type="button" onclick="loginAnomalyAlert()" class="btn btn-warning btn-xs text-white"><i
                                                    class="fa fa-edit mr-1"></i>
                                                Edit</button>
                                            @else
                                                <button type="button" data-toggle="modal" data-target="#editBantuan"
                                                style="padding-bottom:2px;" data-ids="{{ $data->id }}"
                                                onclick="setEditData({{ $data }})"
                                                class="btn btn-warning btn-xs text-white"><i class="fa fa-edit mr-1"></i>
                                                Edit</button>
                                            @endif

                                           
                                            @if($user_atuh_info->ip_address != Illuminate\Support\Facades\Request::ip())
                                                <button type="button"
                                                    class="btn btn-danger btn-xs rounded waves-light waves-effect"
                                                    onclick="loginAnomalyAlert()"><i class="fa fa-trash-o mr-1"></i> Hapus
                                                </button>
                                            @else
                                                <form style="margin-top:15px;" action="{{ route('bantuan.destroy', $data) }}"
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
    <div class="modal fade" id="addBantuanModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Bantuan</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ route('bantuan.store') }}" method="post"
                        id="tambahBantuanForm">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <div class="col-12">
                                <label for="jenis_bantuan_id">Jenis Bantuan</label>
                                <select name="jenis_bantuan_id" class="form-control" id="jenis_bantuan_id">
                                    <option value="">Pilih Jenis Bantuan</option>
                                    @foreach($jenis_bantuan as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_jenis_bantuan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-12">
                                <label for="nama_bantuan">Nama Bantuan</label>
                                <input class="form-control mb-1" type="text"
                                    id="nama_bantuan" placeholder="Masukan Nama" name="nama_bantuan" value="{{ old('nama_bantuan') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="5"></textarea>
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

    <div class="modal fade" id="editBantuan">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Bantuan</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ route('bantuan.update', '') }}" id="editBantuanForm"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" id="checkNoKtp">

                        <div class="form-group">
                            <div class="col-12">
                                <label for="edit_jenis_bantuan_id">Jenis Bantuan</label>
                                <select name="edit_jenis_bantuan_id" class="form-control" id="edit_jenis_bantuan_id">
                                    <option value="">Pilih Jenis Bantuan</option>
                                    @foreach($jenis_bantuan as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_jenis_bantuan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-12">
                                <label for="edit_nama_bantuan">Nama Bantuan</label>
                                <input class="form-control mb-1" type="text"
                                    id="edit_nama_bantuan" placeholder="Masukan Nama" name="edit_nama_bantuan" value="{{ old('edit_nama_bantuan') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="edit_keterangan" id="edit_keterangan" class="form-control" cols="30" rows="5"></textarea>
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
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $("#tambahBantuanForm").validate({
                    rules: {
                        jenis_bantuan_id: {
                            required: true
                        },
                        nama_bantuan: {
                            required: true
                        },
                        keterangan: {
                            required: true
                        }
                    },
                    messages: {
                        jenis_bantuan_id: {
                            required: "Jenis Bantuan harus di isi",
                        },
                        nama_bantuan: {
                            required: "Tanggal Lahir harus di isi",
                        },
                        keterangan: {
                            required: "Keterangan harus di isi",
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
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $("#editBantuanForm").validate({
                    rules: {
                        edit_jenis_bantuan_id: {
                            required: true
                        },
                        edit_nama_bantuan: {
                            required: true
                        },
                        edit_keterangan: {
                            required: true
                        },
                    },
                    messages: {
                        edit_jenis_bantuan_id: {
                            required: "Jenis Batuan harus di isi"
                        },
                        edit_nama_bantuan: {
                            required: "Nama Bantuan harus di isi",
                        },
                        edit_keterangan: {
                            required: "Keterangan harus di isi",
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
            const updateLink = $('#editBantuanForm').attr('action');

            function setEditData(data) {
                $('#editBantuanForm').attr('action', `${updateLink}/${data.id}`);

                $('#edit_jenis_bantuan_id').val(data.jenis_bantuan_id);
                $('#edit_nama_bantuan').val(data.nama_bantuan);
                $('#edit_keterangan').val(data.keterangan);
            }

            // sweetalert delete one data
            function deleteAlert(e) {
                Swal.fire({
                    title: "Hapus Bantuan?",
                    text: `Seluruh data bantuan akan terhapus. Anda tidak akan dapat mengembalikan aksi
                ini!`,
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonColor: "rgb(11, 42, 151)",
                    cancelButtonColor: "rgb(209, 207, 207)",
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Batal"
                }).then(function(t) {
                    if (t.value) {
                        e.parentNode.submit()
                    }
                })
            }
        </script>
    @endsection
