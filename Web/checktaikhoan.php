<?php
session_start();
        $servername = "localhost:3308";
        $username = "root";
        $userpass = "";
        $database = "mt";
    $con = new mysqli($servername,$username,$userpass,$database);

    if($con->connect_error){
        die("Kết nối thất bại". $con->connect_error);
    }else{
        $tk = $_POST["user"];
        $mk = $_POST["pass"];

        $sql = $con->prepare("select * from nhanvien where TaiKhoan = ? and MatKhau = ?");
        $sql->bind_param("ss", $tk, $mk);
        $sql->execute();
        $ketqua = $sql->get_result();
        if($ketqua->num_rows > 0){
            $row = $ketqua->fetch_assoc();
            $_SESSION["idnv"] = $row["MaNV"];
            echo "Đăng nhập thành công!\nBạn là nhân viên!";
        }else{
            $sql = $con->prepare("select * from nguoidung where Tentk = ? and MatKhau = ?");
            $sql->bind_param("ss", $tk, $mk);
            $sql->execute();
            $ketqua = $sql->get_result();
            if($ketqua->num_rows > 0){
                $row = $ketqua->fetch_assoc();
                $_SESSION["idnd"] = $row["MaND"];
                echo "Đăng nhập thành công!";
            }else{
                echo "Thông tin tài khoản hoặc mật khẩu không chính xác!";
            }
        }
    }
?>