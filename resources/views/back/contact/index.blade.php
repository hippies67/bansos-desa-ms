@extends('back.layouts.data')

@section('title_menu')
    Contact
@endsection

@section('title')
    Contact
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
        <li class="breadcrumb-item"><a href="javascript:void(0)">Contact</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Inbox</a></li>
    </ol>
</div>
<!-- row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="email-left-box px-0 mb-3">
                    <div class="p-0">
                        <a href="email-compose.html" class="btn btn-primary btn-block">Compose</a>
                    </div>
                    <div class="mail-list mt-4">
                        <a href="email-inbox.html" class="list-group-item active"><i
                                class="fa fa-inbox font-18 align-middle mr-2"></i> Inbox <span
                                class="badge badge-primary badge-sm float-right">198</span> </a>
                        <a href="javascript:void()" class="list-group-item"><i
                                class="fa fa-paper-plane font-18 align-middle mr-2"></i>Sent</a> <a href="javascript:void()" class="list-group-item"><i
                                class="fa fa-star font-18 align-middle mr-2"></i>Important <span
                                class="badge badge-danger text-white badge-sm float-right">47</span>
                        </a>
                        <a href="javascript:void()" class="list-group-item"><i
                                class="mdi mdi-file-document-box font-18 align-middle mr-2"></i>Draft</a><a href="javascript:void()" class="list-group-item"><i
                                class="fa fa-trash font-18 align-middle mr-2"></i>Trash</a>
                    </div>
                    <div class="intro-title d-flex justify-content-between">
                        <h5>Categories</h5>
                        <i class="icon-arrow-down" aria-hidden="true"></i>
                    </div>
                    <div class="mail-list mt-4">
                        <a href="email-inbox.html" class="list-group-item"><span class="icon-warning"><i
                                    class="fa fa-circle" aria-hidden="true"></i></span>
                            Work </a>
                        <a href="email-inbox.html" class="list-group-item"><span class="icon-primary"><i
                                    class="fa fa-circle" aria-hidden="true"></i></span>
                            Private </a>
                        <a href="email-inbox.html" class="list-group-item"><span class="icon-success"><i
                                    class="fa fa-circle" aria-hidden="true"></i></span>
                            Support </a>
                        <a href="email-inbox.html" class="list-group-item"><span class="icon-dpink"><i
                                    class="fa fa-circle" aria-hidden="true"></i></span>
                            Social </a>
                    </div>
                </div>
                <div class="email-right-box ml-0 ml-sm-4 ml-sm-0">
                    <div role="toolbar" class="toolbar ml-1 ml-sm-0">
                        <div class="btn-group mb-1">
                            <div class="custom-control custom-checkbox pl-2">
                                <input type="checkbox" class="custom-control-input" id="checkbox1">
                                <label class="custom-control-label" for="checkbox1"></label>
                            </div>
                        </div>
                        <div class="btn-group mb-1">
                            <button class="btn btn-primary light px-3" type="button"><i class="ti-reload"></i>
                            </button>
                        </div>
                        <div class="btn-group mb-1">
                            <button aria-expanded="false" data-toggle="dropdown" class="btn btn-primary px-3 light dropdown-toggle" type="button">More <span
                                    class="caret"></span>
                            </button>
                            <div class="dropdown-menu"> <a href="javascript: void(0);" class="dropdown-item">Mark as Unread</a> <a href="javascript: void(0);" class="dropdown-item">Add to Tasks</a>
                                <a href="javascript: void(0);" class="dropdown-item">Add Star</a> <a href="javascript: void(0);" class="dropdown-item">Mute</a>
                            </div>
                        </div>
                    </div>
                    <div class="email-list mt-3">
                        @foreach($contact as $data)
                        <div class="message">
                            <div>
                                <div class="d-flex message-single">
                                    <div class="pl-1 align-self-center">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox2">
                                            <label class="custom-control-label" for="checkbox2"></label>
                                        </div>
                                    </div>
                                    <div class="ml-2">
                                        <button class="border-0 bg-transparent align-middle p-0"><i
                                                class="fa fa-star" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                                <a href="{{ route('contact-back.show', $data->id) }}" class="col-mail col-mail-2">
                                    <div class="subject">{{ $data->subject }}</div>
                                    <div class="date">11:49 am</div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        {{-- <div class="message">
                            <div>
                                <div class="d-flex message-single">
                                    <div class="pl-1 align-self-center">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox3">
                                            <label class="custom-control-label" for="checkbox3"></label>
                                        </div>
                                    </div>
                                    <div class="ml-2">
                                        <button class="border-0 bg-transparent align-middle p-0"><i
                                                class="fa fa-star" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                                <a href="email-read.html" class="col-mail col-mail-2">
                                    <div class="subject">Almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</div>
                                    <div class="date">11:49 am</div>
                                </a>
                            </div>
                        </div> --}}
                    </div>
                    <!-- panel -->
                    <div class="row mt-4">
                        <div class="col-12 pl-3">
                            <nav>
                                <ul class="pagination pagination-gutter pagination-primary pagination-sm no-bg">
                                    <li class="page-item page-indicator"><a class="page-link" href="javascript:void()"><i class="la la-angle-left"></i></a></li>
                                    <li class="page-item "><a class="page-link" href="javascript:void()">1</a></li>
                                    <li class="page-item active"><a class="page-link" href="javascript:void()">2</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void()">3</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void()">4</a></li>
                                    <li class="page-item page-indicator"><a class="page-link" href="javascript:void()"><i class="la la-angle-right"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
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