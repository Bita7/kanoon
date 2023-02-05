<body dir="rtl">
<div align="center">
    <h1>درج دوره</h1>
<form action="/addcourse" method="post"enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="text"name="title" placeholder="coursename">
    <br>
    <textarea name="description" id="" placeholder="توضیحات دوره" cols="30" rows="10"></textarea>
    <br>
    <input type="text"name="price" placeholder="قیمت">
    <br>

    <lable>تصویر دوره</lable>
    <input type="file" name="picture" placeholder="picture">

    <br>
    <lable> فایل محتوای دوره</lable>
    <input type="file" name="course_file">

    <br>

    <input type="submit" value="فزودن دوره ">
</form>

    <hr>


    @if(Session::has('success'))

    <span style="color: white;background-color: green;padding: 20px">   {{ Session::get('success')}} </span>

    @endif

    <h2>لیست دوره های موجود</h2>


<table border="" width="500">
    <tr>
        <td>تصویر</td>
        <td>نام دوره</td>
        <td>توضیحات </td>
        <td>قیمت </td>

        <td>عملیات</td>

    </tr>
    @foreach($courses as $v)
        <tr>
            <td><img src="{{$v->picture}}" width="50" height="50"></td>
            <td>{{$v->title}}</td>
            <td>{{$v->description}}</td>
            <td>{{$v->price}}</td>
            <td><a href="/deletecourse/{{$v->id}}">حذف دوره</a></td>
        </tr>
    @endforeach
</table>
</div>
</body>
