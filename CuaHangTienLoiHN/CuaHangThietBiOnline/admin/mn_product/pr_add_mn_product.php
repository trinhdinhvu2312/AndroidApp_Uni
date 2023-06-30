<?php
    $fileToUpload = $tenloaisanpham = $hinhanhloaisanpham = "";
    if(!empty($_POST)){
        require_once ('../dbhelper.php');

        $tenloaisanpham = $_POST['tenloaisanpham'];
        $hinhanhloaisanpham = $_POST['hinhanhloaisanpham'];

        include 'uploadfile.php'; 

        $sql = "INSERT INTO loaisanpham(id, tenloaisanpham, hinhanhloaisanpham) values('','$tenloaisanpham', '$hinhanhloaisanpham')";
        query($sql);
    }
    header('Location: list_mn_product.php');
?>