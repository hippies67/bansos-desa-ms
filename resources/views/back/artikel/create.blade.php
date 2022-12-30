@extends('back.layouts.data')

@section('title_menu')
    Tambah Artikel
@endsection

@section('title')
    Tambah Artikel
@endsection

@section('css')
    <link href="{{ asset('vendor/owl-carousel/owl.carousel.css" rel="stylesheet') }}">
    <link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
    integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.20/sweetalert2.min.css" integrity="sha512-Yn5Z4XxNnXXE8Y+h/H1fwG/2qax2MxG9GeUOWL6CYDCSp4rTFwUpOZ1PS6JOuZaPBawASndfrlWYx8RGKgILhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

        label.error {
            color: #F94687;
            font-size: 13px;
            font-size: .875rem;
            font-weight: 400;
            line-height: 1.5;
            margin-top: 10px;
            padding: 0;
        }

        span#thumbnailError {
            color: #F94687;
            font-size: 13px;
            font-size: .875rem;
            font-weight: 400;
            line-height: 1.5;
            padding: 0;
            display: none;
        }

        span#kontenError {
            color: #F94687;
            font-size: 13px;
            font-size: .875rem;
            font-weight: 400;
            line-height: 1.5;
            padding: 0;
            display: none;
        }

        span#statusError {
            color: #F94687;
            font-size: 13px;
            font-size: .875rem;
            font-weight: 400;
            line-height: 1.5;
            padding: 0;
            display: none;
        }

        input.error {
            color: #F94687;
            border: 1px solid #F94687;
        }

        textarea.error {
            color: #F94687;
            border: 1px solid #F94687;
        }

        select.error {
            color: #F94687;
            border: 1px solid #F94687;
        }
    </style>
@endsection

@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('artikel.index') }}">Artikel</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('artikel.create') }}">Tambah Artikel</a></li>
    </ol>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('artikel.store') }}" method="post" id="tambahArtikelForm" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" class="form-control" placeholder="Judul">
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail</label>
                        <input type="file" class="form-control dropify" name="thumbnail" id="thumbnail"
                        data-allowed-file-extensions="png jpg jpeg" data-show-remove="false">
                        <span id="thumbnailError">Thumbnail harus di isi.</span>
                    </div>
                    <div class="form-group">
                        <label for="konten">Konten</label>
                        <textarea name="konten" class="form-control ckeditor-5" id="ckeditor5"></textarea>
                        <span id="kontenError">Konten harus di isi.</span>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <div class="dropdown bootstrap-select form-control form-control-lg">
                            <select name="status" class="form-control form-control-lg" id="status" tabindex="-98">
                                <option value="">Pilih Status</option>
                                <option value="published">Published</option>
                                <option value="unpublished">Unpublished</option>
                            </select>
                        </div>
                        <span id="statusError">Status harus di isi.</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="buatArtikelButton">Buat Artikel</button>
                        <a href="{{ route('artikel.index') }}" class="btn btn-dark">Kembali</a>
                    </div>
                </form>
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

    <!-- Chart piety plugin files -->
    <script src="{{ asset('vendor/peity/jquery.peity.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
    integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.20/sweetalert2.min.js" integrity="sha512-ISPBRsvggCFa1YHNMzuhaNqa4vMzTpmxyWhtt01JOmJlbh+nQwAxH49NhbMAGRYviTcH4sy1Wg8SIkBkLyOEGg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Seret dan jatuhkan file di sini atau klik',
            }
        });
    </script>

    <script>
    ClassicEditor
        .create(document.querySelector('#ckeditor5'), {
            licenseKey: '',
            toolbar: {
                items: [
                    'heading', '|',
                    'alignment', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                    'link', '|',
                    'bulletedList', 'numberedList', 'todoList',
                    '-', // break point
                    'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor', '|',
                    'code', 'codeBlock', '|',
                    'insertTable', '|',
                    'outdent', 'indent', '|',
                    'blockQuote', '|',
                    'undo', 'redo'
                ],
            }
        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(error => {
            console.error('Oops, something went wrong!');
            console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
            console.warn('Build id: t94173qfk3d4-jfha1cexgplv');
            console.error(error);
        });
    </script>

<script>
    $("#thumbnail").change(function() {
        if($("#thumbnail").val() == '') {
            $("#thumbnailError").css('display', 'block');
        } else {
            $("#thumbnailError").css('display', 'none');
        }
    });

    $("#buatArtikelButton").click(function() {
        if($("#thumbnail").val() == '') {
            $("#thumbnailError").css('display', 'block');
        } else {
            $("#thumbnailError").css('display', 'none');
        }

        if(editor.getData() == '') {
            $("#kontenError").css('display', 'block');
        } else {
            $("#kontenError").css('display', 'none');
        }

        if($("#status").val() == '') {
            $("#statusError").css('display', 'block');
        } else {
            $("#statusError").css('display', 'none');
        }

        if($("#tambahArtikelForm").valid() && $("#thumbnail").val() != '' && editor.getData() != '' && $("#status").val() != '') {
            $("#buatArtikelButton").prop('disabled', true);
            $("#tambahArtikelForm")[0].submit();
        }
    }); 
</script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
            $("#tambahArtikelForm").validate({
                ignore: ".ck-editor__editable",
                rules: {
                    judul:{
                        required: true,
                        remote: {
                                    url: "{{ route('artikel.checkJudul') }}",
                                    type: "post",
                        }
                    }
                },
                messages: {
                    judul: {
                        required: "Judul harus di isi",
                        remote: "Judul sudah tersedia"
                    }
                },
                submitHandler: function(form) {
            
                }
            });
        });
</script>
@endsection