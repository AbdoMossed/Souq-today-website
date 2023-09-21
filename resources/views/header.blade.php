@php
    $oppositeLang = LaravelLocalization::getCurrentLocale() == 'en' ? 'ar' : 'en';
    $oppositeURL = LaravelLocalization::getLocalizedURL($oppositeLang);
    $supportedLocales = LaravelLocalization::getSupportedLocales();
    $oppositeLangName = $supportedLocales[$oppositeLang]["native"];
@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
    <div class="container">
        <div class="logo-page  col-md-3  d-flex align-items-center px-0">
            <a class=" navbar-brand " href="{{url('/')}}"><img src="{{mix('images/wide-logo-en.png')}}" width="200" class="fs-6" alt=""></a>
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
                <li class="nav-item">
                    <a href="{{url('currency')}}" class="text-decoration-none text-light fs-6 nav-link">{{__('United States Dollar')}}</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('currency')}}" class="text-decoration-none text-light fs-6 nav-link">{{__('Euro')}}</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('currency')}}" class="text-decoration-none text-light fs-6 nav-link">{{__('Saudi Riyal')}}</a>
                </li>
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

            <a href="{{url('currency')}}" class="text-decoration-none col-auto">
                <div class="type-currency d-flex flex-column justify-content-center ">
                    <small class=" text-light m-0 mb-1 lh-1">United States Dollar</small>
                    <span class="api-currency-number fw-bold fs-5 lh-1 text-light ">39.93</span>
                </div>
            </a>
            <a href="{{url('currency')}}" class="text-decoration-none col-auto">
                <div class="type-currency d-flex flex-column justify-content-center  col-auto">
                    <small class=" text-light m-0 mb-1 lh-1">Euro</small>
                    <span class="api-currency-number fw-bold fs-5 lh-1 text-light ">42.90</span>
                </div>
            </a>    
            <a href="{{url('currency')}}" class="text-decoration-none col-auto">
                <div class="type-currency d-flex flex-column justify-content-center col-auto">
                    <small class=" text-light m-0 mb-1 lh-1">21 Karat Gold</small>
                    <span class="api-currency-number fw-bold fs-5 lh-1 text-light ">2195</span>
                </div>
            </a>
            <a href="{{url('currency')}}" class="text-decoration-none col-auto">
                <div class="type-currency d-flex flex-column justify-content-center col-auto">
                    <small class=" text-light m-0 mb-1 lh-1">Saudi Riyal</small>
                    <span class="api-currency-number fw-bold fs-5 lh-1 text-light ">10.65</span>
                </div>
            </a>
            <a href="{{url('currency')}}" class="text-decoration-none col-auto">
                <div class="type-currency d-flex flex-column justify-content-center  col-auto">
                    <small class=" text-light m-0 mb-1 lh-1">Emirat Dirham</small>
                    <span class="api-currency-number fw-bold fs-5 lh-1 text-light ">10.87</span>
                </div>
            </a>
            <a href="{{url('currency')}}" class="text-decoration-none col-auto">
                <div class="type-currency d-flex flex-column justify-content-center  col-auto">
                    <small class=" text-light m-0 mb-1 lh-1">Qatar Riyal</small>
                    <span class="api-currency-number fw-bold fs-5 lh-1 text-light ">10.97</span>
                </div>
            </a>
            <a href="{{url('currency')}}" class="text-decoration-none col-auto">
                <div class="type-currency d-flex flex-column justify-content-center  col-auto">
                    <small class=" text-light m-0 mb-1 lh-1">Kuwaiti Dinar</small>
                    <span class="api-currency-number fw-bold fs-5 lh-1 text-light ">129.45</span>
                </div>
            </a>
            <a href="{{url('currency')}}" class="text-decoration-none col-auto">
            <div class="type-currency d-flex flex-column justify-content-center col-auto ">
                <small class=" text-light m-0 mb-1 lh-1">Jordanian dinar</small>
                <span class="api-currency-number fw-bold fs-5 lh-1 text-light ">56.35</span>
            </div>
            <a href="{{url('currency')}}" class="text-decoration-none col-auto">
                <div class="type-currency d-flex flex-column justify-content-center  col-auto">
                    <small class=" text-light m-0 mb-1 lh-1">Omani Riyal</small>
                    <span class="api-currency-number fw-bold fs-5 lh-1 text-light ">103.59</span>
                </div>
            </a>
            <a href="{{url('currency')}}" class="text-decoration-none col-auto">
                <div class="type-currency d-flex flex-column justify-content-center  col-auto">
                    <small class=" text-light m-0 mb-1 lh-1">Bahraini Dinar</small>
                    <span class="api-currency-number fw-bold fs-5 lh-1 text-light ">105.78</span>
                </div>
            </a>
        </div>
    </div>
    
</div>