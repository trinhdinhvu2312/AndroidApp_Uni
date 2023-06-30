<?php
require_once('config.php');

function init()
{
    initDB();

    query('create table if not exists admin (
        id_admin int primary key auto_increment,
        name varchar(50),
        password varchar(50),
        admin_status int
    )');

    query('CREATE TABLE `chitietdonhang` (
        `id` int(11) NOT NULL,
        `madonhang` int(11) NOT NULL,
        `masanpham` int(11) NOT NULL,
        `tensanpham` varchar(200) NOT NULL,
        `giasanpham` int(11) NOT NULL,
        `soluongsanpham` int(11) NOT NULL,
        `trangthaidonhang` int(5)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8;');

    query('CREATE TABLE `donhang` (
        `id` int(11) NOT NULL,
        `tenkhachhang` varchar(200) NOT NULL,
        `sodienthoai` int(11) NOT NULL,
        `diachi` varchar(200) NOT NULL,
        `email` varchar(200) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8;');

    query('CREATE TABLE `loaisanpham` (
        `id` int(11) NOT NULL,
        `tenloaisanpham` varchar(200) NOT NULL,
        `hinhanhloaisanpham` varchar(200) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;');

    query('CREATE TABLE `user` (
        `id` int(11) NOT NULL primary key AUTO_INCREMENT,
        `username` varchar(100) NOT NULL,
        `password` varchar(100) NOT NULL,
        `id_donhang` int(11) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;');

    query('CREATE TABLE `sanpham` (
        `id` int(11) NOT NULL,
        `tensanpham` varchar(200) NOT NULL,
        `giasanpham` int(15) NOT NULL,
        `hinhanhsanpham` varchar(200) NOT NULL,
        `motasanpham` varchar(10000) NOT NULL,
        `loaisanpham` varchar(200) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;');

    query('ALTER TABLE `chitietdonhang`
        ADD PRIMARY KEY (`id`);
            
        ALTER TABLE `donhang`
        ADD PRIMARY KEY (`id`);
        
        ALTER TABLE `loaisanpham`
        ADD PRIMARY KEY (`id`);
        
        ALTER TABLE `sanpham`
        ADD PRIMARY KEY (`id`);');

    query('ALTER TABLE `chitietdonhang`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
        
        ALTER TABLE `donhang`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
        
        ALTER TABLE `loaisanpham`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
        
        ALTER TABLE `sanpham`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT');

    query('ALTER TABLE `user`
        ADD CONSTRAINT `fk_user_donhang`
        FOREIGN KEY (`id_donhang`) REFERENCES `donhang`(`id`) ON DELETE CASCADE;');

}

function initDB()
{
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD);
    mysqli_set_charset($conn, 'utf8');

    mysqli_query($conn, 'create database if not exists ' . DB);

    mysqli_close($conn);
}

function query($sql)
{
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
    mysqli_set_charset($conn, 'utf8');

    mysqli_query($conn, $sql);

    mysqli_close($conn);

}

function queryResult($sql, $isSingle = false)
{
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
    mysqli_set_charset($conn, 'utf8');

    $resultset = mysqli_query($conn, $sql);
    $data = [];

    while (($row = mysqli_fetch_array($resultset, 1)) != null) {
        $data[] = $row;
    }

    mysqli_close($conn);

    if ($isSingle) {
        if (count($data) == 0)
            return null;

        return $data[0];
    }
    return $data;
}
?>