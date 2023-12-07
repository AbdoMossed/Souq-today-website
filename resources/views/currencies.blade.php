@extends('main',['title_Page'=>  __('Currencies').' | '. __('Souq_Today')  ])

@section('content') 

        <div class="container  ">
            
            <div class="row my-5 g-0">
                <!-- start  table currenices -->

                <div class="child-right col-lg-9 px-lg-4 mb-3">
                    @include('currencies_table',[
                        'items' => $currencies,
                        'slug' => 'currency',
                    ])
                </div>
  
                <!-- End  table currenices -->
                
                <!-- start div input calc -->

                <div class="col-lg-3  input-calc bg-primary p-3 rounded  h-100 ">
                    @include('currency_calculator',[
                        'items'=>$currencies,
                    ])
                </div>


            <!-- end div input calc -->
            </div>

        </div>


@endsection