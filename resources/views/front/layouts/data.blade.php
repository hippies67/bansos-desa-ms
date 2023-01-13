@php
$web_profile = App\Models\WebProfile::all();
@endphp

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,600;1,200&display=swap" rel="stylesheet"> --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Roboto&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/style_navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style_footer.css') }}">

    {{-- <link rel="shortcut icon" href="../img/Logo_Tahungoding.ico"> --}}

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    @foreach($web_profile as $data)
    <title>{{ $data->name }} - @yield('title')</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ Storage::url($data->logo) }}">
    @endforeach

    @yield('css')
    <link href='https://unpkg.com/nprogress@0.2.0/nprogress.css' rel='stylesheet' />
    <style>
        #nprogress .bar {
            background: #ffd800 !important;
        }

        body {
            animation: fadeInAnimation ease 0.5s;
            animation-iteration-count: 1;
            animation-fill-mode: forwards;
        }

        @keyframes fadeInAnimation {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

    </style>
    <script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>

    <script>
        if (location.hostname.match(/ricostacruz\.com$/)) {
            var _gaq = _gaq || [];
            _gaq.push(["_setAccount", "UA-20473929-1"]), _gaq.push(["_trackPageview"]),
                function () {
                    var a = document.createElement("script");
                    a.type = "text/javascript", a.async = !0, a.src = ("https:" == document.location.protocol ?
                        "https://ssl" : "http://www") + ".google-analytics.com/ga.js";
                    var b = document.getElementsByTagName("script")[0];
                    b.parentNode.insertBefore(a, b)
                }()
        }

    </script>

    <title>Home</title>
</head>

<body style='display: none'>

    <!-- Navbar -->
    @yield('navbar')

    <!-- Akhir Navbar -->
    @yield('content')
    <!-- Footer -->
    <div class="jumbotron jumbotron-fluid footer">
        <div class="content container-fluid" style="max-width: 1300px;">
            <div class="row">
                <div class="col-md-2 mt-5 identity">
                    <img class="logo-footer" src="{{ asset('front/img/logo_tahungoding.png') }}" alt="">
                    <h5>TAHUNGODING HEADQUARTER</h5>
                    @foreach($web_profile as $data)
                        <p>{{ $data->address }}</p>
                    @endforeach
                </div>
                <div class="col-md-2 mt-5 menu">
                    <h5>Menu</h5>
                    <div class="menu-footer" style="">
                        <a href="{{ url('teams') }}" >Teams</a>
                        <a href="{{ url('about') }}">About</a>
                        <a href="{{ url('projects') }}">Projects</a>
                        <a href="{{ url('blog') }}">Blog</a>
                    </div>
                </div>
                <div class="col-md-2 mt-5 contact-us">
                    <h5>Contact Us</h5>
                    <div class="contact-us-footer mt-4">
                        @foreach($web_profile as $data)
                        <p>{{ $data->phone }}</p>
                        <p>tahungoding.com</p>
                        <p>{{ $data->email }}</p>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-2 mt-5 sosial-media">
                    <h5>Sosial Media</h5>
                    @foreach($web_profile as $data)
                        <div class="icon-sosmed-footer mt-4">
                            <a href="https://www.instagram.com/{{ $data->instagram }}" target="_blank"><img
                                    src="{{ asset('front/img/icon-instagram.svg') }}" alt=""></a>
                        </div>
                        <div class="icon-sosmed-footer">
                            <a href="https://github.com/{{ $data->github }}" target="_blank"><img src="{{ asset('front/img/icon-github.svg') }}" alt=""></a>
                        </div>
                        <div class="icon-sosmed-footer">
                            <a href="{{ $data->linkedin }}" target="_blank"><img src="{{ asset('front/img/icon-linked-in.svg') }}" alt=""></a>
                        </div>
                    @endforeach
                </div>

                <p class="text-copyright">Copyright @ 2021 tahungoding</p>
            </div>
        </div>
    </div>
    <!-- Akhir Footer -->

    @include('sweetalert::alert')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Slider Teams & Clients -->
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script>
        // Slider Teams
        const swiperTeams = new Swiper('.swiper-teams', {
            // Optional parameters
            // loop: true,
            // autoplay: true,
            slidesPerView: 'auto',

            // If we need pagination
            // pagination: {
            //   el: '.swiper-pagination',
            // },

            // Navigation arrows
            // navigation: {
            //   nextEl: '.swiper-button-next',
            //   prevEl: '.swiper-button-prev',
            // },

            // And if we need scrollbar
            // scrollbar: {
            //   el: '.swiper-scrollbar',
            // },
        });

        // Slider Client
        const swiperClient = new Swiper('.swiper-client', {
            slidesPerView: 4,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },

            breakpoints: {
                1300: {
                    slidesPerView: 4,
                },
                1200: {
                    slidesPerView: 4,
                },
                800: {
                    slidesPerView: 3,
                },
                700: {
                    slidesPerView: 2,
                },
                600: {
                    slidesPerView: 1,
                },
                500: {
                    slidesPerView: 1,
                },
                400: {
                    slidesPerView: 1,
                },
                300: {
                    slidesPerView: 1,
                },
                200: {
                    slidesPerView: 1,
                }
            },
        });

    </script>

    <script src="{{ asset('front/js/navbar.js') }}"></script>

    <script>
        $('body').show();
        $('.version').text(NProgress.version);
        NProgress.start();
        setTimeout(function () {
            NProgress.done();
            $('.fade').removeClass('out');
        }, 1000);

        $("#b-0").click(function () {
            NProgress.start();
        });
        $("#b-40").click(function () {
            NProgress.set(0.4);
        });
        $("#b-inc").click(function () {
            NProgress.inc();
        });
        $("#b-100").click(function () {
            NProgress.done();
        });

    </script>

    <script>
        var HN = [];
        HN.factory = function (e) {
            return function () {
                HN.push([e].concat(Array.prototype.slice.call(arguments, 0)))
            };
        }, HN.on = HN.factory("on"), HN.once = HN.factory("once"), HN.off = HN.factory("off"), HN.emit = HN.factory(
            "emit"), HN.load = function () {
            var e = "hn-button.js";
            if (document.getElementById(e)) return;
            var t = document.createElement("script");
            t.id = e, t.src = "//hn-button.herokuapp.com/hn-button.js";
            var n = document.getElementsByTagName("script")[0];
            n.parentNode.insertBefore(t, n)
        }, HN.load();

    </script>

    @yield('js')
</body>

</html>
