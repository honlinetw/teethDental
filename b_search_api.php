<?php
include_once("setdb.php");

if(!empty($_POST["idx"])){
    $sql="delete from req where r_seq='".$_POST["idx"]."'";
    mysqli_query($link,$sql);
}

if(!empty($_POST["es"])){
        $sql="update req set r_doc='".$_POST["ed"]."',
        r_phone='".$_POST["ep"]."',
        r_check='".$_POST["ec"]."',
        r_date='".$_POST["edate"]."',
        r_time= '".$_POST["et"]."',
		r_id= '".$_POST["eid"]."',
		r_name= '".$_POST["en"]."',
		r_birth= '".$_POST["ebd"]."'
        where r_seq='".$_POST["es"]."'";
        mysqli_query($link,$sql);		
}

$sql="select * from req  where r_id='".$_POST["id"]."' order by r_date desc";//做排序 大到小
$ro=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($ro);
$num=mysqli_num_rows($ro);
if($num!=0){
?>
 <form method="post">
 <div style="min-width:330px;max-width:400px; margin:0 auto;">
            <?php do{?>
                <table border="2" width="100%" align="center" style="border-color:#fff; <?php if(strtotime($today)>strtotime($row["r_date"])){echo 'background-color:rgba(220, 53, 69, 0.5)';}?>">
                    <tr>
                    <?php

                        $sql="select* from doc_name";
                        $rod=mysqli_query($link,$sql);
                        $rodd=mysqli_fetch_assoc($rod);    
                    
                    ?>
                        <td align="center" width="30%" height="40px">預約醫師</td>
                        <td align="left">
                        <select id="edit_doc<?=$row['r_seq']?>" class="form-control2">
                        <?php do{ 
                        $select_d="";
                        if($row["r_doc"]==$rodd["d_name"])
                        //約診項目編號與約診項目之talbe索引鍵相同時設為預設
                        {$select_d="selected='selected'";}
                        ?>
                            <option value="<?=$rodd["d_name"]?>" <?=$select_d?> >
                                <?=$rodd["d_name"]?></option>
                            <?php }while($rodd=mysqli_fetch_assoc($rod));?>
                        </td>
                                    
                    </tr>
                        <td align="center"  height="40px">身分證字號</td>
                        <td align="left"><input id="edit_id<?=$row['r_seq']?>" value="<?=$row["r_id"]?>" class="form-control2"></td>
                    <tr>
                        <td align="center"  height="40px">姓　　名</td>
                        <td align="left"><input id="edit_name<?=$row['r_seq']?>" value="<?=$row["r_name"]?>" class="form-control2"></td>
                    </tr>
                    <tr>
                        <td align="center"  height="40px">生　　日</td>
                        <td align="left"><input type="date" id="edit_birth<?=$row['r_seq']?>" value="<?=$row["r_birth"]?>" class="form-control2"></td>   
                    </tr>
                    <tr>
                        <td align="center"  height="40px">電　　話</td>
                        <td align="left">
                            <input id="edit_phone<?=$row['r_seq']?>" value="<?=$row["r_phone"]?>" maxlength="10" required="required" class="form-control2">
                        </td>
                    </tr>
                    <tr>
                        <?php
                        $sql="select* from check_item";
                        $roc=mysqli_query($link,$sql);
                        $rocc=mysqli_fetch_assoc($roc);    
                        ?>
                        <td align="center"  height="40px">約診項目</td>
                        <td align="left">
                        <select id="edit_check<?=$row['r_seq']?>" class="form-control2">
                        <?php do{ 
                        $select_c="";
                        if($row["r_check"]==$rocc["c_i_seq"])
                        //約診項目編號與約診項目之talbe索引鍵相同時設為預設
                        {$select_c="selected='selected'";}
                        ?>
                            <option value="<?=$rocc["c_i_seq"]?>" <?=$select_c?> >
                                <?=$rocc["c_item"]?></option>
                            <?php }while($rocc=mysqli_fetch_assoc($roc));?>
                        </select>    
                        </td>
                    </tr>
                    <tr>
                        <td align="center"  height="40px">預約日期</td>
                        <td align="left">
                            <input type="date" id="edit_date<?=$row['r_seq']?>" value="<?=$row["r_date"]?>" class="form-control2">
                            <div style="display:none;" id="check_date"><?=$today?></div>
                        </td>
                    </tr>
                    <tr>
                        <?php
                        $sql="select* from check_time";
                        $rot=mysqli_query($link,$sql);
                        $rott=mysqli_fetch_assoc($rot);    
                        ?>
                        <td align="center"  height="40px">希望時段</td>
                        <td align="left">
                            <select id="edit_time<?=$row['r_seq']?>" class="form-control2">
                                <?php do{
                                    $select_t="";
                                    if($row["r_time"]==$rott["c_t_seq"]){$select_t="selected='selected'";}
                                ?>
                                    <option value="<?=$rott["c_t_seq"]?>" <?=$select_t?>>
                                    <?=$rott["c_time"]?></option>
                            <?php }while($rott=mysqli_fetch_assoc($rot));?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2"  height="50px">
                        <div class="btn-edit">
                                    <div class="far fa-edit" style="margin-right:5px;"></div>修改
                                    <input type="button" style="position:absolute;font-size:60px;opacity:0;left:0" onclick="edit_btn(<?=$row['r_seq']?>)" value="修改">
                                </div>
                                <div class="btn-del btn-danger">
                                    <div class="fas fa-times" style="margin-right:5px;"></div>取消該筆
                                    <input type="button" style="position:absolute;font-size:35px;opacity:0;left:0" onclick="delete_btn(<?=$row['r_seq']?>)" value="取消該筆"> 
                                </div>
                        </td>
                    </tr>
                </table>
                <div style="height:30px"></div>
            <?php }while($row=mysqli_fetch_assoc($ro));?>
            </div>
        </form>    
    <?php }else{echo $num;} ?>