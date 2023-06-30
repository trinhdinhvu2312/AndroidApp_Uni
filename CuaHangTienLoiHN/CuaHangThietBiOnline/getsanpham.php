<?php
include "connect.php";
$mangspmoinhat = array();
$query = "SELECT * FROM sanpham ORDER BY id DESC LIMIT 6";
$data = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($data)) {
	array_push($mangspmoinhat, new Sanphammoinhat(
		$row['id'],
		$row['tensanpham'],
		$row['giasanpham'],
		$row['hinhanhsanpham'],
		$row['motasanpham'],
		$row['idsanpham']
	)
	);
}
echo json_encode($mangspmoinhat);
class Sanphammoinhat
{
	public $id;
	public $tensp;
	public $giasp;
	public $hinhanhsp;
	public $motasp;
	public $idsanpham;
	function __construct($id, $tensp, $giasp, $hinhanhsp, $motasp, $idsanpham)
	{
		$this->id = $id;
		$this->tensp = $tensp;
		$this->giasp = $giasp;
		$this->hinhanhsp = $hinhanhsp;
		$this->motasp = $motasp;
		$this->idsanpham = $idsanpham;
	}
}
?>