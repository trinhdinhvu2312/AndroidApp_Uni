<?php
require_once ('../dbhelper.php');

if(isset($_GET['madonhang'])) {
	$madonhang = $_GET['madonhang'];

	//B1. Mo ket noi toi CSDL
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
	mysqli_set_charset($conn, 'utf8');

	//B2. Them/sua/xoa/lay du lieu tu database -> insert/update/delete/select
	$sql = "delete from chitietdonhang where madonhang = $madonhang";
	mysqli_query($conn, $sql);

	//B3. Dong ket noi toi CSDL
	mysqli_close($conn);
}

header('Location: list_cart.php');
?>