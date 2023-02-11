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

/* Galaxy Fold */
@media only screen   
and (min-device-width : 280px)   
and (max-device-width : 283px)  
{ 
  .logo a img {
    width: 90px !important;
  }

 .card {
    width: 15rem !important;
 }

  #mobileLogo img {
    width: 90px !important
  }

  .text h1 {
    font-size: 26px;
  }

  .text p {
    font-size: 14px;
  }


  h2 {
    font-size: 26px !important;
  }

  .content h1 {
    font-size: 26px !important;
  }

  .contact-us-footer p {
    font-size: 16px !important; 
  }

  .menu-footer a {
    font-size: 16px !important;
  }

  .identity p {
    font-size: 16px !important;
  }
}  

/* tablet and large mobiles */
@media only screen   
and (min-device-width : 820px)   
and (max-device-width : 825px)  
{   
  #header {
    padding-top: 90px !important;
  }
  
  .img-header {
    width: 400px !important;
    margin-top: -20px !important;
  }

  .img-about {
    width: 300px !important;
  }

  .button-header a:nth-child(2) {
    margin-top: 10px; 
  }

  h1 {
    font-size: 30px !important;
  }

  h2 {
    font-size: 30px !important;
  }
  
  .card-text {  
    font-size: 14px !important;
  }

  h3 {
    font-size: 20px !important;
  }

  .do-text {
    font-size: 14px !important;
  }

  .card-body h4 {
    font-size: 16px !important;
  }

  .teams h5 {
    font-size: 16px !important;
  }

  .card-text-teams {
    margin-top: 20px !important;
    font-size: 12px !important;
    line-height: 20px !important;
  }

  .footer {
    height: 76vh !important;
  }

  ul li a.active {
    color: #ffd800;
    border-bottom: 2.5px solid #ffd800;
    padding-bottom: 5px;
    transition: 0.6s;
  }
  
  .card-text-our-program {
    margin-top: 20px !important;
  }

  #mobileLogo {
    display: block !important;
  }
  
  .icon-sosmed-navbar {
    display: block !important;
  }

  .card {
    min-height: 495px !important;
  }
} 
@media (min-width: 767px) and (max-width: 780px){
  h1 {
    font-size: 30px;
  }

  h2 {
    font-size: 30px;
  }

  .content {
    max-width: 700px !important;
  }
  
  .footer {
    height: 85vh !important;
  }

  .project-card .card {
    height: 260px !important;
  }

  .card-text-our-program {
    margin-top: 90px !important;
  }

  #projectAll {
    display: none;
  }

  #projectTabletWrap {
    display: flex !important;
  }

  .card {
    width: 350px !important;
    min-height: 460px !important;
  }

}

@media (min-width: 912px) and (max-width: 915px){
  h1 {
    font-size: 30px !important;
  }

  h2 {
    font-size: 30px !important;
  }

  .container, .container-md, .container-sm {
    max-width: 950px !important;
  }

  ul li a.active {
    color: #ffd800;
    border-bottom: 2.5px solid #ffd800;
    padding-bottom: 5px;
    transition: 0.6s;
  }

  .card-text-our-program {
    margin-top: 50px !important;
  }

  h4 {
    font-size: 18px !important;
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

  