@extends('main',['title_Page'=>  __('News').' | '. __('Souq Today')  ])



@section('content')
    <div class="container my-5 ">

        <div class=" row  p-4 ">
            @foreach ($articles as $article)

                <div class="col-lg-3 col-md-6 pe-1 mb-3">
                    <a href="{{url('article/'. $article->id)}}" class="text-decoration-none text-dark">
                        <div class=" px-0 shadow-lg  rounded h-100">
                            <div class="">
                                <img src="{{url('/storage/'.$article->thumbnail)}}"  class="rounded-top w-100" alt="">
                            </div>
                            <div class="  p-4 ">
                                <h5 class="fw-bold"> {{$article->title}} </h5>
                                <span><i class="fa-regular fa-clock"></i> {{$article->created_at->diffForHumans()}}  </span>
                                <span> <i class="fa-regular fa-comment"></i> {{$article->comments_count}} </span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
           
        </div>


    </div>

@endsection