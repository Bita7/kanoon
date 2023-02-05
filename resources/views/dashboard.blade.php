@extends('welcome')


@section('content')

    <h1>  حساب کاربری | لیست دوره ها</h1>

    @if(Session::has('success'))

        <span style="color: white;background-color: green;padding: 20px;width: 100%;display: block">   {{ Session::get('success')}}

        </span>
    @endif
    <table border="1" style="text-align: center">
        <tr>
            <th>تصویر دوره</th>
            <th> عنوان</th>
            <th> قیمت</th>
            <th> مشاهده</th>
        </tr>
        @foreach($courses as $course)
            <tr style="text-align: center">
                <td class="text-center" width="9%"><a href="#"><img width="200" src="{{$course->picture}}" class="img-thumbnail" /></a></td>
                <td class="text-left"><a href="#">{{$course->title}}</a><br />
                <td class="text-left">{{$course->price}}</td>
                <td class="text-left">
                    <a href="/download/course/{{$course->id}}">دانلود محتوای دوره</a>
                </td>
            </tr>
        @endforeach

        <tr></tr>
    </table>













@endsection

