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
    .highcharts-figure,
.highcharts-data-table table {
  min-width: 360px;
  max-width: 800px;
  margin: 1em auto;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #ebebeb;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}

.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}

.highcharts-data-table th {
  font-weight: 600;
  padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
  padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}

.highcharts-data-table tr:hover {
  background: #f1f7ff;
}

#container h4 {
  text-transform: none;
  font-size: 14px;
  font-weight: normal;
}

#container p {
  font-size: 13px;
  line-height: 16px;
}

@media screen and (max-width: 600px) {
  #container h4 {
    font-size: 2.3vw;
    line-height: 3vw;
  }

  #container p {
    font-size: 2.3vw;
    line-height: 3vw;
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
            <h2 class="text-center"><span>TEAMS</span></h2>
            <p class="text-center mt-5 mb-5">We are young and creative people who are trying to find and develop our
                talents. We can only do small things on our own, but together we can do extraordinary things.</p>
        </div>

        <div id="loadTeam">
            <select
                style="font-size: 14px;padding: 10px;background-color: #F57C00;color: #ffffff;width: 100px;z-index:2;"
                id="selectTemplate">
                <option>olivia</option>
                <option>diva</option>
                <option>mila</option>
                <option>polina</option>
                <option>mery</option>
                <option>rony</option>
                <option>belinda</option>
                <option>ula</option>
                <option>ana</option>
                <option>isla</option>
                <option>deborah</option>
            </select>

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
@endsection
@section('js')
<script>
    $.ajax({
        url: "{{ route('team.ref-divisi') }}",
        method: "POST",
        data: {
            _token: "{{ csrf_token() }}",
        },
        success: function (result) {

            var data = JSON.parse(result);

            // var arr = [],
            //     obj,
            //     fruits = ['banana', 'apple', 'mango'],
            //     label = 'Fruits',
            //     i;

            // for (i = 0; i < fruits.length; i++){
            //     obj = {}; // <----- new Object

            //     obj['data'] = fruits[i];
            //     obj['label'] = label;
            //     arr.push(obj);
            // }

            // var wrap_data = [],
            // object_data,
            // fruits = ['banana', 'apple', 'mango'],
            // label = 'Fruits',
            // i;
            var arr = [];

            for (const [key, value] of Object.entries(data)) {
                var object_data = {};

                object_data['id'] = value[3] != null ? value[3].toString() : '';
                if (value[4] != null) {
                    object_data['pid'] = value[4].toString();
                }
                object_data['name'] = value[0];
                object_data['title'] = value[2];
                object_data['img'] = value[1];
                arr.push(object_data);
            }
            console.log(arr);

        }
    });

</script>
<script>
Highcharts.chart('container', {
  chart: {
    height: 600,
    inverted: true
  },

  title: {
    text: 'Highcharts Org Chart'
  },

  accessibility: {
    point: {
      descriptionFormatter: function (point) {
        var nodeName = point.toNode.name,
          nodeId = point.toNode.id,
          nodeDesc = nodeName === nodeId ? nodeName : nodeName + ', ' + nodeId,
          parentDesc = point.fromNode.id;
        return point.index + '. ' + nodeDesc + ', reports to ' + parentDesc + '.';
      }
    }
  },

  series: [{
    type: 'organization',
    name: 'Highsoft',
    keys: ['from', 'to'],
    data: [
      ['Shareholders', 'Board'],
      ['Board', 'CEO'],
      ['CEO', 'CTO'],
      ['CEO', 'CPO'],
      ['CEO', 'CSO'],
      ['CEO', 'HR'],
      ['CTO', 'Product'],
      ['CTO', 'Web'],
      ['CSO', 'Sales'],
      ['HR', 'Market'],
      ['CSO', 'Market'],
      ['HR', 'Market'],
      ['CTO', 'Market']
    ],
    levels: [{
      level: 0,
      color: 'silver',
      dataLabels: {
        color: 'black'
      },
      height: 25
    }, {
      level: 1,
      color: 'silver',
      dataLabels: {
        color: 'black'
      },
      height: 25
    }, {
      level: 2,
      color: '#980104'
    }, {
      level: 4,
      color: '#359154'
    }],
    nodes: [{
      id: 'Shareholders'
    }, {
      id: 'Board'
    }, {
      id: 'CEO',
      title: 'CEO',
      name: 'Atle Sivertsen',
      image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2022/06/30081411/portrett-sorthvitt.jpg'
    }, {
      id: 'HR',
      title: 'CFO',
      name: 'Anne Jorunn Fjærestad',
      color: '#007ad0',
      image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131210/Highsoft_04045_.jpg'
    }, {
      id: 'CTO',
      title: 'CTO',
      name: 'Christer Vasseng',
      image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131120/Highsoft_04074_.jpg'
    }, {
      id: 'CPO',
      title: 'CPO',
      name: 'Torstein Hønsi',
      image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131213/Highsoft_03998_.jpg'
    }, {
      id: 'CSO',
      title: 'CSO',
      name: 'Anita Nesse',
      image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131156/Highsoft_03834_.jpg'
    }, {
      id: 'Product',
      name: 'Product developers'
    }, {
      id: 'Web',
      name: 'Web devs, sys admin'
    }, {
      id: 'Sales',
      name: 'Sales team'
    }, {
      id: 'Market',
      name: 'Marketing team',
      column: 5
    }],
    colorByPoint: false,
    color: '#007ad0',
    dataLabels: {
      color: 'white'
    },
    borderColor: 'white',
    nodeWidth: 65
  }],
  tooltip: {
    outside: true
  },
  exporting: {
    allowHTML: true,
    sourceWidth: 800,
    sourceHeight: 600
  }

});

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
