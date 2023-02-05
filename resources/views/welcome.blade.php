<html>
<head>
    <title>سایت آموزش آنلاین</title>
    <link rel="stylesheet" href="/css/style.css" >
    <script src="/js/jquery.js"></script>
    <script src="/js/script.js"></script>

</head>
<body DIR="rtl">
<div id="topmenu">
    <div id="right-topmenu">
        <ul>
            <li><a href="/">صفحه شخصی شما</a></li>
            <li><a href="/alogin"> ورود ادمین</a></li>
            <li><a href="/login">ورود</a></li>
            <li><a href="/register">ثبت نام</a></li>
            @auth
                <li><a href="/logout"> خروج از حساب</a></li>
                @endauth

            <li><a href="/cart">سبدخرید</a></li>
        </ul>
    </div>
    <div id="left-topmenu">دوشنبه 13دی 1401</div>
</div>
<div id="header">
    <div id="header_part1">

    </div>
</div>
<div id="bottommenu">
    <ul>

</div>


@yield('content')




</body>




</html>
