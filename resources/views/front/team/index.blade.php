@extends('front.layouts.data')
@section('title', 'Team')
@section('css')
<link rel="stylesheet" href="{{ asset('front/css/style_teams.css') }}">
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
<div class="jumbotron jumbotron-fluid teams mt-5 pt-5">
    <div class="content container-fluid" style="max-width: 1300px;">
        <div class="text">
            <h2 class="text-center"><span>TEAMS</span></h2>
            <p class="text-center mt-5 mb-5">We are young and creative people who are trying to find and develop our
                talents. We can only do small things on our own, but together we can do extraordinary things.</p>
        </div>

        <div id="loadTeam">
            @include('front.team.load_team')
        </div>

        <div class="ajax-load text-center" style="display:none">
            <p><img src="{{ asset('tahungoding_load_spinner.svg') }}" style="width: 70px !important;">Loading More
                Member</p>
        </div>

        <div class="text-center mt-5 mb-5">
            <button type="button" class="button btn" onclick="loadContent()">View More</button>
        </div>

    </div>
</div>
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
        $.ajax({
                url: '?page=' + page,
                type: "get",
                beforeSend: function () {
                    $('.ajax-load').show();
                }
            })
            .done(function (data) {
                if (data.html == " ") {
                    $('.ajax-load').html("No more records found");
                    return;
                }
                $('.ajax-load').hide();
                $("#loadProject").append(data.html);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                alert('server not responding...');
            });
    }

</script>
@endsection
