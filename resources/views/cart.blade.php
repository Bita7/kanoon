@extends('welcome')


@section('content')






    <h1> سبد خرید</h1>

    <div class="shopping-cart">

        <table border="1" style="text-align: center">
            <tr>
                <th>تصویر دوره</th>
                <th> عنوان</th>
                <th> قیمت</th>
                <th> تعداد</th>
                <th> اضافه/کم</th>
                <th> مجموع</th>
                <th> حذف</th>
            </tr>
            @foreach($cart->items as $product)
                <tr style="text-align: center">
                    <td class="text-center" width="9%"><a href="#"><img width="200" src="{{$product['item']->picture}}" class="img-thumbnail" /></a></td>
                    <td class="text-left"><a href="#">{{$product['item']->title}}</a><br />
                    <td class="text-left">{{$product['price']}}</td>
                    <td class="text-left">{{$product['qty']}}</td>
                    <td class="text-left">
                        <a style="background-color: #4cb050;color: white;padding: 10px;" href="{{route('cart.add', ['id' => $product['item']->id])}}">+ </a>
                        <a style="background-color: red;color: white;padding:10px;" href="{{ route('cart.remove', ['id' => $product['item']->id]) }}">- </a>
                    </td>
                    <td class="text-left">{{$product['price']}}</td>
                    <td class="text-left"><a href="{{ route('cart.remove', ['id' => $product['item']->id]) }}">حذف</a></td>
                </tr>
            @endforeach

            <tr></tr>
        </table>
        <div style="background-color: #f6f6f6;margin-top: 20px;text-align: left" class="totals">
            <div class="totals-item">
                <label>  تعداد اقلام</label>
                <div class="totals-value" id="cart-subtotal"> <h2>

                        {{Session::get('cart')->totalQty}}  </h2>
                </div>
            </div><div class="totals-item">
                <label>مبلغ قابل پرداخت</label>
                <div class="totals-value" id="cart-subtotal"> <h2>
                        {{Session::get('cart')->totalPrice}} تومان </h2>
                </div>
            </div>

            <form action="/payment" method="post">
                @csrf
                <button type="submit" style="color: white;background-color: green;padding: 20px;float: left">ثبت سفارش</button>
            </form>

        </div>

    </div>











@endsection

