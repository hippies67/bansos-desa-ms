@extends('front.layouts.data')
@section('title', 'Home')
@section('css')
<link rel="stylesheet" href="{{ asset('front/css/style_home.css') }}">

<style>
  .btn:hover {
    box-shadow: rgb(0 0 0 / 10%) 0px 4px 12px;
    transform: translateY(-2px);
  }

  .icon-sosmed-header:hover {
    box-shadow: rgb(0 0 0 / 10%) 0px 4px 12px;
    transform: translateY(-2px);
    cursor: pointer;
  }

  .bouncer {
    position: absolute;
  }

  /* @media only screen   
and (min-device-width : 768px)   
and (max-device-width : 1024px)  
{ 
  .img-header {
        width: 540px !important;
      }
}   */
@media only screen   
and (min-width: 1030px)   
and (max-width: 1366px)  
{ 
  .img-header {
        width: 540px !important;
      }
}  

@media only screen   
and (min-device-width : 1024px)   
and (max-device-width : 1028px)  
{ 
  .card {
    min-height: 620px !important;
  }
  .img-header {
        margin-top: -80px !important;
        width: 480px !important;
      }

    .header {
        padding-top: 100px !important;
    }

    .card-text {
      font-size: 14px !important;
    }

    #webDev {
      min-height: 500px !important;
      width: 220px !important;
    }

    #Mic {
      min-height: 500px !important;
      width: 220px !important;
    }

    #iqbal {
      width: 200px !important;
    }

    #jajang {
      width: 150px !important;
      margin-left: 80px !important;
    }

    .card-text-teams {
      font-size: 12px !important;
    }

    .swiper-slide-teams {
      height: 420px !important;
    }

   .swiper-slide-teams {
      min-height: 200px !important;
    }

    #teams {
      height: 580px !important;
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

  .text h1 {
    font-size: 26px;
  }

  .text p {
    font-size: 14px;
  }

  .button-header a:nth-child(2) {
    margin-top: 10px; 
  }

  #header {
    padding-top: 70px !important;
  }

  .card {
    width: 230px;
  }

  .card img {
    width: 210px;
  }

  .card-text {
    font-size: 14px !important; 
  }

  #webDev {
    height: 610px !important;
  }

  #webDev img {
    width: 180px;
  }

  #Mic {
    height: 500px !important;
  }

  #Mic img {
    width: 180px;
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

  .swiper-mobile {
    display: none !important;
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

  #webDev {
    min-height: 630px !important;
  }

  #Mic {
    min-height: 630px !important;
  }

  .teams h5 {
    font-size: 16px !important;
  }

  .card-text-teams {
    margin-top: 20px !important;
    font-size: 12px !important;
    line-height: 20px !important;
  }

  #iqbal {
    width: 180px !important;
    margin-left: 10px !important;  
  }

  #jajang {
    width: 130px !important;
    margin-left: 66px !important;
  }

  #iqbalCard {
    min-height: 100px !important;
  }

  #jajangCard {
    min-height: 100px !important;
  }

  #mobileLogo {
    display: block !important;
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

  #projects {
    display: none !important;
  }

  #projectsTablet { 
    display: block !important;
  }

  #projectsTablet #cardProjectTablet {
    margin-top: 40px !important;
  }

  #project1Tablet {
    height: 460px !important;
    min-height: 460px !important;
  }
  #project2Tablet {
    height: 460px !important;
    min-height: 460px !important;
  }

  #expertise {
    display: none;
  }

  #expertiseTablet {
    display: block !important;
  }

  #wrapSubExpertiseTablet {
    margin-top: 40px !important;
  }

  #webDevTablet {
    height: 430px !important;
    min-height: 430px !important;
  }

  #MicTablet {
    height: 430px !important;
    min-height: 430px !important;
  }

  #teams {
    display: none;
  }

  #teamsTablet {
    display: block !important;
  }

  .btn-view-all-tablet {
    margin-top: 40px !important;
  }

  #wrapSubTeamTablet {
    margin-top: 40px !important;
  }

  #iqbalTabletWrap {
    margin-left: 0px !important;
  }
   
  .icon-sosmed-navbar {
    display: block !important;
  }

} 

@media (min-width: 767px) and (max-width: 780px){
  .content {
    max-width: 700px !important;
  }
  .img-header {
    width: 350px !important;
    margin-top: -20px !important;
  }
  
  .about .img-about {
    margin: 80px 0 0 -47px !important;
  }

  .button-header a:nth-child(2) {
    margin-top: 15px; 
  }
  
  .footer {
    height: 86vh !important;
  }

  h1 {
    font-size: 30px;
  }

  h2 {
    font-size: 30px;
  }

  #projects {
    display: none !important;
  }

  #projectsTablet { 
    display: block !important;
  }

  /* .card img {
    width: 250px !important;
  } */

  .card {
    height: 560px;
  }

  #expertise {
    display: none;
  }

  #expertiseTablet {
    display: block !important;
  }
  
  #webDevTablet {
    height: 530px !important;
  }

  #webDevTablet img {
    width: 200px !important;
  }

  #MicTablet {
    height: 530px !important;
  }

  #MicTablet img {
    width: 200px !important;
  }

  #iqbalTablet {
    width: 200px !important;
    margin-bottom: 200px !important;
  }

  #join-us-mobile {
    margin-top: 100px !important;
  }

  #teams {
    display: none;
  }

  .project-card .card {
    height: 260px !important;
  }

  #teamsTablet {
    display: block !important;
  }

  #cardProjectTablet {
    margin-top: 50px !important;
  }
}

@media (min-width: 912px) and (max-width: 915px){
  h1 {
    font-size: 30px !important;
  }

  h2 {
    font-size: 30px !important;
  }
  
  .header .img-header {    
    width: 420px !important;
    margin-top: 0px !important;
  }

  #projects {
    display: none !important;
  }

  #projectsTablet { 
    display: block !important;
  }

  #cardProjectTablet {
    margin-top: 50px !important;
  }

  #expertise {
    display: none;
  }

  #expertiseTablet {
    display: block !important;
  }

  #wrapSubExpertiseTablet {
    margin-top: 50px !important;
  }

  #teams {
    display: none;
  }

  #teamsTablet {
    display: block !important;
  }

  #wrapSubTeamTablet {
    margin-top: 35px !important;
  }

  .btn-view-all-tablet {
    margin-top: 40px !important;
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

      <li><a href="{{ url('/') }}" class="active" style="font-family: 'Poppins', sans-serif !important; font-size: 16px;">Home</a></li>
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
<!-- Header -->
<div id="header" class="jumbotron jumbotron-fluid header mt-5 mb-5">
    <div class="content container-fluid" style="max-width: 1300px;">
      <div class="row justify-content-between">
        <div class="col-md-6 right">
          <div class="text">
            <h1> <span>INCREASE</span> YOUR SKILLS AND NETWORKING WITH TECH COMMUNITY</h1>
            <p>Empowering students in software engineering research through education and practice in using Creative and
              Computational Thinking.</p>
          </div>

          <div class="button-header mt-4 mb-2">
            <a class="button btn" href="{{ url('/about') }}">View More</a>
            <a class="button btn" style="background-color: #dcdcdc; " href="{{ url('/contact') }}">Contact</a>
          </div>

          @foreach($web_profile as $data)

            <div class="icon-sosmed-header mt-4">
              <a href="https://www.instagram.com/{{ $data->instagram }}" target="_blank"><img src="{{ asset('front/img/icon-instagram.svg') }}"
                  alt=""></a>
            </div>
            <div class="icon-sosmed-header">
              <a href="https://github.com/{{ $data->github }}"><img src="{{ asset('front/img/icon-github.svg') }}" alt=""></a>
            </div>
            <div class="icon-sosmed-header">
              <a href="{{ $data->linkedin }}"><img src="{{ asset('front/img/icon-linked-in.svg') }}" alt=""></a>
            </div>

          @endforeach
        </div>

        <div class="col-md-6" id="wrapImageBouncer">
          <img class="img-header bouncer" src="{{ asset('View_Angle_1.png') }}" alt="">
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir Header -->

  <!-- About -->
  <div id="about" class="jumbotron jumbotron-fluid about mt-5 mb-5 pb-5">
    <div class="content container-fluid" style="max-width: 1300px;">
      <div class="row">
        <div class="col-md-6">
          <img class="img-about" src="{{ asset('Team_Working.png') }}" alt="">
        </div>
        <div class="col-md-6 text-end mt-5 pt-5" id="whoWeAre">
          <div class="text">
            <h2><span>WHO WE ARE?</span></h2>
            <p>Tahungoding is a community engaged in technology, especially multi-platform programming such as mobile,
              desktop, website, and internet of things.Tahungoding is a division of digital experts. We Created an
              application to help who need us. And we're from Sebelas April University.</p>
          </div>

          <a class="button btn" href="{{ url('/about') }}">Read More</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir About -->

  <!-- Projects -->
  <div id="projects" class="jumbotron jumbotron-fluid projects mt-5 pt-5">
    <div class="content container-fluid" style="max-width: 1300px;">
      <div class="row">
        <div class="col-md-4">
          <h2><span>OUR PROJECTS</span></h2>
          <p>These products are some of the applications that we have created in collaboration with clients and we are
            adding them to our portfolio</p>
          <a class="button btn" href="{{ url('/projects') }}">View All</a>
        </div>
        <div class="col-md-7" id="cardProject">
          <div class="row justify-content-around">
            @foreach($project_1 as $data)
            <div class="col-md-3 project-card">
              <div class="card" style="min-height: 600px;">
                <img src="{{ Storage::url($data->image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h4 class="text-center" style="font-size: 17px;">{{ strtoupper($data->name) }}</h4>
                  <p class="card-text" style="font-size: 16px;padding-top: 0px;
                  margin-top: 0px;">{{ substr($data->description, 0, 150) }}</p>
                </div>
              </div>
            </div>
            @endforeach

            @foreach($project_2 as $data)
            <div class="col-md-3 project-card">
              <div class="card" style="min-height: 600px;">
                <img src="{{ Storage::url($data->image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h4 class="text-center" style="font-size: 17px;">{{ strtoupper($data->name) }}</h4>
                  <p class="card-text" style="font-size: 16px;padding-top: 0px;
                  margin-top: 0px;">{{ substr($data->description, 0, 150) }}</p>
                </div>
              </div>
            </div>
            @endforeach

            {{-- <div class="col-md-3 project-card">
              <div class="card">
                <img src="{{ asset('front/img/Diggie.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h4 class="text-center">DIGGIE</h4>
                  <p class="card-text" style="font-size: 20px !important;">Design web that promises to scale your business better and bigger. </p>
                </div>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="projectsTablet" class="jumbotron jumbotron-fluid projects mt-5 pt-5" style="display: none;">
    <div class="content container-fluid" style="max-width: 1300px;">
      <div class="row">
        <div class="col-md-12">
          <h2><span>OUR PROJECTS</span></h2>
          <p>These products are some of the applications that we have created in collaboration with clients and we are
            adding them to our portfolio</p>
          <a class="button btn" href="{{ url('/projects') }}">View All</a>
        </div>
        <div class="col-md-12" id="cardProjectTablet">
          <div class="row justify-content-around">
            @foreach($project_1 as $data)
            <div class="col-md-6 project-card">
              <div class="card" style="width: 100% !important;" id="project1Tablet">
                <img src="{{ Storage::url($data->image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h4 class="text-center" style="font-size: 17px;">{{ strtoupper($data->name) }}</h4>
                  <p class="card-text" style="font-size: 16px;padding-top: 0px;
                  margin-top: 0px;">{{ substr($data->description, 0, 150) }}</p>
                </div>
              </div>
            </div>
            @endforeach

            @foreach($project_2 as $data)
            <div class="col-md-6 project-card">
              <div class="card" style="width: 100% !important;" id="project2Tablet">
                <img src="{{ Storage::url($data->image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h4 class="text-center" style="font-size: 17px;">{{ strtoupper($data->name) }}</h4>
                  <p class="card-text" style="font-size: 16px;padding-top: 0px;
                  margin-top: 0px;">{{ substr($data->description, 0, 150) }}</p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir Projects -->

  <!-- Field -->
  <div id="field" class="jumbotron jumbotron-fluid field mt-5 pt-5">
    <div class="content container">
      <h1 class="text-center"><span>WHAT WE DO</span></h1>
      <div class="row text-center pt-5">
        <div class="col-md-4">
          <img class="mb-5" src="{{ asset('front/img/Illustrasi_field-1.svg') }}" style="padding: 10px 0;" alt="">
          <h3 style="font-weight: bold;">RESEARCH AND DEVELOPMENT</h3>
          <p style="padding: 10px;" class="do-text">We conducts research and development in the field of demand chosen by the member,
            we will facilitate the needs of members who carry out RnD.</p>
        </div>
        <div class="col-md-4">
          <img class="mb-5" src="{{ asset('front/img/Illustrasi_field-2.svg') }}" style="padding: 10px;" alt="">
          <h3 style="font-weight: bold;">SHARING <br> KNOWLEDGE</h3>
          <p style="padding: 10px;" class="do-text">We can help each other and share knowledge in the field of technology, such as
            college assignments, business ideas, product ideas, and much more.</p>
        </div>
        <div class="col-md-4">
          <img class="mb-5" src="{{ asset('front/img/Illustrasi_field-3.svg') }}" style="padding: 5px;" alt="">
          <h3 style="font-weight: bold;">BUILDING TECH <br> PRODUCTS</h3>
          <p style="padding: 10px;" class="do-text">We create, build, and develop technology products that we will and have ever made
            from product ideas as outlined by tahungoding members or tahungoding clients.</p>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir Field -->

  <!-- Expertise -->
  <div id="expertise" class="jumbotron jumbotron-fluid expertise mt-5 pt-5">
    <div class="content container-fluid" style="max-width: 1300px;">
      <div class="row">
        <div class="col-md-4" id="expertise2">
          <h2><span>AREA OF EXPERTISE</span> </h2>
          <p>Area of expertise at Tahungoding includes several elements such as:</p>

          {{-- <a class="button btn" href="#">View All</a> --}}
        </div>
        <div class="col-md-7">
          <div class="row justify-content-around">
            <div class="col-md-3 expertise-card">
              <div class="card" id="webDev">
                <img src="{{ asset('front/img/Icon_webdev.svg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h4 class="text-center">WEB <br> DEVELOPMENT</h4>
                  <p class="card-text" style="font-size: 17px;">Web development division has three areas of specialization, some of which are
                    UI/UX Design, Frontend Development, and Backend Development.</p>
                </div>
              </div>
            </div>

            <div class="col-md-3 expertise-card">
              <div class="card" id="Mic">
                <img src="{{ asset('front/img/Icon IoT.svg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h4 class="text-center">MICROSOFT <br> OFFICE</h4>
                  <p class="card-text" style="font-size: 17px;">Microsoft Office division has two areas of interest, some of which are
                    Word and Excel.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="expertiseTablet" class="jumbotron jumbotron-fluid expertise mt-5 pt-5" style="display: none;">
    <div class="content container-fluid" style="max-width: 1300px;">
      <div class="row">
        <div class="col-md-12" id="expertise2">
          <h2><span>AREA OF EXPERTISE</span> </h2>
          <p>Area of expertise at Tahungoding includes several elements such as:</p>

          <a class="button btn" href="#">View All</a>
        </div>
        <div class="col-md-12" id="wrapSubExpertiseTablet">
          <div class="row justify-content-around">
            <div class="col-md-6 expertise-card">
              <div class="card" id="webDevTablet" style="width: 100% !important;">
                <img src="{{ asset('front/img/Icon_webdev.svg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h4 class="text-center">WEB <br> DEVELOPMENT</h4>
                  <p class="card-text" style="font-size: 17px;">Web development division has three areas of specialization, some of which are
                    UI/UX Design, Frontend Development, and Backend Development.</p>
                </div>
              </div>
            </div>

            <div class="col-md-6 expertise-card">
              <div class="card" id="MicTablet" style="width: 100% !important;">
                <img src="{{ asset('front/img/Icon IoT.svg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h4 class="text-center">MICROSOFT <br> OFFICE</h4>
                  <p class="card-text" style="font-size: 17px;">Microsoft Office division has two areas of interest, some of which are
                    Word and Excel.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir Expertise -->

  <!-- Teams Slider -->
  <div id="teams" class="jumbotron jumbotron-fluid teams mt-5 pt-5">
    <div class="content container-fluid" style="max-width: 1300px;">
      <div class="row">
        <div class="col-md-4">
          <h2 id="teamTitle"><span>TEAM</span> </h2>
          <p>We are young and creative people who are trying to find and develop our talents. We can only do small
            things on our own, but together we can do extraordinary things.</p>
            <div class="row swiper swiper-teams swiper-mobile" style="display: none">
              <div class="swiper-wrapper swiper-wrapper-teams" id="iqbalMobileCard">
  
                <div class="card swiper-slide swiper-slide-teams swiper-mobile">
                  <div class="card-body mt-3 text-center">
                    <h5>Muhammad Iqbal Rivaldi</h5>
                    {{-- <p class="card-text-teams text-start" style="margin-top: -5px;font-size: 15px;">UI/UX Designer</p> --}}
                    <div class="img-teams text-end">
                      <img src="{{ asset('founder_1.png') }}" class="text-end" alt="..." style="width: 280px;">
                    </div>
                  </div>
                </div>
                <div class="card swiper-slide swiper-slide-teams" id="jajangMobileCard">
                  <div class="card-body mt-3 text-center">
                    <h5>Jajang Jamaludin</h5>
                    {{-- <p class="card-text-teams text-start" style="margin-top: -5px;font-size: 15px;">Back End Developer</p> --}}
                    <div class="img-teams text-end">
                      <img src="{{ asset('founder_2.png') }}" class="text-end" alt="...">
                    </div>
                  </div>
                </div>
                {{-- <div class="card swiper-slide swiper-slide-teams">
                  <div class="card-body mt-3">
                    <h5>Bagas Pradana</h5>
                    <p class="card-text-teams text-start" style="margin-top: -5px;font-size: 15px;">Front End Developer</p>
                    <div class="img-teams text-end">
                      <img src="{{ asset('front/img/Bagas.png') }}" class="text-end" alt="...">
                    </div>
                  </div>
                </div> --}}
  
                <!-- Tombol Navigasi -->
                <!-- <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div> -->
              </div>
  
            </div>
          <a class="button btn btn-view-all" href="{{ url('/teams') }}">View All</a>
        </div>

        <div class="col-md-7 mt-5 pt-5">
          <div class="row swiper swiper-teams swiper-pc">
            <div class="swiper-wrapper swiper-wrapper-teams">

              <div class="card swiper-slide swiper-slide-teams" id="iqbalCard">
                <div class="card-body mt-3 text-center">
                  <h5>Muhammad Iqbal Rivaldi</h5>
                  <p class="card-text-teams text-center" style="margin-top: -5px;font-size: 15px;">Founder Of Tahungoding</p>
                  <div class="img-teams text-end">
                    <img src="{{ asset('founder_1.png') }}" class="text-end" id="iqbal" alt="..." style="width: 265px;">
                  </div>
                </div>
              </div>
              <div class="card swiper-slide swiper-slide-teams" id="jajangCard">
                <div class="card-body mt-3 text-center">
                  <h5>Jajang <br> Jamaludin</h5>
                  <p class="card-text-teams text-center" style="margin-top: -5px;font-size: 15px;">Founder Of Tahungoding</p>
                  <div class="img-teams text-center">
                    <img src="{{ asset('founder_2.png') }}" class="text-center" id="jajang" alt="..." style="width: 190px;margin-left: 110px;">
                  </div>
                </div>
              </div>
              {{-- <div class="card swiper-slide swiper-slide-teams">
                <div class="card-body mt-3">
                  <h5>Bagas Pradana</h5>
                  <p class="card-text-teams text-start" style="margin-top: -5px;font-size: 15px;">Front End Developer</p>
                  <div class="img-teams text-end">
                    <img src="{{ asset('front/img/Bagas.png') }}" class="text-end" alt="...">
                  </div>
                </div>
              </div> --}}

              <!-- Tombol Navigasi -->
              <!-- <div class="swiper-button-prev"></div>
              <div class="swiper-button-next"></div> -->
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>

  <div id="teamsTablet" class="jumbotron jumbotron-fluid teams mt-5 pt-5" style="display: none;">
    <div class="content container-fluid" style="max-width: 1300px;">
      <div class="row">
        <div class="col-md-12">
          <h2 id="teamTitle"><span>TEAM</span> </h2>
          <p>We are young and creative people who are trying to find and develop our talents. We can only do small
            things on our own, but together we can do extraordinary things.</p>
           <div class="row mt-4" id="wrapSubTeamTablet">
            <div class="col-md-12">
              <div class="row justify-content-around">
                <div class="col-md-6 expertise-card">
                  <div class="card" style="width: 100% !important;height: 400px !important;">
                    <div class="card-body text-center">
                      <h5>Muhammad Iqbal <br> Rivaldi</h5>
                      <p class="card-text-teams text-center" style="margin-top: -5px;font-size: 13px;">Founder Of Tahungoding</p>
                      <div class="img-teams text-end">
                        <img src="{{ asset('founder_1.png') }}" class="text-end" id="iqbalTabletWrap" alt="..." style="width: 270px;margin-left: -25px;">
                      </div>
                    </div>
                  </div>
                </div>
    
                <div class="col-md-6 expertise-card">
                  <div class="card" style="width: 100% !important;height: 400px !important;">
                    <div class="card-body text-center">
                      <h5>Jajang <br> Jamaludin</h5>
                      <p class="card-text-teams text-center" style="margin-top: -5px;font-size: 13px;">Founder Of Tahungoding</p>
                      <div class="img-teams text-center" id="jajangTabletWrap">
                        <img src="{{ asset('founder_2.png') }}" class="text-center" alt="..." style="width: 197px;margin-left: 110px;">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           </div>
          <a class="button btn btn-view-all btn-view-all-tablet" href="{{ url('/teams') }}">View All</a>
        </div>
      </div>
    </div>

  </div>
  <!-- Akhir Teams -->

  <!-- Join Us -->
  <div id="join-us" class="jumbotron jumbotron-fluid join-us">
    <div class="content container-fluid" style="max-width: 1300px;">
      <div class="row">
        <div class="col-md-6 mt-5 pt-5">
          <h2> <span>JOIN THE FAMILY</span></h2>
          <p>Let's join us so that you can increase your horizons and develop your skills, especially in
            multi-platform programming.</p>

          <a class="button btn" href="https://www.open.tahungoding.my.id">Join Us</a>

        </div>
        <div class="col-md-5 d-flex">
          {{-- <img class="" src="{{ asset('phone.png') }}" alt="" width="300"> --}}
          <img class="" src="{{ asset('phone.png') }}" alt="" width="400">
        </div>
      </div>
    </div>
  </div>

  <div id="join-us-mobile" class="jumbotron jumbotron-fluid join-us">
    <div class="content container-fluid" style="max-width: 1300px;">
      <div class="row">
        <div class="col-md-12 mt-12 pt-5" id="family">
          <h2> <span>JOIN THE FAMILY</span></h2>
          <p>Let's join us so that you can increase your horizons and develop your skills, especially in
            multi-platform programming.</p>

          <a class="button btn" href="https://www.open.tahungoding.my.id">Join Us</a>

        </div>
      </div>
    </div>
  </div>
  <!-- Akhir Join Us -->

  <!-- Clients -->

  <div id="join-us" class="jumbotron jumbotron-fluid join-us">
    <div class="content container-fluid" style="max-width: 1300px;">
      <div class="row">
        <div class="col-md-12 mt-5 pt-5">
          <h2> <span>CLIENTS</span></h2>
          <p>Carrying the spirit of collaboration in every step taken, this is a team of
            collaborators who have become partners of Tahungoding.</p>
        </div>
      </div>
    </div>
  </div>

  <div id="clients" class="jumbotron jumbotron-fluid clients mt-5 pt-5">
    <div>
      {{-- <h2><span>CLIENTS</span></h2>
      <p class="text-clients mt-5 mb-5">Carrying the spirit of collaboration in every step taken, this is a team of
        collaborators who have become partners of Tahungoding.</p> --}}

      <div class="swiper swiper-client">
        <div class="text-center swiper-wrapper swiper-wrapper-client">
          <div class="swiper-slide swiper-slide-client">
            <img src="{{ asset('front/img/unsap 1.png') }}">
          </div>
          <div class="swiper-slide swiper-slide-client">
            <img src="{{ asset('front/img/Rci 1.png') }}">
          </div>
          <div class="swiper-slide swiper-slide-client">
            <img src="{{ asset('front/img/logo_inimahsumedang.png') }}">
          </div>
          <div class="swiper-slide swiper-slide-client">
            <img src="{{ asset('front/img/jaya 1.png') }}">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir Clients -->
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script>
  function loop() {
    $('.bouncer').animate({'top': '180'}, {
        duration: 2300, 
        complete: function() {
            $('.bouncer').animate({top: 150}, {
                duration: 2300, 
                complete: loop});
        }});
    
    // $('<div/>').text('exiting loop').appendTo($('.results'));
}
loop();
</script>
@endsection

  