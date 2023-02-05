@foreach($val as $v)
    <form action="../updatestudent/{{$v->id}}" method="post">
        {{csrf_field()}}
        <input type="text" value="{{$v->id}}" name="id">
        <br>
        <br>

        <input type="text" value="{{$v->name}} " name="name">
        <br>
        <br>
        <input type="text" value="{{$v->email}}" name="email">
        <br>
        <br>
        <input type="submit" value="ویرایش">


    </form>
@endforeach

