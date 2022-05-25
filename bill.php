<?php
    session_start();
    include "functionorder.php";
    if(isset($_POST['dathang'])&&($_POST['dathang'])){
        //lấy thông tin kh
        $billname=$_POST['hoten'];
        $address=$_POST['diachi'];
        $tel=$_POST['dienthoai'];
        $email=$_POST['email'];
        $total=tongdonhang();

        //insert đơn hàng
        $idbill=taodonhang($billname, $address, $tel, $email, $total);

        //lấy thông tin giỏ hàng từ session + id đơn hàng vừa tạo

        //insert vào bảng giỏ hàng
        for($i=0; $i < sizeof($_SESSION['giohang']); $i++) {
            $tensp=$_SESSION['giohang'][$i][1];
            $hinhsp=$_SESSION['giohang'][$i][0];
            $donggia=$_SESSION['giohang'][$i][2];
            $soluong=$_SESSION['giohang'][$i][3];
            $thanhtien=$donggia*$soluong;
            taogiohang($tensp, $hinhsp, $donggia, $soluong, $thanhtien, $idbill);
        }

        //show confirm đơn hàng
        $ttkh='
        <h3><strong>Bạn đã đặt hàng thành công</strong></h3>
        <h3>Mã đơn hàng: '.$idbill.'</h3>
        <h3>Thông tin nhận hàng</h3>
        <table class="thongtinnhanhang">
            <tr>
                <td '.$billname.'</td>
            </tr>
            <tr>
                <td>'.$address.'</td>
            </tr>
            <tr>
                <td>'.$tel.'</td>
            </tr>
            <tr>
                <td>'.$email.'</td>
            </tr>
        </table>
        ';
        //unset giỏ hàng session
        unset($_SESSION['giohang']);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://kit.fontawesome.com/465d2bcf78.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng - EcoHouse </title>
    <link rel="stylesheet" href="./stylephp/stylecartpage.css">
</head>

<body class="background">
    <!--header-->
    <header>
      <div class="container-flug">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="./index.php">
            <img src="./image/logo.png" width="100" height="50">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item active">
                <a class="nav-link" href="./index.php">Trang chủ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Khuyến mãi</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Sản phẩm
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="./danhmuc.php?cate=1">Hoa cưới</a>
                    <a class="dropdown-item" href="./danhmuc.php?cate=2">Hoa khai trương</a>
                    <a class="dropdown-item" href="./danhmuc.php?cate=3">Hoa chúc mừng</a>
                    <a class="dropdown-item" href="./danhmuc.php?cate=4">Hoa chia buồn</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Liên hệ</a>
              </li>
            </ul>
            <form class="form-inline mx-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm">
              <!-- <button class="btn btn-link" type="submit"> -->
                <a href="./trangtimkiem.php">
                  <i class="fa-solid fa-magnifying-glass"></i>
                </a>
              <!-- </button> -->
            </form>
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link" href="./tranggiohang.php"><i class="fas fa-shopping-cart"></i></a>
              </li>
            </ul>
            <ul class="navbar-nav mx-auto">
              <?php if(isset($row['Name'])) {?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $row['Name']; ?>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <!-- <a class="dropdown-item" href="./dangky.php">Đăng ký</a>
                    <a class="dropdown-item" href="./dangnhap.php">Đăng nhập</a> -->
                    <a class="dropdown-item" href="./dangxuat.php">Đăng xuất</a>
                  </div>
                </li>
              <?php }else {?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Tài khoản
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="./dangky.php">Đăng ký</a>
                    <a class="dropdown-item" href="./dangnhap.php">Đăng nhập</a>
                    <!-- <a class="dropdown-item" href="./dangxuat.php">Đăng xuất</a> -->
                  </div>
                </li>
              <?php }?>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!--content-->
    
    <div class="tieude">Thông tin đặt hàng</div> 
        <div class="small-container cart-page">
            <div class="row">
                <div class="col-sm-1 col-md-1 col-0"></div>
                <div class="col-sm-10 col-md-10 col-12">
                    <?php echo $ttkh;?>
                </div>
            </div>
        </div>
    <!--footer-->
    <footer class="page-footer bg-light mt-3">
        <div class="bg">
            <div class="container">
                <div class="row py-4 d-flex align-items-center">
                    <div class="col-md-12 text-center">
                        <a href="#"><i class="fa-brands fa-facebook text-white mr-4"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter text-white mr-4"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram-square text-white mr-4"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin text-white"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container text-center text-md-left mt-5">
            <div class="row">
                <div class="col-md-3 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold">EcoHouse</h6>
                    <hr class="bg mb-4 mt-0 d-inline-block mx-auto" style="width: 75px; height: 2px;">
                    <p class="mt-2">Tự hào là một trong những đơn vị cung cấp các dịch vụ hoa tươi chuyên nghiệp và uy
                        tín nhất, chúng tôi mong muốn nhận được nhiều hơn nữa sự tin tưởng và ủng hộ của khách hàng.</p>
                </div>

                <div class="col-md-3 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold">Chăm sóc khách hàng</h6>
                    <hr class="bg mb-4 mt-0 d-inline-block mx-auto" style="width: 125px; height: 2px;">
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-dark" style="text-decoration: none;">Trung tâm trợ giúp</a></li>
                        <li><a href="#" class="text-dark" style="text-decoration: none;">Hướng dẫn mua hàng</a></li>
                        <li><a href="#" class="text-dark" style="text-decoration: none;">Trả hàng & Hoàn tiền</a></li>
                        <li><a href="#" class="text-dark" style="text-decoration: none;">Thanh toán</a></li>
                        <li><a href="#" class="text-dark" style="text-decoration: none;">EcoHouse Blog</a></li>
                    </ul>
                </div>

                <div class="col-md-3 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold">Thông tin liên hệ</h6>
                    <hr class="bg mb-4 mt-0 d-inline-block mx-auto" style="width: 125px; height: 2px;">
                    <ul class="list-unstyled">
                        <li><i class="fa-solid fa-house"></i> 15 Phạm Văn Hai, Tân Bình</li>
                        <li><i class="fa-solid fa-envelope"></i> ecohouse@gmail.com</li>
                        <li><i class="fa-solid fa-phone"></i> 0973339233</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>