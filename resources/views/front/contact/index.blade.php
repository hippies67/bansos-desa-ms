@extends('front.layouts.data')
@section('title', 'Contact')
@section('css')
<link rel="stylesheet" href="{{ asset('front/css/style_contact.css') }}">
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

   
  @media only screen   
and (min-device-width : 1024px)   
and (max-device-width : 1028px)  
{ 
    .join-us {
        min-width: 900px !important
    }
}  

@media (max-width: 768px) {
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

  .swiper-mobile {
    display: none !important;
  }
}  


@media (min-width: 767px) and (max-width: 780px){
  h1 {
    font-size: 30px !important;
  }

  .text h2 {
    font-size: 30px !important;
  }

  .footer {
    height: 86vh !important;
  }
  
  .content {
    max-width: 700px !important;
  }

  .join-us {
    max-width: 650px !important;
  }

}

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

  .text h2 {
    font-size: 30px !important;
  }

  h3 {
    font-size: 20px !important;
  }

  .footer {
    height: 72vh !important;
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

  .join-us {
    width: 650px !important;
  }

  #mobileLogo {
    display: block !important;
  }
  
  .icon-sosmed-navbar {
    display: block !important;
  }

  .wrapContent img{
        max-width: 400px !important;
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
}
 
 p {
  line-height: 30px !important;
 }

 @media screen and (min-width: 1900px) {
  .footer {
    height: 30vh !important;
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
            <li><a href="{{ url('/contact') }}" class="active" style="font-family: 'Poppins', sans-serif !important; font-size: 16px;">Contact</a></li>

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
<!-- Contact -->
<div class="jumbotron jumbotron-fluid contact mt-5 pt-5"  style="font-family: 'Poppins', sans-serif !important; font-size: 16px;">
    <div class="content container-fluid" style="max-width: 1300px;">
        <div class="text">
            <h2 class="text-center"><span>LET’S COLLABORATE</span></h2>
            <p class="text-center mt-5 mb-5" style="font-family: 'Poppins', sans-serif !important; font-size: 16px;">Thank you for visiting our website. If you have a project in mind, please
                fill
                out our online form below and our admin will get back to you as soon as possible.</p>
        </div>

        <form class="row form" action="{{ url('contact/store') }}" method="POST" id="contactForm">
            @csrf
            <div class="col-md-7">
                <div class="mb-3">
                    <input type="name" name="name" class="form-control form-control-md" id="inputName"
                        placeholder="Your Name (Required)">
                </div>
            </div>
            <div class="col-md-5">
                <div class="mb-3">
                    <input type="Subject" name="subject" class="form-control form-control-md" id="inputSubject"
                        placeholder="Subject (Required)">
                </div>
            </div>

            <div class="mb-3">
                <input type="email" name="email" class="form-control form-control-md" id="inputEmail"
                    placeholder="Your Email (Required)">
            </div>
            <div class="textarea">
                <textarea name="message" class="form-control" placeholder="Type a message..."></textarea>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="button btn-send" style="border: none;">SEND <img
                        src="{{ asset('front/img/Arrow-Right.svg') }}" style="width: 10px; padding: 0 0 3px 3px;"
                        alt="">
                </button>
            </div>
        </form>

    </div>
</div>


<!-- Akhir Contact-->

<!-- Join Us -->
<div class="jumbotron jumbotron-fluid join-us">
    <div class="container-fluid" style="max-width: 1300px;">
        <h2><span>Interest to join us?</span></h2>
        <div class="row">
            <div class="col-md-6">
                <p style="line-height: 30px;">Let's join us so that you can increase your horizons and develop your skills, especially in
                    multi-platform
                    programming.</p>
            </div>

            <div class="col-md-6 text-end">
                <a class="button btn" href="https://www.open.tahungoding.my.id">Join Us</a>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Join Us -->


<div class="box"></div>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#contactForm").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3,
                },
                subject: {
                    required: true
                },
                email: {
                    required: true
                },
                message: {
                    required: true,
                    minlength: 2
                }
            },
            messages: {
                name: {
                    required: "Name is required",
                },
                subject: {
                    required: "Subject is required",
                },
                email: {
                    required: "Email is required",
                    email: "The Email must be a valid email address"
                },
                message: {
                    required: "Message is required"
                }
            }
        });
    });
</script>
@endsection
