<?php

if(!empty($_POST["delseq"])){
    $sql="delete from req where r_seq='".$_POST["delseq"]."'";
    mysqli_query($link,$sql);
	
}

if(!empty($_POST["upseq"])){
	if(strtotime($_POST["edit_date"])>=strtotime($today)){ 
        $sql="update req set r_doc='".$_POST["r_doc"]."',
        r_phone='".$_POST["edit_phone"]."',
        r_check='".$_POST["edit_check"]."',
        r_date='".$_POST["edit_date"]."',
        r_time= '".$_POST["edit_time"]."',
		r_id= '".$_POST["r_id"]."',
		r_name= '".$_POST["r_name"]."',
		r_birth= '".$_POST["r_birth"]."'
        where r_seq='".$_POST["upseq"]."'";
        mysqli_query($link,$sql);
	}else{echo "<script>alert('修改失敗:日期')</script>";}
}



$sql="select * from req order by r_date desc";//做排序 大到小
$ro=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($ro);
?>
<style>
#my-search{
    font-size:1.7em;
    text-align:center;
}    
#show-back{
    font-size:1.25em;
    text-align:left;
    margin:30px auto 0 auto;
    background-color:aqua;
    width:480px;
    display:block;
}
#tab1{
    display:block;
}

</style>
<section class=" mbr-fullscreen mbr-parallax-background" id="header2-5" >
<div style="background-image:url('./images/search.jpg');width: 100%;height: 100%; position: fixed; top: 0;background-size: cover;background-position: 50% 50%;"></div>
<div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(35, 35, 35);"></div>
<div class="container align-center">
    <div class="row justify-content-md-center">
        <div class="mbr-black col-md-12 mytable">
        <h2 style="margin-bottom:20px;" class="mbr-white inputid">請輸入身分證字號</h2>
<form method="post" class="form-inline active-cyan-3 active-cyan-4">
<h3><i class="fas fa-search hide-fa-search mbr-white" aria-hidden="true"></i></h3>
  <input id="id" name="s_c_id" class="form-control form-control2-sm ml-3 w-90" type="text" placeholder="Search" aria-label="Search" maxlength="10">
  <div style="width:100%;margin:10px auto 0px auto;">
    <input type="button" value="送出" onclick="search_btn()" class="btn btn-primary">
    <input type="button" class="btn btn-danger" value="重新輸入" onclick="cleanall()">
  </div>
</form>

<div style="height:20px;"></div>
          
    <div id="tab1"  class="table-responsive  mbr-white">
        <div style="min-width:330px;max-width:400px; margin:0 auto;">
	  <?php do{?>
		<form method="post">
                      <table border="2" width="100%" align="center"  style="border-color:#fff; <?php if(strtotime($today)>strtotime($row["r_date"])){echo 'background-color:rgba(220, 53, 69, 0.5)';}?>">
                    <tr>
                    <?php

                        $sql="select* from doc_name";
                        $rod=mysqli_query($link,$sql);
                        $rodd=mysqli_fetch_assoc($rod);    
                    
                    ?>
                        <td align="center" width="30%" height="40px">預約醫師</td>
                        <td align="left">
                        <select name="r_doc" class="form-control2">
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
                        <td align="left"><input name="r_id" value="<?=$row["r_id"]?>" class="form-control2"></td>
                    <tr>
                        <td align="center"  height="40px">姓　　名</td>
                        <td align="left"><input name="r_name" value="<?=$row["r_name"]?>" class="form-control2" class="form-control2"></td>
                    </tr>
                    <tr>
                        <td align="center"  height="40px">生　　日</td>
                        <td align="left"><input type="date" name="r_birth" value="<?=$row["r_birth"]?>" class="form-control2"></td>   
                    </tr>
                    <tr>
                        <td align="center"  height="40px">電　　話</td>
                        <td align="left">
                            <input name="edit_phone" value="<?=$row["r_phone"]?>" maxlength="10" required="required" class="form-control2">
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
                        <select name="edit_check" class="form-control2">
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
                        <td align="center"  height="40px" >預約日期</td>
                        <td align="left">
                            <input type="date" name="edit_date" value="<?=$row["r_date"]?>" class="form-control2">
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
                            <select name="edit_time"  class="form-control2">
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
                        <td align="center"  colspan="2" height="50px">
                        <div class="btn-edit">
                                    <div class="far fa-edit" style="margin-right:5px;"></div>修改
                                    <input type="submit" style="position:absolute;font-size:60px;opacity:0;left:0" value="修改">
                                    <input type="hidden" name="upseq" onclick="" value="<?=$row["r_seq"]?>">
                                </div>
		</form>
							<form method="post" style="display:inline;">
                            <div class="btn-del btn-danger">
                                    <div class="fas fa-times" style="margin-right:5px;"></div>取消該筆
                                    <input type="submit" style="position:absolute;font-size:35px;opacity:0;left:0" value="取消該筆"> 
                                    <input type="hidden" name="delseq" onclick="" value="<?=$row["r_seq"]?>">
                                </div>
							</form>
                        </td>
                    </tr>
                </table>
              
                <div style="height:30px"></div>
                    <?php }while($row=mysqli_fetch_assoc($ro));?>
         </div>
    </div>
        
            <div id="tab2" class="table-responsive  mbr-white" style="display:none;" >

            </div>
        </div>
    </div>
</div>

</section>








<script>
    function cleanall(){
    $("#tab2").hide();
    $("#id").val("");
}
/*============搜尋============*/
function search_btn(){
    id=document.getElementById("id").value;
    // document.getElementById("tab1").style.display="none";
    //document.getElementById("tab2").style.display="block";
    $.post("b_search_api.php",{id},function(o){
        if(o !="0"){
            document.getElementById("tab2").innerHTML=o;
                document.getElementById("tab1").style.display="none";
                document.getElementById("tab2").style.display="block";
        }else{ alert("請輸入正確的身分證字號");}
    });
}
/*============刪除============*/
function delete_btn(idx){
    var r=confirm("取消此筆預約?");
    if(r==true){
        id=document.getElementById("id").value;
        $.post("b_search_api.php",{idx,id},function(o){
            document.getElementById("tab2").innerHTML=o;
            if(o==0){
                document.getElementById("tab1").style.display="block";
                document.getElementById("tab2").style.display="none";
            }
        });
    }
}
/*============修改============*/
function edit_btn(es){
    id=document.getElementById("id").value;
    ed=document.getElementById("edit_doc"+es).value;
	
	eid=document.getElementById("edit_id"+es).value;
    en=document.getElementById("edit_name"+es).value;
    ebd=document.getElementById("edit_birth"+es).value;
	
    ep=document.getElementById("edit_phone"+es).value;
    ec=document.getElementById("edit_check"+es).value;
    edate=document.getElementById("edit_date"+es).value;
    cdate=document.getElementById("check_date").innerHTML;//當天日期
    et=document.getElementById("edit_time"+es).value;
    if(ep.length>=9){
        if(edate>=cdate){
            $.post("b_search_api.php",{es,ed,ep,ec,edate,et,id,eid,en,ebd},function(o){
                document.getElementById("tab2").innerHTML=o;
                alert("修改成功");
            });  
        }else{
                $.post("b_search_api.php",{id},function(o){
                    document.getElementById("tab2").innerHTML=o;
                    alert("修改失敗:預約日期");
                });
             }
    }else{
            $.post("b_search_api.php",{id},function(o){
                document.getElementById("tab2").innerHTML=o;
                alert("修改失敗:電話");
            });
        }
}
</script>

