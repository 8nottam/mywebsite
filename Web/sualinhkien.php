<?php
        $servername = "localhost:3308";
        $username = "root";
        $userpass = "";
        $database = "mt";
    $con = new mysqli($servername,$username,$userpass,$database);
    if($con->connect_error){
        die("Kết nối thất bại". $con->connect_error);
    }else{
        $malk = $_POST["malk"];
        $tenlk = $_POST["tenlk"];
        $loai = $_POST["loai"];
        $giatien = $_POST["giatien"];
        $anh = $_POST["anh"];
        $pathAnh = "./Anh/$anh";
        echo "$malk\n$tenlk\n$loai\n$giatien\n$anh";
        $sql = $con->prepare("UPDATE `linhkien` SET `TenLK`=?,`Loai`=?,`GiaTien`=?,`Anh`=? WHERE MaLK = ?");
        $sql->bind_param("sssss",$tenlk,$loai, $giatien, $pathAnh,$malk);
        $sql->execute();

        echo "Sửa thành công!";
    }
?>