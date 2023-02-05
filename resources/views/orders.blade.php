<body dir="rtl">
<div align="center">

    <table border="1" width="500" align="center" style="text-align: center;font-family: Tahoma">
        <tr>
            <td>کد سفارش</td>
            <td>تاریخ سفارش</td>
            <td>نام کاربر</td>
            <td>مبلغ سفارش</td>
            <td> نام دوره/دوره ها</td>

        </tr>
        @foreach($orders as $v)
            <tr>
                <td>{{$v->code}}</td>
                <td>{{$v->created_at}}</td>
                <td>{{($v->user)?$v->user->name:""}}</td>
                <td>{{$v->total_price}}</td>
                <td>
                    @foreach($v->courses as $course)

                        <a href="">{{$course->title}}</a><br>

                    @endforeach


                </td>


            </tr>
        @endforeach
    </table>

</div>

</body>

