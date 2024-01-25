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
                <th>Tên sản phẩm</th>
                <th>Giá tiền</th>
                <th>Số Lượng</th>
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
            $mahdt = $_GET["mahdt"];
            $tongtien = 0;
            $sql = $con->prepare("select MaHDT, TenLK, GiaTien, SoL from chitiethoadontamthoi CTHDT inner join 
            linhkien ND on ND.MaLK = CTHDT.MaLK");
            $sql->execute();
            $result = $sql->get_result();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $tongtien += $row["GiaTien"] * $row["SoL"];
    ?>
            <tr>
                <th><?php echo $row["MaHDT"] ?></th>
                <th><?php echo $row["TenLK"] ?></th>
                <th><?php echo number_format($row["GiaTien"],0,',','.') ?></th>
                <th><?php echo $row["SoL"] ?></th>
            </tr>
    <?php
                }
            }
        }
    ?>
        </table>
        <p class="text-xxl-end fs-4 fw-bold">Tổng tiền: <?php echo number_format($tongtien,0,',','.') ?>đ</p>
</div>
</body>
</html>