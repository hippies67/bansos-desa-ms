@extends('front.layouts.data')
@section('title', 'About')
@section('css')
<link rel="stylesheet" href="{{ asset('front/css/style_about.css') }}">
<style>
  @media only screen   
and (min-device-width : 1024px)   
and (max-device-width : 1028px)  
{ 
  .rectangle {
    max-width: 260px !important;
  }

  .about video {
    width: 344px !important;
  }

  .card-field {
    padding-right: 60px !important;
  }

  .card-field p {
    font-size: 14px !important;
  }

  .join-us {
    min-width: 900px !important;
  }

  .card-our-program {
    min-width: 200px !important;
  }
}  

@media (max-width: 768px) {
  .card-text-our-program {
    margin-top: 140px !important;
  }

  .card-text-our-program p {
    font-size: 14px !important;
  }

  .join-us {
    max-width: 350px !important;
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

  .about video {
    width: 230px !important;
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

  .card {
    width: 170px !important;
    min-height: 730px !important;
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
    height: 119vh !important;
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
} 
</style>
@endsection

@section('navbar')
<nav class="navbar"  style="margin-top: 0;">
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
<!-- About -->
<div id="about" class="jumbotron jumbotron-fluid about">
    <div class="content container-fluid" style="max-width: 1300px;">
      <div class="row">
        <div class="col-md-6 mt-5 pt-5">
          <h2><span>WHO WE ARE?</span></h2>
          <p>Tahungoding is a community engaged in technology, especially multi-platform programming such as mobile,
            desktop, website, and internet of things.Tahungoding is a division of digital experts. We Created an
            application to help who need us. And we're from Sebelas April University.</p>
        </div>

        <div class="col-md-6 mt-5 pt-5 text-center">
          <video controls loop autoplay muted>
            <source src="{{ asset('tahungoding.mp4') }}" type="video/mp4">
          </video>
          <img class="rectangle" src="{{ asset('front/img/Rectangle.svg') }}" alt="">
        </div>
      </div>
    </div>
  </div>
  <!-- About -->


  <!-- Field -->
  <div class="jumbotron jumbotron-fluid field mt-5 pt-5">
    <div class="content container-fluid" style="max-width: 1300px;">
      <h2 class="text-center"><span>WHAT WE DO</span></h2>
      <p class="text-center mt-5">CodeLabs members from various generations have succeeded in creating many good quality
        products. CodeLabs also collaborates with other Startup to build more complex products.</p>
      <div class="row text-center mt-5">
        <div class="col-md-4">
          <div class="card-field">
            <img src="{{ asset('front/img/Illustrasi_field-1.svg') }}" style="padding: 30px 0;" alt="">
            <h3 style="font-weight: bold;">RESEARCH AND <br> DEVELOPMENT</h3>
            <p style="padding: 15px;">We conducts research and development in the field of demand chosen by the member,
              we will facilitate the needs of members who carry out RnD.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-field">
            <img src="{{ asset('front/img/Illustrasi_field-2.svg') }}" style="padding: 35px;" alt="">
            <h3 style="font-weight: bold;">SHARING <br> KNOWLEDGE</h3>
            <p style="padding: 15px;">We can help each other and share knowledge in the field of technology, such as
              college assignments, business ideas, product ideas, and much more.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-field">
            <img src="{{ asset('front/img/Illustrasi_field-3.svg') }}" style="padding: 30px;" alt="">
            <h3 style="font-weight: bold;">BUILDING TECH <br> PRODUCTS</h3>
            <p style="padding: 15px;">We create, build, and develop technology products that we will and have ever made
              from product ideas as outlined by tahungoding members or tahungoding clients.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir Field -->

  <!-- Our Program -->
  <div class="jumbotron jumbotron-fluid our-program mt-5 pt-5">
    <div class="content container-fluid" style="max-width: 1300px;">
      <h2 class="text-center"><span>OUR PROGRAM</span></h2>
      <div class="row mt-5 pt-5">
        <div class="col-md-4">
          <div class="card-our-program workshop">
            <div class="card-text-our-program workshop-text">
              <h4>WORKSHOP</h4>
              <p>These workshops aim to equip them with basic knowledge from each field of research before they are
                given more advanced workshops as their specialism.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-our-program comparative">
            <div class="card-text-our-program comparative-text">
              <h4>COMPARATIVE STUDY</h4>
              <p>Comparative study was conducted to increase our Networking as an IT community in Indonesia.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-our-program holiday">
            <div class="card-text-our-program holiday-text">
              <h4>HOLIDAY</h4>
              <p>Every year we always take a vacation together to approach and bounding the character of each our
                member.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir Our Program -->


  <!-- Join Us -->
  <div class="jumbotron jumbotron-fluid join-us">
    <div class="container">
      <h2 style="font-family: 'Poppins', sans-serif !important;"><span>Interest to join us?</span></h2>
      <div class="row">
        <div class="col-md-6">
          <p style="font-family: 'Poppins', sans-serif !important;">Let's join us so that you can increase your horizons and develop your skills, especially in multi-platform
            programming.</p>
        </div>

        <div class="col-md-6 text-end">
          <a class="button btn" href="https://www.open.tahungoding.my.id" style="font-family: 'Poppins', sans-serif !important;">Join Us</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir Join Us -->


  <div class="box"></div>
@endsection
@section('js')

@endsection

  