<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/stylee.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <title>پنل مدیریت</title>
</head>
<body>

<header> <!--    start header-->
    <DIV class="right">
        <span>پیشخوان</span>
    </DIV>


    <DIV class="left">
        <div class="avatar">
            <img src="images/user-avatar.jpg" alt="">
        </div>
        <ul class="navProfileDropdown">

            <li class="head">
                <a href="">
                    <img src="images/user-avatar.jpg" alt="">
                    <span class="labelName">نام و نام خانوادگی فرد</span>
                </a>
            </li>
            <li>
                <a href="">
                    <img src="images/small-nofi.jpg"/>

                    <span>تنظیمات اطلاع رسانی</span>
                </a>
            </li>
            <li>
                <a href="">
                    <img src="images/settings-profile.jpg"/>

                    <span>تنظیمات اصلی سایت</span>
                </a>
            </li>
            <li>
                <a href="">
                    <img src="images/exit-profile.jpg"/>
                    <span>خروج</span>
                </a>
            </li>

        </ul>
        <div class="notification">
            <img src="images/notifications-bell-button.png" alt="">
        </div>
    </DIV>
</header><!--    end header -->

<div class="sidebar">
    <div class="head">
        <img src="images/avatar5.jpg">
        <h3>پنل مدیریت سایت</h3>

        <div class="level-user">
            <span class="label-name">سطح مدیریتی : </span>
            <span class="label-level">مدیر اصلی </span>
        </div>
        <div class="clear"></div>
    </div>

    <div class="menu">
        <UL>
            <li><a href="#">پیشخوان</a></li>
            <li class="has-sub"><a href="#">دوره ها</a>
                <ul>
                    <li><a href="darsmanageform">افزودن ومدیریت دوره </a></li>
                    <li><a href="{{route('blog.index')}}">نمایش دوره ها</a></li>
                    <li><a href="#">افزودن</a></li>
                </ul>
            </li>



            <li class="has-sub"><a href="#">کاربران</a>
                <ul>
                    <li><a href="studentsmanage">نمایش کاربران</a></li>
                </ul>
            </li>




            <li><a href="slidermanage">اسلایدرها</a></li>

        </UL>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>


<style>
    .content {
        width: 1088px;
        height: 500px;
        float: right;
        margin-top: 2px;
    }

    .middle {
        width: 97%;
        height: 0;
        margin: 0 auto;
    }

    .tab-box {
        width: 100%;
        height: auto;
        /*background: orange;*/
        font-size: 13px;

    }

    .title-box {
        font-size: 20px;
        margin: 10px 0;
    }

    .tab-box ul li {
        float: right;
        margin-left: 10px;
        padding: 9px 12px;
        color: #427acc;
    }

    .tab {
        width: 100%;
        height: 42px;
        border-bottom: 1px solid #ddd;
        cursor: pointer;
    }

    .active {
        background: #fff !important;
        color: #4d4d4d !important;
        border-right: 1px solid #dfdfdf;
        border-left: 1px solid #ccc;
        border-top: 1px solid #ccc;
        -webkit-border-top-left-radius: 5px;
        -webkit-border-top-right-radius: 5px;
        -moz-border-radius-topleft: 5px;
        -moz-border-radius-topright: 5px;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .tab-content {
        width: 100%;
        height: auto;
    }

    .section {
        width: 100%;
        height: auto;
        padding: 30px 30px;
        background: #fff;
        float: right;
        border-right: 1px solid #ddd;
        display: none;
    }

    .block {
        display: block;
    }

    .tab-content .tabel1 tr td {
        float: right;
        padding: 7px 0;
        width: 27%;
    }

    .tab-content .tabel1 tr td:nth-child(even) {
        color: #427acc;
    }

    .table2 {
        text-align: center;
    }

    .table2 td {
        padding: 10px 0;
    }

    .table2 tr:nth-of-type(2n+1) {
        background: #f9f9f9;
        border: 1px solid #ccc !important;
    }
</style>
<div class="content">
    <div class="middle"><!-- start middle -->
        <h1 class="title-box">داشبورد</h1>
        <div class="tab-box"><!-- start tab-box -->
            <Ul class="tab">
                <li class="active">پیشخوان</li>
                <li>نمودار ها</li>

            </Ul>
            <div class="tab-content"> <!-- start tab-content -->
                <section class="section block">
                    <head>
                        <style>
                            #customers {
                                font-family: Arial, Helvetica, sans-serif;
                                border-collapse: collapse;
                                width: 100%;
                                text-align: center;
                            }

                            #customers td, #customers th {
                                border: 1px solid #ddd;
                                padding: 8px;
                                text-align: center;
                            }

                            #customers tr:nth-child(even){background-color: #f2f2f2;}

                            #customers tr:hover {background-color: #ddd;}

                            #customers th {
                                padding-top: 12px;
                                padding-bottom: 12px;
                                text-align: left;
                                background-color: #04AA6D;
                                color: white;
                            }
                        </style>
                    </head>
                    <body>

                    <h1>لیست دوره ها</h1>

                    <table id="customers"  style="text-align: center">
                        <tr>
                            <th>name</th>
                            <th>picture</th>
                            <th>price</th>
                            <th>action</th>
                        </tr>
                        <tr>
                            @foreach($cat as $category)
                            <td>{{$category->name}}</td>
                            <td>{{$category->picture}}</td>
                            <td>{{$category->price}}</td>
                            <td>
                                <a href="" class="btn btn-danger"><i class="fa fa-trash"></i>Delete </a>
                                <a href="" class="btn btn-info"><i class="fa fa-pencil"></i>Edit </a>
                            </td>

                            @endforeach
                        </tr>

                        <tr>


                    </table>





                </section>
                <section class="section">

                </section>
                <section class="section">3</section>
                <div class="clear"></div>
            </div><!-- end tab-content -->
            <div class="clear"></div>
        </div><!-- end tab-box -->
        <div class="clear"></div>
    </div><!-- end middle -->
    <div class="clear"></div>
</div>


</body>


<script src="js/jqueryy.js"></script>
<script src="js/scriptt.js"></script>
</html>
