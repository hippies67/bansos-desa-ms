@extends('back.layouts.data')

@section('title_menu')
    Edit Artikel
@endsection

@section('title')
    Edit Artikel
@endsection

@section('css')
    <link href="{{ asset('vendor/owl-carousel/owl.carousel.css" rel="stylesheet') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">

    <link rel="icon" type="image/png" href="https://c.cksource.com/a/1/logos/ckeditor5.png">

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
        }

        .cke_chrome {
            border: 1px solid #e2e7f1 !important;
            border-width: thin;
        }

        .ck-editor__editable {min-height: 300px;}


        span.file-icon {
            font-size: 18px !important;
        }
    </style>
@endsection

@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Artikel</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('artikel.create') }}">Edit Artikel</a></li>
    </ol>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('artikel.update', $artikel->id) }}" method="post" id="editArtikelForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="hidden" id="checkJudul" value="{{ $artikel->judul }}">

                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="edit_judul" class="form-control" value="{{ $artikel->judul }}" placeholder="Judul">
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail</label>
                        <input type="file" class="form-control dropify" name="edit_thumbnail"
                        data-allowed-file-extensions="png jpg jpeg" data-default-file="@if(!empty($artikel->thumbnail) &&
                        File::exists(public_path("artikel/{$artikel->thumbnail}"))){{ asset('artikel/'. $artikel->thumbnail) }}@endif" data-show-remove="false">
                    </div>
                    <div class="form-group">
                        <label for="konten">Konten</label>
                        <textarea name="edit_konten" class="form-control ckeditor-5" id="ckeditor5">{{ $artikel->konten }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="edit_status" class="form-control form-control-lg">
                            <option value="published" {{ $artikel->status == 'published' ? 'selected' : '' }}>Published</option>
                            <option value="unpublished" {{ $artikel->status == 'unpublished' ? 'selected' : '' }}>Unpublished</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan Artikel</button>
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
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
            $("#editArtikelForm").validate({
                rules: {
                    edit_judul:{
                        required: true,
                        remote: {
                                param: {
                                    url: "{{ route('artikel.checkJudul') }}",
                                    type: "post",
                                },
                                depends: function(element) {
                                    // compare name in form to hidden field
                                    return ($(element).val() !== $('#checkJudul').val());
                                },
                               
                        }
                    },
                    edit_status : {
                        required: true,
                    }
                },
                messages: {
                    edit_judul: {
                        required: "Judul harus di isi",
                        remote: "Judul sudah tersedia"
                    },
                    edit_status: {
                        required: "Status harus di isi",
                    }
                }
            });
        });
</script>
@endsection