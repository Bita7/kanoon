
<form action="adminregister" method="post">


    {{csrf_field()}}
    <input type="text" name="username" placeholder="your user name">
    <br>
    <br>
    <input type="text" name="email" placeholder="your email">
    <br>
    <br>
    <input type="text" name="password" placeholder="your password">
    <br>
    <br>
    <input type="submit" name="btn" value="ثبت مدیر">


</form>
