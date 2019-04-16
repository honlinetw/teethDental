<?php


function select_doc($x){
    $link = mysqli_connect("localhost","s1070205","s1070205","s1070205");
    mysqli_query($link,"set names utf8");
    $sql= "select d_name from doc_name where d_n_seq =".$x;
    $ro =mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($ro);//$row["d_name"]=醫師名字
    return $row["d_name"];//回傳醫師名字
}
?>

<script src="js/jquery.min.js"></script>
 <style>
body{
    color:black;
}
 </style>
 <!---------------------------------------------------------------蓋台--------------------------------------------------------------->    
 <div id="back" class="overflowy" onclick="">
           <?php include_once("reservation.php")?>
</div>
<!---------------------------------------------------------------蓋台--------------------------------------------------------------->    

 <!-----------------------------------------------內容----------------------------------------------->

 <section class=" mbr-fullscreen mbr-parallax-background" id="header2-5" style="background-image:url('./images/pexels-photo-317356.jpeg')">
 <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 0, 0);"></div>
<div class="container align-center">
    <div class="row justify-content-md-center">
        <div class="mbr-black col-md-12 mytable">
            <div class="row card">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center mb30 ">
                <h4 class="mbr-white pagetitle">門診時間</h4>
                <marquee><span style="color:#fff;">本所不接受當日預約，若需當日看診請來電詢問或現場候診</span></marquee>
                </div>
                    <form method="post" style="width:100%">
                         <div class="table-responsive wtw card">
                            <table class="timetable table table-striped mbr-brown"  style="background-color:rgba(255,255,255,0.7)">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col"></th>
                                        <th scope="col">星期日<br><span style="color:red;"><?=$sun?></span></th>
                                        <th scope="col">
                                            星期一<br><?=$mon?>
                                            <input id="date_1" type="hidden" value="<?=$date[1]?>">
                                        </th>
                                        <th scope="col">
                                            星期二<br><?=$tue?>
                                            <input id="date_2" type="hidden" value="<?=$date[2]?>">
                                        </th>
                                        <th scope="col">
                                            星期三<br><?=$wed?>
                                            <input id="date_3" type="hidden" value="<?=$date[3]?>">
                                        </th>
                                        <th scope="col">
                                            星期四<br><?=$thu?>
                                            <input id="date_4" type="hidden" value="<?=$date[4]?>">
                                        </th>
                                        <th scope="col">
                                            星期五<br><?=$fri?>
                                            <input id="date_5" type="hidden" value="<?=$date[5]?>">
                                        </th>
                                        <th scope="col">
                                            星期六<br><?=$sat?>
                                            <input id="date_6" type="hidden" value="<?=$date[6]?>">
                                        </th>
                                        
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php
                                        $sql="select * from work_time where w_t_seq=1";
                                        $ro1=mysqli_query($link,$sql);
                                        $row1=mysqli_fetch_assoc($ro1);
                                    ?>
                                    <tr class="text-center tr-size" style="vertical-align:center;">
                                        <td class="td-size td-pos"><b>早診︱09:00-13:00</b>
                                            <div id="ct1" style="display:none;">早診︱09:00-13:00</div>
                                            <input id="time1" type="hidden" value="1">
                                        </td>
                                        <td></td>
                                        <?php for($i=1;$i<7;$i++){ ?>
                                            <td class="td-pos">
                                               <span id="doc_name<?=$row1['wt_'.$i]?>"><?=select_doc($row1["wt_".$i])?></span><br>
                                               <?php if($date[$i] > $today) { ?>
                                                    <span my class="my-b-c" onclick="open_back(<?=$row1['wt_'.$i]?>,1,<?=$i?>)">預約</span>
                                                <?php }?>
                                            </td>
                                            <?php }?>
                                        
                                     </tr>
                                     <!--
                                        <?=select_doc($row1["wt_".$i])?> //以PHP執行這個程式片段[ function select_doc($i) ]，得到結果值$row["d_name"]。接著因為<?=$row["d_name"]?>直接echo出來
                                        <?=$txt?> 等於 <?php echo $txt;?>
                                    -->
                                    <tr class="text-center">
                                        <td>中午休息︱13:00-14:00 </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php
                                        $sql="select * from work_time where w_t_seq=3";
                                        $ro3=mysqli_query($link,$sql);
                                        $row3=mysqli_fetch_assoc($ro3);
                                    ?>
                                    <tr class="text-center">
                                        <td class="td-size td-pos"><b>午診︱14:00-18:00</b>
                                            <input id="time3" type="hidden" value="2">
                                            <div id="ct3" style="display:none;">午診︱14:00-18:00</div>
                                        </td>
                                        <td style="vertical-align:middle; font-size:2em;" >休息</td>
                                        <?php for($i=1;$i<7;$i++){ ?>
                                            <td class="td-pos">
                                               <span id="doc_name<?=$row3['wt_'.$i]?>"><?=select_doc($row3["wt_".$i])?></span><br>
                                               <?php if($date[$i] > $today) { ?>
                                                    <span my class="my-b-c" onclick="open_back(<?=$row3['wt_'.$i]?>,3,<?=$i?>)">預約</span>
                                                <?php }?>
                                            </td>
                                            <?php }?>
                                        
                                    </tr>
                                    <tr class="text-center">
                                        <td>晚上休息︱18:00-19:30</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php
                                        $sql="select * from work_time where w_t_seq=5";
                                        $ro5=mysqli_query($link,$sql);
                                        $row5=mysqli_fetch_assoc($ro5);
                                    ?>
                                    <tr class="text-center">
                                        <td  class="td-size td-pos"><b>晚診︱19:30-22:00</b>
                                            <input id="time5" type="hidden" value="3">
                                            <div id="ct5" style="display:none;">晚診︱19:30-22:00</div>
                                         </td>
                                         <td class="td-pos"></td>
                                        <?php for($i=1;$i<7;$i++){ ?>
                                            <td class="td-pos">
                                               <span id="doc_name<?=$row5['wt_'.$i]?>"><?=select_doc($row5["wt_".$i])?></span><br>
                                               <?php if($date[$i] > $today) { ?>
                                                    <span my class="my-b-c" onclick="open_back(<?=$row5['wt_'.$i]?>,5,<?=$i?>)">預約</span> 
                                                <?php }?>
                                            </td>
                                            <?php }?>
                                        
                                    </tr>
 
                                </tbody>
                            </table>
                            </div>

                            <div class="wtm" style="width:100%; margin:0 auto;">
                <?php
                $sql="select wt_1 from work_time where w_t_seq=1";
                $mo1=mysqli_query($link,$sql);
                $mow1=mysqli_fetch_assoc($mo1);

                $sql="select wt_1 from work_time where w_t_seq=3";
                $mo3=mysqli_query($link,$sql);
                $mow3=mysqli_fetch_assoc($mo3);

                $sql="select wt_1 from work_time where w_t_seq=5";
                $mo5=mysqli_query($link,$sql);
                $mow5=mysqli_fetch_assoc($mo5);
                $set[1]="早診︱09:00-13:00";
                $set[2]="中午休息︱13:00-14:00";
                $set[3]="午診︱14:00-18:00";
                $set[4]="晚上休息︱18:00-19:30";
                $set[5]="晚診︱19:30-22:00";
                ?>
                    <select id="mday" class="form-control3" onchange="selectday()">
                        <option value="1"><?=$mon?> 星期一 </option>
                        <option value="2"><?=$tue?> 星期二 </option>
                        <option value="3"><?=$wed?> 星期三 </option>
                        <option value="4"><?=$thu?> 星期四 </option>
                        <option value="5"><?=$fri?> 星期五 </option>
                        <option value="6"><?=$sat?> 星期六 </option>
                    </select>
                    <br><br>
                    <div style="max-width:768px" class="mbr-brown">
                        <div style="min-width:350px" id="mtable">
                        <input type="hidden" id="date_1" type="" value="<?=$date[1]?>">
                        <div class="card" style="background-color:rgba(255,255,255,0.85)">
                        <table width="100%" border="0">
                                <tr>
                                    <td>
                                    <div class="card-header"><?=$set[1]?></div>
                                    <div id="ct1" style="display:none;">早診︱09:00-13:00</div>
                                    <input id="time1" type="hidden" value="1">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="card-body">
                                            <h5 id="doc_name<?=$mow1["wt_1"]?>"><?=select_doc($mow1["wt_1"])?></h5>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <?php if($date[1] > $today) { ?>
                                    <span class="my-b-c btn btn-primary" onclick="open_back(<?=$mow1['wt_1']?>,1,1)">預約</span>
                                    <?php }?>
                                    </td>
                                </tr>
                            </table>
                            </div>
                            <br>
                            <div class="card" style="background-color:rgba(255,255,255,0.85)">
                            <table width="100%" border="0">
                                <tr>
                                    <td>
                                    <div class="card-header"><?=$set[3]?></div>
                                    <div id="ct3" style="display:none;">午診︱14:00-18:00</div>
                                    <input id="time3" type="hidden" value="3">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="card-body">
                                            <h5 id="doc_name<?=$mow3["wt_1"]?>"><?=select_doc($mow3["wt_1"])?></h5>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <?php if($date[1] > $today) { ?>
                                    <span class="my-b-c" onclick="open_back(<?=$mow3['wt_1']?>,3,1)">預約</span>
                                    <?php }?>
                                    </td>
                                </tr>
                            </table>
                            </div>
                            <br>
                            <div class="card" style="background-color:rgba(255,255,255,0.85)">
                            <table width="100%" border="0">
                                <tr>
                                    <td>
                                    <div class="card-header"><?=$set[5]?></div>
                                    <div id="ct5" style="display:none;">晚診︱19:30-22:00</div>
                                    <input id="time5" type="hidden" value="5">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="card-body">
                                            <h5 id="doc_name<?=$mow5["wt_1"]?>"><?=select_doc($mow5["wt_1"])?></h5>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <?php if($date[1] > $today) { ?>
                                    <span class="my-b-c" onclick="open_back(<?=$mow5['wt_1']?>,5,1)">預約</span>
                                    <?php }?>
                                    </td>
                                </tr>
                            </table>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                        </form>
            </div>
  
        </div>
    </div>
</div>

</section>
  <!-----------------------------------------------內容----------------------------------------------->   

<script>
function selectday(){
    var mday = document.getElementById("mday").value;
    $("#mtable").html("");
    $.post("mdayapi.php",{mday},function(o){
        $("#mtable").html(o);
    })
}

function close_back(){
    document.getElementById("back").style.display="none";
}
function open_back(x,y,z){
    document.getElementById("back").style.display="block";
    
    function get_name(){
        get_doc=document.getElementById("doc_name"+x).innerHTML;
        document.getElementById("doc").innerHTML=get_doc;
        document.getElementById("doc_hide").value=get_doc; 
    } 
    get_name();
    function get_time(){
        get_d1=document.getElementById("date_"+z).value;//抓隱藏date值
        document.getElementById("check_date").value=get_d1;//將date值傳到預約日期
        document.getElementById("check_date2").innerHTML=get_d1;//將date值傳到預約日期

        get_t1=document.getElementById("time"+y).value;//抓隱藏time值
        get_t2=document.getElementById("ct"+y).innerHTML;
        document.getElementById("check_time").value=get_t1;//希望時段 隱藏的input
        document.getElementById("check_time2").innerHTML=get_t2;//希望時段 顯示的span
    } get_time();
}

</script>