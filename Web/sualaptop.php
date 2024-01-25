<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sua chua laptop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./baitaplon1.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<style>
    .image-container {
    display: flex;
    align-items: center;
}
.image-container img {
    width: 100px;
    height: auto; 
    margin-right: 10px; 
}
#chuden{
    color:black;
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
                <div class="col-md-8">
                    <h4><b>Báo giá tham khảo dịch sửa chữa laptop</b></h4><br>
                    <p><b>Dell là hãng máy tính được người tiêu dùng đánh giá cao về độ bền và hiệu suất làm việc. Tuy nhiên, điều đó không có nghĩa là laptop Dell không bao giờ bị mắc lỗi. Bởi vậy, để giúp bạn có những thông tin cần thiết Sửa chữa laptop 24h .com sẽ báo gia chi tiết các dịch vụ sửa chữa laptop Dell tại Hà Nội..</b></p>
                    <br><h4 style="text-align:center"><b>BÁO GIÁ THAM KHẢO DỊCH VỤ SỬA CHỮA LAPTOP </b></h4>
                    <p>DELL là một trong những thương hiệu laptop được ưa chuộng nhất tại thị trường Việt Nam, nhờ sản phẩm có độ bền cao, cấu hình ổn định, tính năng đa dạng. Tuy nhiên laptop DELL cũng không tránh được các lỗi khá phổ biến như treo máy, không nhận wifi, không lên màn hình... Khi đó, quý khách có thể mang chiếc laptop của mình tới hệ thống cơ sở <b>Sửa chữa laptop 24h.com </b>để được khắc phục và đưa máy trở về trạng thái tốt nhất.</p><br>
                    <div style="text-align:center">
                        <img src="https://suachualaptop24h.com/images/slideshow/2020/06/26/compress2/bao-gia-sua-laptop-dell_1593136517.jpg " style="width:750px; height:500px;">
                        BÁO GIÁ THAM KHẢO DỊCH VỤ SỬA CHỮA LAPTOP<br>
                        (Thời gian khác phục sự cố 01h - 24h làm việc)
                    </div>
                    <img src="https://hethong.24hlaptop.com/image_content/bao-gia-dich-vu-sua-chua1-1660190191441-.jpg" style="width:750px;height:1100px;"><br>
                    <p>Sửa chữa laptop 24h.com cam kết mang lại cho quý khách chất lượng dịch vụ tốt nhất đi kèm với mức giá hợp lý. Với chúng tôi, lợi ích và sự hài lòng của khách hàng luôn được đặt lên hàng đầu.</p>
                    <p>
                        Liên hệ ngay với chúng tôi qua: <b>Tổng đài hỗ trợ</b>: 1800 6024 -<b>Hotline</b>: 091 546 8866<br>

                        Facebook:
                        <a href="https://suachualaptop24h.com/www.fb.com/suachualaptop24h">https://suachualaptop24h.com/www.fb.com/suachualaptop24h</a><br>

                        Đăng ký kênh Youtube nhận ngay thủ thuật hữu ích:
                        <a href="https://www.youtube.com/suachualaptop24hcomvn"> https://www.youtube.com/suachualaptop24hcomvn</a><br>

                        Tham gia hội Laptop Việt Nam tại:
                        <a href="https://www.facebook.com/groups/Tuvansuachualaptop/"> https://www.facebook.com/groups/Tuvansuachualaptop/</a><br>

                        Tìm địa chỉ gần nhất tại:
                        <a href="https://suachualaptop24h.com/Lien-he.html"> https://suachualaptop24h.com/Lien-he.html</a><br>
                        
                        <b>Sửa chữa Laptop 24h - Trân trọng từng phút giây để phục vụ khách hàng!</b><br><br>
                        <h5>Xem thêm</h5>
                        <a href="https://suachualaptop24h.com/dich-vu-sua-laptop-dell/bao-gia-chi-tiet-dich-vu-sua-chua-laptop-dell-o-ha-noi-n5635.html" style="color:black">- Báo giá tham khảo dịch sửa chữa laptop </a><br>
                        <a href="https://suachualaptop24h.com/dich-vu-sua-laptop-dell/nhung-loi-ich-ma-trung-tam-sua-chua-laptop-dell-tai-ha-noi-sua-chua-laptop-24h-com-dem-lai-cho-khach-hang-n5626.html" style="color:black">- Những lợi ích mà trung tâm sửa chữa laptop tại Hà Nội Sửa chữa laptop 24h .com đem lại cho khách hàng</a><br>
                        <a href="https://suachualaptop24h.com/dich-vu-sua-laptop-dell/trung-tam-sua-chua-may-tinh-dell-tai-ha-noi-sua-chua-laptop-24hcom-co-tai-nhung-quan-nao-n5533.html" style="color:black">- Trung tâm sửa chữa máy tính tại Hà Nội Sửa chữa Laptop 24h.com có tại những quận nào</a><br>
                        tag:
                        <a href="https://suachualaptop24h.com/tim-kiem-tin-tuc/S%E1%BB%ADa+ch%E1%BB%AFa+laptop.html" style="color:black">Sửa chữa laptop</a>
                    </p>
                    <h4>CÁC TIN KHÁC</h4><hr>
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
                        <div class="col">
                            <div>
                                <a href="https://suachualaptop24h.com/images/news/2022/09/22/resized/thay-man-hinh-dell-lay-ngay-00_1663817891.jpg.webp">
                                    <img src="https://suachualaptop24h.com/images/news/2022/09/22/resized/thay-man-hinh-dell-lay-ngay-00_1663817891.jpg.webp" style="width:180x; height:100px;"><br>
                                    <p id="chuden">Dịch vụ thay màn hình Dell | Chính hãng, Bảo hành 12 tháng</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4"> 
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