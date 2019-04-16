<?php
if(!empty($_SESSION["acc"])){
include_once("setdb.php");/*-----------------------------------------全部完成記得刪掉*/

if(!empty($_POST["r1"])){
    $sql="update work_time set wt_1='".$_POST["m11"]."',wt_2='".$_POST["m12"]."',wt_3='".$_POST["m13"]."',wt_4='".$_POST["m14"]."',
    wt_5= '".$_POST["m15"]."',wt_6= '".$_POST["m16"]."' where w_t_seq='".$_POST["r1"]."'";
    //echo $sql."<br>";
    mysqli_query($link,$sql);
}
if(!empty($_POST["r3"])){
    $sql="update work_time set wt_1='".$_POST["m21"]."',wt_2='".$_POST["m22"]."',wt_3='".$_POST["m23"]."',wt_4='".$_POST["m24"]."',
    wt_5= '".$_POST["m25"]."',wt_6= '".$_POST["m26"]."' where w_t_seq='".$_POST["r3"]."'";
    //echo $sql."<br>";
    mysqli_query($link,$sql);
}
if(!empty($_POST["r5"])){
    $sql="update work_time set wt_1='".$_POST["m31"]."',wt_2='".$_POST["m32"]."',wt_3='".$_POST["m33"]."',wt_4='".$_POST["m34"]."',
    wt_5= '".$_POST["m35"]."',wt_6= '".$_POST["m36"]."' where w_t_seq='".$_POST["r5"]."'";
    //echo $sql."<br>";
    mysqli_query($link,$sql);
}

?>
<script src="js/jquery.min.js"></script>

 <style>

 </style>
 <!-----------------------------------------------內容----------------------------------------------->
 <section class=" mbr-fullscreen mbr-parallax-background" id="header2-5" style="background-image:url('./images/pexels-photo-317356.jpeg')">
 <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 0, 0);"></div>
<div class="container-fluid align-center">
    <div class="row justify-content-md-center">
        <div class="col-md-12 mytable">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center mb30" style="margin-bottom:20px;">
                <h2 class="mbr-white">班表調整</h2>
                </div>
                <div class="table-responsive card">
                    <form method="post">
                    <table class="timetable table table-striped mbr-brown" style="background-color:rgba(255,255,255,0.7)">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">星期日</th>
                                        <th scope="col"></th>
                                        <th scope="col">星期一</th>
                                        <th scope="col">星期二</th>
                                        <th scope="col">星期三</th>
                                        <th scope="col">星期四</th>
                                        <th scope="col">星期五</th>
                                        <th scope="col">星期六</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql="select * from work_time where w_t_seq=1";
                                        $ro1=mysqli_query($link,$sql);
                                        $row1=mysqli_fetch_assoc($ro1);
                                    ?>
                                    <tr class="text-center tr-size" style="vertical-align:center;">
                                        <td class="td-size td-pos"><b>早診︱09:00-13:00</b></td>
                                        <td></td>
                                        <?php for($i=1;$i<7;$i++){
                                            $sql="select *from doc_name";
                                            $ro =mysqli_query($link,$sql);
                                            $row=mysqli_fetch_assoc($ro);    
                                            ?>
                                            <td class="td-pos">
                                            <input type="hidden" value="1" name="r1">
                                                <select name="m1<?=$i?>" class="form-control">
                                                <?php do{
                                                    $select="";
                                                    if($row1["wt_".$i]==$row["d_n_seq"]){$select="selected='selected'";}?>
                                                    <option value="<?=$row["d_n_seq"]?>"<?=$select?>><?=$row["d_name"]?></option>
                                                <?php }while($row=mysqli_fetch_assoc($ro));?>
                                                </select>
                                            </td>
                                        <?php }?>
                                      
                                     </tr>


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
                                        <td class="td-size td-pos"><b>午診︱14:00-18:00</b></td>
                                        <td style="vertical-align:middle; font-size:2em;" >休息</td>
                                        <?php for($i=1;$i<7;$i++){
                                            $sql="select *from doc_name";
                                            $ro =mysqli_query($link,$sql);
                                            $row=mysqli_fetch_assoc($ro);    
                                            ?>
                                            <td class="td-pos">
                                            <input type="hidden" value="3" name="r3">
                                                <select name="m2<?=$i?>" class="form-control">
                                                <?php do{
                                                    $select="";
                                                    if($row3["wt_".$i]==$row["d_n_seq"]){$select="selected='selected'";}?>
                                                    <option value="<?=$row["d_n_seq"]?>" <?=$select?>><?=$row["d_name"]?></option>
                                                <?php }while($row=mysqli_fetch_assoc($ro));?>
                                                </select>
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
                                        <td class="td-size td-pos"><b>晚診︱19:30-22:00</b></td>
                                        <td class="td-pos"></td>
                                        <?php for($i=1;$i<7;$i++){
                                            $sql="select *from doc_name";
                                            $ro =mysqli_query($link,$sql);
                                            $row=mysqli_fetch_assoc($ro);    
                                            ?>
                                            <td class="td-pos">
                                            <input type="hidden" value="5" name="r5">
                                                <select name="m3<?=$i?>" class="form-control">
                                                <?php do{
                                                    $select="";
                                                    if($row5["wt_".$i]==$row["d_n_seq"]){$select="selected='selected'";}?>
                                                    <option value="<?=$row["d_n_seq"]?>" <?=$select?>><?=$row["d_name"]?></option>
                                                <?php }while($row=mysqli_fetch_assoc($ro));?>
                                                </select>
                                            </td>
                                        <?php }?>
                                        
                                    </tr>
                                    <tr>
                                        <td align="center" colspan="8">
                                            <input type="submit" class="btn btn-primary" value="修改">
                                            <input type="reset"  class="btn btn-danger"value="重置">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                </div>
            </div>
  
        </div>
    </div>
</div>
</section>


  <!-----------------------------------------------內容----------------------------------------------->   
<script>

</script>

<?php }else{ header("location:main.php");}?>