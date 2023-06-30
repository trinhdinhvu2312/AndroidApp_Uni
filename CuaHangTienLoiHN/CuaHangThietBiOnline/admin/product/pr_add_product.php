<?php
   $tensanpham = $giasanpham = $motasanpham = $hinhanhsanpham = $fileToUpload =  $loaisanpham =  "";
    if(!empty($_POST)){
        require_once ('../dbhelper.php');

        $tensanpham = $_POST['tensanpham'];
        $giasanpham = $_POST['giasanpham'];
        $motasanpham = $_POST['motasanpham'];
        $hinhanhsanpham = $_POST['hinhanhsanpham'];
        $loaisanpham = $_POST['loaisanpham'];
        
        include 'uploadfile.php'; 

        $sql = "INSERT INTO sanpham (id, tensanpham, giasanpham, hinhanhsanpham, motasanpham, id_sanpham) 
        values('', '$tensanpham', '$giasanpham', '$hinhanhsanpham', '$motasanpham', '$loaisanpham')";
        query($sql);
    }

    header('Location: list_product.php');
?>