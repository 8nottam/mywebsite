<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./baitaplon1.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body>
    
<div class="container">
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
            if(isset($_SESSION["idnv"])){
                $sql = $con->prepare("select MaLH, HoTen, NgayHen, TenDV, TinhTrang from lichhen L inner join nguoidung N
                 on L.MaND = N.MaND inner join dichvu D on L.MaDV = D.MaDV");
                $sql->execute();
                $result = $sql->get_result();
                if($result->num_rows > 0){
    ?>
            <table class="table table-bordered">
            <tr>
                <th>Mã</th>
                <th>Họ Tên</th>
                <th>Ngày hẹn</th>
                <th>Dich vụ</th>
                <th>Tình trạng</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
    <?php
                    while($row = $result->fetch_assoc()){
                        $tt = "";
                        if($row["TinhTrang"] > 0){
                            $tt = "Khách đã đến";
                        }else if($row["TinhTrang"] == 0){
                            $tt = "Khách chưa đến";
                        }else{
                            $tt = "Khách đã hủy";
                        }
    ?>
            <tr>
                <th><?php echo $row["MaLH"] ?></th>
                <th><?php echo $row["HoTen"] ?></th>
                <th><?php echo $row["NgayHen"] ?></th>
                <th><?php echo $row["TenDV"] ?></th>
                <th><?php echo $tt ?></th>
                <th><a href=""><button class="btn btn-warning">Sửa</button></a></th>
                <th><button class="btn btn-danger">Xóa</button></th>
            </tr>
    <?php
                    }
                }

    ?>
            </table>
    <?php
            }else if(isset($_SESSION["idnd"])){
                $mand = $_SESSION["idnd"];
                $sql = $con->prepare("select MaLH, HoTen, NgayHen, TenDV, TinhTrang from lichhen L inner join nguoidung N
                on L.MaND = N.MaND inner join dichvu D on L.MaDV = D.MaDV where L.MaND = ? and TinhTrang >= 0");
                $sql->bind_param("s", $mand);
                $sql->execute();
                $result = $sql->get_result();
                if($result->num_rows > 0){
    ?>
            <table class="table table-bordered">
            <tr>
                <th>Mã</th>
                <th>Họ Tên</th>
                <th>Ngày hẹn</th>
                <th>Dich vụ</th>
                <th>Tình trạng</th>
                <th>Hủy</th>
            </tr>
    <?php
                    while($row = $result->fetch_assoc()){
                        $tt = "";
                        if($row["TinhTrang"] > 0){
                            $tt = "Khách đã đến";
                        }else{
                            $tt = "Khách chưa đến";
                        }
    ?>
            <tr>
                <th><?php echo $row["MaLH"] ?></th>
                <th><?php echo $row["HoTen"] ?></th>
                <th><?php echo $row["NgayHen"] ?></th>
                <th><?php echo $row["TenDV"] ?></th>
                <th><?php echo $tt ?></th>
                <th><a href="./huylichhen.php?malh=<?php echo $row["MaLH"] ?>"><button class="btn btn-danger">Hủy</button></a></th>
            </tr>
    <?php
                    }
                }

    ?>
            </table>
    <?php
            }
        }
    ?>
</div>
</body>
</html>