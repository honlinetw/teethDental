<?php 
if(!empty($_SESSION["acc"])){
    unset($_SESSION["acc"]);
}

?>
<script>document.location.href='index.php'</script>;