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
    ?>
<div class="head">
        <nav class="navbar navbar-expand-lg bg-success">
        <div class="container-fluid" style="margin-left: 20%;">
            <a class="navbar-brand" href="./1home.php"><img src="./Anh/Logo.png" style="width: 250px;"></a>
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
                <a class="nav-link active" aria-current="page" href="#"  style="width: auto">
                    <img src="./Anh/CalendarLogo.png" style="width: 60px;">
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-light fw-semibold" href="#"><p style="width: 70px;">Đặt lịch sửa chữa</p></a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-light fw-semibold" href="tel:+84896130627" target="_blank"><i class="bi bi-telephone-fill"></i>+84896130627</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-light fw-semibold" id="account" href="" data-bs-toggle="modal" data-bs-target="#ModalDN"><i class="bi bi-person-circle"></i>Tài khoản</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
    </div>
    <?php
        $quyen = -1;
        session_start();
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
                            <label for="" id="mand"><?php echo $row["MaND"] ?></label>
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
                    <form action="#" method="POST">
                    <div class="form-group">
                            <label for="taikhoan">Họ Tên</label>
                            <input class="form-control" id="hoten" name="hoten">
                        </div>
                        <div class="form-group">
                            <label for="taikhoan">Tài khoản</label>
                            <input class="form-control" id="taikhoan" name="taikhoan">
                        </div>
                        <div class="form-group">
                            <label for="taikhoan">Mật khẩu</label>
                            <input class="form-control" type="password" id="matkhau" name="maukhau">
                        </div>
                        <div class="form-group">
                            <label for="taikhoan">Nhập lại mật khẩu</label>
                            <input class="form-control" id="matkhautmp" name="matkhautmp">
                        </div>
                        <div class="form-group">
                            <label for="">Ngày sinh</label>
                        </div>
                            <div class="form-group" style="width: 25%; float: left; margin-left: 8%;">
                                <label for="">Ngày</label>
                                <select class="form-select" aria-label="Default select example">
            <?php
                                    for($i = 1; $i <= 31; $i++){
            ?>
                                    <option selected value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php

                                    }
            ?>
                                </select>
                            </div>
                            <div class="form-group" style="width: 25%; float: left; margin-left: 3%;">
                                <label for="">Tháng</label>
                                <select class="form-select" aria-label="Default select example">
            <?php
                                    for($i = 1; $i <= 12; $i++){
            ?>
                                    <option selected value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php

                                    }
            ?>
                                </select>
                            </div>
                            <div class="form-group" style="width: 25%; float: left; margin-left: 3%;">
                                <label for="">Năm</label>
                                <select class="form-select" aria-label="Default select example">
            <?php
                                    for($i = 1980; $i <= 2023; $i++){
            ?>
                                    <option selected value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php

                                    }
            ?>
                                </select>
                            </div>
                        <div class="form-group" style="clear:both;">
                            <label for="taikhoan">Địa chỉ</label>
                            <input class="form-control" id="diachi" name="diachi">
                        </div>
                        <button class="btn btn-info btn-danger" style="margin-top: 20px;">Đăng Kí</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                <a class="nav-link" href="">Giới thiệu</a>
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
                    <li><a class="dropdown-item" href=""><?php echo $row["TenDV"] ?></a></li>
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
                    <li><a class="dropdown-item" href=""><?php echo $row["Loai"] ?></a></li>
    <?php
                }
            }
    ?>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" id="cnlinhkien" href="">Cập nhật linh kiện</a></li>
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
            });
        </script>
    <?php
        }else{
    ?>
        <script>
            $(document).ready(function(){
                $("#cndichvu").click(function(){
                    alert("Xin chao!");
                });
                $("#cnlinhkien").click(function(){
                    alert("Xin chao!");
                });
            });
        </script>
    <?php
        }
    ?>

<?php
        $malk = $_GET["malk"];
        $sql = $con->prepare("select * from linhkien where MaLK = ?");
        $sql->bind_param("s", $malk);

        $sql->execute();
        $ketqua = $sql->get_result();
        if($ketqua->num_rows > 0){
            $row = $ketqua->fetch_assoc();
            $tmp = $row["GiaTien"] * 5 / 100;
            $tmp += $row["GiaTien"];
    ?>
    
    <div class="menu-laptop" style="width: 100%;">
        <li style="padding: 30px 100px 30px;"><b style="font-size: 26px;">RAM</b></li>
    </div>
    <div class="menu-laptop">
        <li><img style="width: 500px;" src="<?php echo $row["Anh"] ?>"></li>
        <div class="thongtinsp">
            <li>
                <li><y style="font-size: 26px;"><?php echo $row["TenLK"] ?></y></li>
                <li>Thương hiệu: <r style="color: green;">Corsair</r> | Tình trạng: <r style="color: green;">Còn hàng</r></li>
                <li class="a"><b><?php echo number_format($row["GiaTien"],0,',','.') ?> <sup>đ</sup></b>
                <sub><s><?php echo number_format($tmp,0,',','.') ?><sup>đ</sup></s></sub></li>
    <?php
        }
    ?>
                <li><i class="fa-solid fa-circle-check"></i><o style="color: gray;" id="malk"><?php echo $malk ?></o></li>
                <li><i class="fa-solid fa-circle-check"></i><o style="color: gray;">Loại sản phẩm: Ram PC</o></li>
                <li><i class="fa-solid fa-circle-check"></i><o style="color: gray;">Dung lượng: 94 GB (2x48GB)</o></li>
                <li><i class="fa-solid fa-circle-check"></i><o style="color: gray;">Chuẩn: DDR5</o></li>
                <li><i class="fa-solid fa-circle-check"></i><o style="color: gray;">Bus: 6600MHz (CL32)</o></li>
                <li><i class="fa-solid fa-circle-check"></i><o style="color: gray;">Điện áp: 1.1 - 1.4v</o></li>
                <li><i class="fa-solid fa-circle-check"></i><o style="color: gray;">Bảo hành: 36 tháng</o></li>
            </li> 
            <div class="nutmua">
                <li><a href=""><button>Mua ngay</button></a></li>
                <li><a href=""><button style="background-color: rgb(68,68,68);" id="btnthemgh">Thêm vào giỏ hàng</button></a></li>
            </div>
        </div>
        <li><img src="./Anh/288166450_712987396640448_5871764570791579109_n.png"></li>
    </div> 
    <script>
        $(document).ready(function(){
            $("#btnthemgh").click(function(e){
                e.preventDefault();
                $.ajax({
                        url: "themgiohang.php",
                        type: "post",
                        dataType: "html",
                        data: {
                            mand: $("#mand").text(),
                            malk: $("#malk").text()
                        }
                    }).done(function(ketqua){
                        alert(ketqua);
                    });
            });
        });
    </script>
    <div class="menu-laptop">
        <div class="menu-laptop2">
            <li class="thongso">Thông số kĩ thuật</li>
            <table>
                <tr class="mau">
                    <td class="cot">Nhà sản xuất</td>
                    <td class="cot2">Corsair</td>
                </tr>
                <tr>
                    <td class="cot">Model</td>
                    <td class="cot2">CMP96GX5M2B6600C32</td>
                </tr>
                <tr class="mau">
                    <td class="cot">Chuẩn Ram</td>
                    <td class="cot2">DDR5</td>
                </tr>
                <tr>
                    <td class="cot">Bus hỗ trợ</td>
                    <td class="cot2">6600 MHz</td>
                </tr>
                <tr class="mau">
                    <td class="cot">Dung lượng</td>
                    <td class="cot2">96 GB (2x48GB)</td>
                </tr>
                <tr>
                    <td class="cot">Điện áp</td>
                    <td class="cot2">1.1 v - 1.4 v</td>
                </tr>
                <tr class="mau">
                    <td class="cot">Màu sắc</td>
                    <td class="cot2">Đen</td>
                </tr>
                <tr class="mau">
                    <td class="cot">CAS Latency</td>
                    <td class="cot2">CL 32-39-39-76</td>
                </tr>
                <tr>
                    <td class="cot">Performance Profile</td>
                    <td class="cot2">XMP 3.0, AMD EPXO</td>
                </tr>
                <tr class="mau">
                    <td class="cot">Over Clock</td>
                    <td class="cot2">Yes</td>
                </tr>
                <tr>
                    <td class="cot">Bảo hàng</td>
                    <td class="cot2">36 tháng</td>
                </tr>
            </table>
        </div>
    </div>

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
</body>
</html>