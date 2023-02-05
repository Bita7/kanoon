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
<div id="header">
    <div id="header_part1">

    </div>
</div>
<div id="loginform">
    <form action="adminlogin" method="post">
        {{csrf_field()}}
        <div id="loginformtitle">صفحه شخصی ورود ادمین</div>
        <div><label>نام کاربری:</label><input type="text" name="username" class="input"></div>

        <div><label>پسورد:</label><input type="password" name="password" class="input"></div>
        <div><input type="submit" name="btn" class="loginbtn" value="ورود ادمین"></div>

    </form>
</div>
</body>


</html>
