@extends('back.layouts.data')
@section('title', 'Team')
@section('css')
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.1/css/fixedHeader.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">

<link href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
    integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    @media (min-width: 767.98px) {
        .dataTables_wrapper .dataTables_length {
            margin-bottom: -42px;
        }
    }

    .dropify-wrapper {
        border: 1px solid #e2e7f1;
        border-radius: .3rem;
        height: 150px;
        margin-bottom: 10px;
    }

    .cke_chrome {
        border: 1px solid #e2e7f1 !important;
        border-width: thin;
    }

    .ck-editor__editable {
        min-height: 300px;
        margin-bottom: 10px;
    }

    span.file-icon {
        font-size: 18px !important;
    }

    .card {
        border-radius: 10px;
    }

    label.error {
        color: #f1556c;
        font-size: 13px;
        font-size: .875rem;
        font-weight: 400;
        line-height: 1.5;
        margin-top: 5px;
        padding: 0;
    }

    input.error {
        color: #f1556c;
        border: 1px solid #f1556c;
    }

    #buttonGroup {
        display: block;
    }

    @media screen and (max-width: 455px) {
        .desktop-search {
            display: none;
        }

        .mobile-search-card {
            display: block !important;
        }
    }

</style>

@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Team</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('team-back.index') }}">Data Team</a></li>
            </ol>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Anggota</h4>
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahTeam"><i
                                class="fas fa-plus-circle"></i></button>
                    </div>
                    <div class="card-body">
                        <table id="teamTable" class="table dt-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jabatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $increment = 1;
                                @endphp
                                @foreach ($team as $teams)
                                <tr>
                                    <td>{{ $increment++ }}</td>
                                    <td>
                                        @if(!empty($teams->photo) && Storage::exists($teams->photo))
                                        <img src="{{ Storage::url($teams->photo) }}" alt="Photo" width="100" height="80"
                                            style="object-fit: cover" class="rounded">
                                        @endif
                                        <span class="ml-3">{{ $teams->fullname }}</span>
                                    </td>
                                    <td>{{ isset($teams->ref_divisi->nama) ? $teams->ref_divisi->nama : '-' }}</td>
                                    {{-- <td>
                                            @if (isset($teams->divisions->name))
                                            {{ $teams->divisions->name }}
                                    @endif
                                    </td>
                                    <td>
                                        @if (isset($teams->sub_divisions->name))
                                        {{ $teams->sub_divisions->name }}
                                        @endif
                                    </td> --}}
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#editTeam{{$teams->id}}"
                                            onclick="validateEditTeam({{$teams}})"><i class="far fa-edit"></i></button>
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#deleteConfirm" onclick="deleteThisTeam({{$teams}})"><i
                                                class="far fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" tabindex="-1" role="dialog" id="tambahTeam">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Team</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('team-back.store') }}" method="post" id="tambahTeamForm"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="fullname">Nama Lengkap</label>
                        <input type="text" class="form-control" name="team_fullname" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label for="position">Jabatan</label>
                        <select name="ref_divisi_id" class="form-control">
                            <option value="">Pilih Jabatan</option>
                            @foreach($ref_divisi as $data)
                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="team_photo">Foto</label>
                        <input type="file" class="form-control dropify" name="team_photo"
                            data-allowed-file-extensions="png jpg jpeg" data-show-remove="false">
                        <div id="errorImage">
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary" id="tambahButton">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach ($team as $teams)
<div class="modal fade" tabindex="-1" role="dialog" id="editTeam{{$teams->id}}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Team</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('team-back.update', $teams->id) }}" method="post" id="editTeamForm{{$teams->id}}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_team_fullname">Nama Lengkap</label>
                        <input type="text" class="form-control" name="edit_team_fullname" id="edit_team_fullname"
                            placeholder="Nama" value="{{ $teams->fullname }}">
                    </div>
                    <div class="form-group">
                        <label for="edit_team_position">Jabatan</label>
                        <select name="edit_ref_divisi_id" class="form-control">
                            <option value="">Pilih Jabatan</option>
                            @foreach($ref_divisi as $data)
                            <option value="{{ $data->id }}" {{ $data->id == $teams->ref_divisi_id ? 'selected' : '' }}>{{ $data->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="edit_photo">Foto</label>
                        <input type="file" class="form-control dropify" name="edit_team_photo"
                            data-allowed-file-extensions="png jpg jpeg" data-default-file="@if(!empty($teams->photo) &&
                              Storage::exists($teams->photo)){{ Storage::url($teams->photo) }}@endif"
                            data-show-remove="false">
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary" id="editButton">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<div class="modal fade" tabindex="-1" role="dialog" id="deleteConfirm">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('team-back.destroy', '') }}" method="post" id="deleteTeamForm">
                @csrf
                @method('delete')
                <div class="modal-body">
                    Apakah anda yakin untuk <b>menghapus</b> team ini ?
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Kembali</button>
                    <button type="button" class="btn btn-primary" id="deleteModalButton">Ya, Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- <div class="modal fade" tabindex="-1" role="dialog" id="deleteAllConfirm">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Semua</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('team-back.destroyAll') }}" method="post" id="destroyAllForm">
@csrf
<div class="modal-body">
    Apakah anda yakin untuk <b>menghapus semua</b> team ?
</div>
<div class="modal-footer bg-whitesmoke br">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
    <button type="button" class="btn btn-primary" id="deleteAllModalButton">Ya, Hapus Semua</button>
</div>
</form>
</div>
</div>
</div> --}}

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
    integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{-- Sweetalert --}}
<script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>

<script>
    $('.dropify').dropify();

    $(document).ready(function () {
        $('#teamTable').DataTable({
            stateSave: true,
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

        $("#tambahTeamForm").validate({
            rules: {
                team_fullname: {
                    required: true,
                },
                ref_divisi_id: {
                    required: true,
                },
            },
            messages: {
                team_fullname: {
                    required: "Nama Lengkap harus di isi",
                },
                ref_divisi_id: {
                    required: "Jabatan harus di isi",
                },
            },
            submitHandler: function (form) {
                $("#tambahButton").prop('disabled', true);
                form.submit();
            }
        });
    });

    function validateEditTeam(data) {
        $("#editTeamForm" + data.id).validate({
            rules: {
                edit_team_fullname: {
                    required: true,
                },
                edit_ref_divisi_id: {
                    required: true,
                },
            },
            messages: {
                edit_team_fullname: {
                    required: "Nama Lengkap harus di isi",
                },
                edit_ref_divisi_id: {
                    required: "Jabatan harus di isi",
                },
            },
            submitHandler: function (form) {
                $("#editButton").prop('disabled', true);
                form.submit();
            }
        });
    }

    const deleteTeam = $("#deleteTeamForm").attr('action');

    function deleteThisTeam(data) {
        $("#deleteTeamForm").attr('action', `${deleteTeam}/${data.id}`);
    }

    $("#deleteModalButton").click(function () {
        $(this).attr('disabled', true);
        $("#deleteTeamForm").submit();
    });

    $("#deleteAllModalButton").click(function () {
        $(this).attr('disabled', true);
        $("#destroyAllForm").submit();
    });

</script>
@endsection
