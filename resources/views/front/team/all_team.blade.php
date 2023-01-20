@extends('front.layouts.data')
@section('title', 'Team')
@section('css')
<link rel="stylesheet" href="{{ asset('front/css/style_teams.css') }}">
<style>
       @media (min-width: 767px) and (max-width: 780px){
  h1 {
    font-size: 30px;
  }

  h2 {
    font-size: 30px;
  }

  .footer {
    height: 76vh !important;
  }

  #loadTeam img {
    width: 85px !important;
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

    #loadTeam img {
    width: 97px !important
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

  #loadTeam img {
    width: 97px !important
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
            <li><a href="{{ url('/projects') }}" style="font-family: 'Poppins', sans-serif !important; font-size: 16px;">Projects</a>
            </li>
            <li><a href="{{ url('/teams') }}" class="active" style="font-family: 'Poppins', sans-serif !important; font-size: 16px;">Teams</a></li>
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
<div class="jumbotron jumbotron-fluid teams mt-5 pt-5">
    <div class="content container-fluid" style="max-width: 1300px;">
        <div class="text">
            <h2 class="text-center"><span id="teamSpan">TEAMS</span></h2>
            <p class="text-center mt-5 mb-5">We are young and creative people who are trying to find and develop our
                talents. We can only do small things on our own, but together we can do extraordinary things.</p>
        </div>

        <div id="loadTeam">
        @foreach($team as $data)
            <img class="rounded-circle mb-3" alt="avatar1" onclick="modalDetail({{ $data }}, '{{ $data->ref_divisi ? $data->ref_divisi->nama : '' }}', '{{ Storage::url($data->photo) }}')" style="border-radius: 50%; 
            width: 100px;
            height: 100px;object-fit: contain;cursor: pointer;" src="{{ Storage::url($data->photo) }}" />
        @endforeach
    {{-- 
            <div class="text-center mt-5 mb-5">
                <a href="{{ url('all-team') }}" type="button" class="button btn" >View More</a>
            </div> --}}

    </div>
</div>
<br><br><br><br><br>

<div class="modal fade" id="team" tabindex="-1" aria-labelledby="team" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="modal-img text-center mb-3">
                            <img src="#" alt="" id="modalImage" width="150">
                        </div>
                        <h3 class="text-img" style="color: #ffd800; text-align: center;" id="modalName"></h3>
                        <p class="card-text-dialog-box text-img text-white" style="text-align: center;" id="titleModalPengurus"></p>
                    </div>
                    <div class="col-md-8">
                        <div class="modal-text py-2 px-5 text-start">
                            {{-- <h3 class="text-white fw-bold">Hadi</h3>
                            <p class="card-text-dialog-box text-white">Ketua</p> --}}
                            <p class="text-white" id="descriptionModal">
                                -
                            </p>
                            <div class="icon-sosmed-footer mt-4" id="instagramWrap">
                                <a href="https://www.instagram.com/tahungoding/" id="instagramLink" disabled target="_blank"><img
                                        src="{{ asset('front/img/icon-instagram.svg') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    function modalDetail(data, divisi, photo) {
        $("#team").modal('show');
        $("#modalImage").attr('src', '');
        $("#modalName").html('');
        $("#titleModalPengurus").html('');
        $("#descriptionModal").html('');
        $("#modalImage").attr('src', photo);
        $("#modalName").html(data.fullname);
        $("#titleModalPengurus").html(divisi);
        if(data.description == '') {
            $("#descriptionModal").html('-');
        } else {
            $("#descriptionModal").html(data.description);
        }
        if(data.instagram == '' || data.instagram == null) {
            $("#instagramWrap").css('cssText', 'display: none !important');
        } else {
            $("#instagramWrap").css('cssText', 'display: inline-block !important');
            $("#instagramLink").attr('href', 'https://www.instagram.com/' + data.instagram + '/');
        }
    }
</script>
@endsection
