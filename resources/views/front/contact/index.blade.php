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

            <li><a href="{{ url('/') }}" style="font-family: 'Poppins', sans-serif !important;">Home</a></li>
            <li><a href="{{ url('/about') }}" style="font-family: 'Poppins', sans-serif !important;">About</a></li>
            <li><a href="{{ url('/projects') }}" style="font-family: 'Poppins', sans-serif !important;">Projects</a></li>
            <li><a href="{{ url('/teams') }}" style="font-family: 'Poppins', sans-serif !important;">Teams</a></li>
            <li><a href="{{ url('/blog') }}" style="font-family: 'Poppins', sans-serif !important;">Blog</a></li>
            <li><a href="{{ url('/contact') }}" style="font-family: 'Poppins', sans-serif !important;">Contact</a></li>

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
<!-- Contact -->
<div class="jumbotron jumbotron-fluid contact mt-5 pt-5"  style="font-family: 'Poppins', sans-serif !important;">
    <div class="content container-fluid" style="max-width: 1300px;">
        <div class="text">
            <h2 class="text-center"><span>LET’S COLLABORATE</span></h2>
            <p class="text-center mt-5 mb-5" style="font-family: 'Poppins', sans-serif !important;">Thank you for visiting our website. If you have a project in mind, please
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
                <p>Let's join us so that you can increase your horizons and develop your skills, especially in
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
