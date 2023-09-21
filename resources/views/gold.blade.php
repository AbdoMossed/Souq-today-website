@extends('main')

@section('content')

    <div class="container ">
        
        <div class=" row  my-5">
            <!-- start  table gold -->
            <div class=" col-lg-9 pe-4 part-two-table px-0 ">
                @include('gold_table')
            </div>
            <!-- End  table dold -->

            <!-- start div input calc -->
            <div class="col-lg-3  input-calc bg-primary p-3 rounded  h-100 ">
                @include('currency_calculator')
            </div>

            <!-- end div input calc -->
        </div>

    </div>

@endsection()