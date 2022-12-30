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

            <div class="icon-sosmed-navbar">
                <div class="icon-sosmed-header mt-5">
                    <a href="https://www.instagram.com/tahungoding/" target="_blank"><img
                            src="{{ asset('front/img/icon-instagram.svg') }}" alt=""></a>
                </div>
                <div class="icon-sosmed-header">
                    <a href="https://github.com/tahungoding"><img src="{{ asset('front/img/icon-github.svg') }}"
                            alt=""></a>
                </div>
                <div class="icon-sosmed-header">
                    <a href="https://www.linkedin.com/company/tahungoding/mycompany/"><img
                            src="{{ asset('front/img/icon-linked-in.svg') }}" alt=""></a>
                </div>
            </div>
        </ul>
        <div class="icon menu-btn">
            <i class="fas fa-bars"></i>
        </div>
    </div>
</nav>
@endsection

@section('content')
<!-- Blog -->
<div class="jumbotron jumbotron-fluid blog mt-5 pt-5">
    <div class="content container-fluid" style="max-width: 1300px;">
        <div class="text">
            <h2 class="text-center"><span>BLOG</span></h2>
            <p class="text-center mt-5 mb-5">We strive to share what we have learned in research activities. Besides we
                want
                to be beneficial to others, we also believe that the best way to learn is to teach.</p>
        </div>

        <div id="loadBlog">
            @include('front.blog.load_blog')
        </div>

    </div>
    <div class="ajax-load text-center" style="display:none">
      <p><img src="{{ asset('tahungoding_load_spinner.svg') }}" width="70px;">Loading More Blog</p>
    </div>

    <div class="text-center mt-5 mb-5">
      <button type="button" class="button btn" onclick="loadContent()">View More</button>
    </div>
</div>
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
