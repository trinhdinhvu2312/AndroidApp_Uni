<?php

include "connect.php";

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$idsp = isset($_POST['idsanpham']) ? $_POST['idsanpham'] : 0;
$space = 5;
$limit = ($page - 1) * $space;

$mangsanpham = array();

$query = "SELECT * FROM sanpham WHERE id = $idsp LIMIT $limit,$space";
$data = mysqli_query($conn,$query);

while ($row = mysqli_fetch_assoc($data)){
    array_push($mangsanpham, new Sanpham($row['id'],$row['tensanpham'],$row['giasanpham'],$row['hinhanhsanpham'],$row['motasanpham'],$row['idsanpham']));
}

echo json_encode($mangsanpham);

class Sanpham{
    public $id;
    public $tensp;
    public $giasp;
    public $hinhanhsp;
    public $motasp;
    public $idsanpham;

    function __construct($id,$tensp,$giasp,$hinhanhsp,$motasp,$idsanpham){
        $this->id = $id;
        $this->tensp=$tensp;
        $this->giasp=$giasp;
        $this->hinhanhsp=$hinhanhsp;
        $this->motasp=$motasp;
        $this->idsanpham=$idsanpham;
    }
}

?>
