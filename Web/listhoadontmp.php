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
        <table class="table table-bordered">
            <tr>
                <th>Mã</th>
                <th>Họ Tên</th>
                <th>SDT</th>
                <th>Địa Chỉ</th>
                <th>Chi Tiết</th>
                <th>Thanh Toán</th>
                <th>Chưa Thanh toán</th>
            </tr>
    <?php
        $servername = "localhost:3308";
        $username = "root";
        $userpass = "";
        $database = "mt";
        $con = new mysqli($servername,$username,$userpass,$database);
        if($con->connect_error){
            die("Kết nối thất bại". $con->connect_error);
        }else{
            $sql = $con->prepare("select MaHDT, HoTen, SDT, DiaChi from hoadontamthoi HDT inner join 
            nguoidung ND on ND.MaND = HDT.MaND");
            $sql->execute();
            $result = $sql->get_result();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
    ?>
            <tr>
                <th><?php echo $row["MaHDT"] ?></th>
                <th><?php echo $row["HoTen"] ?></th>
                <th><?php echo $row["SDT"] ?></th>
                <th><?php echo $row["DiaChi"] ?></th>
                <th><a href="./listchitiethoadontmp.php?mahdt=<?php echo $row["MaHDT"] ?>"><button class="btn btn-info">Chi Tiết</button></a></th>
                <th><a href="./thanhtoan.php?mahdt=<?php echo $row["MaHDT"] ?>"><button class="btn btn-success">Đã thanh toán</button></a></th>
                <th><a href="./chuathanhtoan.php?mahdt=<?php echo $row["MaHDT"] ?>"><button class="btn btn-danger">Chưa thanh toán</button></a></th>
            </tr>
    <?php
                }
            }
        }
    ?>
        </table>
</div>
</body>
</html>