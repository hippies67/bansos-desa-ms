@extends('front.layouts.data')
@section('title', 'Team')
@section('css')
<link rel="stylesheet" href="{{ asset('front/css/style_teams.css') }}">
<script src="{{ asset('orgchart.js') }}"></script>

<style>
    #container {
        min-width: 1000px;
        max-height: 500px;
        overflow: scroll !important;
        cursor: grab;
    }

    button {
        border: 1px solid #1da1f2;
        border-color: #0084B4;
        border-radius: 100px;
        font-size: 20px;
    }

    #button-bar {
        text-align: center;
    }

    #container {
        text-transform: none;
        font-size: 10px;
        font-weight: normal;
    }

    #container text {
        font-family: 'Poppins', sans-serif;
    }

    /* 
    #container p {
        font-size: 10px;
    } */

    #container img {
        object-fit: contain !important;
    }

    /* h4 {
        font-size: 9.5px !important;
    } */

    @media (min-width: 576px) {
        h4 {
            font-size: 12px !important;
        }
    }

    @media (min-width: 768px) {
        h4 {
            font-size: 12.5px !important;
        }
    }

    @media (min-width: 992px) {
        h4 {
            font-size: 15px !important;
        }
    }

    @media (min-width: 1200px) {
        h4 {
            font-size: 18px !important;
        }
    }

    .highcharts-data-labels h4 {
        font-weight: 600;
        color: #000000;
        font-family: 'Poppins', sans-serif;
    }

    .highcharts-data-labels p {
        font-weight: 600;
        color: #000000;
        font-size: 10px;
        font-family: 'Poppins', sans-serif;
        line-height: 15px !important;
        margin-top: 5px !important;
    }

    .highcharts-tracker {
        margin-top: 4px;
        margin-left: 8px;
        width: 230px !important;
        height: 75px !important;
    }

    .highcharts-data-labels img {
        border: 1px solid #f4cf00;
        border-radius: 3rem;
        object-fit: contain !important;
    }

    .highcharts-credits {
        display: none;
    }


    #tree {
        width: 100%;
        height: 100%;
    }



    rect {
        fill: #ffd800 !important;
        cursor: pointer !important;
    }

    text {
        fill: #555555 !important;
        font-family: 'Poppins', sans-serif !important;
        cursor: pointer !important;
    }



    image {
        height: initial;
        cursor: pointer !important;
    }

    /* Galaxy Fold */
    @media only screen and (min-device-width : 280px) and (max-device-width : 283px) {
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

            <li><a href="{{ url('/') }}"
                    style="font-family: 'Poppins', sans-serif !important; font-size: 16px;">Home</a></li>
            <li><a href="{{ url('/about') }}"
                    style="font-family: 'Poppins', sans-serif !important; font-size: 16px;">About</a></li>
            <li><a href="{{ url('/projects') }}"
                    style="font-family: 'Poppins', sans-serif !important; font-size: 16px;">Projects</a>
            </li>
            <li><a href="{{ url('/teams') }}" class="active"
                    style="font-family: 'Poppins', sans-serif !important; font-size: 16px;">Teams</a></li>
            <li><a href="{{ url('/blog') }}"
                    style="font-family: 'Poppins', sans-serif !important; font-size: 16px;">Blog</a></li>
            <li><a href="{{ url('/contact') }}"
                    style="font-family: 'Poppins', sans-serif !important; font-size: 16px;">Contact</a></li>

            @php
            $web_profile = App\Models\WebProfile::all();
            @endphp

            @foreach($web_profile as $data)
            <div class="icon-sosmed-navbar">
                <div class="icon-sosmed-header mt-5">
                    <a href="https://www.instagram.com/{{ $data->instagram }}" target="_blank"><img
                            src="{{ asset('front/img/icon-instagram.svg') }}" alt=""></a>
                </div>
                <div class="icon-sosmed-header">
                    <a href="https://github.com/{{ $data->github }}"><img src="{{ asset('front/img/icon-github.svg') }}"
                            alt=""></a>
                </div>
                <div class="icon-sosmed-header">
                    <a href="{{ $data->linkedin }}""><img src=" {{ asset('front/img/icon-linked-in.svg') }}" alt=""></a>
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
            <h2 class="text-center"><span>TEAMS</span></h2>
            <p class="text-center mt-5 mb-5">We are young and creative people who are trying to find and develop our
                talents. We can only do small things on our own, but together we can do extraordinary things.</p>
        </div>

        <div id="loadTeam">
            <br><br>
            <div class="form-group">
                <select name="tahun" id="selectYear" class="form-control" style="border-color: #ffd800 !important"
                    onchange="byYear(this.value)">
                    @foreach($ref_periode as $data)
                    @php
                    $date = Date('Y');
                    @endphp
                    @if($date == $data->tahun_mulai || $date == $data->tahun_akhir)
                    <option value="{{ $data->tahun_mulai }}-{{ $data->tahun_akhir }}" {{ $data->id == $ref_periode_id ? 'selected' : '' }}>{{ $data->tahun_mulai }} - {{ $data->tahun_akhir }}
                    </option>
                    @else
                    <option value="{{ $data->tahun_mulai }}-{{ $data->tahun_akhir }}" {{ $data->id == $ref_periode_id ? 'selected' : '' }}>{{ $data->tahun_mulai }} - {{ $data->tahun_akhir }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <br><br>
            
            <form action="{{ url('teams/by-year') }}" method="get" id="formByYear">
                <input type="hidden" name="year" id="year">
            </form>

            <div id="tree"></div>

        </div>

        <br><br>
        @foreach($team as $data)
        <img class="rounded-circle mb-3" alt="avatar1" style="border-radius: 50%; 
            width: 100px;
            height: 100px;object-fit: contain;" src="{{ Storage::url($data->photo) }}" />
        @endforeach

        <div class="text-center mt-5 mb-5">
            <a href="{{ url('all-team') }}" type="button" class="button btn">View More</a>
        </div>

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
                        <p class="card-text-dialog-box text-img text-white" style="text-align: center;"
                            id="titleModalPengurus"></p>
                    </div>
                    <div class="col-md-8">
                        <div class="modal-text py-2 px-5 text-start">
                            {{-- <h3 class="text-white fw-bold">Hadi</h3>
                            <p class="card-text-dialog-box text-white">Ketua</p> --}}
                            <p class="text-white" id="descriptionModal">
                                -
                            </p>
                            <div class="icon-sosmed-footer mt-4" id="instagramWrap">
                                <a href="https://www.instagram.com/tahungoding/" id="instagramLink" target="_blank"><img
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
<script type="text/javascript">
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

</script>
<script>
    var data = {!! json_encode($final) !!};

    var team = data[0];

    var ref_divisi = data[1];


    var wrap_team_object = [];

    for (const [key, value] of Object.entries(team)) {
        var team_object = {};

        if (value[4] != null) {
            team_object['pid'] = value[4] != null ? value[4].toString() : '';
        }

        team_object['id'] = value[3] != null ? value[3].toString() : '';

        team_object['title'] = value[2];
        team_object['name'] = value[0];
        team_object['img'] = value[1];
        team_object['description'] = value[5];
        team_object['instagram'] = value[6];

        wrap_team_object.push(team_object);
    }

    console.log(wrap_team_object);

    //JavaScript

    var chart = new OrgChart(document.getElementById("tree"), {
        template: 'polina',
        mouseScrool: OrgChart.none,
        layout: OrgChart.mixed,
        enableSearch: false,
        nodeMouseClick: OrgChart.action.none,
        nodeBinding: {
            img_0: "img",
            field_0: "name",
            field_1: "title"
        }
    });

    chart.load(wrap_team_object);


    chart.on('click', function (sender, args) {
        var data = sender.get(args.node.id);
        console.log(data.description);
        $("#team").modal('show');
        $("#modalImage").attr('src', '');
        $("#modalName").html('');
        $("#titleModalPengurus").html('');
        $("#descriptionModal").html('');
        $("#modalImage").attr('src', data.img);
        $("#modalName").html(data.name);
        $("#titleModalPengurus").html(data.title);
        if (data.description == '') {
            $("#descriptionModal").html('-');
        } else {
            $("#descriptionModal").html(data.description);
        }
        if (data.instagram == '' || data.instagram == null) {
            $("#instagramWrap").css('cssText', 'display: none !important');
        } else {
            $("#instagramWrap").css('cssText', 'display: inline-block !important');
            $("#instagramLink").attr('href', 'https://www.instagram.com/' + data.instagram +
                '/');
        }
    });

    // $.ajax({
    //     url: "{{ route('team.ref-divisi') }}",
    //     method: "POST",
    //     headers: {
    //         'X-CSRF-TOKEN': '{{ csrf_token() }}'
    //     },
    //     data: {
    //         _token: "{{ csrf_token() }}"
    //     },
    //     success: function (result) {







    //     }
    // });


    function byYear(year) {
        // var year = $("#selectYear").text();
        $("#year").val(year);
        $("#formByYear").submit();
    }

</script>
<script>


</script>
<script type="text/javascript">
    var page = 1;

    function loadContent() {
        page++;
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
