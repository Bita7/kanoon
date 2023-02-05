
    $(document).ready(function (){
    $("#slider1_left_bottom2").hide();
    $("#slider1_left_bottom3").hide();
    $("#tazeha").css("background","#7E57C2");



    $("#tazeha").click(function (){
    $("#slider1_left_bottom2").hide();
    $("#slider1_left_bottom3").hide();
    $("#slider1_left_bottom1").show();
    $("#tazeha").css("background","#7E57C2");
    $("#hafte").css("background","#add8e6")
    $("#mah").css("background","#add8e6")
});
    $("#hafte").click(function (){
    $("#slider1_left_bottom1").hide();
    $("#slider1_left_bottom3").hide();
    $("#slider1_left_bottom2").show();
    $("#hafte").css("background","#7E57C2");
    $("#tazeha").css("background","#add8e6")
    $("#mah").css("background","#add8e6")
});
    $("#mah").click(function (){
    $("#slider1_left_bottom1").hide();
    $("#slider1_left_bottom2").hide();
    $("#slider1_left_bottom3").show();
    $("#mah").css("background","#7E57C2");
    $("#hafte").css("background","#add8e6")
    $("#tazeha").css("background","#add8e6")
});



    var nextpic=1;
    var timer = setInterval(slider,4000);
    function slider()
    {
        if(nextpic>3)
        {
            nextpic=1;
        }
        if (nextpic<1)
        {
            nextpic=3;
        }
        $("#slider1_right").find(".item").hide();
        $("#slider1_right").find(".item").eq(nextpic-1).fadeIn(500);
        nextpic++;


    }
    $("#next").click(function (){
        clearInterval(timer);
        slider();
    });
        $("#prev").click(function (){
            clearInterval(timer);
            nextpic-=2;
            slider();
        });

});

