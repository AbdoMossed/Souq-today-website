@extends('main')

@section('content')

<div class="container">
            <div class="father-div row d-flex mt-5 px-3">
                <!-- start child left -->
                <div class="child-left col-lg-9 p-0 pe-3 ">
                    <div class="part-one ">
                        @include('currency_title')
                        <hr>
                        <div class="price-uses mt-4 mb-5">
                            <div class="left-uses d-flex justify-content-between   align-items-center">
                                <div class="row row-cols-2 text-muted">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="part-two-table w-100">
                        <p class="fw-bold text-primary fs-5"> {{__('United States Dollar To Egyption Pound')}} </p>
                        @include('currency_table')

                    </div>
                </div>
                <!-- End child left -->
                <!-- start child right -->

                <div class="col-lg-3  input-calc bg-primary p-3 rounded  h-100 container ">
                    @include('currency_calculator')
                </div>

                <!-- End child right -->
                
            </div>
        </div>
@endsection