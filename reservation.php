<?php
if(!empty($_POST["id_doc"])){
    if(strlen($_POST["id_num"])=="10"){
        if(strlen($_POST["phone_num"])>="9"){
            if(strtotime($_POST["check_date"])>strtotime($today)){ 
                $sql="insert into req value(null,'".$_POST["id_doc"]."','".$_POST["id_num"]."','".$_POST["name"]."','".$_POST["birth"]."','".$_POST["phone_num"]."','".$_POST["check"]."','".$_POST["check_date"]."','".$_POST["check_time"]."')";
                mysqli_query($link,$sql);
                echo "<script>alert('預約成功');</script>";
                echo "<script>document.location.href='?td=worktime';</script>";
            }else{echo "<script>alert('本所不接受當日預約，若需當日看診請來電詢問或現場候診');</script>";} 
        }else{echo "<script>alert('請輸入正確的電話資訊若有區碼請加上');</script>";} 
    }else{echo "<script>alert('請輸入身分證字號有誤');</script>";}
}
$sql="select* from check_item";
$roc=mysqli_query($link,$sql);
$rocc=mysqli_fetch_assoc($roc);

$sql="select* from check_time";
$rot=mysqli_query($link,$sql);
$rott=mysqli_fetch_assoc($rot);

?>
<section class="mbr-fullscreen mbr-parallax-background " id="header2-5">
<div class="container align-center" style="">
    <div class="row justify-content-md-center">
        <div class="mbr-white col-md-10">
<form method="post" id="form" class="reqm" style=" transform:scale(0.9,0.9);">
		<div class="form-group">
            <label for=""><h4>預約醫師：<span id="doc"></span></h4></label>
			<input type="hidden" name="id_doc" id="doc_hide">
		</div>
		<div class="form-group">
			<label for=""><h4>身分證字號</h4></label>
			<input name="id_num" maxlength="10" required="required" class="form-control">
		</div>
		<div class="form-group">
            <label for=""><h4>姓　　名</h4></label>
            <input name="name" required="required" class="form-control">
		</div>
		<div class="form-group">
            <label for=""><h4>生　　日</h4></label>
            <input name="birth" type="date" value="1970-01-01" required="required" class="form-control">
        </div>
        <div class="form-group">
            <label for=""><h4>電　　話</h4></label>
            <input  name="phone_num" maxlength="10" placeholder="範例:0912345678"required="required" class="form-control">
        </div>
        <div class="form-group">
            <label for=""><h4>約診項目</h4></label>
            <select  name="check" style="text-align:center;" required="required" class="form-control">
                <option value="">請選擇</option>
                <?php do{?>
                    <option value="<?=$rocc["c_i_seq"]?>"><?=$rocc["c_item"]?></option>
                <?php }while($rocc=mysqli_fetch_assoc($roc));?>
                </select>

        </div>
        <div class="form-group">
            <label for=""><h4>預約日期：<span id="check_date2"></span></h4></label>
            
                 <span style="display:none;"><input id="check_date" name="check_date" type="date" value="" style="width:198px;"required="required"></span>
            </td>
        </div>
        <div class="form-group">
            <label for=""><h4>希望時段：<span id="check_time2"></span></h4></label>
            
            <select type="hidden" id="check_time" name="check_time"style="text-align:center;display:none;"required="required" >
                    <option value="">請選擇</option>
                    <?php do{?>
                    <option value="<?=$rott["c_t_seq"]?>"><?=$rott["c_time"]?></option>
                <?php }while($rott=mysqli_fetch_assoc($rot));?>
                </select>
		</div>
        <input type="submit" value="送出" class="btn btn-primary">
        <button type="button" class="btn btn-danger"  onclick="close_back()">關閉</button>
    </form>
    </section>