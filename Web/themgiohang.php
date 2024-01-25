<?php
        $servername = "localhost:3308";
        $username = "root";
        $userpass = "";
        $database = "mt";
    $con = new mysqli($servername,$username,$userpass,$database);

    if($con->connect_error){
        die("Kết nối thất bại". $con->connect_error);
    }else{
        try{
            $mand = $_POST["mand"];
            $malk = $_POST["malk"];

            $sql = $con->prepare("insert into giohang values ('$mand','$malk',1)");
            $sql->execute();
            echo "Đã thêm vào giỏ hàng!";
        }catch(Exception $e){
            echo "Sản phẩm đã có trong giỏ hàng!";
        }
        
    }
?>