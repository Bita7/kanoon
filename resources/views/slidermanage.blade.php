<body dir="rtl">
<div align="center">
    <form action="uploadslider" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="file" name="picture">
        <input type="submit" value="upload">

    </form>
    <table border="1" width="500" align="center" style="text-align: center;font-family: Tahoma">
        <tr>
            <td>id</td>
            <td>تصویر</td>
            <td>عملیات</td>

        </tr>
        @foreach($val as $v)
            <tr>
                <td>{{$v->id}}</td>
                <td><img src="{{$v->src}}" width="200" height="50"></td>
                <td><a href="/deleteslider/{{$v->id}}">حذف دوره</a></td>

            </tr>
        @endforeach
    </table>

</div>

</body>

