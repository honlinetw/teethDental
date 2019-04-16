<?php
if(!empty($_SESSION["acc"])){
/*======================新增=========================*/
if(!empty($_FILES["doc_pic"]["name"])){
$ram=rand(100000,999999);
$doc = "doc".$ram.".jpg";
$sql="insert into doc_name value(null,'".$_POST["doc_name"]."','".$doc."','".nl2br($_POST["doc_con"])."')";
mysqli_query($link,$sql);
copy($_FILES["doc_pic"]["tmp_name"],"docpic/".$doc);
}
/*======================新增=========================*/
/*======================修改=========================*/
if(!empty($_POST["d_update"])){
    $sql="update doc_name set d_name='".$_POST["edoc_name"]."',d_con='".$_POST["edoc_con"]."' where d_n_seq='".$_POST["d_update"]."'";
    mysqli_query($link,$sql);
    if(!empty($_FILES["edoc_pic"]["name"])){
        copy($_FILES["edoc_pic"]["tmp_name"],"docpic/".$_POST["e_pic"]);
    }
    echo "<script>document.location.href='?td=b_doc'</script>";
}
/*======================修改=========================*/

/*======================刪除=========================*/
if(!empty($_POST["d_del"])){
    $sql="delete from doc_name where d_n_seq='".$_POST["d_del"]."'";
    unlink("docpic/".$_POST["e_pic"]);
    mysqli_query($link,$sql);
}
/*======================刪除=========================*/
$sql="select*from doc_name ";
$ro=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($ro);

?>
<style>
.updiv:hover{
    box-shadow: 0 0 6px rgba(35, 173, 255, 1);
}
.updiv{
  position: relative;
  overflow: hidden;
  background-color:#0ebfbf;
  width:80%;
  color:#fff;
  box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.2);
}

.upfile{
  position: absolute;
  font-size: 50px;
  opacity: 0;
  right: 0;
  top: 0;
}
.upinput{
    display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.editbtn{

    font-weight: 500;
    border-width: 2px;
    font-style: normal;
    letter-spacing: 1px;
    margin: .4rem .8rem;
    transition: all 0.3s ease-in-out;
    word-break: break-word;
    display: -webkit-inline-flex;
    border-radius: 3px;
    font-family: "微軟正黑體";
}
.delbtn{
    font-weight: 500;
    border-width: 2px;
    font-style: normal;
    letter-spacing: 1px;
    margin: .4rem .8rem;
    transition: all 0.3s ease-in-out;
    word-break: break-word;
    display: -webkit-inline-flex;
    border-radius: 3px;
    font-family: "微軟正黑體";
    background-color:#dc3545;
}
</style>
<section class="header4 cid-rlISJBa738 mbr-fullscreen mbr-parallax-background" id="header4-9" style="background-image:url('./images/indexbg.jpg')">
<div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(35, 35, 35);">
</div>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="media-content col-md-10">
            <div class="mbr-text align-center mbr-white pb-3">
                <div style="margin-top:30px;">
            <fieldset>
<legend>新增</legend>
<form method="post" enctype="multipart/form-data">
    <div class="table-responsive">
    <table border="2" align="center" width="360px" style="border-color:#fff;">
        <tr>
            <td align="center" width="150" height="50">醫生姓名:</td>
            <td><input name="doc_name" class="upinput"></td>
        </tr>
        <tr>
            <td align="center" width="150" height="50">簡介:</td>
            <td><textarea style="height:140px;" name="doc_con" class="form-control"></textarea></td>
        </tr>
        <tr>
            <td align="center"  height="50">醫生照片:</td>
            <td>
                <div class="updiv file btn btn-sm" >
                <i class="fas fa-file-upload" style="font-size:1.25rem;margin:0 12px 0 -8px"></i>
                file
							<input  class="upfile"  type="file" name="doc_pic">
				</div>
            
            </td>

        </tr>
        <tr>
            <td align="center" colspan="2"  height="30">
            <input type="submit" class="editbtn btn-primary" value="新增" ><input type="reset" class="delbtn btn-danger">
            </td>
        </tr>
    </table>
    </div>
</form>
</fieldset>
<!--------------------------修改-------------------->
<fieldset>
<legend>修改</legend>
<div class="table-responsive">
    <table border="2" align="center" width="100%" style="border-color:#fff;">
        <tr>
            <td align="center" height="50px" >照　　片:</td>
            <td align="center" width="20%" >醫生姓名:</td>
            <td align="center" width="55%" >簡介</td>
            <td align="center" width="5%" ></td>
        </tr>
        <?php do{ ?>
        <tr>
<form method="post" enctype="multipart/form-data">
            <td  align="center" valign="middle">
                <img src="docpic/<?=$row["d_pic"]?>" width="100px" height="100px">
                <div><?=$row["d_pic"]?></div>
                <input type="hidden" name="e_pic" value="<?=$row["d_pic"]?>">
            </td>
            <td>
                <input name="edoc_name" value="<?=$row["d_name"]?>" class="upinput">
                <div class="updiv file btn btn-sm">
                <i class="fas fa-file-upload" style="font-size:1rem;margin:0 12px 0 -8px"></i>
                file
							<input  class="upfile" type="file" name="edoc_pic">
				</div>
            </td>
            <td>
                <textarea style="width:100%;height:150px;" name="edoc_con" class="form-control"><?=$row["d_con"]?></textarea>
            </td>
            <td height="150">
                <input type="hidden" value="<?=$row["d_n_seq"]?>" name="d_update" style="width:100%">
                <input type="submit" value="修改" class="editbtn btn-primary">
</form>

            <form method="post">
                <input type="hidden" value="<?=$row["d_n_seq"]?>" name="d_del" style="width:100%">
                <input type="hidden" name="e_pic" value="<?=$row["d_pic"]?>">
                <br><input type="submit"value="刪除" class="delbtn btn-danger">
            </form>                
            
            </td>
        </tr>
        <?php }while($row=mysqli_fetch_assoc($ro));?>
    </table>
</fieldset>
<?php }else{ header("location:main.php");}?>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
