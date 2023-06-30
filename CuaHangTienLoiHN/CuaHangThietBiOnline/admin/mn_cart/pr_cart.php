<?php
    if(isset($_GET['trangthaidonhang'])&&isset($_GET['madonhang'])){
    $trangthaidonhang = $_GET['trangthaidonhang'];
    $madonhang = $_GET['madonhang'];

    require_once('../dbhelper.php');
    $sql = "Update chitietdonhang set trangthaidonhang='$trangthaidonhang' where madonhang='$madonhang'";
    query($sql);
    header('Location: list_cart.php');
    }
?>