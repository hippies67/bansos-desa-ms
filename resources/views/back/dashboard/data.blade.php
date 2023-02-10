@extends('back.layouts.data')

@section('title_menu')
Dashboard
@endsection

@section('title')
Dashboard
@endsection

@section('css')
<link href="{{ asset('vendor/owl-carousel/owl.carousel.css" rel="stylesheet') }}">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">

<style>
    /* -----
SVG Icons - svgicons.sparkk.fr
----- */
    svg {
        font-size: 35px;
    }
    
    .svg-icon {
        width: 1em;
        height: 1em;
    }

    .svg-icon path,
    .svg-icon polygon,
    .svg-icon rect {
        fill: #ffffff;
    }

    .svg-icon circle {
        stroke: #ffffff;
        stroke-width: 5;
    }

</style>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-4 col-xxl-4 col-sm-4">
        <div class="card gradient-bx text-white bg-danger rounded">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="media-body">
                        <p class="mb-1">Total Akun</p>
                        <div class="d-flex flex-wrap">
                            <h2 class="fs-40 font-w600 text-white mb-0 mr-3">{{ $total_akun }}</h2>
                        </div>
                    </div>
                    <span class="border rounded-circle p-4">
                        <svg class="svg-icon" viewBox="0 0 20 20">
							<path fill="none" d="M12.443,9.672c0.203-0.496,0.329-1.052,0.329-1.652c0-1.969-1.241-3.565-2.772-3.565S7.228,6.051,7.228,8.02c0,0.599,0.126,1.156,0.33,1.652c-1.379,0.555-2.31,1.553-2.31,2.704c0,1.75,2.128,3.169,4.753,3.169c2.624,0,4.753-1.419,4.753-3.169C14.753,11.225,13.821,10.227,12.443,9.672z M10,5.247c1.094,0,1.98,1.242,1.98,2.773c0,1.531-0.887,2.772-1.98,2.772S8.02,9.551,8.02,8.02C8.02,6.489,8.906,5.247,10,5.247z M10,14.753c-2.187,0-3.96-1.063-3.96-2.377c0-0.854,0.757-1.596,1.885-2.015c0.508,0.745,1.245,1.224,2.076,1.224s1.567-0.479,2.076-1.224c1.127,0.418,1.885,1.162,1.885,2.015C13.961,13.689,12.188,14.753,10,14.753z M10,0.891c-5.031,0-9.109,4.079-9.109,9.109c0,5.031,4.079,9.109,9.109,9.109c5.031,0,9.109-4.078,9.109-9.109C19.109,4.969,15.031,0.891,10,0.891z M10,18.317c-4.593,0-8.317-3.725-8.317-8.317c0-4.593,3.724-8.317,8.317-8.317c4.593,0,8.317,3.724,8.317,8.317C18.317,14.593,14.593,18.317,10,18.317z"></path>
						</svg>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-xxl-4 col-sm-4">
        <div class="card gradient-bx text-white bg-success rounded">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="media-body">
                        <p class="mb-1">Artikel</p>
                        <div class="d-flex flex-wrap">
                            <h2 class="fs-40 font-w600 text-white mb-0 mr-3">{{ $total_artikel }}</h2>
                        </div>
                    </div>
                    <span class="border rounded-circle p-4">
                        <svg class="svg-icon" viewBox="0 0 20 20">
							<path d="M8.627,7.885C8.499,8.388,7.873,8.101,8.13,8.177L4.12,7.143c-0.218-0.057-0.351-0.28-0.293-0.498c0.057-0.218,0.279-0.351,0.497-0.294l4.011,1.037C8.552,7.444,8.685,7.667,8.627,7.885 M8.334,10.123L4.323,9.086C4.105,9.031,3.883,9.162,3.826,9.38C3.769,9.598,3.901,9.82,4.12,9.877l4.01,1.037c-0.262-0.062,0.373,0.192,0.497-0.294C8.685,10.401,8.552,10.18,8.334,10.123 M7.131,12.507L4.323,11.78c-0.218-0.057-0.44,0.076-0.497,0.295c-0.057,0.218,0.075,0.439,0.293,0.495l2.809,0.726c-0.265-0.062,0.37,0.193,0.495-0.293C7.48,12.784,7.35,12.562,7.131,12.507M18.159,3.677v10.701c0,0.186-0.126,0.348-0.306,0.393l-7.755,1.948c-0.07,0.016-0.134,0.016-0.204,0l-7.748-1.948c-0.179-0.045-0.306-0.207-0.306-0.393V3.677c0-0.267,0.249-0.461,0.509-0.396l7.646,1.921l7.654-1.921C17.91,3.216,18.159,3.41,18.159,3.677 M9.589,5.939L2.656,4.203v9.857l6.933,1.737V5.939z M17.344,4.203l-6.939,1.736v9.859l6.939-1.737V4.203z M16.168,6.645c-0.058-0.218-0.279-0.351-0.498-0.294l-4.011,1.037c-0.218,0.057-0.351,0.28-0.293,0.498c0.128,0.503,0.755,0.216,0.498,0.292l4.009-1.034C16.092,7.085,16.225,6.863,16.168,6.645 M16.168,9.38c-0.058-0.218-0.279-0.349-0.498-0.294l-4.011,1.036c-0.218,0.057-0.351,0.279-0.293,0.498c0.124,0.486,0.759,0.232,0.498,0.294l4.009-1.037C16.092,9.82,16.225,9.598,16.168,9.38 M14.963,12.385c-0.055-0.219-0.276-0.35-0.495-0.294l-2.809,0.726c-0.218,0.056-0.351,0.279-0.293,0.496c0.127,0.506,0.755,0.218,0.498,0.293l2.807-0.723C14.89,12.825,15.021,12.603,14.963,12.385"></path>
						</svg>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-xxl-4 col-sm-4">
        <div class="card gradient-bx text-white bg-info rounded">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="media-body">
                        <p class="mb-1">Project</p>
                        <div class="d-flex flex-wrap">
                            <h2 class="fs-40 font-w600 text-white mb-0 mr-3">{{ $total_project }}</h2>
                        </div>
                    </div>
                    <span class="border rounded-circle p-4">
                        <svg class="svg-icon" viewBox="0 0 20 20">
							<path d="M17.927,5.828h-4.41l-1.929-1.961c-0.078-0.079-0.186-0.125-0.297-0.125H4.159c-0.229,0-0.417,0.188-0.417,0.417v1.669H2.073c-0.229,0-0.417,0.188-0.417,0.417v9.596c0,0.229,0.188,0.417,0.417,0.417h15.854c0.229,0,0.417-0.188,0.417-0.417V6.245C18.344,6.016,18.156,5.828,17.927,5.828 M4.577,4.577h6.539l1.231,1.251h-7.77V4.577z M17.51,15.424H2.491V6.663H17.51V15.424z"></path>
						</svg>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-xxl-6 col-sm-6">
        <div class="card gradient-bx text-white bg-secondary rounded">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="media-body">
                        <p class="mb-1">Total Team</p>
                        <div class="d-flex flex-wrap">
                            <h2 class="fs-40 font-w600 text-white mb-0 mr-3">{{ $total_team }}</h2>
                        </div>
                    </div>
                    <span class="border rounded-circle p-4">
                        <svg class="svg-icon" viewBox="0 0 20 20">
							<path d="M15.573,11.624c0.568-0.478,0.947-1.219,0.947-2.019c0-1.37-1.108-2.569-2.371-2.569s-2.371,1.2-2.371,2.569c0,0.8,0.379,1.542,0.946,2.019c-0.253,0.089-0.496,0.2-0.728,0.332c-0.743-0.898-1.745-1.573-2.891-1.911c0.877-0.61,1.486-1.666,1.486-2.812c0-1.79-1.479-3.359-3.162-3.359S4.269,5.443,4.269,7.233c0,1.146,0.608,2.202,1.486,2.812c-2.454,0.725-4.252,2.998-4.252,5.685c0,0.218,0.178,0.396,0.395,0.396h16.203c0.218,0,0.396-0.178,0.396-0.396C18.497,13.831,17.273,12.216,15.573,11.624 M12.568,9.605c0-0.822,0.689-1.779,1.581-1.779s1.58,0.957,1.58,1.779s-0.688,1.779-1.58,1.779S12.568,10.427,12.568,9.605 M5.06,7.233c0-1.213,1.014-2.569,2.371-2.569c1.358,0,2.371,1.355,2.371,2.569S8.789,9.802,7.431,9.802C6.073,9.802,5.06,8.447,5.06,7.233 M2.309,15.335c0.202-2.649,2.423-4.742,5.122-4.742s4.921,2.093,5.122,4.742H2.309z M13.346,15.335c-0.067-0.997-0.382-1.928-0.882-2.732c0.502-0.271,1.075-0.429,1.686-0.429c1.828,0,3.338,1.385,3.535,3.161H13.346z"></path>
						</svg>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-xxl-6 col-sm-6">
        <div class="card gradient-bx text-white bg-secondary rounded">
            <div class="card-body">
                <div class="media align-items-center">
                    <div class="media-body">
                        <p class="mb-1">Total Contact</p>
                        <div class="d-flex flex-wrap">
                            <h2 class="fs-40 font-w600 text-white mb-0 mr-3">{{ $total_contact }}</h2>
                        </div>
                    </div>
                    <span class="border rounded-circle p-4">
                        <svg class="svg-icon" viewBox="0 0 20 20">
							<path d="M15.573,11.624c0.568-0.478,0.947-1.219,0.947-2.019c0-1.37-1.108-2.569-2.371-2.569s-2.371,1.2-2.371,2.569c0,0.8,0.379,1.542,0.946,2.019c-0.253,0.089-0.496,0.2-0.728,0.332c-0.743-0.898-1.745-1.573-2.891-1.911c0.877-0.61,1.486-1.666,1.486-2.812c0-1.79-1.479-3.359-3.162-3.359S4.269,5.443,4.269,7.233c0,1.146,0.608,2.202,1.486,2.812c-2.454,0.725-4.252,2.998-4.252,5.685c0,0.218,0.178,0.396,0.395,0.396h16.203c0.218,0,0.396-0.178,0.396-0.396C18.497,13.831,17.273,12.216,15.573,11.624 M12.568,9.605c0-0.822,0.689-1.779,1.581-1.779s1.58,0.957,1.58,1.779s-0.688,1.779-1.58,1.779S12.568,10.427,12.568,9.605 M5.06,7.233c0-1.213,1.014-2.569,2.371-2.569c1.358,0,2.371,1.355,2.371,2.569S8.789,9.802,7.431,9.802C6.073,9.802,5.06,8.447,5.06,7.233 M2.309,15.335c0.202-2.649,2.423-4.742,5.122-4.742s4.921,2.093,5.122,4.742H2.309z M13.346,15.335c-0.067-0.997-0.382-1.928-0.882-2.732c0.502-0.271,1.075-0.429,1.686-0.429c1.828,0,3.338,1.385,3.535,3.161H13.346z"></path>
						</svg>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-sm-4">
        <div class="card active_users">
            <div class="card-header bg-success border-0 pb-4 d-block">
                <h4 class="card-title text-white">Total Pengunjung (Unik)</h4>
                <h2 class="fs-30 font-w600 text-white mb-0 mr-3" style="margin-top: 20px ;">{{ isset($visitor_unique[0][0]) ? $visitor_unique[0][0] : '-' }}</h2>
            </div>
            
            <div class="card-body pt-0">
                <div class="list-group-flush mt-4">
                    <div class="list-group-item bg-transparent d-flex justify-content-between px-0 py-1 font-weight-semi-bold border-top-0">
                        <p class="mb-0">Halaman Teratas</p>
                        <p class="mb-0">View</p>
                    </div>
                    @foreach($page_view_wrap as $data)
                        {{-- @php
                            dd($data['pageTitle'])
                        @endphp --}}
                    <div class="list-group-item bg-transparent d-flex justify-content-between px-0 py-1">
                        <p class="mb-0">{{ $data['pageTitle'] }}</p>
                        <p class="mb-0">{{ $data['visitors'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-xxl-8 col-sm-8">
        <div class="card rounded">
            <div class="card-body">
                <h4 class="card-title">Perangkat dan Browser Pengunjung</h4>
                <div class="table-responsive mt-4">
                    <table id="example" class="display min-w850">
                        <thead>
                            <tr>
                                <th>Perangkat</th>
                                <th>Versi</th>
                                <th>Browser</th>
                                <th>Versi</th>
                                <th>Melihat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($devices as $data)
                            <tr>
                                <td>{{ $data[0] }}</td>
                                <td>{{ $data[1] }}</td>
                                <td>{{ $data[2] }}</td>
                                <td>{{ $data[3] }}</td>
                                <td>{{ $data[4] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')
<script src="{{ asset('vendor/global/global.min.js') }}"></script>
<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/deznav-init.js') }}"></script>
<script src="{{ asset('vendor/owl-carousel/owl.carousel.js') }}"></script>
<script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>

<!-- Chart piety plugin files -->
<script src="{{ asset('vendor/peity/jquery.peity.min.js') }}"></script>

<script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>

<script>
    var data = {
				labels: ["0", "1", "2", "3", "4", "5", "6", "0", "1", "2", "3", "4", "5", "6"],
				datasets: [{
					label: "My First dataset",
					backgroundColor: "rgba(105,255,147,1)",
					strokeColor: "rgba(105,255,147,1)",
					pointColor: "rgba(0,0,0,0)",
					pointStrokeColor: "rgba(105,255,147,1)",
					pointHighlightFill: "rgba(105,255,147,1)",
					pointHighlightStroke: "rgba(105,255,147,1)",
					data: [65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56, 55, 40]
				}]
			};

			var ctx = document.getElementById("activeUser").getContext("2d");
			var chart = new Chart(ctx, {
				type: "bar",
				data: data,
				options: {
					responsive: !0,
					maintainAspectRatio: false,
					legend: {
						display: !1
					},
					tooltips: {
						enabled: false
					},
					scales: {
						xAxes: [{
							display: !1,
							gridLines: {
								display: !1
							},
							barPercentage: 1,
							categoryPercentage: 0.5
						}],
						yAxes: [{
							display: !1,
							ticks: {
								padding: 10,
								stepSize: 20,
								max: 100,
								min: 0
							},
							gridLines: {
								display: !0,
								drawBorder: !1,
								lineWidth: 1,
								zeroLineColor: "#48f3c0"
							}
						}]
					}
				}
			});
			
			setInterval(function() {
				chart.config.data.datasets[0].data.push(
					Math.floor(10 + Math.random() * 80)
				);
				chart.config.data.datasets[0].data.shift();
				chart.update();
			}, 2000);
</script>
@endsection
