@extends('main')

@section('content')
    <!-- Start Ditails The selected currency  -->
    <div class="container">
        <div class="father-div row d-flex">
            <!-- start child left -->
            <div class="child-left col-lg-6 ">
                <div class="part-one ">
                    @include('currency_title')
                    <hr>
                    <div class="price-uses mt-4 mb-5">
                        <div class="left-uses d-flex justify-content-between   align-items-center">
                            <div class="row gx-0 text-muted">
                                <div class="border-end  col-sm-6 mb-3 p-1  border-primary border-5 d-inline-block  ">
                                    <small class="colo-eee pe-2 d-inline-block">{{__('Market USD')}}</small> <span class="black-market-api pe-2 text-primary fw-bold">40.02</span> <small class="m-0 fs-6">{{__('Pound')}}</small>
                                </div>

                                <div class="border-end  col-sm-6 mb-3 p-1  border-primary border-5 d-inline-block  ">
                                    <small class="colo-eee pe-2">{{__('Bank USD')}}</small> <span class="bank-api pe-2 text-primary fw-bold">40.02</span> <small class="m-0 fs-6">{{__('Pound')}}</small>
                                </div>

                                <div class="border-end  col-sm-6 mb-3 p-1  border-warning  border-5 d-inline-block  ">
                                    <small class="colo-eee pe-2">{{__('Sagha USD')}}</small> <span class="sagha-api pe-2 text-warning fw-bold">23.2</span> <small class="m-0 fs-6">{{__('Pound')}}</small>
                                </div>

                                <div class="border-end  col-sm-6 mb-3 p-1  border-warning  border-5 d-inline-block  "> 
                                    <small class="colo-eee pe-2">{{__('Gold 21 Kerat')}}</small> <span class="gold21-api pe-2 text-warning fw-bold fw-bold">40.02</span> <small class="m-0 fs-6">{{__('Pound')}}</small>
                                </div>

                                <div class="border-end  col-sm-6 mb-3 p-1  border-info  border-5 d-inline-block  ">
                                    <small class="colo-eee pe-2">{{__('Market Difference')}}</small> <span class="Market-difference-api pe-2 fw-bold text-info">32.3</span> <small class="m-0 fs-6">{{__('Pound')}}</small>
                                </div>


                                <div class="border-end  col-sm-6 mb-3 p-1  border-info  border-5 d-inline-block  ">
                                    <small class="colo-eee pe-2">{{__('Sagha Difference')}}</small> <span class="sagha-difference-api pe-2 fw-bold text-info">40.02</span>  <small class="m-0 fs-6">{{__('Pound')}}</small>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="part-two-table w-100">
                    @include('gold_table')
                </div>
            </div>
            <!-- End child left -->
            <!-- start child right -->
            <div class="child-right col-lg-6 py-4 px-lg-4">
                @include('currencies_table')
            </div>
            <!-- End child right -->
            
        </div>
        <!-- start article in home -->

        <div class=" row px-2 ">

            <div class=" px-0   col-lg-6  mb-3">
                <a href="{{url('article')}}" class="text-decoration-none">
                    <div class="d-flex">
                        <div class=" rounded col-lg-4">
                            <img src="{{url('/images/1-13-thumb.webp')}}"  class="rounded "width="100%"  alt="">
                        </div>
                        <div class="d-flex flex-column px-2 col-lg-8 text-success">
                            <h5 class="mb-3">كم يدخل لمصر سنوياً بالدولار من قناة السويس؟</h5>
                            <small >تُعد قناة السويس واحدة من أهم المعابر المائية في العالم، وتمتد عبر الأراضي المصرية لربط البحر الأبيض المتوسط والبحر الأحمر. إنها تمثل شريان...</small>
                        </div>
                    </div>
                </a>
            </div>

            <div class=" px-0   col-lg-6 d-flex ">
                <a href="{{url('article')}}" class="text-decoration-none">
                    <div class="d-flex">
                        <div class=" rounded col-lg-4">
                            <img src="{{url('/images/_127401161_gettyimages-1242710165-thumb.webp')}}"  class="rounded " width="100%"  alt="">
                        </div>
                        <div class="d-flex flex-column text-success px-2 col-lg-8">
                            <h5 class="mb-3">من أين تحصل مصر على دولارات لسداد الديون؟</h5>
                            <small >تعتبر العملة الصعبة أو العملة الأجنبية أحد العوامل الحيوية في أي اقتصاد، حيث تلعب دورًا هامًا في تعزيز الاستقرار المالي وتحقيق التنمية الاقتصادية. ...</small>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- End Ditails The selected currency  -->

@endsection