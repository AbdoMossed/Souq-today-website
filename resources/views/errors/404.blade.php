@extends('main',['title_Page'=>   __('Souq Today')  ])


@section('content')
            <div >
                <div class="container ">
                    <div class="d-flex flex-column justify-content-center align-items-center py-5">
                        <div class="fs-4 mb-5 text-center ">
                            <i class="fa-solid mt-5 mb-2 text-primary  fa-triangle-exclamation fa-4x"></i>
                            <p class="fs-3 m-0 mb-2 text-dark "> {{__('Something is wrong')}} </p>
                            <small class="fs-6 lh-sm  text-muted ">{{__('The page you are looking for was moved, removed, renamed or might never existed!')}}</small>
                        </div>
                        
                        <a class="btn btn-primary rounded-pill  py-2 px-4 mb-5" href="{{url('/')}}"><i class="fa-solid fa-house me-1"></i> {{__('Home')}}</a>
                    </div>
                </div>  
            </div>
@endsection()