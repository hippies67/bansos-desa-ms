@extends('front.layouts.data')
@section('title', 'Blog')
@section('css')
<link rel="stylesheet" href="{{ asset('front/css/style_blog.css') }}">
<style>
  .image-hover {
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1);
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    overflow: hidden;
  }

  .image-hover:hover {
      -webkit-transform: scale(1.07);
      -moz-transform: scale(1.07);
      -ms-transform: scale(1.07);
      -o-transform: scale(1.07);
      transform: scale(1.07);
  }

</style>
@endsection

@section('navbar')
<nav class="navbar">
    <div class="content container-fluid" style="max-width: 1300px;">
        <div class="logo">
            <a href="{{ url('/') }}"><img src="{{ asset('front/img/tahu_ngoding.png') }}" alt=""></a>
        </div>
        <ul class="menu-list">
            <div class="icon cancel-btn">
                <i class="fas fa-times"></i>
            </div>

            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/about') }}">About</a></li>
            <li><a href="{{ url('/projects') }}">Projects</a></li>
            <li><a href="{{ url('/teams') }}">Teams</a></li>
            <li><a href="{{ url('/blog') }}">Blog</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>

            @php
                $web_profile = App\Models\WebProfile::all();
            @endphp

            @foreach($web_profile as $data)
            <div class="icon-sosmed-navbar">
                <div class="icon-sosmed-header mt-5">
                <a href="https://www.instagram.com/{{ $data->instagram }}" target="_blank"><img src="{{ asset('front/img/icon-instagram.svg') }}"
                    alt=""></a>
                </div>
                <div class="icon-sosmed-header">
                <a href="https://github.com/{{ $data->github }}"><img src="{{ asset('front/img/icon-github.svg') }}" alt=""></a>
                </div>
                <div class="icon-sosmed-header">
                <a href="{{ $data->linkedin }}""><img src="{{ asset('front/img/icon-linked-in.svg') }}" alt=""></a>
                </div>
            </div>
            @endforeach
        </ul>
        <div class="icon menu-btn">
            <i class="fas fa-bars"></i>
        </div>
    </div>
</nav>
@endsection

@section('content')
<!-- Blog -->
<div class="jumbotron jumbotron-fluid blog mt-5 pt-5" style="margin-top: 70px;">
    <div class="content container-fluid" style="max-width: 1300px;">
        <div class="text">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/blog') }}" class="text-dark">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tentang Gunung Surian di Bendungan Jatigede</li>
                </ol>
            </nav>
            <h2 class="text-left"><span>{{ $blog->judul }}</span></h2>
            <div class="d-flex mt-4">
                <img src="http://127.0.0.1:8000/tahu.png" class="author" width="35" height="35" alt="author">
                <small style="text-decoration: none; color: #acacac; padding-top: 5px; padding-left: 10px !important;">Admin</small>
                <small style="text-decoration: none; color: #acacac; padding-top: 5px; padding-left: 10px !important;">&#8226;</small>
                <small style="text-decoration: none; color: #acacac; padding-top: 5px; padding-left: 10px !important">{{ $blog->updated_at->format('d M Y')}}</small>
            </div>
            <img src="{{ asset('artikel/'. $blog->thumbnail) }}" class="img-fluid mt-3" style="border-radius: 10px;">
            <p>{!! $blog->konten !!}</p>
        </div>

        {{-- <div id="loadBlog">
            @include('front.blog.load_blog')
        </div> --}}

    </div>
    {{-- <div class="ajax-load text-center" style="display:none">
      <p><img src="{{ asset('tahungoding_load_spinner.svg') }}" width="70px;">Loading More Blog</p>
    </div>

    <div class="text-center mt-5 mb-5">
      <button type="button" class="button btn" onclick="loadContent()">View More</button>
    </div> --}}
</div>
<br><br><br>
<!-- Akhir Blog-->
@endsection

@section('js')
<script type="text/javascript">
	var page = 1;

	function loadContent() {
    page++;
    console.log(page);
	  loadMoreData(page);
  }
	

	function loadMoreData(page) {
	  $.ajax(
	        {
	            url: '?page=' + page,
	            type: "get",
	            beforeSend: function()
	            {
	                $('.ajax-load').show();
	            }
	        })
	        .done(function(data)
	        {
	            if(data.html == " "){
	                $('.ajax-load').html("No more records found");
	                return;
	            }
	            $('.ajax-load').hide();
	            $("#loadBlog").append(data.html);
	        })
	        .fail(function(jqXHR, ajaxOptions, thrownError)
	        {
	              alert('server not responding...');
	        });
	}
</script>
@endsection
