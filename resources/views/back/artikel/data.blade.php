@extends('back.layouts.data')

@section('title_menu')
    Artikel
@endsection

@section('title')
    Artikel
@endsection

@section('css')
    <link href="{{ asset('vendor/owl-carousel/owl.carousel.css" rel="stylesheet') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.20/sweetalert2.min.css" integrity="sha512-Yn5Z4XxNnXXE8Y+h/H1fwG/2qax2MxG9GeUOWL6CYDCSp4rTFwUpOZ1PS6JOuZaPBawASndfrlWYx8RGKgILhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Artikel</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('artikel.index') }}">Data Artikel</a></li>
    </ol>
</div>
<div class="row">
    <div class="col-xl-12">
        <ul class="nav nav-pills review-tab">
            <li class="nav-item">
                <a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="false">All</a>
            </li>
            <li class="nav-item">
                <a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">Published</a>
            </li>
            <li class="nav-item">
                <a href="#navpills-3" class="nav-link" data-toggle="tab" aria-expanded="true">Unpublished</a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="navpills-1" class="tab-pane active">
                <div class="mr-auto d-none d-lg-block mb-4 mt-4">
                    <a href="{{ route('artikel.create') }}" class="btn btn-primary btn-rounded mr-2">TAMBAH</a>
                </div>
                <div class="card review-table">
                    @foreach($artikel as $data)
                        <div class="media align-items-center p-3">
                            <img class="mr-3 img-fluid rounded" width="90" src="{{ asset('artikel/'. $data->thumbnail) }}" alt="DexignZone">
                            <div class="media-body d-lg-flex d-block row align-items-center">
                                <div class="col-xl-4 col-xxl-5 col-lg-6 review-bx">
                                    <h3 class="fs-20 font-w600 mb-1">
                                        {{ $data->judul}}
                                    </h3>
                                    <span class="fs-15 d-block">{{ $data->created_at->format('l') }}, {{ $data->created_at->format('d M Y H:i:s') }}</span>
                                    {{-- <span class="text-primary d-block font-w600 mt-sm-2 mt-3"><i class="las la-stethoscope scale5 mr-3"></i>Diabetes</span> --}}
                                </div>
                                <div class="col-xl-7 col-xxl-7 col-lg-6 text-dark mb-lg-0 mb-2">
                                    {!! strip_tags(substr($data->konten,0, 100)) !!}
                                </div>
                            </div>
                            <div class="media-footer d-sm-flex d-block align-items-center">
                                <div class="edit ml-auto">
                                    <a href="{{ route('artikel.edit', $data->id) }}" class="text-primary font-w600 mr-4">EDIT</a>
                                    <a href="javascript:void(0);" class="text-danger font-w600" onclick="deleteArtikel({{$data->id}})">HAPUS</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <nav style="width:100% !important;">
                        {{ $artikel->links('vendor.pagination.back') }}
                    </nav>
                </div>
            </div>
            <div id="navpills-2" class="tab-pane">
                <div class="mr-auto d-none d-lg-block mb-4 mt-4">
                    <a href="{{ route('artikel.create') }}" class="btn btn-primary btn-rounded mr-2">TAMBAH</a>
                </div>
                <div class="card review-table">
                    @foreach($artikel_published as $data)
                        <div class="media align-items-center p-3">
                            {{-- <div class="checkbox mr-lg-4 mr-0 align-self-center">
                                <div class="custom-control custom-checkbox checkbox-info">
                                    <input type="checkbox" class="custom-control-input" checked="" id="customCheckBox1" required="">
                                    <label class="custom-control-label" for="customCheckBox1"></label>
                                </div>
                            </div> --}}
                            <img class="mr-3 img-fluid rounded" width="90" src="{{ asset('artikel/'. $data->thumbnail) }}" alt="DexignZone">
                            <div class="media-body d-lg-flex d-block row align-items-center">
                                <div class="col-xl-4 col-xxl-5 col-lg-6 review-bx">
                                    <h3 class="fs-20 font-w600 mb-1">
                                        {{ $data->judul}}
                                    </h3>
                                    <span class="fs-15 d-block">{{ $data->created_at->format('l') }}, {{ $data->created_at->format('d M Y H:i:s') }}</span>
                                    {{-- <span class="text-primary d-block font-w600 mt-sm-2 mt-3"><i class="las la-stethoscope scale5 mr-3"></i>Diabetes</span> --}}
                                </div>
                                <div class="col-xl-7 col-xxl-7 col-lg-6 text-dark mb-lg-0 mb-2">
                                    {!! strip_tags(substr($data->konten,0, 100)) !!}
                                </div>
                            </div>
                            <div class="media-footer d-sm-flex d-block align-items-center">
                                <div class="edit ml-auto">
                                    <a href="{{ route('artikel.edit', $data->id) }}" class="text-primary font-w600 mr-4">EDIT</a>
                                    <a href="javascript:void(0);" class="text-danger font-w600" onclick="deleteArtikel({{$data->id}})">HAPUS</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <nav style="width:100% !important;">
                        {{ $artikel_published->links('vendor.pagination.back') }}
                    </nav>
                </div>
            </div>
            <div id="navpills-3" class="tab-pane">
                <div class="mr-auto d-none d-lg-block mb-4 mt-4">
                    <a href="{{ route('artikel.create') }}" class="btn btn-primary btn-rounded mr-2">TAMBAH</a>
                </div>
                <div class="card review-table">
                    @foreach($artikel_unpublished as $data)
                        <div class="media align-items-center p-3">
                            {{-- <div class="checkbox mr-lg-4 mr-0 align-self-center">
                                <div class="custom-control custom-checkbox checkbox-info">
                                    <input type="checkbox" class="custom-control-input" checked="" id="customCheckBox1" required="">
                                    <label class="custom-control-label" for="customCheckBox1"></label>
                                </div>
                            </div> --}}
                            <img class="mr-3 img-fluid rounded" width="90" src="{{ asset('artikel/'. $data->thumbnail) }}" alt="DexignZone">
                            <div class="media-body d-lg-flex d-block row align-items-center">
                                <div class="col-xl-4 col-xxl-5 col-lg-6 review-bx">
                                    <h3 class="fs-20 font-w600 mb-1">
                                        {{ $data->judul}}
                                    </h3>
                                    <span class="fs-15 d-block">{{ $data->created_at->format('l') }}, {{ $data->created_at->format('d M Y H:i:s') }}</span>
                                    {{-- <span class="text-primary d-block font-w600 mt-sm-2 mt-3"><i class="las la-stethoscope scale5 mr-3"></i>Diabetes</span> --}}
                                </div>
                                <div class="col-xl-7 col-xxl-7 col-lg-6 text-dark mb-lg-0 mb-2">
                                   {!! strip_tags(substr($data->konten,0, 100)) !!}
                                </div>
                            </div>
                            <div class="media-footer d-sm-flex d-block align-items-center">
                                <div class="edit ml-auto">
                                    <a href="{{ route('artikel.edit', $data->id) }}" class="text-primary font-w600 mr-4">EDIT</a>
                                    <a href="javascript:void(0);" class="text-danger font-w600" onclick="deleteArtikel({{$data->id}})">HAPUS</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <nav style="width:100% !important;">
                        {{ $artikel_unpublished->links('vendor.pagination.back') }}
                    </nav>
                </div>
            </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.20/sweetalert2.min.js" integrity="sha512-ISPBRsvggCFa1YHNMzuhaNqa4vMzTpmxyWhtt01JOmJlbh+nQwAxH49NhbMAGRYviTcH4sy1Wg8SIkBkLyOEGg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
    function deleteArtikel(dataId) {
        Swal.fire({
            title: "Hapus data artikel?",
            text: `Data artikel akan terhapus. Anda tidak akan dapat mengembalikan
                aksi ini!`,
            icon: "warning",
            showCancelButton: !0,
            confirmButtonColor: "rgb(11, 42, 151)",
            cancelButtonColor: "rgb(209, 207, 207)",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal"
        }).then(function(t) {
            if (t.value) {
                $.ajax({
                    url:"{{ route('artikel.hapus') }}",
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}", 
                        id: dataId
                    },
                    success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Artikel telah berhasil dihapus!',
                        }).then(function(){
                            location.reload();
                        });
                    }
                })
            }
        })
    }
    </script>
@endsection