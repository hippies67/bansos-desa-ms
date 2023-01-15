@extends('front.layouts.data')
@section('title', 'Project')
@section('css')
<link rel="stylesheet" href="{{ asset('front/css/style_projects.css') }}">
<style>
    @media only screen   
and (min-device-width : 1024px)   
and (max-device-width : 1028px)  
{ 
  .card {
    min-width: 260px !important;
  }
  
  .img-desktop { 
    min-width: 200px !important;
  }

  .card-body h4 {
    font-size: 21px !important;
    line-height: 30px !important;
  }
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
      <a href="{{ url('/') }}" id="mobileLogo" style="display: none;
      position: absolute;
      left: 45px;
      top: 25px;
  "><img src="{{ asset('front/img/tahu_ngoding.png') }}" alt=""></a>
      <div class="icon cancel-btn">
        <i class="fas fa-times"></i>
      </div>

      <li><a href="{{ url('/') }}" style="font-family: 'Poppins', sans-serif !important; font-size: 16px;">Home</a></li>
      <li><a href="{{ url('/about') }}" style="font-family: 'Poppins', sans-serif !important; font-size: 16px;">About</a></li>
      <li><a href="{{ url('/projects') }}" style="font-family: 'Poppins', sans-serif !important; font-size: 16px;">Projects</a></li>
      <li><a href="{{ url('/teams') }}" style="font-family: 'Poppins', sans-serif !important; font-size: 16px;">Teams</a></li>
      <li><a href="{{ url('/blog') }}" style="font-family: 'Poppins', sans-serif !important; font-size: 16px;">Blog</a></li>
      <li><a href="{{ url('/contact') }}" style="font-family: 'Poppins', sans-serif !important; font-size: 16px;">Contact</a></li>

      <div class="icon-sosmed-navbar">
        <div class="icon-sosmed-header mt-5">
          <a href="https://www.instagram.com/tahungoding/" target="_blank"><img src="{{ asset('front/img/icon-instagram.svg') }}"
              alt=""></a>
        </div>
        <div class="icon-sosmed-header">
          <a href="https://github.com/tahungoding"><img src="{{ asset('front/img/icon-github.svg') }}" alt=""></a>
        </div>
        <div class="icon-sosmed-header">
          <a href="https://www.linkedin.com/company/tahungoding/mycompany/"><img src="{{ asset('front/img/icon-linked-in.svg') }}" alt=""></a>
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
<!-- Our Projects -->
<div class="jumbotron jumbotron-fluid our-projects mt-5 pt-5">
    <div class="content container-fluid" style="max-width: 1300px;">
      <div class="text">
        <h2 class="text-center"><span>OUR PROJECTS</span></h2>
        <p class="text-center mt-5 mb-5">These projects are some of the applications that we have created in
          collaboration with clients and we are adding them to our portfolio</p>
      </div>

      <div id="loadProject">
          @include('front.project.load_project')
      </div>

      <div class="ajax-load text-center" style="display:none">
        <p><img src="{{ asset('tahungoding_load_spinner.svg') }}" width="70px;">Loading More Project</p>
      </div>

      <div class="text-center mt-5 mb-5">
        <button type="button" class="button btn" onclick="loadContent()">View More</button>
      </div>
    </div>
  </div>
  <!-- Akhir Our Projects -->
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
	            $("#loadProject").append(data.html);
	        })
	        .fail(function(jqXHR, ajaxOptions, thrownError)
	        {
	              alert('server not responding...');
	        });
	}
</script>
@endsection

  