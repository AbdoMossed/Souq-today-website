
<hr>
@php
$footers = $currencies->where('footer','1');
@endphp
<div class="container">
    <div class="row py-5">
        <p class="  col-lg-6 text-muted"> <span>{{__('Souq Today')}}:</span> {{__('We provides black market currency rates and gold prices in Egypt. We are your trusted source for financial information, collecting and analyzing currency and gold data from reliable sources. Our user-friendly interface enables you to track changes and make informed decisions about your investments. We always strive to provide accurate information and reliable analysis. Remember that prices in the black market can change rapidly')}} </p>
        <div class=" d-flex flex-column col-lg-3 ">
            <h4 class="fw-bold fs-3 text-muted mb-4" > {{__('links')}} </h4>
            <a href="{{url('currencies')}}" class="link-success text-decoration-none text-muted fs-5"> {{__('Currencies')}} </a>
            <a href="{{url('gold')}}" class="link-success text-decoration-none text-muted fs-5"> {{__('Gold')}} </a>
            <a href="{{url('news')}}" class="link-success text-decoration-none text-muted fs-5"> {{__('News')}} </a>
           @foreach($footers as $footer)
           <a href="{{url('currency/' . $footer->id)}}" class="link-success text-decoration-none text-muted fs-5"> {{$footer->name}} </a>
           @endforeach
        </div>
        <div class="d-flex flex-column col-lg-3">
            <h4 class="fw-bold fs-3 text-muted mb-4"> {{__('Follow Us')}} </h4>
            <div class="text-success p-2">
                <span class="text-success p-2 fs-4"><i class="fa-solid fa-paper-plane" ></i></span>
                <span class="text-success p-2 fs-4"><i class="fa-brands fa-facebook"></i></span>
            </div>
        </div>
    </div>
</div>
<div class="all-reserved text-center bg-light p-3">
    <p> {{__('All rights reserved ©')}} {{__('Souq Today')}} 2023 </p>
</div>
<div class="Our sites ">
    <a href="{{url('/')}}"></a>
    <a href="{{url('/')}}"></a>
    <a href="{{url('/')}}"></a>
    <a href="{{url('/')}}"></a>
</div>