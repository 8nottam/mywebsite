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
        if(isset($_SESSION["idnv"])){
            $mahdt = $_GET["mahdt"];
            $manv = $_SESSION["idnv"];

            $sql = $con->prepare("select * from hoadontamthoi where MaHDT = ?");
            $sql->bind_param("s", $mahdt);
            $sql->execute();
            $row = $sql->get_result()->fetch_assoc();
            $mand = $row["MaND"];

            $sql = $con->prepare("INSERT INTO `hoadon`(`NgayLap`, `MaND`, `MaNV`) VALUES (?,?,?)");
            $date = getdate();
            $ngay = $date["mday"];
            $thang = $date["mon"];
            $nam = $date["year"];
            $ngaylap = "$nam/$thang/$ngay";
            $sql->bind_param("sss", $ngaylap, $mand, $manv);
            $sql->execute();

            $sql3 = $con->prepare("select * from hoadon order by MaHD desc limit 1");
            $sql3->execute();
            $kqtmp = $sql3->get_result()->fetch_assoc();
            $mahd = $kqtmp["MaHD"];

            $sql = $con->prepare("select * from chitiethoadontamthoi where MaHDT = ?");
            $sql->bind_param("s", $mahdt);
            $sql->execute();
            $result = $sql->get_result();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $sql2 = $con->prepare("INSERT INTO chitiethoadon VALUES (?, ?, ?)");
                    $sql2->bind_param("ssi", $mahd, $row["MaLK"], $row["SoL"]);
                    $sql2->execute();
                }
            }

            $sql2 = $con->prepare("delete from chitiethoadontamthoi where MaHDT = ?");
            $sql2->bind_param("s", $mahdt);
            $sql2->execute();

            $sql2 = $con->prepare("delete from hoadontamthoi where MaHDT = ?");
            $sql2->bind_param("s", $mahdt);
            $sql2->execute();
        }
        header("location: listhoadontmp.php");
    }
?>