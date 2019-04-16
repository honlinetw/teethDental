<?php

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
@media (max-width: 472px) {
.hide-fa-search{
    display:none;
    }
}
</style>

<section class=" mbr-fullscreen mbr-parallax-background" id="header2-5" style="background-image:url('./images/search.jpg')">
<div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(35, 35, 35);"></div>
<div class="container align-center">
    <div class="row justify-content-md-center">
        <div class="mbr-black col-md-12 mytable">
        <h4 style="margin-bottom:20px;" class="mbr-white inputid pagetitle">請輸入身分證字號</h4>
<form method="post" class="form-inline active-cyan-3 active-cyan-4">
<h3><i class="fas fa-search hide-fa-search mbr-white" aria-hidden="true"></i></h3>
  <input id="id" name="s_c_id" class="form-control form-control-sm ml-3 w-90" type="text" placeholder="Search" aria-label="Search" maxlength="10">
  <div style="width:100%;margin:10px auto 0px auto;">
    <input type="button" value="送　　出" onclick="search_btn()" class="btn btn-primary">
    <input type="button" class="btn btn-danger" value="重新輸入" onclick="cleanall()">
  </div>
</form>
<!--
<div style="height:20px;"></div>
    <div id="tab1">
        <table border="solid;" width="400px" align="center" class="mbr-black">
                <tr>
                    <td align="center" width="30%"  height="40px">預約醫師</td>
                    <td align="left"></td>
                                
                </tr>
                    <td align="center"  height="40px">身分證字號</td>
                    <td align="left"></td>
                <tr>
                    <td align="center"  height="40px">姓　　名</td>
                    <td align="left"></td>
                </tr>
                <tr>
                    <td align="center"  height="40px">生　　日</td>
                    <td align="left"></td>   
                </tr>
                <tr>
                    <td align="center"  height="40px">電　　話</td>
                    <td align="left"></td>
                </tr>
                <tr>
                    <td align="center"  height="40px">約診項目</td>
                    <td align="left"></td>
                </tr>
                <tr>
                    <td align="center"  height="40px">預約日期</td>
                    <td align="left"></td>
                </tr>
                <tr>
                    <td align="center"  height="40px">希望時段</td>
                    <td align="left"></td>
                </tr>
        </table>
    </div>
-->
            <div id="tab2" class="table-responsive  mbr-white" style="display:none;" >
            
            </div>
        </div>
    </div>
</div>

</section>

<script>
/**/
function cleanall(){
    $("#tab2").hide();
    $("#id").val("");
}
/*============搜尋============*/
function search_btn(){
    id=document.getElementById("id").value;
    // document.getElementById("tab1").style.display="none";
    //document.getElementById("tab2").style.display="block";
    $.post("search_api.php",{id},function(o){
        if(o !="0"){
                $("#tab2").html(o)
                $("#tab2").show()
                
        }else{ alert("請輸入正確的身分證字號");}
    });
}
/*============刪除============*/
function delete_btn(idx){
    var r=confirm("取消此筆預約?");
    if(r==true){
        id=document.getElementById("id").value;
        $.post("search_api.php",{idx,id},function(o){
            document.getElementById("tab2").innerHTML=o;
            if(o==0){
                document.getElementById("tab2").style.display="none";
            }
        });
    }
}
/*============修改============*/
function edit_btn(es){
	var rr=confirm("修改前請先確認欲修改的項目及醫師看診日期時間")
	if(rr==true){
		id=document.getElementById("id").value;
		ed=document.getElementById("edit_doc"+es).value;
		ep=document.getElementById("edit_phone"+es).value;
		ec=document.getElementById("edit_check"+es).value;
		edate=document.getElementById("edit_date"+es).value;
		cdate=document.getElementById("check_date").innerHTML;//當天日期
		et=document.getElementById("edit_time"+es).value;
		if(ep.length>=9){
			if(edate>cdate){
				$.post("search_api.php",{es,ed,ep,ec,edate,et,id},function(o){
					document.getElementById("tab2").innerHTML=o;
					alert("修改成功");
				});  
			}else{
					$.post("search_api.php",{id},function(o){
						document.getElementById("tab2").innerHTML=o;
						alert("修改失敗:預約日期");
					});
				 }
		}else{
				$.post("search_api.php",{id},function(o){
					document.getElementById("tab2").innerHTML=o;
					alert("修改失敗:電話");
				});
			}
	}else{alert("未修改");}	
}
</script>

