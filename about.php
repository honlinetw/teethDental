<?php
$sql="select*from doc_name ";
$ro=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($ro);

?>
<div class="container-fluid" style="position:relative;top:77px;padding:0px;margin-bottom: 135px;" >
<img src="./images/about.jpg" class="img-fluid" alt="Responsive image">
</div>
<section class="features2 cid-rlI4alDf5w" id="features2-7" >
<div class="container">
  <div class="row">
    <?php
    do{
    ?>
    <div class="col-sm-4">
        <div class="card p-3">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="./docpic/<?=$row["d_pic"]?>" >
                    </div>
                    <div class="card-box" style="margin-top:25px;">
                        <h3 class="card-title pb-3 mbr-fonts-style " style="text-align:center;">
                           <?=$row["d_name"]?>
                        </h3>
                        <p class="mbr-text mbr-fonts-style display-7">
                        <?=nl2br($row["d_con"])?>
                        </p>
                    </div>
                </div>
        </div>
    </div>

    <?php
    }while($row=mysqli_fetch_assoc($ro));
    ?>
   </div>
</div>
  
</section>
