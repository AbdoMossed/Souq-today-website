@extends('main')


@section('content')
    <div class="container my-5 ">

        <div class=" row  p-4 ">

            <div class="col-lg-3 col-md-6 pe-1 mb-3">
                <a href="{{url('article')}}" class="text-decoration-none text-dark">
                    <div class=" px-0 shadow-lg  rounded h-100">
                        <div class="">
                            <img src="{{url('/images/1-13-thumb.webp')}}"  class="rounded-top w-100" alt="">
                        </div>
                        <div class="  p-4 ">
                            <h5 class="fw-bold">كم يدخل لمصر سنوياً بالدولار من قناة السويس؟</h5>
                            <span><i class="fa-regular fa-clock"></i> 1 week ago . </span>
                            <span>0 <i class="fa-regular fa-comment"></i></span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 pe-1 mb-3">
                <a href="{{url('article')}}" class="text-decoration-none text-dark">
                    <div class=" px-0 shadow-lg rounded h-100">
                        <div class="">
                            <img src="{{url('/images/_127401161_gettyimages-1242710165-thumb.webp')}}" class="rounded-top w-100" alt="">
                        </div>
                        <div class=" w-100 p-4 ">
                            <h5 class="fw-bold">من أين تحصل مصر على دولارات لسداد الديون؟</h5>
        
                            <span><i class="fa-regular fa-clock"></i> 1 week ago . </span>
                            <span class="text-muted py-2 d-inline-block fs-6">0 <i class="fa-regular fa-comment"></i></span>
                        </div>
                    </div>
                </a>
            </div>

        </div>


    </div>

@endsection