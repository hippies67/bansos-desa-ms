@extends('front.layouts.data')
@section('title', 'Team')
@section('css')
<link rel="stylesheet" href="{{ asset('front/css/style_teams.css') }}">
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/sankey.js"></script>
<script src="https://code.highcharts.com/modules/organization.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
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


    #container p {
        font-size: 10px;
    }

    #container img {
        object-fit: contain !important;
    }

    h4 {
        font-size: 9.5px !important;
    }

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
            <li><a href="{{ url('/projects') }}" style="font-family: 'Poppins', sans-serif !important;">Projects</a>
            </li>
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
<div class="jumbotron jumbotron-fluid teams mt-5 pt-5">
    <div class="content container-fluid" style="max-width: 1300px;">
        <div class="text">
            <h2 class="text-center"><span id="teamSpan">TEAMS</span></h2>
            <p class="text-center mt-5 mb-5">We are young and creative people who are trying to find and develop our
                talents. We can only do small things on our own, but together we can do extraordinary things.</p>
        </div>

        <div id="loadTeam">
            <br><br>
            <div class="form-group">
                <select name="tahun" class="form-control" style="border-color: #ffd800 !important">
                    <option value="2022">2022</option>
                </select>
            </div>
            <br><br>

            <figure class="highcharts-figure">
                <div id="container"></div>
                <p class="highcharts-description">
                    Organization charts are a common case of hierarchical network charts,
                    where the parent/child relationships between nodes are visualized.
                    Highcharts includes a dedicated organization chart type that streamlines
                    the process of creating these types of visualizations.
                </p>
            </figure>
        </div>

        <div class="ajax-load text-center" style="display:none">
            <p><img src="{{ asset('tahungoding_load_spinner.svg') }}" style="width: 70px !important;">Loading More
                Member</p>
        </div>

        {{-- <div class="text-center mt-5 mb-5">
            <button type="button" class="button btn" onclick="loadContent()">View More</button>
        </div> --}}

    </div>
</div>
<br><br><br><br><br>

<div class="modal fade" id="team" tabindex="-1" aria-labelledby="team" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="modal-img text-center mb-3">
                            <img src="#" alt="">
                        </div>
                        <h3 class="text-img" style="color: #ffd800;">Hadi</h3>
                        <p class="card-text-dialog-box text-img text-white">Ketua</p>
                    </div>
                    <div class="col-md-8">
                        <div class="modal-text py-2 px-5 text-start">
                            <h3 class="text-white fw-bold">Hadi</h3>
                            <p class="card-text-dialog-box text-white">Ketua</p>
                            <p class="text-white">We are young and creative people who are trying to find
                                and develop our
                                talents. We can only do small things on our own, but together we can do
                                extraordinary things.
                                <br><br> We are young and creative people who are trying to find and develop
                                our
                                talents. We can only do small things on our own, but together we can do
                                extraordinary things. We
                                are young and creative people who are trying to find and develop our
                                talents. We can only do small things on our own, but together we can do
                                extraordinary things.
                            </p>
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
     const container = document.querySelector('#container');

    let startY;
    let startX;
    let scrollLeft;
    let scrollTop;
    let isDown;

    window.addEventListener('load', () => {
        let scrollElement = document.querySelector('#container');
        scrollElement.scrollLeft = (scrollElement.scrollWidth - scrollElement.clientWidth) / 2;
    });
    container.addEventListener('mousedown', e => mouseIsDown(e));
    container.addEventListener('mouseup', e => mouseUp(e))
    container.addEventListener('mouseleave', e => mouseLeave(e));
    container.addEventListener('mousemove', e => mouseMove(e));

    function mouseIsDown(e) {
        isDown = true;
        startY = e.pageY - container.offsetTop;
        startX = e.pageX - container.offsetLeft;
        scrollLeft = container.scrollLeft;
        scrollTop = container.scrollTop;
    }

    function mouseUp(e) {
        isDown = false;
    }

    function mouseLeave(e) {
        isDown = false;
    }

    function mouseMove(e) {
        if (isDown) {
            e.preventDefault();
            //Move vertcally
            const y = e.pageY - container.offsetTop;
            const walkY = y - startY;
            container.scrollTop = scrollTop - walkY;
            console.log(container.scrollTop);

            //Move Horizontally
            const x = e.pageX - container.offsetLeft;
            const walkX = x - startX;
            container.scrollLeft = scrollLeft - walkX;
        }
    }
    $.ajax({
        url: "{{ route('team.ref-divisi') }}",
        method: "POST",
        data: {
            _token: "{{ csrf_token() }}",
        },
        success: function (result) {

            var data = JSON.parse(result);

            var team = data[0];

            var ref_divisi = data[1];


            var wrap_team_object = [];

            for (const [key, value] of Object.entries(team)) {
                var team_object = {};

                team_object['id'] = value[3] != null ? value[3].toString() : '';

                team_object['title'] = value[2];
                team_object['name'] = value[0];
                team_object['image'] = value[1];

                wrap_team_object.push(team_object);
            }



            var level = [];

            for (const [key, value] of Object.entries(ref_divisi)) {
                // if(key > 5) {
                //     break;
                // }

                let levelid = value.id != null ? value.id.toString() : '';
                let levelinduk = value.id_induk != null ? value.id_induk.toString() : '6';
                level[key] = [levelinduk, levelid];
            }

            Highcharts.chart('container', {
                chart: {
                    height: 1000,
                    width: 4000,
                    inverted: true
                },
                title: {
                    text: 'PENGURUS TAHUNGODING 2022-2023'
                },
                tooltip: {
                    enabled: false
                },
                series: [{
                    type: 'organization',
                    name: 'Highsoft',
                    keys: ['from', 'to'],
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function () {
                                $("#team").modal('show');
                                console.log(this.name);
                            }
                        }
                    },
                    data: level,
                    levels: [{
                        level: 0,
                        color: 'silver',
                        dataLabels: {
                            color: 'black'
                        },
                    }, {
                        level: 1,
                        color: 'silver',
                        dataLabels: {
                            color: 'black'
                        },
                    }, {
                        level: 2,
                        color: '#980104',
                    }, {
                        level: 4,
                        color: '#359154'
                    }],
                    nodes: wrap_team_object,
                    colorByPoint: false,
                    color: '#007ad0',
                    dataLabels: {
                        color: 'white'
                    },
                    borderColor: 'white',
                    nodeWidth: 100,
                    nodeHeight: 500,
                }],
                exporting: {
                    allowHTML: true,
                    sourceWidth: 800,
                    sourceHeight: 600
                }

            });




        }
    });

</script>
<script>


</script>
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
