@php
    $oppositeLang = LaravelLocalization::getCurrentLocale() == 'en' ? 'ar' : 'en';
    $oppositeURL = LaravelLocalization::getLocalizedURL($oppositeLang);
    $supportedLocales = LaravelLocalization::getSupportedLocales();
    $oppositeLangName = $supportedLocales[$oppositeLang]["native"];
    $appURL = config('app.url');
    $splittedUrl = parse_url($appURL);
    $scheme = $splittedUrl['scheme'];
    $host = $splittedUrl['host'];
    $port = isset($splittedUrl['port']) ? $splittedUrl['port'] : '8030';



    $path = parse_url(request()->url())['path'];


@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
    <div class="container">
        <div class="row col">
            <div class="logo-page  col-md-3 col-sm-10  d-flex align-items-center px-0">
                <a class=" navbar-brand " href="{{url('/')}}"><img src="{{url('/images/wide-logo-en.png')}}" width="200" class="fs-6" alt=""></a>
                <div class="dropdown bgSimilar  mx-1  text-white rounded d-inline-block">
                    <button class="bgSimilar btn dropdown-toggle text-white p-1" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ $countries->where('code',$code)->first()->country->name}}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        @foreach ($countries as $country)
                            @php
                                $url = "{$scheme}://{$country->code}.{$host}";
                                if(isset($port)){
                                    $url .= ":{$port}";
                                }
                                if($path != '' ){
                                    $url .= "{$path}";
                                }

                            @endphp
                            <li><a class="dropdown-item" href="{{$url}}">{{$country->country->name}}</a></li>
                        @endforeach 

                        

                    </ul>
                </div>
            </div>
            <button class="navbar-toggler m-0 p-1 col-sm-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse col-md-9 m-auto " id="navbarText">
                <ul class="navbar-nav m-auto me-5 mb-2 mb-lg-0 ">
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
                    <li class="nav-item">
                        <a href="{{$oppositeURL}}" class="navbar-text text-light text-decoration-none nav-link">
                            {{$oppositeLangName}}
                        </a>
                    </li>

                </ul>
            </div>  
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
            
            <a href="{{url('currency/'.$popular->id)}}" class="hover-bar text-decoration-none col-auto">
                <div class="type-currency d-flex flex-column justify-content-center ">
                    <small class="m-0 mb-1 lh-1">{{$popular->name}}</small>
                    <span class="api-currency-number fs-3  lh-1 text-light ">{{$popular->prices[0]->buy_price}}</span>
                </div>
            </a>
            @endforeach
  
            @foreach ($populargold as $popular)
            
            <a href="{{url('gold/'.$popular->id)}}" class="hover-bar text-decoration-none col-auto">
                <div class="type-currency d-flex flex-column justify-content-center ">
                    <small class=" text-light m-0 mb-1 lh-1">{{$popular->name}}</small>
                    <span class="api-currency-number fs-3 lh-1 text-light ">{{$popular->prices[0]->buy_price}}</span>
                </div>
            </a>
            @endforeach
   
        </div>
    </div>
    
</div>