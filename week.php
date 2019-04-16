<?php
$add_d0=strtotime("+7hour");
$add_d1=strtotime("+1day+7hour");
$add_d2=strtotime("+2day+7hour");
$add_d3=strtotime("+3day+7hour");
$add_d4=strtotime("+4day+7hour");
$add_d5=strtotime("+5day+7hour");
$add_d6=strtotime("+6day+7hour");

$sub_d1=strtotime("-1day+7hour");
$sub_d2=strtotime("-2day+7hour");
$sub_d3=strtotime("-3day+7hour");
$sub_d4=strtotime("-4day+7hour");
$sub_d5=strtotime("-5day+7hour");
$sub_d6=strtotime("-6day+7hour");

if(date("l",$add_d0)=="Sunday"){
    $sun=date("m/d",$add_d0);//顯示的日期
    $mon=date("m/d",$add_d1);
    $tue=date("m/d",$add_d2);
    $wed=date("m/d",$add_d3);
    $thu=date("m/d",$add_d4);
    $fri=date("m/d",$add_d5);
    $sat=date("m/d",$add_d6);
    
    $date[1]=date("Y-m-d",$add_d1);
    $date[2]=date("Y-m-d",$add_d2);
    $date[3]=date("Y-m-d",$add_d3);
    $date[4]=date("Y-m-d",$add_d4);
    $date[5]=date("Y-m-d",$add_d5);
    $date[6]=date("Y-m-d",$add_d6);

}

if(date("l",$add_d0)=="Monday"){
    $sun=date("m/d",$sub_d1);
    $mon=date("m/d",$add_d0);
    $tue=date("m/d",$add_d1);
    $wed=date("m/d",$add_d2);
    $thu=date("m/d",$add_d3);
    $fri=date("m/d",$add_d4);
    $sat=date("m/d",$add_d5);

    $date[1]=date("Y-m-d",$add_d0);//值的日期
    $date[2]=date("Y-m-d",$add_d1);
    $date[3]=date("Y-m-d",$add_d2);
    $date[4]=date("Y-m-d",$add_d3);
    $date[5]=date("Y-m-d",$add_d4);
    $date[6]=date("Y-m-d",$add_d5);
}

if(date("l",$add_d0)=="Tuesday"){
    $sun=date("m/d",$sub_d2);
    $mon=date("m/d",$sub_d1);
    $tue=date("m/d",$add_d0);
    $wed=date("m/d",$add_d1);
    $thu=date("m/d",$add_d2);
    $fri=date("m/d",$add_d3);
    $sat=date("m/d",$add_d4);

    $date[1]=date("Y-m-d",$sub_d1);//值的日期
    $date[2]=date("Y-m-d",$add_d0);
    $date[3]=date("Y-m-d",$add_d1);
    $date[4]=date("Y-m-d",$add_d2);
    $date[5]=date("Y-m-d",$add_d3);
    $date[6]=date("Y-m-d",$add_d4);
}

if(date("l",$add_d0)=="Wednesday"){
    $sun=date("m/d",$sub_d3);
    $mon=date("m/d",$sub_d2);
    $tue=date("m/d",$sub_d1);
    $wed=date("m/d",$add_d0);
    $thu=date("m/d",$add_d1);
    $fri=date("m/d",$add_d2);
    $sat=date("m/d",$add_d3);

    $date[1]=date("Y-m-d",$sub_d2);//值的日期
    $date[2]=date("Y-m-d",$sub_d1);
    $date[3]=date("Y-m-d",$add_d0);
    $date[4]=date("Y-m-d",$add_d1);
    $date[5]=date("Y-m-d",$add_d2);
    $date[6]=date("Y-m-d",$add_d3);
}

if(date("l",$add_d0)=="Thursday"){
    $sun=date("m/d",$sub_d4);
    $mon=date("m/d",$sub_d3);
    $tue=date("m/d",$sub_d2);
    $wed=date("m/d",$sub_d1);
    $thu=date("m/d",$add_d0);
    $fri=date("m/d",$add_d1);
    $sat=date("m/d",$add_d2);

    $date[1]=date("Y-m-d",$sub_d3);//值的日期
    $date[2]=date("Y-m-d",$sub_d2);
    $date[3]=date("Y-m-d",$sub_d1);
    $date[4]=date("Y-m-d",$add_d0);
    $date[5]=date("Y-m-d",$add_d1);
    $date[6]=date("Y-m-d",$add_d2);
}
if(date("l",$add_d0)=="Friday"){
    $sun=date("m/d",$sub_d5);
    $mon=date("m/d",$sub_d4);
    $tue=date("m/d",$sub_d3);
    $wed=date("m/d",$sub_d2);
    $thu=date("m/d",$sub_d1);
    $fri=date("m/d",$add_d0);
    $sat=date("m/d",$add_d1);

    $date[1]=date("Y-m-d",$sub_d4);//值的日期
    $date[2]=date("Y-m-d",$sub_d3);
    $date[3]=date("Y-m-d",$sub_d2);
    $date[4]=date("Y-m-d",$sub_d1);
    $date[5]=date("Y-m-d",$add_d0);
    $date[6]=date("Y-m-d",$add_d1);
}
if(date("l",$add_d0)=="Saturday"){
    $sun=date("m/d",$sub_d6);
    $mon=date("m/d",$sub_d5);
    $tue=date("m/d",$sub_d4);
    $wed=date("m/d",$sub_d3);
    $thu=date("m/d",$sub_d2);
    $fri=date("m/d",$sub_d1);
    $sat=date("m/d",$add_d0);

    $date[1]=date("Y-m-d",$sub_d5);//值的日期
    $date[2]=date("Y-m-d",$sub_d4);
    $date[3]=date("Y-m-d",$sub_d3);
    $date[4]=date("Y-m-d",$sub_d2);
    $date[5]=date("Y-m-d",$sub_d1);
    $date[6]=date("Y-m-d",$add_d0);
}
//echo $sun."<br>".$mon."<br>".$tue."<br>".$wed."<br>" .$thu."<br>" .$fri."<br>" .$sat."<br>";
?>