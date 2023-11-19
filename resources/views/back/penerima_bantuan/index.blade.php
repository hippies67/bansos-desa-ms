@extends('back.layouts.data')

@section('title')
    Penerima Bantuan
@endsection

@section('title_menu')
    Daftar Data Penerima Bantuan
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
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Penerima Bantuan</a></li>
        </ol>
    </div>
    <!-- row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Penerima Bantuan</h4>
                    <div class="button-list">

                        @if(!App\Models\UserAuthInfo::where('user_id', Auth::user()->id)->where('ip_address', Illuminate\Support\Facades\Request::ip())->exists())
                            <button type="button" onclick="loginAnomalyAlert()"
                            class="btn btn-primary btn-xs" data-animation="slide"
                            data-overlaySpeed="200" data-overlayColor="#36404a"><i class="fa fa-plus-circle mr-1"></i>
                            Tambah</button>
                        @else
                            <button type="button" data-toggle="modal" data-target="#addPenerimaBantuanModal"
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
                                <th>Nama Penerima</th>
                                <th>Bantuan</th>
                                <th>Tanggal Penerimaan</th>
                                <th>Jumlah Penerimaan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @php
                                $increment = 1;
                            @endphp

                            @foreach ($penerima_bantuan as $data)
                                <tr>
                                    <td>{{ $increment++ }} </td>
                                    <td>{{ $data->penduduk->nama }}</td>
                                    <td>{{ $data->bantuan->nama_bantuan }}</td>
                                    <td>
                                        @php
                                            // Create a Carbon instance from the date string
                                            $carbonDate = Carbon\Carbon::createFromFormat('Y-m-d', $data->tanggal_penerimaan);

                                            // Set the locale to Bahasa Indonesia
                                            $carbonDate->setLocale('id'); // 'id' is the locale code for Bahasa Indonesia

                                            // Format the date as 'Month day, Year'
                                            $formattedDate = $carbonDate->isoFormat('MMMM D, YYYY');
                                        @endphp

                                        {{ $formattedDate }}
                                    </td>
                                    <td>{{ $data->jumlah_penerimaan }}</td>
                                    <td>
                                        <div class="form-group" style="display: block;">
                                            @if(!App\Models\UserAuthInfo::where('user_id', Auth::user()->id)->where('ip_address', Illuminate\Support\Facades\Request::ip())->exists())
                                                <button type="button" onclick="loginAnomalyAlert()" class="btn btn-warning btn-xs text-white"><i
                                                    class="fa fa-edit mr-1"></i>
                                                Edit</button>
                                            @else
                                                <button type="button" data-toggle="modal" data-target="#editPenerimaBantuan"
                                                style="padding-bottom:2px;" data-ids="{{ $data->id }}"
                                                onclick="setEditData({{ $data }})"
                                                class="btn btn-warning btn-xs text-white"><i class="fa fa-edit mr-1"></i>
                                                Edit</button>
                                            @endif

                                            @if(!App\Models\UserAuthInfo::where('user_id', Auth::user()->id)->where('ip_address', Illuminate\Support\Facades\Request::ip())->exists())
                                                <button type="button"
                                                    class="btn btn-danger btn-xs rounded waves-light waves-effect"
                                                    onclick="loginAnomalyAlert()"><i class="fa fa-trash-o mr-1"></i> Hapus
                                                </button>
                                            @else
                                                <form style="margin-top:15px;"
                                                    action="{{ route('penerima-bantuan.destroy', $data) }}" method="post">
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
    <div class="modal fade" id="addPenerimaBantuanModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Penerima Bantuan</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ route('penerima-bantuan.store') }}" method="post"
                        id="tambahPenerimaBantuanForm">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <div class="col-12">
                                <label for="penduduk_id">Penduduk</label>
                                <select name="penduduk_id" class="form-control" id="penduduk_id">
                                    <option value="">Pilih Penduduk</option>
                                    @foreach($penduduk as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <label for="bantuan_id">Bantuan</label>
                                <select name="bantuan_id" class="form-control" id="bantuan_id">
                                    <option value="">Pilih Bantuan</option>
                                    @foreach($bantuan as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_bantuan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <label for="jumlah_penerimaan">Jumlah Penerimaan</label>
                                <input class="form-control mb-1" type="text"
                                    id="jumlah_penerimaan" placeholder="Masukan Jumlah Penerimaan" name="jumlah_penerimaan" value="{{ old('jumlah_penerimaan') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <label for="tanggal_penerimaan">Tanggal Penerimaan</label>
                                <input class="form-control mb-1" type="date"
                                    id="tanggal_penerimaan" placeholder="Masukan Tanggal Penerimaan" name="tanggal_penerimaan" value="{{ old('tanggal_penerimaan') }}">
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

    <div class="modal fade" id="editPenerimaBantuan">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Penerima Bantuan</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ route('penerima-bantuan.update', '') }}"
                        id="editPenerimaBantuanForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        <div class="form-group">
                            <div class="col-12">
                                <label for="edit_penduduk_id">Penduduk</label>
                                <select name="edit_penduduk_id" class="form-control" id="edit_penduduk_id">
                                    <option value="">Pilih Penduduk</option>
                                    @foreach($penduduk as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <label for="edit_bantuan_id">Bantuan</label>
                                <select name="edit_bantuan_id" class="form-control" id="edit_bantuan_id">
                                    <option value="">Pilih Bantuan</option>
                                    @foreach($bantuan as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_bantuan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <label for="edit_jumlah_penerimaan">Jumlah Penerimaan</label>
                                <input class="form-control mb-1" type="text"
                                    id="edit_jumlah_penerimaan" placeholder="Masukan Jumlah Penerimaan" name="edit_jumlah_penerimaan" value="{{ old('edit_jumlah_penerimaan') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <label for="edit_tanggal_penerimaan">Tanggal Penerimaan</label>
                                <input class="form-control mb-1" type="date"
                                    id="edit_tanggal_penerimaan" placeholder="Masukan Tanggal Penerimaan" name="edit_tanggal_penerimaan" value="{{ old('edit_tanggal_penerimaan') }}">
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
                $("#tambahPenerimaBantuanForm").validate({
                    rules: {
                        penduduk_id: {
                            required: true
                        },
                        bantuan_id: {
                            required: true
                        },
                        jumlah_penerimaan: {
                            required: true
                        },
                        tanggal_penerimaan: {
                            required: true
                        }
                    },
                    messages: {
                        penduduk_id: {
                            required: "Penduduk harus di isi",
                        },
                        bantuan_id: {
                            required: "Bantuan Kelamin harus di isi",
                        },
                        jumlah_penerimaan: {
                            required: "Jumlah Penerimaan harus di isi",
                        },
                        tanggal_penerimaan: {
                            required: "Tanggal Penerimaan harus di isi",
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
                $("#editPenerimaBantuanForm").validate({
                    rules: {
                        edit_penduduk_id: {
                            required: true
                        },
                        edit_bantuan_id: {
                            required: true
                        },
                        edit_jumlah_penerimaan: {
                            required: true
                        },
                        edit_tanggal_penerimaan: {
                            required: true
                        }
                    },
                    messages: {
                        edit_penduduk_id: {
                            required: "Penduduk harus di isi",
                        },
                        edit_bantuan_id: {
                            required: "Bantuan Kelamin harus di isi",
                        },
                        edit_jumlah_penerimaan: {
                            required: "Jumlah Penerimaan harus di isi",
                        },
                        edit_tanggal_penerimaan: {
                            required: "Tanggal Penerimaan harus di isi",
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
            const updateLink = $('#editPenerimaBantuanForm').attr('action');

            function setEditData(data) {
                $('#editPenerimaBantuanForm').attr('action', `${updateLink}/${data.id}`);

                $('#edit_penduduk_id').val(data.penduduk_id);
                $('#edit_bantuan_id').val(data.bantuan_id);
                $('#edit_jumlah_penerimaan').val(data.jumlah_penerimaan);
                $('#edit_tanggal_penerimaan').val(data.tanggal_penerimaan);
            }

            // sweetalert delete one data
            function deleteAlert(e) {
                Swal.fire({
                    title: "Hapus Penerima Bantuan?",
                    text: `Seluruh data penerima bantuan akan terhapus. Anda tidak akan dapat mengembalikan aksi
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
