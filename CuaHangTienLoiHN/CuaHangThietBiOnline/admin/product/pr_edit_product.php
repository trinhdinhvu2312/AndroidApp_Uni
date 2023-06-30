<?php
$id =  $tensanpham = $giasanpham = $motasanpham = $hinhanhsanpham = $image = $fileToUpload = $loaisanpham= "";
if (!empty($_POST)) {
    require_once('../dbhelper.php');

    $id = $_POST['id'];
    $tensanpham = $_POST['tensanpham'];
    $giasanpham = $_POST['giasanpham'];
    $motasanpham = $_POST['motasanpham'];
    $image = $_FILES["fileToUpload"]["name"];
    $loaisanpham = $_POST['loaisanpham'];

    if($image != ""){
        include 'uploadfile.php';

        $sql = "Update sanpham set  id_sanpham ='$loaisanpham', tensanpham ='$tensanpham', giasanpham ='$giasanpham', motasanpham ='$motasanpham', hinhanhsanpham='$hinhanhsanpham' where id='$id'";
        query($sql);
        header('Location: list_product.php');
    }
    else{
        $sql = "Update sanpham set  id_sanpham ='$loaisanpham', tensanpham ='$tensanpham', giasanpham ='$giasanpham', motasanpham ='$motasanpham' where id ='$id'";
        query($sql);
        header('Location: list_product.php');
    }

}

