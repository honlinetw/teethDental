<?php
session_start();
$link = mysqli_connect("localhost","s1070205","s1070205","s1070205");
mysqli_query($link,"set names utf8");
//時間校正
$nt=strtotime("+7hour");//當天
$today=date("Y-m-d",$nt);

$time=date("H:i:s",$nt);
include_once("week.php");
?>