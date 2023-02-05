<div style="width: 100%;height: 50px;background: #9E9E9E;text-align: center">
    <div style="width: 20%;height:100%;background: #9E9E9E;float: right ">id</div>
    <div style="width: 20%;height:100%;background: #9E9E9E;float: right ">نام کاربری</div>
    <div style="width: 20%;height:100%;background: #9E9E9E;float: right ">ایمیل</div>
    <div style="width: 20%;height:100%;background: #9E9E9E;float: right ">حذف</div>
    <div style="width: 20%;height:100%;background: #9E9E9E;float: right ">ویرایش</div>

</div>
@foreach($val as $v)
    <div style="width: 100%;height:50px;background: #9E9E9E;float: right;text-align: center ">
        <div style="width: 20%;height:100%;background: #9E9E9E;float: right ">{{$v->id}}</div>

        <div style="width: 20%;height:100%;background: #9E9E9E;float: right ">{{$v->name}}</div>
        <div style="width: 20%;height:100%;background: #9E9E9E;float: right ;font-size: medium">{{$v->email}}</div>
        <div style="width: 20%;height:100%;background: #9E9E9E;float: right "><a href="delstudent/{{$v->id}}">حذف</a></div>
        <div style="width: 20%;height:100%;background: #9E9E9E;float: right "><a href="editstudentform/{{$v->id}}">ویرایش</a></div>

    </div>



@endforeach
