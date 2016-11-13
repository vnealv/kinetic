@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h1>
            {{ trans('backpack::base.dashboard') }}
            <small>{{ trans('backpack::base.first_page_you_see') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url(config('backpack.base.route_prefix')) }}">{{ config('backpack.base.project_name') }}</a>
            </li>
            <li class="active">{{ trans('backpack::base.dashboard') }}</li>
        </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">Selected Data:</div>
                </div>

                <div class="box-body">
                    @if( Auth::check() )
                        <p>Current company: {{ Auth::user()->company->name }}</p>
                    @endif
                    <p class="small">this can be made as a select list for admins to view all the companies.</p>
                </div>

            </div>
        </div>

        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">Overall Locations</div>
                </div>
                <div class="box-body">
                    <div id="container"></div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">Overall Locations</div>
                </div>
                <div class="box-body">
                    <pre>
                        {{--{{ print_r($town_count->toArray()) }}--}}
                        <div id="stateTownBarChart"></div>
                    </pre>
                </div>
            </div>
        </div>

    </div>
@endsection


@section('after_scripts')
    <script src="https://code.highcharts.com/maps/highmaps.js"></script>
    <script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/mapdata/countries/my/my-all.js"></script>

    {{--<script src="https://code.highcharts.com/highcharts.js"></script>--}}
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>

    <script>
        $(function () {

            var countStateData;

            //ajax request to load dashboard data
            $.ajax({
                type: 'POST',
                url: 'dashboard/countStates',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    countStateData = data.state_count;
                    var stateDtata = [
                        {
                            "hc-key": "my-sa",
                            "value": 0
                        },
                        {
                            "hc-key": "my-sk",
                            "value": 0
                        },
                        {
                            "hc-key": "my-la",
                            "value": 0
                        },
                        {
                            "hc-key": "my-pg",
                            "value": 0
                        },
                        {
                            "hc-key": "my-kh",
                            "value": 0
                        },
                        {
                            "hc-key": "my-sl",
                            "value": 0
                        },
                        {
                            "hc-key": "my-ph",
                            "value": 0
                        },
                        {
                            "hc-key": "my-kl",
                            "value": 0
                        },
                        {
                            "hc-key": "my-pj",
                            "value": 0
                        },
                        {
                            "hc-key": "my-pl",
                            "value": 0
                        },
                        {
                            "hc-key": "my-jh",
                            "value": 0
                        },
                        {
                            "hc-key": "my-pk",
                            "value": 0
                        },
                        {
                            "hc-key": "my-kn",
                            "value": 0
                        },
                        {
                            "hc-key": "my-me",
                            "value": 0
                        },
                        {
                            "hc-key": "my-ns",
                            "value": 0
                        },
                        {
                            "hc-key": "my-te",
                            "value": 0
                        },
                        {
                            "value": 16
                        }
                    ];
                    var state, count;
                    for (var i = 0; i < countStateData.length; i++) {
                        state = countStateData[i].state.state;
                        count = countStateData[i].state_count;
                        switch (state){
                            case 'Sabah':
                                stateDtata[0].value = count;
                                break;
                            case 'Sarawak':
                                stateDtata[1].value = count;
                                break;
                            case 'Labuan':
                                stateDtata[2].value = count;
                                break;
                            case 'Penang':
                                stateDtata[3].value = count;
                                break;
                            case 'Kedah':
                                stateDtata[4].value = count;
                                break;
                            case 'Selangor':
                                stateDtata[5].value = count;
                                break;
                            case 'Pahang':
                                stateDtata[6].value = count;
                                break;
                            case 'KL':
                                stateDtata[7].value = count;
                                break;
                            case 'PJ':
                                stateDtata[8].value = count;
                                break;
                            case 'Perlis':
                                stateDtata[9].value = count;
                                break;
                            case 'Johor':
                                stateDtata[10].value = count;
                                break;
                            case 'Perak':
                                stateDtata[11].value = count;
                                break;
                            case 'Kelantan':
                                stateDtata[12].value = count;
                                break;
                            case 'Melaka':
                                stateDtata[13].value = count;
                                break;
                            case 'Negeri Sembilan':
                                stateDtata[14].value = count;
                                break;
                            case 'Terengganu':
                                stateDtata[15].value = count;
                                break;
                            default:
                                console.log('Check names, missing index');
                        }
                    }
                    statesMap(stateDtata);
                }
            });
            //state finish

            //town count

            var countTownData;

            //ajax request to load dashboard data
            $.ajax({
                type: 'POST',
                url: 'dashboard/countTowns',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    countTownData = data.town_count;
//                    console.log(countTownData);
                    var townDtata_series = [{
                        name: 'States',
                        colorByPoint: true,
                        data: [{
                            name: 'Sabah',
                            y: 0,
                            drilldown: null
                        }, {
                            name: 'Sarawak',
                            y: 0,
                            drilldown: null
                        }, {
                            name: 'Labuan',
                            y: 0,
                            drilldown: null
                        }, {
                            name: 'Penang',
                            y: 0,
                            drilldown: null
                        }, {
                            name: 'Kedah',
                            y: 0,
                            drilldown: null
                        }, {
                            name: 'Selangor',
                            y: 0,
                            drilldown: null
                        }, {
                            name: 'Pahang',
                            y: 0,
                            drilldown: null
                        }, {
                            name: 'KL',
                            y: 0,
                            drilldown: null
                        }, {
                            name: 'PJ',
                            y: 0,
                            drilldown: null
                        }, {
                            name: 'Perlis',
                            y: 0,
                            drilldown: null
                        }, {
                            name: 'Johor',
                            y: 0,
                            drilldown: null
                        }, {
                            name: 'Perak',
                            y: 0,
                            drilldown: null
                        }, {
                            name: 'Kelantan',
                            y: 0,
                            drilldown: null
                        }, {
                            name: 'Melaka',
                            y: 0,
                            drilldown: null
                        }, {
                            name: 'Negeri Sembilan',
                            y: 0,
                            drilldown: null
                        }, {
                            name: 'Terengganu',
                            y: 0,
                            drilldown: null
                        }]
                    }];
                    var townDtata_drilldown = [
                        {
                            name: 'Sabah',
                            id: 'Sabah',
                            data: []
                        }, {
                            name: 'Sarawak',
                            id: 'Sarawak',
                            data: []
                        }, {
                            name: 'Labuan',
                            id: 'Labuan',
                            data: []
                        }, {
                            name: 'Penang',
                            id: 'Penang',
                            data: []
                        }, {
                            name: 'Kedah',
                            id: 'Kedah',
                            data: []
                        }, {
                            name: 'Selangor',
                            id: 'Selangor',
                            data: []
                        }, {
                            name: 'Pahang',
                            id: 'Pahang',
                            data: []
                        }, {
                            name: 'KL',
                            id: 'KL',
                            data: []
                        }, {
                            name: 'PJ',
                            id: 'PJ',
                            data: []
                        }, {
                            name: 'Perlis',
                            id: 'Perlis',
                            data: []
                        }, {
                            name: 'Johor',
                            id: 'Johor',
                            data: []
                        }, {
                            name: 'Perak',
                            id: 'Perak',
                            data: []
                        }, {
                            name: 'Kelantan',
                            id: 'Kelantan',
                            data: []
                        }, {
                            name: 'Melaka',
                            id: 'Melaka',
                            data: []
                        }, {
                            name: 'Negeri Sembilan',
                            id: 'Negeri Sembilan',
                            data: []
                        }, {
                            name: 'Terengganu',
                            id: 'Terengganu',
                            data: []
                        },
                    ];
                    var state, count, town;
                    for (var i = 0; i < countTownData.length; i++) {
                        state = countTownData[i].state.state;
                        town = countTownData[i].town.town;
                        count = countTownData[i].town_count;
//                        console.log('State: '+state +', Town:'+ town +', Count: '+count);
                        switch (state){
                            case 'Sabah':
                                townDtata_series[0].data[0].y += count;
                                townDtata_series[0].data[0].drilldown = 'Sabah';
                                townDtata_drilldown[0].data.push([town, count]);
                                break;
                            case 'Sarawak':
                                townDtata_series[0].data[1].y += count;
                                townDtata_series[0].data[1].drilldown = 'Sarawak';
                                townDtata_drilldown[1].data.push([town, count]);
                                break;
                            case 'Labuan':
                                townDtata_series[0].data[2].y += count;
                                townDtata_series[0].data[2].drilldown = 'Labuan';
                                townDtata_drilldown[2].data.push([town, count]);
                                break;
                            case 'Penang':
                                townDtata_series[0].data[3].y += count;
                                townDtata_series[0].data[3].drilldown = 'Penang';
                                townDtata_drilldown[3].data.push([town, count]);
                                break;
                            case 'Kedah':
                                townDtata_series[0].data[4].y += count;
                                townDtata_series[0].data[4].drilldown = 'Kedah';
                                townDtata_drilldown[4].data.push([town, count]);
                                break;
                            case 'Selangor':
                                townDtata_series[0].data[5].y += count;
                                townDtata_series[0].data[5].drilldown = 'Selangor';
                                townDtata_drilldown[5].data.push([town, count]);
                                break;
                            case 'Pahang':
                                townDtata_series[0].data[6].y += count;
                                townDtata_series[0].data[6].drilldown = 'Pahang';
                                townDtata_drilldown[6].data.push([town, count]);
                                break;
                            case 'KL':
                                townDtata_series[0].data[7].y += count;
                                townDtata_series[0].data[7].drilldown = 'KL';
                                townDtata_drilldown[7].data.push([town, count]);
                                break;
                            case 'PJ':
                                townDtata_series[0].data[8].y += count;
                                townDtata_series[0].data[8].drilldown = 'PJ';
                                townDtata_drilldown[8].data.push([town, count]);
                                break;
                            case 'Perlis':
                                townDtata_series[0].data[9].y += count;
                                townDtata_series[0].data[9].drilldown = 'Perlis';
                                townDtata_drilldown[9].data.push([town, count]);
                                break;
                            case 'Johor':
                                townDtata_series[0].data[10].y += count;
                                townDtata_series[0].data[10].drilldown = 'Johor';
                                townDtata_drilldown[10].data.push([town, count]);
                                break;
                            case 'Perak':
                                townDtata_series[0].data[11].y += count;
                                townDtata_series[0].data[11].drilldown = 'Perak';
                                townDtata_drilldown[11].data.push([town, count]);
                                break;
                            case 'Kelantan':
                                townDtata_series[0].data[12].y += count;
                                townDtata_series[0].data[12].drilldown = 'Kelantan';
                                townDtata_drilldown[12].data.push([town, count]);
                                break;
                            case 'Melaka':
                                townDtata_series[0].data[13].y += count;
                                townDtata_series[0].data[13].drilldown = 'Melaka';
                                townDtata_drilldown[13].data.push([town, count]);
                                break;
                            case 'Negeri Sembilan':
                                townDtata_series[0].data[14].y += count;
                                townDtata_series[0].data[14].drilldown = 'Negeri Sembilan';
                                townDtata_drilldown[14].data.push([town, count]);
                                break;
                            case 'Terengganu':
                                townDtata_series[0].data[15].y += count;
                                townDtata_series[0].data[15].drilldown = 'Terengganu';
                                townDtata_drilldown[15].data.push([town, count]);
                                break;
                            default:
                                console.log('Check names, missing index');
                        }
                    }
                    console.log("TOWN DATA SERIES");
                    console.log(townDtata_series);
                    stateTownBarChart(townDtata_series, townDtata_drilldown);
                }
            });

        });


        function statesMap(data) {
            // Initiate the chart
            $('#container').highcharts('Map', {

                title: {
                    text: 'Locations Throughout Malaysia'
                },

                subtitle: {
                    text: 'Source map: <a href="https://code.highcharts.com/mapdata/countries/my/my-all.js">Malaysia</a>'
                },

                credits: {
                    enabled: false
                },

                mapNavigation: {
                    enabled: true,
                    buttonOptions: {
                        verticalAlign: 'bottom'
                    }
                },

                colorAxis: {
                    min: 0
                },

                series: [{
                    data: data,
                    mapData: Highcharts.maps['countries/my/my-all'],
                    joinBy: 'hc-key',
                    name: 'Random data',
                    states: {
                        hover: {
                            color: '#BADA55'
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}'
                    }
                }, {
                    name: 'Separators',
                    type: 'mapline',
                    data: Highcharts.geojson(Highcharts.maps['countries/my/my-all'], 'mapline'),
                    color: 'silver',
                    showInLegend: false,
                    enableMouseTracking: false
                }]
            });
        }

        function stateTownBarChart(series_data, series_drilldown_data){
            // Create the chart
            Highcharts.chart('stateTownBarChart', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Site Location Based on states and towns'
                },
//                subtitle: {
//                    text: 'Click the columns to view versions. Source: <a href="http://netmarketshare.com">netmarketshare.com</a>.'
//                },
                credits: {
                    enabled: false
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Site Locations Count'
                    }

                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.0f}'
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> Site Locations<br/>'
                },

                series: series_data,
                drilldown: {
                    series: series_drilldown_data
                }
            });
        }
    </script>
@endsection
