@extends('main',['title_Page'=> __('Article') ])



@section('content')

<div class="container my-5 ">

<div class=" row col-12 ">

    <div class="col-lg-9 p-2 ">
        <div class="rounded">
            <img src="{{url('/storage/'.$article->thumbnail)}} "  class="w-100 rounded" alt="">
        </div>
        <div class=" container py-4 ">
            <a class="d-flex flex-nowrap fw-bold  text-decoration-none fs-3 mt-2 mb-3  text-primary ">{{$article->title}}</a>
            <span class="text-muted"><i class="fa-regular fa-clock"></i> {{$article->created_at->diffForHumans()}} | </span>
            <span class="text-muted"> {{$count}} {{__('Views')}}</span>
        </div>
        {!!$article->long_description!!}
                <hr>
                
            <div>
                <p class=" fs-4 fw-bold text-primary">{{__('Share your opinion with us')}}</p>
                <p class="text-muted">{{__('Your E-mail wont be shared')}}</p>

                <div   class="formComments d-flex flex-column">
                    <input     required class="text mb-4 border border-success p-3 rounded" name="user_name"    type="text" placeholder="*{{__('Name')}}">
                    <input     required class="text mb-4 border border-success p-3 rounded" name="email"   placeholder="*{{__('Email')}}">
                    <textarea  required class="text-area mb-4 border border-success p-3 rounded" name="comment"             placeholder="*{{__('Your Comment')}}"  rows="5" ></textarea>
                    <button type="button"   class="click col-3  py-2 bg-primary text-light rounded-pill">{{__('Add Comment')}}</button>
                </div>
                <script>
                    window.addEventListener("load", function (){
                        $(function () {
     
                            $( "div .click" ).on( "click", function(e) {
                                
                                var name = $("input[name='user_name']").val();
                                var email = $("input[name='email']").val();
                                var comment = $("textarea[name='comment']").val();
                                var dataString = {user_name: name, email: email ,comment: comment} ;
                                // e.preventDefault();
                                $("div button.click").attr('disabled','disabled');

                                $("div button.click").html('<div class=" spinner-border text-light" role="status"><span class="visually-hidden">Loading...</span></div>');
                                console.log(dataString);
                  
                                // alert(dataString); return false; 
                                $.ajax({
                                type: "POST",
                                dataType:"json",
                                url: '{{url("/api/articles/".$article->id."/comment/")}}',
                                data: dataString,
                                success: function (data) {
                                    console.log(data);

                                    var name = data['name'];
                                    var created_at =  "{{__('Just Now')}}";
                                    var comment = data['comment'];
                                    $("div div.add-comments").prepend("<div class='p-3 d-flex flex-column mb-1'><div class='d-flex justify-content-between mb-1'><h5 class='text-primary'>"+ name  +"</h5><span class='text-dark'>"+ created_at +"</span></div><p class='text-muted'>"+ comment +"</p></div>")

                                    $("div button.click").html("{{__('Add Comment')}}"); 

                                    $("div button.click").removeAttr('disabled');

    
                                    $("div input").val('');
                                    $("div textarea").val('');
                                },
                                error: function (request, status, error) {
                                    alert(request.responseText);

                                    $("div button.click").removeAttr('disabled');
                                    $("div button.click").html("{{__('Add Comment')}}"); 
                                    $("div textarea").val('');


                                }
                                });
                                
                            });
 
                        });
                    });

                </script>
                <span class="px-3 text-muted my-3 d-block"> <i class="fa-regular fa-comment"></i> {{$articleComments->where('article_id',$article->id)->count()}} {{__('Comments')}} </span>
                <div class="text-light add-comments">
                    @foreach ($articleComments->where('article_id',$article->id) as $info)
                        
                        <div class='p-3 d-flex flex-column mb-1'>
                                <div class='d-flex justify-content-between mb-1'>
                                    <h5 class='text-primary'>{{$info->name}}</h5>
                                    <span class='text-dark'>{{$info->created_at->diffForHumans()}}</span>
                                </div>
                                <p class='text-muted'>{{$info->comment}}</p>
                        </div>
                    
                    
                    @endforeach
                </div>
            </div>
    </div>
    <!-- end left page  -->
    <!-- start right  -->
    <div class="col-lg-3   p-2 ps-3  row ">
        <div class="position-relative ">
            <div class=" position-sticky top-0 col-12   p-0 d-flex flex-column">
            
                <div class="rounded">
                    <img src="{{url('/storage/'.$article->thumbnail)}}"  class="w-100 rounded" alt="">
                </div>

                @foreach ($nextArticles as $nextArticle)
                <a href="{{url('article/'. $nextArticle->id)}}" class="text-decoration-none text-dark">
                    <div class="px-0 mt-3   rounded  row ">
                        <div class="col-4 rounded">
                            <img src="{{url('/storage/'.$nextArticle->thumbnail)}} " class="rounded " width="100%" alt="">
                        </div>

                        <div class="col-8 p-0  d-flex flex-column ">
                            <small class="d-flex flex-nowrap fw-bold text-muted text-decoration-none mb-1 ">{{$nextArticle->title}}</small>
                            <div class="flex-grow-1"></div>
                            <small class="text-muted ">{{$nextArticle->created_at->diffForHumans()}} </small>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>



</div>


</div>

@endsection