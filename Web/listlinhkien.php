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
                $cmd = "";
                if(isset($_POST["tk"])){
                    if($_POST["tk"] == ""){
                        $cmd = "select * from linhkien order by MaLK desc";
                    }else{
                        $tk = $_POST["tk"];
                        $cmd = "select * from linhkien where MaLK = '$tk'";
                    }
                }else{
                    $cmd = "select * from linhkien order by MaLK desc";
                }
                $sql = $con->prepare($cmd);
                $sql->execute();
                $result = $sql->get_result();
                if($result->num_rows > 0){
    ?>
            <form class="d-flex" style="margin: 20px 0; width: 40%;" action="#" method="POST">
                <input class="form-control me-2" name="tk">
                <button class="btn btn-info">Search</button>
            </form>
            <div class="d-flex justify-content-center" style="margin: 20px 0;">
                <button class="btn btn-lg btn-success" data-bs-toggle="modal" data-bs-target="#ModalTLK">Thêm</button>
            </div>

            <div class="modal fade" id="ModalTLK" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal">
                                <span>&times;</span></button>
                            <h4 class="modal-title">Thêm linh kiện</h4>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="taikhoan">Tên linh kiện</label>
                                    <input class="form-control" id="tenlk">
                                </div>
                                <div class="form-group">
                                    <label for="taikhoan">Loại</label>
                                    <input class="form-control" id="loai">
                                </div>
                                <div class="form-group">
                                    <label for="taikhoan">Giá tiền</label>
                                    <input class="form-control" type="number" id="giatien">
                                </div>
                                <div class="form-group">
                                    <label for="taikhoan">Ảnh</label>
                                    <p class="text-danger">Lưu ý: Ảnh phải nằm trong đường dẫn C:\xampp\htdocs\myapp\Web\Anh</p>
                                    <input type="file" id="anh">
                                </div>
                                <button class="btn btn-info btn-lg" id="btnThem" style="margin-top: 20px;">Thêm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function(){
                    $("#btnThem").click(function(){
                        $.ajax({
                            url: "themlinhkien.php",
                            method: "post",
                            dataType: "html",
                            data:{
                                tenlk: $("#tenlk").val(),
                                loai: $("#loai").val(),
                                giatien: $("#giatien").val(),
                                anh: $("#anh").val().split('\\').pop()
                            }
                        }).done(function(ketqua){
                            alert(ketqua);
                        });
                    });
                });
            </script>
            <table class="table table-bordered">
            <tr>
                <th>Mã</th>
                <th>Tên sản phẩm</th>
                <th>Loại</th>
                <th>Giá tiền</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
    <?php
                    $i = 1;
                    while($row = $result->fetch_assoc()){
    ?>
            <tr>
                <th><?php echo $row["MaLK"] ?></th>
                <th><?php echo $row["TenLK"] ?></th>
                <th><?php echo $row["Loai"] ?></th>
                <th><?php echo number_format($row["GiaTien"],0,',','.') ?></th>
                <th><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalSLK<?php echo $i ?>">Sửa</button></th>
                <th><a href="xoalinhkien.php?malk=<?php echo $row["MaLK"] ?>"><button class="btn btn-danger" >Xóa</button></a></th>
            </tr>
            <div class="modal fade" id="ModalSLK<?php echo $i ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal">
                                <span>&times;</span></button>
                            <h4 class="modal-title">Sửa linh kiện</h4>
                        </div>
                        <div class="modal-body">
                            <form>
                                <input type="text" value="<?php echo $row["MaLK"] ?>" id="malk1" hidden>
                                <div class="form-group">
                                    <label for="taikhoan">Tên linh kiện</label>
                                    <input class="form-control" id="tenlk1" value="<?php echo $row["TenLK"] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="taikhoan">Loại</label>
                                    <input class="form-control" id="loai1" value="<?php echo $row["Loai"] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="taikhoan">Giá tiền</label>
                                    <input class="form-control" type="number" id="giatien1" value="<?php echo $row["GiaTien"] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="taikhoan">Ảnh</label>
                                    <p class="text-danger">Lưu ý: Ảnh phải nằm trong đường dẫn C:\xampp\htdocs\myapp\Web\Anh</p>
                                    <input type="file" id="anh1">
                                </div>
                                <button class="btn btn-warning btn-lg" id="btnSua" style="margin-top: 20px;">Sửa</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    <?php
                        $i++;
                    }
                }

    ?>
            </table>
            <script>
                $(document).ready(function(){
                    $("#btnSua").click(function(){
                        $.ajax({
                            url: "sualinhkien.php",
                            method: "post",
                            dataType: "html",
                            data:{
                                malk: $("#malk1").val(),
                                tenlk: $("#tenlk1").val(),
                                loai: $("#loai1").val(),
                                giatien: $("#giatien1").val(),
                                anh: $("#anh1").val().split('\\').pop()
                            }
                        }).done(function(ketqua){
                            alert(ketqua);
                        });
                    });
                });
            </script>
    <?php
            }
        }
    ?>
</div>
</body>
</html>