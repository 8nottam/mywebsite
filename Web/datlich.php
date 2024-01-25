<?php
        $servername = "localhost:3308";
        $username = "root";
        $userpass = "";
        $database = "mt";
    $con = new mysqli($servername,$username,$userpass,$database);
    if($con->connect_error){
        die("Kết nối thất bại". $con->connect_error);
    }else{
        session_start();
        if(isset($_SESSION["idnd"])){
            $ngay = $_POST["ngay"];
            $thang = $_POST["thang"];
            $madv = $_POST["madv"];
            $mand = $_SESSION["idnd"];
            $nam = getdate()["year"];
            $ngayhen = "$nam/$thang/$ngay";

        $sql = $con->prepare("INSERT INTO `lichhen`(`NgayHen`, `TinhTrang`, `MaND`, `MaDV`) VALUES (?,0,?,?)");
        $sql->bind_param("sss",$ngayhen, $mand, $madv);
        $sql->execute();

        echo "Đặt thành công!";
        }
        
    }
?>