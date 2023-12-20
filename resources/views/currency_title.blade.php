@php 
    $name = $name ?? '';
    $nameArray = explode(" ", $name);
    if($type == 'Currency' ){
        if(config('app.locale') === 'ar'){
            $currencyTitle = null;
            foreach($nameArray as $value){
                $currencyTitle .=  'ال' . $value.' ';
            }

            $currencyTitle = rtrim($currencyTitle);
            
        }else{  
            $currencyTitle =  $name;
        }
    }
    $prices = $prices ?? [];
    $buyPrice = $prices[0]->buy_price;
    $sellPrice = $prices[0]->sell_price;
    $sellPriceYasterday = $prices->last()->sell_price;
    $priceDiff = $sellPrice - $sellPriceYasterday;



@endphp
<div class="title-currency ">
        <div class="d-flex">                                                                                                                                                         
            <p class="fw-bold fs-3 m-0 py-3 text-primary">
                <span class="">
                    <img src="{{url('/storage/'.$icon)}}" width="25" alt="">
                </span>
                <span class="ms-1">
                    {{$name}} / 
                    {{$countries->where('code',$code)->first()->name}}
                </span>
            </p>
            <div class="d-flex align-items-center  ms-2">
                <div class="spinner-grow text-secondary spinner-grow-sm mt-2" role="status">
                            <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>                               
        <small class="text-muted">

        @php
            $title = 'The Price Of :currency Today';
            if ($code == 'egp' && $type == 'Currency'){
                $title .= ' In The Black Market';
            }
            $title .= ' In :country';
        @endphp

        {{__($title, [
            'currency' => $currencyTitle,
            'country' => $countries->where('code',$code)->first()->country->name
        ])}}
        </small>                        
        <p class="font-sizeCss Price-api-selc-cur sell m-0 fw-bold ">
            {{number_format($buyPrice, 2)}}
        </p>
        <small class="my-2  d-inline-block text-muted">
        @if($code != 'egp')

             @if($type == 'Gold' )
                {{__('USD')}} 
             @else
            {{__('Selling Price')}}

            @endif

        @else

            {{__('Selling Price')}}

        @endif
            
            {{number_format($sellPrice, 2,)}}
                        @if(( $priceDiff != 0 ))
                            <small class="compare-yasterday fs-6 ms-2 {{  ($priceDiff < 0 ) ? 'text-danger' : 'text-success';}}" >
                                    <i class="fa-solid {{ ($priceDiff < 0 ) ? 'fa-chevron-down' : 'fa-chevron-up'; }}"></i>
                                    {{ (($priceDiff) > 0 ) ? '+' : '-'; }}
                                    ({{  number_format(abs($priceDiff), 2,)  }})
                                    {{ __('Compared To The Last Price Yesterday') }}
                            </small>
                        @endif
        </small>
    </div>