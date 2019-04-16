<?php
include("setdb.php");
function select_doc($x){
    $link = mysqli_connect("localhost","s1070205","s1070205","s1070205");
    mysqli_query($link,"set names utf8");
    $sql= "select d_name from doc_name where d_n_seq =".$x;
    $ro =mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($ro);//$row["d_name"]=醫師名字
    return $row["d_name"];//回傳醫師名字
}
$x=$_POST["mday"];
$sql="select wt_".$x." from work_time where w_t_seq=1";
$mo1=mysqli_query($link,$sql);
$mow1=mysqli_fetch_assoc($mo1);

$sql="select wt_".$x." from work_time where w_t_seq=3";
$mo3=mysqli_query($link,$sql);
$mow3=mysqli_fetch_assoc($mo3);

$sql="select wt_".$x." from work_time where w_t_seq=5";
$mo5=mysqli_query($link,$sql);
$mow5=mysqli_fetch_assoc($mo5);
$set[1]="早診︱09:00-13:00";
$set[2]="中午休息︱13:00-14:00";
$set[3]="午診︱14:00-18:00";
$set[4]="晚上休息︱18:00-19:30";
$set[5]="晚診︱19:30-22:00";
?>
                        <input type="hidden" id="date_<?=$x?>" type="" value="<?=$date[$x]?>">
                        <div class="card" style="background-color:rgba(255,255,255,0.85)">
                        <table width="100%" border="0">
                                <tr>
                                    <td>
                                    <div  class="card-header" ><?=$set[1]?></div>
                                    <div id="ct1" class="card-header" style="display:none;">早診︱09:00-13:00</div>
                                    <input id="time1" type="hidden" value="1">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="card-body">
                                            <h5 id="doc_name<?=$mow1["wt_".$x]?>"><?=select_doc($mow1["wt_".$x])?></h5>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <?php if($date[$x] > $today) { ?>
                                    <div class="card-footer">
                                        <span class="my-b-c" onclick="open_back(<?=$mow1['wt_'.$x]?>,1,<?=$x?>)">預約</span>
                                    </div>
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
                                    <div id="ct3"  style="display:none;">午診︱14:00-18:00</div>
                                    <input id="time3" type="hidden" value="3">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="card-body">
                                            <h5 id="doc_name<?=$mow3["wt_".$x]?>" ><?=select_doc($mow3["wt_".$x])?></h5>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <?php if($date[$x] > $today) { ?>
                                        <div class="card-footer">
                                            <span class="my-b-c" onclick="open_back(<?=$mow3['wt_'.$x]?>,3,<?=$x?>)">預約</span>
                                        </div>
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
                                    <div id="ct5"  style="display:none;">晚診︱19:30-22:00</div>
                                    <input id="time5" type="hidden" value="5">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="card-body">
                                            <h5 id="doc_name<?=$mow5["wt_".$x]?>"><?=select_doc($mow5["wt_".$x])?></h5>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <?php if($date[$x] > $today) { ?>
                                        <div class="card-footer">
                                            <span class="my-b-c" onclick="open_back(<?=$mow5['wt_'.$x]?>,5,<?=$x?>)">預約</span>
                                        </div>
                                    <?php }?>
                                    </td>
                                </tr>
                            </table>
                            </div>
                            <br>