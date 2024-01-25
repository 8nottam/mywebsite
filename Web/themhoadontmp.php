<?php
        $servername = "localhost:3308";
        $username = "root";
        $userpass = "";
        $database = "mt";
    $con = new mysqli($servername,$username,$userpass,$database);
    if($con->connect_error){
        die("Kết nối thất bại". $con->connect_error);
    }else{
        $mand = $_GET["mand"];
        $sql = $con->prepare("select * from giohang where MaND = ?");
        $sql->bind_param("s", $mand);
        $sql->execute();
        $kq = $sql->get_result();
        if($kq->num_rows > 0){
            $sql2 = $con->prepare("INSERT INTO hoadontamthoi (MaND) VALUES (?)");
            $sql2->bind_param("s", $mand);
            $sql2->execute();

            $sql3 = $con->prepare("select * from hoadontamthoi order by MaHDT desc limit 1");
            $sql3->execute();
            $kqtmp = $sql3->get_result();
            $rowtmp = $kqtmp->fetch_assoc();
            $mahdt = $rowtmp["MaHDT"];
            while($row = $kq->fetch_assoc()){
                $sql2 = $con->prepare("INSERT INTO chitiethoadontamthoi VALUES (?, ?, ?)");
                $sql2->bind_param("ssi", $mahdt, $row["MaLK"], $row["SoL"]);
                $sql2->execute();
            }
        }
        $sql = $con->prepare("delete from giohang where MaND = ?");
        $sql->bind_param("s", $mand);
        $sql->execute();
        header("location:giohang.php?mand=$mand");
    }
?>