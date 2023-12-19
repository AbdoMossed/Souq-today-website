@extends('main',['title_Page'=>__('Souq_Today')])
@php
    $currency=$currencies->where('code','usd')->first();
    $prices = $currency->prices;

    $bank_USD = $currency->live_price->price;
    $market_USD = $prices[0]->buy_price;
    $gold_karat = $gold->where('karat',21)->first()->prices[0]->buy_price;
    
    $gold_karat24 = $gold->where('karat',24)->first()->prices[0]->sell_price;
    $international_price = $gold->where('karat',24)->first()->prices[0]->international_price; 
    $Sagha_USD = $gold_karat24 / $international_price; 
    $sagha_Diff = abs($Sagha_USD - $bank_USD); 

@endphp
@section('content')

    <!-- Start Ditails The selected currency  -->
    <div class="container">
        
        <div class="father-div row d-flex">
            <!-- start child left -->
            <div class="child-left col-lg-6 ">
                <div class="part-one ">
                    @include('currency_title', [
                        'icon' => $currency->icon,
                        'name' => $currency->name,
                        'sellPrice' => $currency->prices[0]->sell_price,
                        'buyPrice' => $currency->prices[0]->buy_price,
                        'prices' => $prices,
                        'type' => 'Currency',
                        'code' => $code,
                        
                    ])
                    <hr>
                    <div class="price-uses mt-4 mb-5">
                        <div class="left-uses d-flex justify-content-between   align-items-center">
                            <div class="row gx-0 text-muted">
                                <div class="border-end  col-sm-6 mb-3 p-1  border-primary border-5 d-inline-block  ">
                                    <small class="colo-eee pe-2 d-inline-block">{{__('Market_USD')}}</small> <span class="black-market-api pe-2 text-primary fw-bold">{{ number_format($market_USD, 2,)}}</span> <small class="m-0 fs-6"> {{ $code == 'egp' ? __('PoundEg') : __('PoundSy')  }}</small>
                                </div>

                                <div class="border-end  col-sm-6 mb-3 p-1  border-primary border-5 d-inline-block  ">
                                    <small class="colo-eee pe-2">{{__('Bank_USD')}}</small> <span class="bank-api pe-2 text-primary fw-bold">{{ number_format($bank_USD, 2,)}}</span> <small class="m-0 fs-6"> {{ $code == 'egp' ? __('PoundEg') : __('PoundSy')  }}</small>
                                </div>

                                <div class="border-end  col-sm-6 mb-3 p-1  border-warning  border-5 d-inline-block  ">
                                    <small class="colo-eee pe-2">{{__('Sagha_USD')}}</small> <span class="sagha-api pe-2 text-warning fw-bold">{{number_format($Sagha_USD,2)}}</span> <small class="m-0 fs-6"> {{ $code == 'egp' ? __('PoundEg') : __('PoundSy')  }}</small>
                                </div>

                                <div class="border-end  col-sm-6 mb-3 p-1  border-warning  border-5 d-inline-block "> 
                                    <small class="colo-eee pe-2">{{__('Gold_21_Karat')}}</small> <span class="gold21-api pe-2 text-warning fw-bold fw-bold">{{number_format($gold_karat,0)}}</span> <small class="m-0 fs-6"> {{ $code == 'egp' ? __('PoundEg') : __('PoundSy')  }}</small>
                                </div>

                                <div class="border-end  col-sm-6 mb-3 p-1  border-info  border-5 d-inline-block  ">
                                    <small class="colo-eee pe-2">{{__('Market_Difference')}}</small> <span class="Market-difference-api pe-2 fw-bold text-info">{{  number_format( $market_USD - $bank_USD ,2) }}</span> <small class="m-0 fs-6"> {{ $code == 'egp' ? __('PoundEg') : __('PoundSy')  }}</small>
                                </div>


                                <div class="border-end  col-sm-6 mb-3 p-1  border-info  border-5 d-inline-block  ">
                                    <small class="colo-eee pe-2">{{__('Sagha_Difference')}}</small> <span class="sagha-difference-api pe-2 fw-bold text-info">{{number_format($sagha_Diff,2)}}</span>  <small class="m-0 fs-6"> {{ $code == 'egp' ? __('PoundEg') : __('PoundSy')  }}</small>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="part-two-table w-100">
                    @include('currencies_table',[
                        'items'=> $gold,
                        'slug' => 'gold',
                        'code' => $code,
                        'type' => 'Gold',

                    ])
                </div>
            </div>
            <!-- End child left -->
            <!-- start child right -->
            <div class="child-right col-lg-6 py-4 px-lg-4">
                @include('currencies_table',[
                    'items'=> $currencies,
                    'slug' => 'currency',
                    'code' => $code,
                    'type' => 'Currency',

                ])
            </div>
            <!-- End child right -->
            
        </div>
        <!-- start article in home -->

        <div class=" row px-2 ">
                    @foreach ($articles as $article)
                        <div class=" px-0   col-lg-6  mb-3">
                            <a href="{{url('article/'. $article->id)}}" class="text-decoration-none">
                                <div class="d-flex">
                                    <div class=" rounded col-lg-4">
                                        <img src="{{url('/storage/'.$article->thumbnail)}}"  class="rounded "width="100%"  alt="">
                                    </div>
                                    <div class="d-flex flex-column px-2 col-lg-8 text-success">
                                        <h5 class="mb-3">{{$article->title}}</h5>
                                        <small>{{$article->short_description}}</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
        </div>
    </div>

    <!-- End Ditails The selected currency  -->
@endsection