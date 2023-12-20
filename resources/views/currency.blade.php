
@php
if($type  == "Currency"){
        $nameArbic = explode(" ", $currencies->where('id',$id)->first()->name ,2 );
            if(config('app.locale') === 'ar'){
                $currencyTitle = null;
                foreach($nameArbic as $value){
                    $currencyTitle .=  'ال' . $value.' ';
                }

                $currencyTitle = rtrim($currencyTitle);
              
            }else{  
                $currencyTitle =  $currencies->where('id',$id)->first()->name ;
            }
    }else{
        $currencyTitle =  $gold->where('id',$id)->first()->name; 
}

@endphp
@extends('main',['title_Page'=>  $currencyTitle .' | '. __('Souq Today')  ])

@section('content')
@php

$calcItems = $type == "Currency" ? $currencies : $gold;
$filteredItem = $calcItems->where('id',$id)->first();

@endphp
    <div class="container">
        <!-- {{ $calcItems->where('id',$id)->first()->price}} -->
    <div class="father-div row d-flex mt-5 px-3">
            <!-- start child left -->
            <div class="child-left col-lg-9 p-0 pe-3 ">
                <div class="part-one ">
                    @include('currency_title', [
                        'icon' => $filteredItem->icon,
                        'name' => $filteredItem->name,
                        'prices' => $filteredItem->prices,
                    ])  
                </div>
                <div class="part-two col-xl-10 col-md-12 ">
                    <canvas id="myChart" class="w-100" ></canvas>
                    <script>
                        window.addEventListener("load", function (){
                            $(function () {
                                $.ajax({
                                    method: 'get',
                                    url : '{{url("/api/". $type ."/historical/".$id)}}',
                                    dataType:'json',
                                    success: function (info) {

                                    var date = $.map( info, function( infoDate ) {
                                        
                                        return infoDate['date'];
                                    });
                                    var buy_price = $.map( info, function( infoBuy_price ) {
                                        
                                        return infoBuy_price['buy_price'];
                                    });  
                                        var ctx = document.getElementById('myChart').getContext("2d");
                                        var myChart = new Chart(ctx, {
                                            type: 'line',
                                            data: {
                                                labels: date,
                                                datasets: [{
                                                    fill: {
                                                        target: 'origin',
                                                        above: 'rgb(132 ,141 ,151)',   // Area will be red above the origin
                                                    
                                                    },
                                                    data: buy_price,
                                                    pointBackgroundColor: 'rgba(0, 0, 0, 0.3)',
                                                    backgroundColor: 'rgba(0, 0 ,0,0.3)',
                                                    borderColor: 'rgb(24, 41 ,60)',
                                                    borderWidth: 3,
                                                    radius: 5
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    x: {
                                                        type: 'timeseries',
                                                        time: {
                                                            displayFormats: {
                                                                hour: 'MM-dd',
                                                                day: 'MM-dd',
                                                            },
                                                        },
                                                        stacked: true,
                                                        ticks: {
                                                            font: {
                                                                size: 11,
                                                            }
                                                        },
                                                        grid: {
                                                            display: false
                                                        },
                                                    },
                                                    y: {
                                                        beginAtZero: false,
                                                        stacked: true,
                                                        ticks: {
                                                            font: {
                                                                size: 11,
                                                            }
                                                        },
                                                    }, 
                                                },
                                                plugins: {
                                                    legend: {
                                                        display: false,
                                                        labels: {
                                                            // This more specific font property overrides the global property
                                                            font: {
                                                                size: 10
                                                            },
                                                        },
                                                    },
                                                }
                                            }
                                        });
                                    }
                                })
                            })
                        });
                    </script>
                </div>
                <div class="part-two-table w-100">
                    <p class="fw-bold text-primary fs-5"> {{ ($type == "Gold") && is_numeric($calcItems->where('id',$id)->first()->karat) ? __('Gold') : ''; }} {{$filteredItem->name}} {{__('To')}} {{$countries->where('code',$code)->first()->name}} </p>
                    @include('currency_table', [
                        'items' => $calcItems,
                        'name' => $filteredItem->name,
                        'buyPrice' => $filteredItem->prices[0]->buy_price,
                    ])
                </div>
            </div>
            <!-- End child left -->
            <!-- start child right -->
            <div class="col-lg-3  input-calc bg-primary p-3 rounded  h-100 container ">
                @include('currency_calculator', [
                    'items' => $calcItems,
                    'id' => $filteredItem->id ,
                ])
            </div>
            <!-- End child right -->
            
        </div>
    </div>

@endsection