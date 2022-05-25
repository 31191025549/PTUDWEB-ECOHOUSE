<?php 
include "connect.php";
session_start();
if(!empty($_SESSION['ID'])){
  $ID = $_SESSION['ID'];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE ID = $ID");
  $row = mysqli_fetch_assoc($result);
}
// else{
//   header('location: dangnhap.php');
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="./web.css">
    <meta charset="UTF-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <script src="https://kit.fontawesome.com/465d2bcf78.js" crossorigin="anonymous"></script>
</head>
<body class="background">
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
                <a class="nav-link" href="#footer">Liên hệ</a>
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

  <!-- Nội dung -->
  <div class="container">
    <div class="row">
      <?php
        require_once "dm_module.php";
        $link=null;
        taoKetNoi($link);
        $dataset = chayTruyVanTraVeDL($link,"SELECT * FROM sanpham WHERE prID=".$_GET['id']);
        while($rows = mysqli_fetch_assoc($dataset)) {
      ?>
        <div class=" col-12 col-sm-12 col-md-6 col-md-5 "> 
          <br>
          <img src='<?php echo $rows['Picture'] ?>'width=99% height=550px >
        </div>

        <div class=" col-12 col-sm-12 col-md-6 ">  
          <div class="card-body">
            <div class="product-name">
              <span><?php echo $rows['PrName'] ?></span>
            </div>
            <br>
            <div class="product-sku">
              <span>ID: <?php echo $rows['prID'] ?></span>
              <br>
            </div>
            <div class="product-star">
              <div class="star align-items-center">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
              </div>
            </div>
            <br>
            <div class="product-price">
              <span class="sale-price"><?php echo $rows['PrPrice'] ?></span>
              <!-- <span class="sale-off">-10%</span>
              <span class="old-price">2.000.000đ</span> -->
            </div>
            <div class="product-short-description">
              <p>
              <?php echo $rows['PrContent'] ?>
              </p>
            </div>
            <br>
            <form action="tranggiohang.php" method="post">
                <!-- <input type="number" name="soluong" min="1" max="10" value="1"> -->
                <input type="number" name="soluong" min="1" max="10" value="1"><br/><br>
                <input type="submit" class="product-actions__buy-now" name="addcart" value="Thêm vào giỏ hàng">
                <input type="hidden" name="tensp" value= '<?php echo $rows['PrName']?>'>
                <input type="hidden" name="gia" value='<?php echo $rows['PrPrice']?>'>
                <input type="hidden" name="hinh" value='<?php echo $rows['Picture'] ?>'>
              </form>
          </div>
        </div>

        <div class="container">
          <div class="product-description">
            <span>Thông tin sản phẩm</span>
          </div>
          <hr class="bg mb-2 mt-2 d-inline-block mx-auto" style="width: 200px; height: 2px;">
          <div class="product-long-description">
            <p>
            <?php echo $rows['PrDecription'] ?>
            </p>
          </div>
        </div>
      <?php }?>
    </div>
  </div>
  <!-- Sản phẩm liên quan -->
  <div class="container">
    <div class="product-description">
      <span>Sản phẩm liên quan</span>
    </div>
    <hr class="bg mb-2 mt-2 d-inline-block mx-auto" style="width: 200px; height: 2px;">
  </div>
  
  <div class="container">
    <div class="row">
      <?php
        require_once "dm_module.php";
        $link=null;
        taoKetNoi($link);
        $dataset = chayTruyVanTraVeDL($link,"SELECT * FROM sanpham WHERE CateID=".$_GET['cate']);
        // $dataset = chayTruyVanTraVeDL($link,"SELECT * FROM sanpham WHERE CateID=".$_GET['id']);
        while($rows = mysqli_fetch_assoc($dataset)) {
      ?>
        <div class="col-md-3 col-sm-6 col-12">
          <div class="card mt-3">
            <div class="product align-items-center p-2 text-center">
              <img class="img-fluid" src='<?php echo $rows['Picture'] ?>' width='200' height='240'>
              <a style="text-decoration: none;" href="/trangchitietsanpham.php?id=<?php echo $rows['prID'] ?>&cate=<?php echo $rows['CateID'] ?>"><h1 class='text'> <?php echo $rows['PrName']?> </h1></a>
              <div class="cost mt-2 text-dark">
                  <div class='price'>
                    <span><?php echo number_format($rows['PrPrice'])?></span>
                  </div>
                  <div class="star align-items-center">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
              </div>
            </div>
            <!-- button cho card -->
              <form action="tranggiohang.php" method="post">
                <!-- <input type="number" name="soluong" min="1" max="10" value="1"> -->
                <input type="submit" class="product-actions__buy-now" name="addcart" value="Thêm vào giỏ hàng">
                <input type="hidden" name="tensp" value= '<?php echo $rows['PrName']?>'>
                <input type="hidden" name="gia" value='<?php echo $rows['PrPrice']?>'>
                <input type="hidden" name="hinh" value='<?php echo $rows['Picture'] ?>'>
                <input type="number" name="soluong" min="1" max="10" value="1">
              </form>
          </div>
        </div>
      <?php }?>
    </div>
  </div>
<!-- footer -->
<footer class="page-footer bg-light mt-3" id="footer">
  <div class="bg">
    <div class="container-fluid">
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
        <p class="mt-2">Tự hào là một trong những đơn vị cung cấp các dịch vụ hoa tươi chuyên nghiệp và uy tín nhất, chúng tôi mong muốn nhận được nhiều hơn nữa sự tin tưởng và ủng hộ của khách hàng.</p>
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