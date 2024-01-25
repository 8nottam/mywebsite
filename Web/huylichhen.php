<?php
        $servername = "localhost:3308";
        $username = "root";
        $userpass = "";
        $database = "mt";
    $con = new mysqli($servername,$username,$userpass,$database);
    if($con->connect_error){
        die("Kết nối thất bại". $con->connect_error);
    }else{
        $malh = $_GET["malh"];
        $sql = $con->prepare("UPDATE `lichhen` SET `TinhTrang`= -1 WHERE MaLH = ?");
        $sql->bind_param("s",$malh);
        $sql->execute();

        header("location: listlinhkien.php");
    }
?>