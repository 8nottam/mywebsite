<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>goithieu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./baitaplon1.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
</head>
<style>
    .luidong{
        margin-left: 30px;
    }
    #chuden{
        color:black;
    }
    .image-container {
        display: flex;
        align-items: center;
    }
    .image-container img {
        width: 100px;
        height: auto; 
        margin-right: 10px; 
    }
</style>
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



<div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 bg-while" >
                <h4>Giới thiệu về hệ thống sửa chữa laptop 24h</h4><br>
                <p>Sửa chữa Laptop 24h là hệ thống được thành lập trong lĩnh vực thương mại và dịch vụ tin học - viễn thông, tiên phong trong lĩnh vực dịch vụ sửa laptop và phân phối các linh phụ kiện điện tử, máy tính, laptop, được liên kết bởi các hãng nổi tiếng như Lenovo, Asus, Dell, Sony, Acer, Apple…</p>
        <div id="accordion">
        <div class="card">
            <div class="card-header">
                <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">
                Mục lục nội dung
                </a>
                <div>
                    <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                        <div class="card-body">
                            <div class="col-lg-4">
                                <!-- Mục Lục Dọc -->
                                <nav id="table-of-contents" class="flex-column">
                                    <h4>Mục Lục</h4>
                                    <ul class="list-group">
                                        <li class="list-group-item"><a href="#section1" id="chuden">1. Tìm hiểu chung về Sửa chữa Laptop 24h</a></li>
                                        <li class="list-group-item"><a href="#section2" id="chuden">2. Dịch vụ Sửa chữa Laptop 24h cung cấp</a></li>
                                        <li class="list-group-item"><a href="#section3" id="chuden">2.1. Dịch vụ sửa chữa laptop, sửa chữa máy tính PC, MacBook</a></li>
                                        <li class="list-group-item"><a href="#section4" id="chuden">2.2. Nhập khẩu và phân phối sản phẩm linh kiện laptop</a></li>
                                        <li class="list-group-item"><a href="#section5" id="chuden">2.3. Chuyển giao công nghệ, cung cấp dịch vụ đào tạo nghề sửa laptop chuyên nghiệp</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-lg-12 text-center">
                <img src="https://suachualaptop24h.com/upload_images/images/2022/05/17/gioi_thieu_suachualaptop24h_1596611494.jpg" alt="HTML5 Icon" style="width:750px;height:400px;"class="img-fluid">
                <p >Nhân viên Sửa chữa laptop 24h .com tại sự kiện do công ty tổ chức</p> 
            </div>
            <p>Với giá trị cốt lõi luôn lấy "TẬN TÂM - UY TÍN - CHUYÊN NGHIỆP" đặt lên hàng đầu, quan điểm hoạt động của trung tâm là làm việc nghiêm túc, trách nhiệm, đặt lợi ích khách hàng lên số 1 và hướng tới hợp tác, chia sẻ cùng các đối tác để đi tới thành công.</p>
            <!-- Nội dung trang web -->
            <h2 id="section1">1. Tìm hiểu chung về Sửa chữa Laptop 24h</h2>
            <p>Sửa chữa Laptop 24h được thành lập vào ngày 07/06/2011. Đây là hệ thống trung tâm chuyên về lĩnh vực thương mại và dịch vụ tin học - viễn thông, tiên phong trong lĩnh vực dịch vụ sửa chữa máy tính, laptop, macbook, smartphone và phân phối các linh phụ kiện điện tử, máy tính, laptop. Trung tâm đã và đang là đối tác của nhiều hãng điện tử nổi tiếng như: Lenovo, Asus, Dell, Sony, Acer, Apple…<br>
            <br>
            Trải qua quá trình 10 năm hình thành và phát triển, hệ thống chi nhánh của Sửa chữa Laptop 24h đã có mặt trên khắp các tỉnh thành với 27 cơ sở xuyên suốt từ Bắc vào Nam:<br>
            <p class="luidong">- Số 153 Đường 3/2, Phường 11, Quận 10, TP. Hồ Chí Minh<br>
            - Số 35 Trần Hưng Đạo, Đại Phúc, TP. Bắc Ninh<br>
            - Ki ốt 1 CT4B Linh Đàm, Hoàng Mai, Hà Nội<br>
            - Số 07 liền kề D2, Đại lộ Lê Nin, TP Vinh, Nghệ An<br>
            - Số 356 Thân Nhân Trung, TT. Bích Động, Việt Yên, Bắc Giang<br>
            - 349 Mê Linh, Liên Bảo, Vĩnh Yên, Vĩnh Phúc<br>
            - 43/68 Trung Kính, Yên Hòa, Cầu Giấy, Hà Nội<br>
            - Số 475 Nguyễn Văn Cừ, Long Biên, Hà Nội<br>
            - Số 118 Lạc Long Quân, Tây Hồ, Hà Nội<br>
            - Số 24 Nguyễn Xiển, Thanh Xuân, Hà Nội<br>
            - Số 126 Chùa Láng - Đống Đa - Hà Nội<br>
            - Số 5 ngõ 178 Thái Hà, Đống Đa, Hà Nội<br>
            - Số 220 Thái Hà, Đống Đa, Hà Nội<br>
            - Số 8 Hồ Tùng Mậu, Cầu Giấy, Hà Nội<br>
            - Số 31 Hồ Tùng Mậu, Cầu Giấy, Hà Nội<br>
            - Số 128 Lê Thanh Nghị, Bách Khoa, Hà Nội<br>
            - Số 176 Lê Thanh Nghị, Bách Khoa, Hà Nội<br>
            - Số 32K Lý Nam Đế, Hoàn Kiếm, Hà Nội<br>
            - Số 206 Lương Thế Vinh, Thanh Xuân, Hà Nội<br>
            - Số 284 Quang Trung, Hà Đông, Hà Nội<br>
            - Số 417 Cổ Nhuế, Từ Liêm, Hà Nội<br>
            - Số 11 Ngã tư Nhổn, Từ Liêm, Hà Nội<br>
            - Số 297 Lương Ngọc Quyến, TP Thái Nguyên<br>
            - Số 87 Quán Nam, Lê Chân, TP. Hải Phòng<br>
            - Số 283/45 CMT8, Phường 12, Quận 10, TP.HCM<br>
            - Số 448 Quang Trung, P.10, Quận Gò Vấp, TP.HCM<br>
            - Lô số 6, Shop House Đại Hoàng Sơn, P.Ngô Quyền, TP. Bắc Giang</p><br>
            Bên cạnh đó là đội ngũ nhân sự lớn mạnh với hơn 200 nhân sự, bao gồm kỹ sư, kỹ thuật viên, nhân viên dịch vụ, CSKH... được đào tạo bài bản đã từng bước chiếm lĩnh được tình cảm và trở thành địa chỉ tin cậy đối với khách hàng trong và ngoài nước.<br>
            <div class="col-lg-12 text-center">
                <img src="https://suachualaptop24h.com/upload_images/images/2022/12/14/gioi-thieu-1.jpg" width:750px; height:500px; class="img-fluid">
                <p >Nhân sự Sửa Chữa Laptop 24h .com ngày khai trương cơ sở mới</p>
            </div>
            Hiện nay trên thị trường xuất hiện rất nhiều các trung tâm sửa laptop, trong đó có một số trung tâm laptop không đảm bảo chất lượng, dịch vụ không đủ chuyên nghiệp… gây tổn thất chi phí và thời gian cho khách hàng. Chính vì vậy, sự xuất hiện của Sửa chữa Laptop 24h đã tạo nên một xu thế mới trong ngành dịch vụ máy tính - laptop, đó là lấy lợi ích của khách hàng làm tôn chỉ hoạt động, luôn cố gắng hết sức để phục vụ nhu cầu và bảo vệ quyền lợi cho khách hàng.<br>
            <br>Là một đơn vị tiên phong trong lĩnh vực thương mại điện tử và tin học - viễn thông nên lĩnh vực hoạt động chính của trung tâm là các mảng về thiết bị công nghệ cao với hàng trăm đầu dịch vụ khác nhau. Trong đó, nổi bật là các dịch vụ NÂNG CẤP - VỆ SINH, BẢO DƯỠNG, BẢO TRÌ - SỬA CHỮA LAPTOP - MÁY TÍNH - MACBOOK - CHUYÊN NGHIỆP - LẤY LIỀN - TẠI NHÀ.</p>
            <h2 id="section2">2. Dịch vụ Sửa chữa Laptop 24h cung cấp</h2>
            <h4 id="section3">2.1. Dịch vụ sửa chữa laptop, sửa chữa máy tính PC, MacBook</h4>
            <p class="luidong">- Dịch vụ sửa chữa máy tính PC, sửa macbook, sửa laptop tại nhà và khối văn phòng, cơ quan, trường học<br>
            - Dịch vụ sửa chữa máy tính, sửa chữa laptop lấy ngay uy tín và chuyên nghiệp.<br>
            - Dịch vụ vệ sinh laptop và bảo dưỡng laptop<br>
            - Dịch vụ thay thế linh kiện laptop chính hãng, lấy ngay: thay màn hình laptop, thay bàn phím, thay pin, thay mainboard, CPU, RAM,...<br>
            - Dịch vụ bảo hành laptop cho các nhà phân phối<br>
            - Dịch vụ bảo trì laptop PC tại cơ quan, trường học theo hợp đồng<br>
            - Dịch vụ nâng cấp các thiết bị linh kiện cho máy tính laptop như: RAM, ổ cứng SSD…<br>
            - Dịch vụ cài đặt các phần mềm cho laptop, macbook..: cài win, photoshop, MacOS...<br>
            - Cung cấp các gói dịch vụ bảo hiểm, bảo hành dịch vụ cho các siêu thị và các cửa hàng.</p><br>
            <div class="col-lg-12 text-center">
                <img src="https://suachualaptop24h.com/upload_images/images/2022/12/14/dich-vu-ep-kinh-Surface-1.jpg" width:750px; height:500px; class="img-fluid">
                <p>Dịch vụ sửa chữa laptop, sửa chữa máy tính PC, MacBook</p>
            </div>
            <h4 id="section4">2.2. Nhập khẩu và phân phối sản phẩm linh kiện laptop</h4>
            <p>Nhập khẩu, phân phối các loại linh, phụ kiện laptop, Apple chính hãng trên toàn quốc.<br>

                <br>Sửa chữa Laptop 24h là đại lý phân phối chính thức của nhiều nhãn hàng nổi tiếng: ESET, Western Digital, Kingston,...</p>
            <h4 id="section5">2.3. Chuyển giao công nghệ, cung cấp dịch vụ đào tạo nghề sửa laptop chuyên nghiệp</h4>
            <p>Sửa chữa Laptop 24h nhận chuyển giao công nghệ, cung cấp dịch vụ đào tạo nghề sửa laptop chuyên nghiệp cho các cá nhân và các trường nghề trên cả nước. Sau khi hoàn thành khoá đào tạo nghề, học viên sẽ thực tập và làm việc trực tiếp ngay tại hệ thống Sửa chữa Laptop 24h.<br>
            <br>Với các dịch vụ cung cấp, hệ thống Sửa chữa Laptop 24h <b>cam kết</b>:,<br>
            <p class="luidong">- Nếu làm sai, hỏng một đền gấp đôi<br>
            - Giữ máy quá thời gian 10 ngày sẽ GIẢM 50% chi phí sửa chữa<br>
            - Máy lỗi quay lại lần 03 sẽ hoàn trả lại 100% chi phí. <br>
            - Tuyệt đối sửa đúng bệnh, thay đúng linh kiện, và báo đúng giá cho khách hàng, sửa siêu tốc chỉ từ 15 phút đến 1 giờ. <br>
            - Đặc biệt, tất cả các thay đổi ở máy đều phải được sự đồng ý, chấp thuận của khách hàng trước khi sửa chữa. <br>
            - Với các sản phẩm, Sửa chữa Laptop 24h tự tin là thế giới linh kiện chính hãng với chế độ bảo hành uy tín và cạnh tranh (Đổi mới sản phẩm 1 đổi 1 nếu có sai khác gây hỏng trong thời gian bảo hành).</p><br>
            - <b>Một số hình ảnh về trụ sở công ty:</b></p>
            <div class="col-lg-12 text-center">
                <img src="https://suachualaptop24h.com/upload_images/images/2020/06/17/5-gioi-thieu-Sua-chua-laptop-24h.jpg" width:750px; height:500px; class="img-fluid">
                <p >Cơ sở số 5 ngõ 178 Thái Hà</p><br>
                <img src="https://suachualaptop24h.com/upload_images/images/2020/06/17/aaa.jpg" width:750px; height:500px; class="img-fluid">
                <p>Cơ sở Sửa chữa Laptop 24h tại Thái Nguyên</p><br>
                <img src="https://suachualaptop24h.com/upload_images/images/2020/06/17/6-gioi-thieu-Sua-chua-laptop-24h.jpg" width:750px; height:500px; class="img-fluid">
                <p>Tầng 1: Sửa laptop lấy ngay, lấy nhanh cho các dòng Laptop</p><br>
                <img src="https://suachualaptop24h.com/upload_images/images/2020/06/17/8-gioi-thieu-Sua-chua-laptop-24h.jpg" width:750px; height:500px; class="img-fluid">
                <p>Tầng 2: Phòng giao nhận máy</p><br>
                <img src="https://suachualaptop24h.com/upload_images/images/2020/06/17/3-gioi-thieu-Sua-chua-laptop-24h.jpg" width:750px; height:500px; class="img-fluid">
                <p>Tầng 3 – Sửa laptop chuyên sâu cho các hãng</p><br>
                <img src="https://suachualaptop24h.com/upload_images/images/2020/06/17/9-gioi-thieu-Sua-chua-laptop-24h.jpg" width:750px; height:500px; class="img-fluid">
                <p>Dây chuyền máy hàn Chipset chuyên nghiệp, hiện đại và tiên tiến nhất Việt Nam hiện nay</p><br>
                <img src="https://suachualaptop24h.com/upload_images/images/2020/06/17/10-gioi-thieu-Sua-chua-laptop-24h.jpg" width:750px; height:500px; class="img-fluid">
                <p>Khách hàng luôn tấp nập tại các trung tâm trên toàn hệ thống </p><br>
            </div>
            <p>Với đội ngũ kỹ sư, kỹ thuật viên trẻ yêu nghề, nhiệt huyết, năng động, sáng tạo và ham học hỏi cùng với sự góp sức của các chuyên gia kỹ thuật giàu kinh nghiệm, trung tâm Sửa chữa Laptop 24h tự hào là địa chỉ sửa laptop uy tín tại Hà Nội, mang tới khách hàng những dịch vụ sửa laptop lấy ngay, sửa laptop tại nhà, bảo dưỡng và vệ sinh laptop lấy ngay, bảo hành bảo trì laptop hiệu quả,... mang lại giá trị và niềm vui cho khách hàng!</p>
            <div style="text-align:center">
                <iframe width="640px" height="360px" src="https://www.youtube.com/embed/tx32zdsCWDA" title="Cùng MC Hạnh Phúc trải nghiệm dịch vụ tại Sửa chữa Laptop 24h.com" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <p>Trải nghiệm dịch vụ tại Sửa chữa Laptop 24h.com cùng MC Hạnh Phúc</p><br><br>
            </div>
            <p><b>Sửa chữa Laptop 24h - Dịch vụ uy tín hàng đầu Việt Nam</b></p><br>
            <p>
                <b>Mọi chi tiết xin vui lòng liên hệ:</b>
                <b>Tổng đài hỗ trợ:</b> 1800 6024 <b>- Hotline: </b> 091 546 8866
                <p>
                    Facebook:
                    <a href="https://suachualaptop24h.com/www.fb.com/suachualaptop24h">https://suachualaptop24h.com/www.fb.com/suachualaptop24h</a>
                </p>
                <p>
                    Đăng ký kênh Youtube nhận ngay thủ thuật hữu ích:
                    <a href="https://www.youtube.com/suachualaptop24hcomvn"> https://www.youtube.com/suachualaptop24hcomvn</a>
                </p>
                <p>
                    Tham gia hội Laptop Việt Nam tại:
                    <a href="https://www.facebook.com/groups/Tuvansuachualaptop/"> https://www.facebook.com/groups/Tuvansuachualaptop/</a>
                </p>
                <p>
                    Tìm địa chỉ gần nhất tại:
                    <a href="https://suachualaptop24h.com/Lien-he.html"> https://suachualaptop24h.com/Lien-he.html</a>
                </p>
                <b>Sửa chữa Laptop 24h - Trân trọng từng phút giây để phục vụ khách hàng!</b><br><br>
            </p>
        </div>
            <h3>Các tin khác</h3><hr>
            <div class="row">
                <div class="col">
                    <div>
                        <a href="https://suachualaptop24h.com/ve-chung-toi/dan-tri-review-sua-chua-laptop-24h-co-uy-tin-khong-n7986.html">
                            <img src="https://suachualaptop24h.com/images/news/2021/10/12/resized/review-sua-chua-laptop-24h-co-uy-tin-khong-0_1634039073.jpg.webp" style="width:180x; height:100px;"><br>
                            <p id="chuden">Dân trí | Review sửa chữa laptop 24h có uy tín không? (05/12/2018)</p>
                        </a>
                    </div>                    
                </div>
                    <div class="col">
                        <div>
                            <a href="https://suachualaptop24h.com/ve-chung-toi/lich-su-hinh-thanh-he-thong-sua-chua-laptop-24h-n7710.html">
                                <img src="https://suachualaptop24h.com/images/news/2023/05/29/resized/lich-su-hinh-thanh-va-phat-trien_1685330172.jpg.webp" style="width:180x; height:100px;"><br>
                                <p id="chuden">Lịch sử hình thành hệ thống Sửa chữa Laptop 24h</p>
                            </a>
                        </div>
                    </div>
                        <div class="col">
                            <div>
                                <a href="https://suachualaptop24h.com/ve-chung-toi/tai-sao-he-thong-sua-chua-laptop-24h-gat-hai-duoc-thanh-cong-nhu-hien-tai--n7709.html">
                                    <img src="https://suachualaptop24h.com/images/news/2021/06/29/resized/tai-sao-sua-chua-laptop-24h-thanh-cong-1_1624950023.jpeg.webp" style="width:180x; height:100px;"><br>
                                <p id="chuden">Tại sao hệ thống Sửa chữa Laptop 24h gặt hái được thành công như hiện tại?</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-md-4 p-3 bg-while">
            <h2>TIN HOT</h2><hr>
            <div>
            <a href="https://suachualaptop24h.com/tin-cong-nghe-trong-ngay/ngung-ho-tro-windows-10-se-gay-ra-tham-hoa-rac-thai-dien-tu-n9603.html">
                <img src="https://suachualaptop24h.com/upload_images/images/2023/12/22/windows10-ngung-ho-tro-gay-nen-rac-thai-dien-tu.jpg" style="width:400x; height:210px;"><br>
                <p id="chuden">Việc ngừng hỗ trợ Windown10 sẽ gây ra thảm họa rác thải điện tử chưa từng có</p>
            </a>
            </div><hr>
            <div class="row">
                <div class="col">
                    <a href="https://suachualaptop24h.com/tin-cong-nghe-trong-ngay/giai-dap-cpu-the-he-thu-14-re-nhat-cua-intel-co-dang-mua-n9602.html">
                        <img src="https://suachualaptop24h.com/upload_images/images/2023/12/22/chip-core-14-co-dang-mua.jpg" style="width:200; height:100px;"><br>
                        <p id="chuden">Giải đáp: CPU thế hệ thứ 14 rẻ nhất của Intel có đáng mua không</p>
                    </a>
                </div>
                <div class="col">
                    <a href="https://suachualaptop24h.com/khuyen-mai-sua-chua/don-giang-sinh-rinh-qua-khung-cung-sua-chua-laptop-24h-n9601.html">
                        <img src="https://suachualaptop24h.com/upload_images/images/2023/12/14/uu-dai-giang-sinh-sua-chua-laptop-24h.jpg" style="width:200; height:100px;"><br>
                        <p id="chuden">ĐÓN GIÁNG SINH - RINH QUÀ KHỦNG cùng Sửa chữa Laptop 24h</p>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="https://suachualaptop24h.com/tin-cong-nghe-trong-ngay/thong-so-wi-fi-7-hoan-thien-se-ra-mat-n9600.html">
                        <img src="https://suachualaptop24h.com/upload_images/images/2023/12/12/wifi7-sap-ra-mat.jpg" style="width:200; height:100px;"><br>
                        <p id="chuden">Thông số Wi-Fi 7 hoàn thiện sẽ ra mắt trong Quý 1/2024</p>
                    </a>
                </div>
                <div class="col">
                    <a href="https://suachualaptop24h.com/tin-cong-nghe-trong-ngay/windows-12-khoi-mao-cho-cuoc-chien-chip-ai-sap-toi-n9599.html">
                        <img src="https://suachualaptop24h.com/upload_images/images/2023/12/09/windows12-khoi-mao-cuoc-chien-ai.jpg" style="width:200; height:100px;"><br>
                        <p id="chuden">Windows 12 khơi mào cho cuộc chiến chip AI sắp tới</p>
                    </a>
                </div><br>
                <h4>Đọc nhiều nhất</h4><hr><br>
            <a href="https://suachualaptop24h.com/goc-chia-se/tong-hop-50-hinh-nen-den-dep-chat-luong-n7408.html" class="image-container">
                <img src="https://suachualaptop24h.com/images/news/2021/03/31/small/tong-hop-50-hinh-nen-den-bao-dep-va-chat-luong_1617134787.jpg.webp" alt="Hình ảnh" >
                <p id="chuden">W[Tổng hợp] 50+ hình nền đen hiện đại, chất lượng cao</p>
            </a>
            <a href="https://suachualaptop24h.com/office/cach-xoa-trang-trang-trong-word-n8411.html" class="image-container">
                <img src="https://suachualaptop24h.com/upload_images/images/2022/08/10/cach-xoa-trang-trang-trong-word-00.jpg" alt="Hình ảnh" >
                <p id="chuden">Các cách xóa trang trắng trong Word cực đơn giản</p>
            </a>
            <a href="https://suachualaptop24h.com/goc-chia-se/cach-kiem-tra-doi-may-laptop-day-du-n6380.html" class="image-container">
                <img src="https://suachualaptop24h.com/upload_images/images/2023/03/21/kiem-tra-doi-may-laptop-banner.jpg" alt="Hình ảnh" >
                <p id="chuden">Hướng dẫn kiểm tra đời máy laptop đầy đủ và đơn giản nhất</p>
            </a>
            <a href="https://suachualaptop24h.com/goc-chia-se/tong-hop-10-loi-google-meet-thuong-gap-va-cach-khac-phuc-n7546.html" class="image-container">
                <img src="https://suachualaptop24h.com/upload_images/images/2021/05/20/tong-hop-10-loi-google-meet-thuong-gap-va-cach-khac-phuc.jpg" alt="Hình ảnh" >
                <p id="chuden">Tổng hợp 10 lỗi Google Meet thường gặp và cách khắc phục</p>
            </a>
            <a href="https://suachualaptop24h.com/thu-thuat-internet/cach-khoa-tin-nhan-zalo-khong-lo-bi-xem-trom-cuoc-tro-chuyen-n6984.html" class="image-container">
                <img src="https://suachualaptop24h.com/images/news/2020/08/07/small/cach-khoa-tin-nhan-zalo-don-gian-1_1596793174.jpg.webp" alt="Hình ảnh" >
                <p id="chuden">Cách khóa tin nhắn Zalo không lo bị xem trộm cuộc trò chuyện</p>
            </a>
            </div>
        </div>
    </div>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>