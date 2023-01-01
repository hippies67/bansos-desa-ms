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
    <style>
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

    textarea.error {
        color: #F94687;
        border: 1px solid #F94687;
    }

    </style>
@endsection

@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Email</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Read</a></li>
    </ol>
</div>
<!-- row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="email-left-box generic-width px-0 mb-5">
                    <div class="p-0">
                        <a href="{{ url('admin/contact-back') }}" class="btn btn-primary btn-block">Compose</a>
                    </div>
                    <div class="mail-list mt-4">
                        <a href="{{ url('admin/contact-back') }}" class="list-group-item active"><i
                                class="fa fa-inbox font-18 align-middle mr-2"></i> Inbox <span
                                class="badge badge-primary badge-sm float-right">198</span> </a>
                        <a href="javascript:void()" class="list-group-item"><i
                                class="fa fa-paper-plane font-18 align-middle mr-2"></i>Sent</a> <a href="javascript:void()" class="list-group-item"><i
                                class="fa fa-star font-18 align-middle mr-2"></i>Important <span
                                class="badge badge-danger badge-sm text-white float-right">47</span>
                        </a>
                        {{-- <a href="javascript:void()" class="list-group-item"><i
                                class="mdi mdi-file-document-box font-18 align-middle mr-2"></i>Draft</a><a href="javascript:void()" class="list-group-item"><i
                                class="fa fa-trash font-18 align-middle mr-2"></i>Trash</a> --}}
                    </div>
                    {{-- <div class="intro-title d-flex justify-content-between">
                        <h5>Categories</h5>
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
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
                    </div> --}}
                </div>
                <div class="email-right-box ml-0 ml-sm-4 ml-sm-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="right-box-padding">
                                <div class="toolbar mb-4" role="toolbar">
                                    <div class="btn-group mb-1">
                                        <button type="button" class="btn btn-primary light px-3"><i class="fa fa-archive"></i></button>
                                        <button type="button" class="btn btn-primary light px-3"><i class="fa fa-exclamation-circle"></i></button>
                                        <button type="button" class="btn btn-primary light px-3"><i class="fa fa-trash"></i></button>
                                    </div>
                                    <div class="btn-group mb-1">
                                        {{-- <button type="button" class="btn btn-primary light dropdown-toggle px-3" data-toggle="dropdown">
                                            <i class="fa fa-folder"></i> <b class="caret m-l-5"></b>
                                        </button> --}}
                                        {{-- <div class="dropdown-menu"> 
                                            <a class="dropdown-item" href="javascript: void(0);">Social</a> 
                                            <a class="dropdown-item" href="javascript: void(0);">Promotions</a> 
                                            <a class="dropdown-item" href="javascript: void(0);">Updates</a>
                                            <a class="dropdown-item" href="javascript: void(0);">Forums</a>
                                        </div> --}}
                                    </div>
                                    {{-- <div class="btn-group mb-1">
                                        <button type="button" class="btn btn-primary light dropdown-toggle px-3" data-toggle="dropdown">
                                            <i class="fa fa-tag"></i> <b class="caret m-l-5"></b>
                                        </button>
                                        <div class="dropdown-menu"> 
                                            <a class="dropdown-item" href="javascript: void(0);">Updates</a> 
                                            <a class="dropdown-item" href="javascript: void(0);">Social</a> 
                                            <a class="dropdown-item" href="javascript: void(0);">Promotions</a>
                                            <a class="dropdown-item" href="javascript: void(0);">Forums</a>
                                        </div>
                                    </div> --}}
                                    <div class="btn-group mb-1">
                                        <button type="button" class="btn btn-primary light dropdown-toggle v" data-toggle="dropdown">More <span class="caret m-l-5"></span>
                                        </button>
                                        <div class="dropdown-menu"> <a class="dropdown-item" href="javascript: void(0);">Mark as Unread</a> <a class="dropdown-item" href="javascript: void(0);">Add to Tasks</a>
                                            <a class="dropdown-item" href="javascript: void(0);">Add Star</a> <a class="dropdown-item" href="javascript: void(0);">Mute</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="read-content">
                                    <div class="media pt-3">
                                        <img class="mr-2 rounded" width="50" alt="image" src="{{ asset('default_profile_2.png') }}">
                                        <div class="media-body mr-2">
                                            <h5 class="text-primary mb-0 mt-1">Ingredia Nutrisha</h5>
                                            <p class="mb-0">{{ \Carbon\Carbon::parse($contact->created_at)->isoFormat('DD MMM YYYY')}}</p>
                                            {{-- <p class="mb-0">20 May 2018</p> --}}
                                        </div>
                                        <a href="javascript:void()" class="btn btn-primary px-3 light"><i class="fa fa-reply"></i> </a>
                                        <a href="javascript:void()" class="btn btn-primary px-3 light ml-2"><i class="fa fa-long-arrow-right"></i> </a>
                                        <a href="javascript:void()" class="btn btn-primary px-3 light ml-2"><i class="fa fa-trash"></i></a>
                                    </div>
                                    <hr>
                                    <div class="media mb-2 mt-3">
                                        <div class="media-body"><span class="pull-right">{{ \Carbon\Carbon::parse($contact->created_at)->format('H:i:s') }}</span>
                                            <h5 class="my-1 text-primary">{{ $contact->subject }}</h5>
                                            <p class="read-content-email">
                                                {{ $contact->email }}</p>
                                        </div>
                                    </div>
                                    <div class="read-content-body">
                                        {{ $contact->message }}
                                    </div>
                                    <br>
                         
                                    {{-- <div class="read-content-attachment">
                                        <h6><i class="fa fa-download mb-2"></i> Attachments
                                            <span>(3)</span></h6>
                                        <div class="row attachment">
                                            <div class="col-auto">
                                                <a href="javascript:void()" class="text-muted">My-Photo.png</a>
                                            </div>
                                            <div class="col-auto">
                                                <a href="javascript:void()" class="text-muted">My-File.docx</a>
                                            </div>
                                            <div class="col-auto">
                                                <a href="javascript:void()" class="text-muted">My-Resume.pdf</a>
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <hr> --}}
                                    <form action="" method="POST" id="replyForm">
                                        @csrf
                                    <div class="form-group pt-3">
                                        <input type="hidden" name="name" value="{{ $contact->name }}">
                                        <input type="hidden" name="email" value="{{ $contact->email }}">
                                        <textarea name="reply" id="reply" cols="30" rows="5" class="form-control" placeholder="It's really an amazing.I want to know more about it..!"></textarea>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <a href="{{ route('contact-back.index') }}" class="btn btn-outline-primary">Kembali</a>
                                    <button class="btn btn-primary " type="submit">Kirim</button>
                                </div>
                            </form>
                            </div>
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
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/deznav-init.js') }}"></script>
    <script src="{{ asset('vendor/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>

    <!-- Chart piety plugin files -->
    <script src="{{ asset('vendor/peity/jquery.peity.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.20/sweetalert2.min.js" integrity="sha512-ISPBRsvggCFa1YHNMzuhaNqa4vMzTpmxyWhtt01JOmJlbh+nQwAxH49NhbMAGRYviTcH4sy1Wg8SIkBkLyOEGg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#replyForm").validate({
                rules: {
                    reply: {
                        required: true
                    }
                },
                messages: {
                    reply: {
                        required: "Balasan Harus Di Isi."
                    }
                }
            });
        });
    </script>

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