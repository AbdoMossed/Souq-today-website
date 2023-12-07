@php
    $oppositeLang = LaravelLocalization::getCurrentLocale() == 'en' ? 'ar' : 'en';
    $oppositeURL = LaravelLocalization::getLocalizedURL($oppositeLang);
    $supportedLocales = LaravelLocalization::getSupportedLocales();
    $oppositeLangName = $supportedLocales[$oppositeLang]["native"];
@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
    <div class="container">
        <div class="logo-page  col-md-3  d-flex align-items-center px-0">
            <a class=" navbar-brand " href="{{url('/')}}"><img src="{{url('/images/wide-logo-en.png')}}" width="200" class="fs-6" alt=""></a>
            <span class="bgSimilar p-1 mx-1  text-white rounded d-inline-block ">Egypt</span>
        </div>
        <button class="navbar-toggler m-0 p-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse   " id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{url('currencies')}}" class="text-decoration-none text-light fs-6 nav-link">{{__('Currencies')}}</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('gold')}}" class="text-decoration-none text-light fs-6 nav-link">{{__('Gold')}}</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('news')}}" class="text-decoration-none text-light fs-6 nav-link">{{__('News')}}</a>
                </li>

                @php
                 $navs = $currencies->where('nav','1');
                @endphp
                @foreach ($navs as $currencyNav)
                    <li class="nav-item">
                        <a href="{{url('currency/'.$currencyNav->id)}}" class="text-decoration-none text-light fs-6 nav-link">{{$currencyNav->name}}</a>
                    </li>
                @endforeach


            </ul>
            <a href="{{$oppositeURL}}" class="navbar-text text-light text-decoration-none">
                {{$oppositeLangName}}
            </a>
        </div>  
    </div>
</nav>
<div class="currencies-bar  text-white overflow-y-hidden">
    <div class="container">
        <div class="row">
             @php
             $populars = $currencies->where('popular','1');
             $populargold= $gold->where('popular','1');

             @endphp
            @foreach ($populars as $popular)
            
            <a href="{{url('currency/'.$popular->id)}}" class="text-decoration-none col-auto">
                <div class="type-currency d-flex flex-column justify-content-center ">
                    <small class=" text-light m-0 mb-1 lh-1">{{$popular->name}}</small>
                    <span class="api-currency-number fw-bold fs-5 lh-1 text-light ">{{$popular->prices[0]->sell_price}}</span>
                </div>
            </a>
            @endforeach
            @foreach ($populargold as $popular)
            
            <a href="{{url('gold/'.$popular->id)}}" class="text-decoration-none col-auto">
                <div class="type-currency d-flex flex-column justify-content-center ">
                    <small class=" text-light m-0 mb-1 lh-1">{{$popular->name}}</small>
                    <span class="api-currency-number fw-bold fs-5 lh-1 text-light ">{{$popular->prices[0]->sell_price}}</span>
                </div>
            </a>
            @endforeach
   
        </div>
    </div>
    
</div>