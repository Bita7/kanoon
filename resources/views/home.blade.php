@extends('welcome')

@section('content')

    <div id="slider1">
        <div id="slider1_right">
            <img src="images/next.png" id="next">
            <img src="images/pre.png" id="prev">
            @foreach($val as $v)
                <img src="{{$v->src}}" class="item" width="920">

            @endforeach

        </div>
        <div id="slider1_left">
            <div id="slider1_left_top">
                <div class="slider1_left_top_tab" id="tazeha">تازه ها</div>
                <div class="slider1_left_top_tab" id="hafte">پربازدید ها</div>
                <div class="slider1_left_top_tab" id="mah"> پرفروش ها</div>

            </div>
            <div id="slider1_left_bottom1">
                <ul>
                   @forelse($courses as $course)
                       <li>{{$course->title}}</li>
                       @empty

                       @endforelse
                </ul>
            </div>
            <div id="slider1_left_bottom2"><ul>
                    @forelse($topviewcourses as $course)


                        <li>{{$course->title}}</li>
                    @empty

                    @endforelse
                </ul></div>
            <div id="slider1_left_bottom3"><ul>
                    @forelse($topcourses as $course)


                        <li>{{$course->title}}</li>
                    @empty

                    @endforelse
                </ul></div>
        </div>
    </div>
    <div id="icon">
        <div id="content">
            <div class="courses">
                <h2 class="icon">آخرین دوره های آموزشی</h2>

                <div id="slider2">


                    @forelse($courses as $course)


                        <div class="slider2_post"><div class="slider2pic" align="center"><img src="/{{$course->picture}}"><a href="/course/{{$course->id}}"> {{$course->title}} </a></div></div>

                    @empty

                        دوره ای موجو نیست

                    @endforelse



                    <div id="content">
                        <div class="courses">
                            <h2 class="icon">پرفروش ترین دوره های آموزشی</h2>


                            @forelse($topcourses as $course)


                                <div class="slider2_post"><div class="slider2pic" align="center"><img src="/{{$course->picture}}"><a href="/course/{{$course->id}}"> {{$course->title}} </a></div></div>

                            @empty

                                دوره ای موجو نیست

                            @endforelse
                        </div>


                    </div>

                </div>

            </div>


@endsection
