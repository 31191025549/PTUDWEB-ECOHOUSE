<?php
    include "connect.php";

    session_start();
    
    if ( isset($_POST['dangnhap'])){
        $PhoneEmail = $_POST['PhoneEmail'];
        $Password = $_POST['Password'];
        $result = mysqli_query($conn, "SELECT * FROM user WHERE Phone = '$PhoneEmail' OR Email = '$PhoneEmail'");
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) != 0){
            if($Password == $row['Password']){
                $_SESSION['Login'] = true;
                $_SESSION['ID'] = $row['ID'];
                header("location: index.php");
            }
            else{
                echo 
                "<script> alert('Mật khẩu không đúng'); </script>";
            }
        }
        else {
            echo 
            "<script> alert('Tài khoản không tồn tại'); </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dangnhap</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class ="col-md-3 col-0" ></div>
            <div class="col-md-6 col-12" style="background: white; opacity: 0.9;">
                <form action="dangnhap.php" method="POST">
                    <legend>Đăng nhập</legend>
                    
                    <div class="form-group">
                        <label for="">Số điện thoại hoặc Email</label>
                        <input type="text"class="form-control"id=""placeholder="Nhập số điện thoại" name="PhoneEmail">
                    </div>
                    <div class="form-group">
                        <label for="">Mật khẩu</label>
                        <input type="password"class="form-control"id=""placeholder="Nhập mật khẩu" name="Password">
                    </div>
                    
                    <button style="float: right; margin: 10px" type="submit" name="dangnhap" class="btn btn-primary">Submit</button>
                    <p class="dangky-text">Bạn chưa có tài khoản? <a href="./dangky.php">Đăng ký tại đây</a>.</p>
                </form>
            </div>
            <div class ="col-md-3 col-0" ></div>
        </div>
    </div>
    <style>
	body{	
		background-image:url("image/banner.png");
		}	
	</style>
</body>
</html>