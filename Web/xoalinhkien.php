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
                $malk = $_GET["malk"];
                $sql = $con->prepare("DELETE from linhkien where MaLK = ?");
                $sql->bind_param("s",$malk);
                $sql->execute();
                header("location:listlinhkien.php");
            }catch(Exception $e){
    ?>
        <p class="fs-4 text-danger fw-bolder">Không thể xóa linh kiện này</p>
        <p class="text-danger fw-bold">Linh kiện này có thể đang liên kết đến hóa đơn nào đó!</p>
    <?php
            }
            
        }
    ?>
</body>
</html>

