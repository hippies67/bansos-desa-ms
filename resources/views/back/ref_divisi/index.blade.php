@extends('back.layouts.data')
@section('title', 'Project')
@section('css')
<link href="{{ asset('vendor/owl-carousel/owl.carousel.css" rel="stylesheet') }}">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.20/sweetalert2.min.css"
    integrity="sha512-Yn5Z4XxNnXXE8Y+h/H1fwG/2qax2MxG9GeUOWL6CYDCSp4rTFwUpOZ1PS6JOuZaPBawASndfrlWYx8RGKgILhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
    integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
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

    .list-group-item {
        border: none;
    }

</style>

@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Project</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('project-back.index') }}">Data Project</a></li>
            </ol>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4>Ref. Division</h4>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#tambahData"
                                class="btn btn-primary">
                                <i class="fa fa-plus">
                                </i>
                                Tambah Divisi</a>
                        </div>
                        <div class="form-group mt-4">
                            <select class="form-control" name="ref_periode_id_value" id="ref_periode_id_value" onchange="pilihTahun(this.value)">
                                    @foreach($ref_periode as $data)
                                        @php
                                            $date = Date('Y');
                                        @endphp
                                            @if($date == $data->tahun_mulai || $date == $data->tahun_akhir)
                                                <option value="{{ $data->id }}" selected>{{ $data->tahun_mulai }} - {{ $data->tahun_akhir }}</option>
                                            @else
                                                <option value="{{ $data->id }}">{{ $data->tahun_mulai }} - {{ $data->tahun_akhir }}</option>
                                            @endif
                                        @endforeach
                            </select>
                        </div>
                        <div id="generateDivisi">
                            <div class="mt-3" style="width:100% !important">
                                <ul class="list-group">
                                    @foreach ($list as $item)
                                    <li class="list-group-item" data-id="{{$item->id}}" id="list_{{$item->id}}">
                                        <div class="" style="height: 100%;"></div>
                                        <div class="">
                                            <div class="row">
                                                <div class="col-10 px-5">
                                                    <h4><i class="bi bi-list"></i> <span class="ml-2">{{$item->nama}}</span>
                                                    </h4>
                                                </div>
                                                <div class="col-10-2" style="z-index: 1">
                                                    <a href="javascript:void(0)" onclick="editDataFunction({{$item}})">
                                                        <i class="fa fa-edit text-info">
                                                        </i>
                                                    </a>

                                                    <a href="javascript:void(0)" onclick="deleteData({{$item->id}})">
                                                        <i class="fa fa-trash text-danger">
                                                        </i>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                        @if ($item->children)
                                        <ul class="list-group">
                                            @foreach ($item->children as $item)
                                            <li class="list-group-item" data-id="{{$item->id}}" id="list_{{$item->id}}">
                                                <div class="" style="height: 100%;"></div>
                                                <div class="">
                                                    <div class="row">
                                                        <div class="col-10 px-5">
                                                            <h6><i class="bi bi-list"></i> <span
                                                                    class="ml-2">{{$item->nama}}</span></h6>
                                                        </div>
                                                        <div class="col-2">
                                                            <a href="javascript:void(0)" onclick="editDataFunction({{$item}})">
                                                                <i class="fa fa-edit text-info">
                                                                </i>
                                                            </a>

                                                            <a href="javascript:void(0)"
                                                                onclick="deleteData({{$item->id}})">
                                                                <i class="fa fa-trash text-danger">
                                                                </i>
                                                            </a>

                                                        </div>
                                                    </div>
                                                </div>
                                                @if ($item->children)
                                                <ul class="list-group">
                                                    @foreach ($item->children as $item)
                                                    <li class="list-group-item" data-id="{{$item->id}}"
                                                        id="list_{{$item->id}}">
                                                        <div class="" style="height: 100%;"></div>
                                                        <div class="">
                                                            <div class="row">
                                                                <div class="col-10 px-5">
                                                                    <h6><i class="bi bi-list"></i> <span
                                                                            class="ml-2">{{$item->nama}}</span></h6>
                                                                </div>
                                                                <div class="col-2">
                                                                    <a href="javascript:void(0)"
                                                                        onclick="editDataFunction({{$item}})">
                                                                        <i class="fa fa-edit text-info">
                                                                        </i>
                                                                    </a>

                                                                    <a href="javascript:void(0)"
                                                                        onclick="deleteData({{$item->id}})">
                                                                        <i class="fa fa-trash text-danger">
                                                                        </i>
                                                                    </a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if ($item->children)
                                                        <ul class="list-group">
                                                            @foreach ($item->children as $item)
                                                            <li class="list-group-item" data-id="{{$item->id}}"
                                                                id="list_{{$item->id}}">
                                                                <div class="" style="height: 100%;"></div>
                                                                <div class="">
                                                                    <div class="row">
                                                                        <div class="col-10 px-5">
                                                                            <h6><i class="bi bi-list"></i> <span
                                                                                    class="ml-2">{{$item->nama}}</span></h6>
                                                                        </div>
                                                                        <div class="col-2">
                                                                            <a href="javascript:void(0)"
                                                                                onclick="editDataFunction({{$item}})">
                                                                                <i class="fa fa-edit text-info">
                                                                                </i>
                                                                            </a>

                                                                            <a href="javascript:void(0)"
                                                                                onclick="deleteData({{$item->id}})">
                                                                                <i class="fa fa-trash text-danger">
                                                                                </i>
                                                                            </a>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @if ($item->children)
                                                                <ul class="list-group">
                                                                    @foreach ($item->children as $item)
                                                                    <li class="list-group-item" data-id="{{$item->id}}"
                                                                        id="list_{{$item->id}}">
                                                                        <div class="" style="height: 100%;"></div>
                                                                        <div class="">
                                                                            <div class="row">
                                                                                <div class="col-10 px-5">
                                                                                    <h6><i class="bi bi-list"></i> <span
                                                                                            class="ml-2">{{$item->nama}}</span>
                                                                                    </h6>
                                                                                </div>
                                                                                <div class="col-2">
                                                                                    <a href="javascript:void(0)"
                                                                                        onclick="editDataFunction({{$item}})">
                                                                                        <i class="fa fa-edit text-info">
                                                                                        </i>
                                                                                    </a>

                                                                                    <a href="javascript:void(0)"
                                                                                        onclick="deleteData({{$item->id}})">
                                                                                        <i class="fa fa-trash text-danger">
                                                                                        </i>
                                                                                    </a>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                                @endif
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                        @endif
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                @endif
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" tabindex="-1" role="dialog" id="tambahData">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Ref. Divisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form" id="tambah">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="periode">Periode</label>
                        <select class="form-control" name="ref_periode_id" id="ref_periode_id_tambah" onchange="periodSelect(this.value)">
                            <option value="">Pilih Periode</option>
                            @foreach($ref_periode as $data)
                                <option value="{{ $data->id }}">{{ $data->tahun_mulai }} - {{ $data->tahun_akhir }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div id="wrapAdd">

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

<div class="modal fade" tabindex="-1" role="dialog" id="editData">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Ref. Divisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form" id="edit">
                <div class="modal-body">                   

                    <div id="wrapEdit">

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
@endsection

@section('js')
<script src="{{ asset('vendor/global/global.min.js') }}"></script>
<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/deznav-init.js') }}"></script>
<script src="{{ asset('vendor/owl-carousel/owl.carousel.js') }}"></script>
<script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>

<!-- Chart piety plugin files -->
<script src="{{ asset('vendor/peity/jquery.peity.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.20/sweetalert2.min.js"
    integrity="sha512-ISPBRsvggCFa1YHNMzuhaNqa4vMzTpmxyWhtt01JOmJlbh+nQwAxH49NhbMAGRYviTcH4sy1Wg8SIkBkLyOEGg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
    integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        function periodSelect(data) {
            if(data != "") {
                $("#wrapAdd").css("display", "block");
                $.ajax({
                    url: "{{ route('ref-divisi.generate-add-modal') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        ref_periode_id: data,
                    },
                    success: function (result) {
                        $("#wrapAdd").html(result);
                    }
                });
            } else {
                $("#wrapAdd").css("display", "none");
            }
        } 

        // function periodEditSelect(data) {
        //     if(data != "") {
        //         $("#wrapEdit").css("display", "block");
        //         $.ajax({
        //             url: "{{ route('ref-divisi.generate-edit-modal') }}",
        //             method: "POST",
        //             data: {
        //                 _token: "{{ csrf_token() }}",
        //                 ref_periode_id: data,
        //             },
        //             success: function (result) {
        //                 $("#wrapEdit").html(result);
        //             }
        //         });
        //     } else {
        //         $("#wrapEdit").css("display", "none");
        //     }
        // } 

        function editDataFunction(data) {
            $('#editData').modal('show');
            if(data != "") {
                $("#wrapEdit").css("display", "block");
                $.ajax({
                    url: "{{ route('ref-divisi.generate-edit-modal') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        ref_periode_id: data.ref_periode_id,
                        ref_divisi_id: data.id,
                    },
                    success: function (result) {
                        $("#wrapEdit").html(result);
                    }
                });
            } else {
                $("#wrapEdit").css("display", "none");
            }
        }
    </script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#tambah").validate({
                rules: {
                    nama: {
                        required: true
                    },
                    level: {
                        required: true
                    },
                    ref_periode_id: {
                        required: true
                    }
                },
                messages: {
                    nama: {
                        required: "Nama harus di isi",
                    },
                    level: {
                        required: "Level harus di isi",
                    },
                    ref_periode_id: {
                        required: "Periode harus di isi",
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
            $("#edit").validate({
                rules: {
                    nama: {
                        required: true
                    },
                    level: {
                        required: true
                    },
                    ref_periode_id: {
                        required: true
                    }
                },
                messages: {
                    nama: {
                        required: "Nama harus di isi",
                    },
                    level: {
                        required: "Level harus di isi",
                    },
                    ref_periode_id: {
                        required: "Periode harus di isi",
                    }
                }
            });
        });

    </script>

<script>
     function pilihTahun(data) {
            $.ajax({
                url: "{{ route('ref-divisi.generate') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    ref_periode_id: data,
                },
                success: function (result) {
                    $("#generateDivisi").html(result);
                }
            });
        }
    function tambahData() {
        $('#tambahData').modal('show');
    }

    function levelGet(id_induk, type, ref_periode_id) {

        var id = parseInt(id_induk) - 1;

        if (id > 0) {
            console.log('show');
            $('#induk_' + type).show();

            fetch("{{ url('admin/ref-divisi-induk') }}/" + id + "/" + ref_periode_id).then(function (response) {
                response.json().then(function (resp) {
                    var res = resp;
                    var opt = "";
                    var selected = "";
                    res.forEach(e => {
                        selected = "";
                        if (e.id == id_induk) {
                            selected = "selected";
                        }
                        opt += '<option value="' + e.id + '" ' +
                            selected + '>' + e.nama + '</option>';
                    });
                    console.log(type);

                    $('#id_induk_' + type).html(opt);
                });
            });
        } else {
            $('#induk_' + type).hide();
        }
    }

    const tambah = document.getElementById('tambah');

    tambah.addEventListener('submit', async (e) => {
        e.preventDefault();

        const nama = tambah.nama.value;
        const level = tambah.level.value;
        const id_induk = tambah.id_induk.value;
        const status = tambah.status.value;
        const ref_periode_id = tambah.ref_periode_id.value;
        
        const _token = "{{ csrf_token() }}";

        let formData = new FormData();
        formData.append("nama", nama);
        formData.append("level", level);
        formData.append("status", status);
        formData.append("id_induk", id_induk);
        formData.append("ref_periode_id", ref_periode_id);

        try {
            let response = await fetch("{{ route('ref-divisi.store-modal') }}", {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": _token
                }
            });
            var datasend = await response.json();

            if (datasend.status == 'success') {

                $('#tambahData').modal('hide');
                Swal.fire('Ref. Division berhasil ditambahkan', '', 'success');

                location.reload();
            }

        } catch (err) {
            console.log(err);
        }

        return false;
    });

    // var modalEdit = document.getElementById("editData");
    // var offCanvasEdit = new bootstrap.Offcanvas(offCanvasEditData, {
    //     backdrop: true
    // });

    // function editData(id) {

    //     fetch("{{ url('admin/ref-divisi-detail') }}/" + id).then(function (response) {
    //         response.json().then(function (resp) {
    //             var idvar = resp.data.id;
    //             var ref_periode_id = resp.data.ref_periode_id;

    //             console.log(idvar);
    //             $('#id_edit').val(idvar);
    //             $('#ref_periode_id_edit').val(ref_periode_id);
                
    //         });
    //     });

    //     // editData($('#ref_periode_id_edit').val(), $('#id_edit').val());

    //     $('#editData').modal('show');


    // }

    const edit = document.getElementById('edit');

    edit.addEventListener('submit', async (e) => {
        e.preventDefault();

        const id = edit.id.value;
        const nama = edit.nama.value;
        const level = edit.level.value;
        const status = edit.status.value;
        const id_induk = edit.id_induk.value;

        const _token = "{{ csrf_token() }}";

        let formData = new FormData();
        formData.append("id", id);
        formData.append("nama", nama);
        formData.append("level", level);
        formData.append("status", status);
        formData.append("id_induk", id_induk);

        
        try {
            let response = await fetch("{{ route('ref-divisi.update-modal') }}", {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": _token
                }
            });
            var datasend = await response.json();

            if (datasend.status == 'success') {

                Swal.fire('Ref. Division berhasil diubah', '', 'success');
                location.reload();
            }
        } catch (err) {
            console.log(err);
        }
        return false;
    });

    function deleteData(id) {
        Swal.fire({
            title: 'apakah kamu yakin menghapus Ref. Division ini?',
            icon: 'info',
            confirmButtonText: `Ya, Hapus !`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('ref-divisi.delete-modal') }}",
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },

                    success: function (result) {
                        Swal.fire('Ref. Division berhasil dihapus', '', 'success')
                        $('#list_' + id).remove();
                    }
                });
            } else {

            }
        });
    }

</script>

@endsection
