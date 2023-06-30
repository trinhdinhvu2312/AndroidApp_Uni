<?php
$avatar = $image = $fileToUpload = $id = $tenloaisanpham = $hinhanhloaisanpham = "";
if (!empty($_POST)) {
    require_once('../dbhelper.php');

    $id = $_POST['id'];
    $tenloaisanpham = $_POST['tenloaisanpham'];
    $hinhanhloaisanpham = $_POST['hinhanhloaisanpham'];

    if($image != ""){
        include 'uploadfile.php';

        $sql = "Update loaisanpham set tenloaisanpham='$tenloaisanpham', hinhanhloaisanpham='$hinhanhloaisanpham' where id='$id'";
        query($sql);
        header('Location: list_mn_product.php');
    }
    else{
        $sql = "Update loaisanpham set tenloaisanpham='$tenloaisanpham' where id='$id'";
        query($sql);
        header('Location: list_mn_product.php');
    }
}

