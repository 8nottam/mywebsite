<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
        session_start();
    ?>
<div class="head">
        <nav class="navbar navbar-expand-lg bg-success">
        <div class="container-fluid" style="margin-left: 20%;">
            <a class="navbar-brand" href="./1home.php?"><img src="./Anh/Logo.png" style="width: 250px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-warning" type="submit">Search</button>
            </form>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="" data-bs-toggle="modal" data-bs-target="#ModalLH" style="width: auto">
                    <img src="./Anh/CalendarLogo.png" style="width: 60px;">
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-light fw-semibold" href="" data-bs-toggle="modal" data-bs-target="#ModalLH"><p style="width: 70px;">Đặt lịch sửa chữa</p></a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-light fw-semibold" href="tel:+84896130627" target="_blank"><i class="bi bi-telephone-fill"></i>+84896130627</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-light fw-semibold" id="giohang" href="./giohang.php?mand=<?php 
                if(isset($_SESSION["idnd"])) echo $_SESSION["idnd"] ?>"><i class="bi bi-basket-fill"></i>Giỏ hàng</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-light fw-semibold" id="account" href="" data-bs-toggle="modal" data-bs-target="#ModalDN"><i class="bi bi-person-circle"></i>Tài khoản</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
    </div>
    <div class="modal fade" id="ModalLH" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal">
                        <span>&times;</span></button>
                    <h4 class="modal-title">Đặt lịch</h4>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="form-group" style="width: 25%; float: left; margin-left: 8%;">
                                <label for="">Ngày</label>
                                <select class="form-select" id="ngaydl" aria-label="Default select example">
            <?php
                                    for($i = 1; $i <= 31; $i++){
            ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php

                                    }
            ?>
                                </select>
                            </div>
                            <div class="form-group" style="width: 25%; float: left; margin-left: 3%;">
                                <label for="">Tháng</label>
                                <select class="form-select" id="thangdl" aria-label="Default select example">
            <?php
                                    for($i = 1; $i <= 12; $i++){
            ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php

                                    }
            ?>
                                </select>
                            </div>
                    <div class="form-group" style="clear: both;">
                        <label for="">Dịch vụ</label>
                        <select class="form-select" id="madv" aria-label="Default select example">
            <?php
                    $result = $con->query("select * from dichvu");
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc())
                        {
            ?>
                            <option value="<?php echo $row["MaDV"] ?>"><?php echo $row["TenDV"] ?></option>
            <?php
                        }
                    }
            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success btn-lg" id="btndl" style="margin-top: 20px;float:right">Đặt lịch</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#btndl").click(function(){
                $.ajax({
                    url: "datlich.php",
                    method: "post",
                    dataType: "html",
                    data: {
                        ngay: $("#ngaydl").val(),
                        thang: $("#thangdl").val(),
                        madv: $("#madv").val()
                    }
                }).done(function(ketqua){
                    alert(ketqua);
                });
            });
        });
    </script>
    <?php
        $quyen = -1;
        
        if(isset($_SESSION["idnv"])){
            $ma = $_SESSION["idnv"];
            $sql = $con->prepare("select * from nhanvien where MaNV = ?");
            $sql->bind_param("s",$ma);
            $sql->execute();
            $ketqua = $sql->get_result();
            if($ketqua->num_rows > 0){
                $quyen = 1;
                $row = $ketqua->fetch_assoc();
    ?>
                
        <div class="modal fade" id="ModalTT" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal">
                        <span>&times;</span></button>
                    <h4 class="modal-title">Thông tin tài khoản</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="taikhoan"><b>Mã nhân viên</b></label><br>
                            <label for=""><?php echo $row["MaNV"] ?></label>
                        </div>
                        <div class="form-group">
                            <label for="taikhoan"><b>Họ Tên</b></label><br>
                            <label for=""><?php echo $row["HoTen"] ?></label>
                        </div>
                        <div class="form-group">
                            <label for="taikhoan"><b>Số điện thoại</b></label><br>
                            <label for=""><?php echo $row["SDT"] ?></label>
                        </div>
                        <div class="form-group">
                            <label for="taikhoan"><b>Địa chỉ</b></label><br>
                            <label for=""><?php echo $row["DiaChi"] ?></label>
                        </div>
                        <button class="btn btn-danger" id="btnDX">Đăng Xuất</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-lg" style="margin-top: 20px;float:right" data-bs-toggle="modal" data-bs-target="#ModalDK">Đăng Xuất</button>
                </div>
            </div>
        </div>
        </div>
    <?php
            }
        }else if(isset($_SESSION["idnd"])){
            $ma = $_SESSION["idnd"];
            $sql = $con->prepare("select * from nguoidung where MaND = ?");
            $sql->bind_param("s",$ma);
            $sql->execute();
            $ketqua = $sql->get_result();
            if($ketqua->num_rows > 0){
                $quyen = 0;
                $row = $ketqua->fetch_assoc();
    ?>
                
        <div class="modal fade" id="ModalTT" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal">
                        <span>&times;</span></button>
                    <h4 class="modal-title">Thông tin tài khoản</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="taikhoan"><b>Mã người dùng</b></label><br>
                            <label for=""><?php echo $row["MaND"] ?></label>
                        </div>
                        <div class="form-group">
                            <label for="taikhoan"><b>Họ Tên</b></label><br>
                            <label for=""><?php echo $row["HoTen"] ?></label>
                        </div>
                        <div class="form-group">
                            <label for="taikhoan"><b>Tên tài khoản</b></label><br>
                            <label for=""><?php echo $row["Tentk"] ?></label>
                        </div>
                        <div class="form-group">
                            <label for="taikhoan"><b>Số điện thoại</b></label><br>
                            <label for=""><?php echo $row["SDT"] ?></label>
                        </div>
                        <div class="form-group">
                            <label for="taikhoan"><b>Ngày sinh</b></label><br>
                            <label for=""><?php echo $row["NgaySinh"] ?></label>
                        </div>
                        <div class="form-group">
                            <label for="taikhoan"><b>Địa chỉ</b></label><br>
                            <label for=""><?php echo $row["DiaChi"] ?></label>
                        </div>
                        <button class="btn btn-danger" id="btnDX">Đăng Xuất</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-lg" style="margin-top: 20px;float:right" data-bs-toggle="modal" data-bs-target="#ModalDK">Đăng Xuất</button>
                </div>
            </div>
        </div>
        </div>
        
    <?php
            }
        }
    ?>
    <script>
            $(document).ready(function(){
            $("#account").text("<?php echo $row["HoTen"] ?>");
            $("#account").attr("data-bs-target","#ModalTT");
            $("#btnDX").click(function(){
                $.ajax({
                    url: "dangxuat.php",
                    dataType: "html"
                }).done(function(tmp){
                    alert(tmp);
                });
            });
            });
        </script>
    <!------------ form dang nhap----------->
    <div class="modal fade" id="ModalDN" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal">
                        <span>&times;</span></button>
                    <h4 class="modal-title">Đăng nhập</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="taikhoan">Tài khoản</label>
                            <input class="form-control" id="taikhoan">
                        </div>
                        <div class="form-group">
                            <label for="taikhoan">Mật khẩu</label>
                            <input class="form-control" type="password" id="matkhau">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Nhớ tài khoản?
                            </label>
                        </div>
                        <button class="btn btn-info btn-lg" id="btnDN" style="margin-top: 20px;">Login</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-lg" style="margin-top: 20px;float:right" data-bs-toggle="modal" data-bs-target="#ModalDK">Đăng kí</button>
                </div>
            </div>
        </div>
    </div>
    <!-----------------form dang ki----------->
    <div class="modal fade" id="ModalDK" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal">
                        <span>&times;</span></button>
                    <h4 class="modal-title">Đăng Kí</h4>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="form-group">
                            <label for="taikhoan">Họ Tên</label>
                            <input class="form-control" id="dkhoten">
                        </div>
                        <div class="form-group">
                            <label for="taikhoan">Tài khoản</label>
                            <input class="form-control" id="dktaikhoan">
                        </div>
                        <div class="form-group">
                            <label for="taikhoan">Mật khẩu</label>
                            <input class="form-control" type="password" id="dkmatkhau">
                        </div>
                        <div class="form-group">
                            <label for="taikhoan">Nhập lại mật khẩu</label>
                            <input class="form-control" id="dkmatkhautmp">
                        </div>
                        <div class="form-group">
                            <label for="taikhoan">Số điện thoại</label>
                            <input class="form-control" id="dksdt">
                        </div>
                        <div class="form-group">
                            <label for="">Ngày sinh</label>
                        </div>
                            <div class="form-group" style="width: 25%; float: left; margin-left: 8%;">
                                <label for="">Ngày</label>
                                <select class="form-select" id="ngay" aria-label="Default select example">
            <?php
                                    for($i = 1; $i <= 31; $i++){
            ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php

                                    }
            ?>
                                </select>
                            </div>
                            <div class="form-group" style="width: 25%; float: left; margin-left: 3%;">
                                <label for="">Tháng</label>
                                <select class="form-select" id="thang" aria-label="Default select example">
            <?php
                                    for($i = 1; $i <= 12; $i++){
            ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php

                                    }
            ?>
                                </select>
                            </div>
                            <div class="form-group" style="width: 25%; float: left; margin-left: 3%;">
                                <label for="">Năm</label>
                                <select class="form-select" id="nam" aria-label="Default select example">
            <?php
                                    for($i = 1980; $i <= 2023; $i++){
            ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php

                                    }
            ?>
                                </select>
                            </div>
                        <div class="form-group" style="clear:both;">
                            <label for="taikhoan">Địa chỉ</label>
                            <input class="form-control" id="dkdiachi">
                        </div>
                        <button class="btn btn-info btn-danger" id="btndk" style="margin-top: 20px;">Đăng Kí</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#btndk").click(function(e){
                e.preventDefault();
                if($("#dkhoten").val() == "" || $("#dktaikhoan").val() == "" ||$("#dkmatkhau").val() == "" 
                ||$("#dkmatkhautmp").val() == "" ||$("#dkdiachi").val() == "" ||$("#dksdt").val() == ""){
                    alert("Bạn phải điền đầy đủ thông tin");
                }else{
                    if($("#dkmatkhau").val() != $("#dkmatkhautmp").val()){
                        alert("Mật khẩu nhập lại không trùng khớp với mật khẩu của bạn!");
                    }else{
                        $.ajax({
                            url: "dangki.php",
                            type: "post",
                            dataType: "html",
                            data: {
                                name: $("#dkhoten").val(),
                                user: $("#dktaikhoan").val(),
                                pass: $("#dkmatkhau").val(),
                                sdt: $("#dksdt").val(),
                                ngay: $("#ngay").val(),
                                thang: $("#thang").val(),
                                nam: $("#nam").val(),
                                diachi: $("#dkdiachi").val()
                            }
                        }).done(function(ketqua){
                            alert(ketqua);
                        });
                    }
                }
            });
        });
    </script>
    <div class="bg-info">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href=""><i class="bi bi-house-door-fill"></i></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="./gioithieu.php">Giới thiệu</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dịch vụ
                </a>
                <ul class="dropdown-menu">
    <?php

            $result = $con->query("select * from dichvu");
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc())
                {
    ?>
                    <li><a class="dropdown-item" href="./sualaptop.php"><?php echo $row["TenDV"] ?></a></li>
    <?php
                }
            }
    ?>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" id="cndichvu" href="">Cập nhật dịch vụ</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Linh kiện
                </a>
                <ul class="dropdown-menu">
    <?php

            $result = $con->query("SELECT DISTINCT Loai FROM `linhkien`");
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc())
                {
    ?>
                    <li><a class="dropdown-item" href="./phanloai.php?loai=<?php echo $row["Loai"] ?>"><?php echo $row["Loai"] ?></a></li>
    <?php
                }
            }
    ?>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" id="cnlinhkien" href="">Cập nhật linh kiện</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Hóa đơn
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" id="lbhoadon" href="./listhoadon.php">Hóa đơn</a></li>
                    <li><a class="dropdown-item" id="lbhoadontmp" href="">Hóa đơn tạm thời</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" id="laphoadon" href="">Lập hóa đơn</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Lịch hẹn
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" id="lbhoadon" href="./listlichhen.php">Lịch hẹn</a></li>
                    <li><hr class="dropdown-divider"></li>
                </ul>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
        </div>
        </nav>
    </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#btnDN").click(function(){
                if($("#taikhoan").val() == "" || $("#matkhau").val() == ""){
                    alert("Tài khoản hoặc mật khẩu không được bỏ trống!");
                }else{
                    $.ajax({
                        url: "checktaikhoan.php",
                        type: "post",
                        dataType: "html",
                        data: {
                            user: $("#taikhoan").val(),
                            pass: $("#matkhau").val()
                        }
                    }).done(function(ketqua){
                        alert(ketqua);
                    });
                }
            });
        });
    </script>
    <?php
        if($quyen <= 0){
    ?>
        <script>
            $(document).ready(function(){
                $("#cndichvu").click(function(){
                    alert("Chức năng này chỉ dành cho nhân viên!");
                });
                $("#cnlinhkien").click(function(){
                    alert("Chức năng này chỉ dành cho nhân viên!");
                });
                $("#lbhoadon").attr("href","listhoadon.php");
                $("#lbhoadontmp").click(function(){
                    alert("Chức năng này chỉ dành cho nhân viên!");
                });
                $("#laphoadon").click(function(){
                    alert("Chức năng này chỉ dành cho nhân viên!");
                });
            });
        </script>
    <?php
        }else{
    ?>
        <script>
            $(document).ready(function(){
                $("#lbhoadontmp").attr("href","listhoadontmp.php");
                $("#cndichvu").click(function(){
                    alert("Xin chao!");
                });
                $("#cnlinhkien").attr("href","listlinhkien.php?")
            });
        </script>
    <?php
        }
    ?>
    <!----------------Slider------------------>
    <section class="slider">
        <div class="container">
            <div class="slider-content">
                <div class="slider-content-left">
                    <div class="slider-content-left-top-container">
                        <div class="slider-content-left-top">
                            <a href=""><img src="./Anh/slider1_1.jpg" alt=""></a>
                            <a href=""><img src="./Anh/slider1_2.jpg" alt=""></a>
                            <a href=""><img src="./Anh/slider1_3.jpg" alt=""></a>
                            <a href=""><img src="./Anh/slider1_4.jpg" alt=""></a>
                            <a href=""><img src="./Anh/slider1_5.jpg" alt=""></a>
                        </div>
                        <div class="slider-content-left-top-btn">
                            <i class="bi bi-caret-left-fill fa-chevron-left"></i>
                            <i class="bi bi-caret-right-fill fa-chevron-right"></i>
                        </div>
                    </div>
                    <div class="slider-content-left-bottom">
                        <li class="active">MSI Katana GF66-698VN Độc quyền Dreamshop</li>
                        <li>GIGABYTE G5 mạnh mẽ với SSD Gen 4</li>
                        <li>Chiến Game Phiêu Nhận Lôi Điểu</li>
                        <li>SAMSANG SALE</li>
                        <li>Sandisk Hè rực cháy Quà bỏng tay</li>
                    </div>
                </div>
                <div class="slider-content-right" style="list-style: none;">
                    <li><a href=""><img src="./Anh/banner_slider_1.jpg" alt=""></a></li>
                    <li><a href=""><img src="./Anh/banner_slider_2.jpg" alt=""></a></li>
                </div>
            </div>
        </div>
    </section>
    
    <div class="gta">
        <div class="container"><img src="./Anh/Annotation 2023-12-24 091612.png" alt=""></div>
    </div>
    <!----------------------trang chu------------------------------------->
    <ul class="title"><li><b>RAM</b></li></ul>
    <div class="container">
        
        <?php
            $result = $con->query("select * from linhkien where Loai = 'ram' order by MaLK desc limit 8");
            if($result->num_rows > 0){
                for($j = 1; $j <= 2; $j++){
                $i = 1;
        ?>
            <div class="row">
        <?php
                while($i <= 4)
                {
                    $row = $result->fetch_assoc();
                    $tmp = $row["GiaTien"] * 5 / 100;
                    $tmp += $row["GiaTien"];
        ?>
                <div class="col-md-3 col-xs-6">
                <div><a href="./ttram.php?malk=<?php echo $row["MaLK"] ?>" style="text-decoration: none;">
                    <img src="<?php echo $row["Anh"] ?>" alt="anh loi">
                    <div class="menu-laptop-content-item">
                        <li><?php echo $row["TenLK"] ?></li>
                        <li><b><?php echo number_format($row["GiaTien"],0,',','.') ?></b><sup>đ</sup></li>
                        <li><s><?php echo number_format($tmp,0,',','.') ?></s><sup>đ</sup></li>
                    </div></a>
                </div>
                </div>
        <?php
                    $i++;
                }
        ?>
            </div>
        <?php
            }
        }
        ?> 
        
    </div>

    <!--         trang chu ssd                 -->
    <ul class="title"><li><b>Ổ cứng</b></li></ul>
    <script src="./baitaplon.js"></script>
    <div class="container">
        
        <?php
            $result = $con->query("select * from linhkien where Loai = 'ssd' order by MaLK desc limit 8");
            if($result->num_rows > 0){
                for($j = 1; $j <= 2; $j++){
                $i = 1;
        ?>
            <div class="row">
        <?php
                while($i <= 4)
                {
                    $row = $result->fetch_assoc();
                    $tmp = $row["GiaTien"] * 5 / 100;
                    $tmp += $row["GiaTien"];
        ?>
                <div class="col-md-3 col-xs-6">
                <div><a href="./ttssd.php?malk=<?php echo $row["MaLK"] ?>" style="text-decoration: none;">
                    <img src="<?php echo $row["Anh"] ?>" alt="anh loi">
                    <div class="menu-laptop-content-item">
                        <li><?php echo $row["TenLK"] ?></li>
                        <li><b><?php echo number_format($row["GiaTien"],0,',','.') ?></b><sup>đ</sup></li>
                        <li><s><?php echo number_format($tmp,0,',','.') ?></s><sup>đ</sup></li>
                    </div></a>
                </div>
                </div>
        <?php
                    $i++;
                }
        ?>
            </div>
        <?php
            }
        }
        ?> 
        
    </div>


    <div class="bg-dark">
    <div class="container">
        <h2 class="slogan">TÍN Ở ĐÂU THÌ TÔI KHÔNG BIẾT, CHỈ BIẾT SHOP CHÚNG TÔI RẤT UY TÍN</h2>
        <div class="row">
            <div class="col-md-6">
                <img src="./Anh/2-bao-gia-truoc_1590488058.jpg.webp" alt="">
                <p class="text-uppercase fs-2 text-info">Báo giá trước</p>
                <p class="text-light">Việc báo giá trước khi sửa chữa là một 
                    phần trong quy trình phục vụ chuyên nghiệp của chúng tôi
                </p>
            </div>
            <div class="col-md-6">
                <img src="./Anh/slide_1591860628.jpg.webp" alt="">
                <p class="text-uppercase fs-2 text-info">Ký tên lên linh kiện, chụp máy ảnh</p>
                <p class="text-light">Bạn sẽ ký tên, chụp ảnh lên linh kiện trước
                    khi bàn giao cho chúng tôi trong trường hợp phảo để lại máy
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <img src="./Anh/xem-truc-tiep_1589795565.jpg.webp" alt="">
                <p class="text-uppercase fs-2 text-info">Xem trực tiếp sửa chữa</p>
                <p class="text-light">Bạn được xem trực tiếp trong lúc sửa 
                    chữa giúp bạn yên tâm với dịch vụ của chúng tôi
                </p>
            </div>
            <div class="col-md-6">
                <img src="./Anh/dm4_1583464193.png.webp" alt="">
                <p class="text-uppercase fs-2 text-info">Hoàn tiền nếu không hài lòng</p>
                <p class="text-light">Chỉ cần bạn thấy không hài lòng, 
                    chúng tôi sẽ hoàn lại 100% chi phí sửa chữa(mang tính chất minh họa 
                    không có chuyện hoàn tiền đâu em)
                </p>
            </div>
        </div>
    </div>
    </div>

    <!--------------------   footer ---------------->
    <div class="container" style="padding: 20px 0;">
        <div class="row">
            <div class="col-md-3">
                <img src="./Anh/piggy-bank.png" style="width: 20%;" alt="">
                <p class="text-success fw-bolder">Mua hàng siêu tiết kiệm</p>
                Các sản phẩm luôn được bán với giá ưu đãi nhất cho khách hàng
            </div>
            <div class="col-md-3">
                <img src="./Anh/pngwing.com.png" style="width: 20%;" alt="">
                <p class="text-success fw-bolder">Chất lượng tuyệt đối 100%</p>
                Cam kết các sản phẩm luôn là sản phẩm chính hãng
            </div>
            <div class="col-md-3">
                <img src="./Anh/pngegg.png" style="width: 20%;" alt="">
                <p class="text-success fw-bolder">Khuyến mãi cực lớn</p>
                Được hưởng ưu đãi và các phần quà hấp dẫn
            </div>
            <div class="col-md-3">
                <img src="./Anh/kisspng-payment.png" style="width: 20%;" alt="">
                <p class="text-success fw-bolder">Thanh toán dễ dàng</p>
                Giao hàng toàn quốc từ 1 -> 4 ngày, chuyển khoản, nhận hàng thanh toán,...
            </div>
        </div>
    </div>


    <!------thogn tin lien he------------->
    <div class="lmao">
        <div class="menu-laptop">
            <div class="con">
                <li><b>Giới thiệu</b></li>
                <li>Nhóm 9 IT4 hân hạnh  tài trợ website này</li>
            </div>
            <div class="con">
                <li><b>Danh sách thành viên</b></li>
                <li>Nguyễn Văn Nam</li>
                <li>Nguyễn Tuấn Anh</li>
                <li>Nguyễn Văn Tám</li>
            </div>
            <div class="con">
                <li><b>Hỗ trợ khách hàng</b></li>
                <li>Liên hệ: (+84) 962205147</li>
                <li>Email: 20210943@eaut.edu.vn</li>
            </div>
            <div class="con">
                <li><b>Địa chỉ</b></li>
                <li><b>Showroom Hà Nội:</b></li>
                <li>Số 22 LK27 KDT Vân Canh, Hoài Đức, Hà Nội</li>
                <li><b>Showroom Hồ Chí Minh: Coming Soon...</b></li>
            </div>
        </div>
    </div>
    <script src="./baitaplon.js"></script>
</body>
</html>