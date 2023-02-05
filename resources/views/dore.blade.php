@extends('welcome')

@section('content')

    @if(Session::has('success'))

        <span style="color: white;background-color: green;padding: 20px;width: 100%;display: block">   {{ Session::get('success')}}
            <a style="background-color: white;blue: #1a202c;padding:10px;" href="/cart">مشاهده سبد خرید</a> </span>

    @endif

    <div class="c-main">

        <div class="" style="margin: 20px">
            <img width="400" src="/{{$course->picture}}" alt="">
        </div>

        <div>
            <h1>{{$course->title}} </h1>
            <hr>
            <p>{{$course->description}}</p>
            <p>{{$course->price}}</p>
            <p> تعداد دانشجو :{{$course->sale}}</p>
            <p> تعداد بازدید :{{$course->view}}</p>

            @if( auth()->check() && auth()->user()->courses()->get()->contains('id', $course->id))
                <a href="/download/course/{{$course->id}}" class="download-course">دانلود محتوای دوره </a>
                @else

                <a href="{{route('cart.add', ['id' => $course->id])}}" class="add-to-cart">افزودن به سبد</a>

            @endif


        </div>


    </div>





@endsection
