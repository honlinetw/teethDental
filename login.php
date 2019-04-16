<?php
if(!empty($_POST["myid"])){
    $sql="select *from login where l_acc='".$_POST["myid"]."'and l_pw ='".$_POST["mypw"]."' ";
    $login=mysqli_query($link,$sql);
    $row_l=mysqli_num_rows($login);
    if($row_l==1){ 
        $_SESSION["acc"] = $_POST["myid"];
        echo "<script>document.location.href='admin.php'</script>;";
    }
    else{
        $sql="select *from login where l_acc='".$_POST["myid"]."'";
        $check=mysqli_query($link,$sql);
        $check2=mysqli_num_rows($check);
        if($check2==1){ echo "<script>alert('密碼錯誤');</script>";
        }else{echo "<script>alert('帳號不存在');</script>";}
    }
}
?>
<style>
.form-btn{
    margin:0px auto;
    font-family: Ubuntu-Bold;
    font-size: 18px;
    color: #fff;
    line-height: 1.2;
    text-transform: uppercase;
    background-color:#4557b2 ;
    border-width:0px;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0 20px;
    min-width: 160px;
    height: 42px;
    border-radius: 21px;
    position: relative;
    z-index: 1;
    transition: all 0.4s;
}

</style>
<section class="header4 cid-rlISJBa738 mbr-fullscreen mbr-parallax-background" id="header4-9" style="background-image:url('./images/indexbg.jpg')">
<div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(35, 35, 35);">
</div>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="media-content col-md-10">
            <div class="mbr-text  mbr-white pb-3">
<div style="max-width:350px;border-radius:10px;overflow:hidden;background:transparent; margin:0 auto;" class="login-m card">
          <span style="font-size:28px;color:#fff;text-align:center;line-height:1.2;text-transform:uppercase;display:block;margin-bottom:15px;">Account Login</span>
          <form  method="post" style="width:100%;background-color:#fff;border-radius:10px;">
            <div class="card-body" style="width:100%;border-bottom:1px solid #e6e6e6; padding:29px 0;">
                <div class="fas fa-user" style="color:#757575;position: relative;top: 4px;font-size:30px;    margin: 0 10px 0 15px;"></div>
                <div style="display:inline-block; width: 80%;"><input class="form-control login-m-input" type="text" name="myid" placeholder="User name"></div>
            </div>
            <div class="card-body" style="width:100%;border-bottom:1px solid #e6e6e6; padding:29px 0;">
                <div class="fas fa-lock" style="color:#757575;position: relative;top: 4px;font-size:30px;    margin: 0 10px 0 15px;"></div>
                <div style="display:inline-block; width: 80%;"><input class="form-control login-m-input" type="password" name="mypw" placeholder="Password"></div>
            </div>
            <div style="width:100%;border-bottom:1px solid #e6e6e6; padding:29px 0;">
                <input class="form-btn btn" type="submit" value="login">
			</div>
          </form>
</div>
            </div>
        </div>
    </div>
</div>
</section>

<script>

</script>