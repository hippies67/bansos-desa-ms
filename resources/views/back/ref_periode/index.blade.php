@extends('back.layouts.data')

@section('title')
Ref. Periode
@endsection

@section('title_menu')
Daftar Ref. Periode
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
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Ref. Periode</a></li>
    </ol>
</div>
<!-- row -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Ref. Periode</h4>
                <div class="button-list">
                    <button type="button" data-toggle="modal" data-target="#addRefPeriodeModal"
                        class="btn btn-primary btn-xs" data-animation="slide" data-plugin="custommodal"
                        data-overlaySpeed="200" data-overlayColor="#36404a"><i class="fa fa-plus-circle mr-1"></i>
                        Tambah</button>
                    {{-- <button type="button" class="btn btn-danger btn-xs"
                            id="clearAll"><i class="fa fa-trash-o mr-1"></i> Bersihkan</button> --}}
                </div>
            </div>
            <div class="card-body">
                {{-- <div class="table-responsive"> --}}
                <table id="example4" class="table dt-responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Periode</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @php
                        $increment = 1;
                        @endphp

                        @foreach($ref_periode as $data)
                        <tr>
                            <td>{{ $increment++ }} </td>
                            <td>{{ $data->tahun_mulai }} - {{  $data->tahun_akhir }}</td>
                            <td>
                                <div class="form-group" style="display: block;">
                                    <button type="button" data-toggle="modal" data-target="#editRefPeriodeModal"
                                        style="padding-bottom:2px;" data-ids="{{ $data->id }}"
                                        onclick="setEditData({{ $data }})" class="btn btn-warning btn-xs text-white"><i
                                            class="fa fa-edit mr-1"></i>
                                        Edit</button>
                                    <form style="margin-top:15px;" action="{{ route('ref-periode.destroy', $data) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="button"
                                            class="btn btn-danger btn-xs rounded waves-light waves-effect"
                                            onclick="deleteAlert(this)"><i class="fa fa-trash-o mr-1"></i> Hapus
                                        </button>
                                    </form>
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
<div class="modal fade" id="addRefPeriodeModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Ref. Periode</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('ref-periode.store') }}" method="post"
                    id="tambahRefPeriode">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <div class="col-12">
                            <label for="tahun_mulai">Tahun Mulai</label>
                            <input class="form-control mb-1 @error('tahun_mulai') is-invalid @enderror" type="text"
                                id="tahun_mulai" placeholder="Masukan Tahun Mulai" name="tahun_mulai"
                                value="{{ old('tahun_mulai') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="tahun_akhir">Tahun Akhir</label>
                            <input class="form-control mb-1 @error('tahun_akhir') is-invalid @enderror" type="text"
                                id="tahun_akhir" placeholder="Masukan Tahun Akhir" name="tahun_akhir"
                                value="{{ old('tahun_akhir') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" id="status">
                                <option value="aktif">Aktif</option>
                                <option value="tidak_aktif">Tidak Aktif</option>
                            </select>
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

<div class="modal fade" id="editRefPeriodeModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Ref. Periode</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('ref-periode.update', '') }}" id="editRefPeriode"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="checkTahunMulai">
                    <input type="hidden" id="checkTahunAkhir">

                    <div class="form-group">
                        <div class="col-12">
                            <label for="edit_tahun_mulai">Tahun Mulai</label>
                            <input class="form-control mb-1 @error('edit_tahun_mulai') is-invalid @enderror" type="text"
                                id="edit_tahun_mulai" placeholder="Masukan Tahun Mulai" name="edit_tahun_mulai"
                                value="{{ old('edit_tahun_mulai') }}">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-12">
                            <label for="edit_tahun_akhir">Tahun Akhir</label>
                            <input class="form-control mb-1 @error('edit_tahun_akhir') is-invalid @enderror" type="text"
                                id="edit_tahun_akhir" placeholder="Masukan Tahun Akhir" name="edit_tahun_akhir"
                                value="{{ old('edit_tahun_akhir') }}">
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <div class="col-12">
                            <label for="edit_status">Status</label>
                            <select name="edit_status" class="form-control" id="edit_status">
                                <option value="aktif">Aktif</option>
                                <option value="tidak_aktif">Tidak Aktif</option>
                            </select>
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
        $(document).ready(function () {

            $("#tahun_mulai").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            });

            $("#tahun_akhir").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            });

            $("#edit_tahun_mulai").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            });

            $("#edit_tahun_akhir").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
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
            $("#tambahRefPeriode").validate({
                rules: {
                    tahun_mulai: {
                        required: true,
                        remote: {
                            url: "{{ route('ref-periode.checkTahunMulai') }}",
                            type: "post",
                        }
                    },
                    tahun_akhir: {
                        required: true,
                        remote: {
                            url: "{{ route('ref-periode.checkTahunAkhir') }}",
                            type: "post",
                        }
                    },
                    status: {
                        required: true
                    }
                },
                messages: {
                    tahun_mulai: {
                        required: "Tahun Awal harus di isi",
                        remote: "Tahun Awal sudah tersedia"
                    },
                    tahun_akhir: {
                        required: "Tahun Akhir harus di isi",
                        remote: "Tahun Akhir sudah tersedia"
                    },
                    status: {
                        required: "Status harus di isi",
                    }
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
            $("#editRefPeriode").validate({
                rules: {
                    edit_tahun_mulai: {
                        required: true,
                        remote: {
                            param: {
                                url: "{{ route('ref-periode.checkTahunMulai') }}",
                                type: "post",
                            },
                            depends: function (element) {
                                // compare name in form to hidden field
                                return ($(element).val() !== $('#checkTahunMulai').val());
                            },

                        }
                    },
                    edit_tahun_akhir: {
                        required: true,
                        remote: {
                            param: {
                                url: "{{ route('ref-periode.checkTahunAkhir') }}",
                                type: "post",
                            },
                            depends: function (element) {
                                // compare name in form to hidden field
                                return ($(element).val() !== $('#checkTahunAkhir').val());
                            },

                        }
                    },
                    edit_status: {
                        required: true
                    }
                },
                messages: {
                    edit_tahun_mulai: {
                        required: "Tahun Mulai harus di isi",
                        remote: "Tahun Mulai sudah tersedia"
                    },
                    edit_tahun_akhir: {
                        required: "Tahun Akhir harus di isi",
                        remote: "Tahun Akhir sudah tersedia"
                    },
                    edit_status: {
                        required: "Status harus di isi",
                    }
                }
            });
        });

    </script>

    <script>
        //  passing data to edit modal pop up 
        const updateLink = $('#editRefPeriode').attr('action');

        function setEditData(data) {
            $('#editRefPeriode').attr('action', `${updateLink}/${data.id}`);

            $('#checkTahunMulai').val(data.tahun_mulai);
            $('#checkTahunAkhir').val(data.tahun_akhir);
          
            $('#edit_tahun_mulai').val(data.tahun_mulai);
            $('#edit_tahun_akhir').val(data.tahun_akhir);
            $('#edit_status').val(data.status);
        }

        // sweetalert delete one data
        function deleteAlert(e) {
            Swal.fire({
                title: "Hapus Ref. Periode?",
                text: `Seluruh data terkait ref. periode akan terhapus. Anda tidak akan dapat mengembalikan aksi
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
