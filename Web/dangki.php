<?php

$servername = "localhost:3308";
$username = "root";
$userpass = "";
$database = "mt";
    $con = new mysqli($servername,$username,$userpass,$database);
    if($con->connect_error){
        die("Kết nối thất bại". $con->connect_error);
    }else{
        $hoten = $_POST["name"];
        $tk = $_POST["user"];
        $mk = $_POST["pass"];
        $sdt = $_POST["sdt"];
        $ngay = $_POST["ngay"];
        $thang = $_POST["thang"];
        $nam = $_POST["nam"];
        $diachi = $_POST["diachi"];
        $ngaysinh = "$nam/$thang/$ngay";
        $sql = $con->prepare("INSERT INTO `nguoidung`(`HoTen`, `Tentk`, `MatKhau`, `SDT`, `NgaySinh`, `DiaChi`) 
        VALUES (?,?,?,?,?,?)");
        $sql->bind_param("ssssss",$hoten, $tk, $mk, $sdt, $ngaysinh, $diachi);
        $sql->execute();

        echo "Đăng kí thành công !\nVui lòng quay lại đăng nhập!";
    }
?>