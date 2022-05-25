<?php
    include "connect.php";
   

    $err = [];
    if ( isset($_POST['dangky'])){
        $ID = "";
        $Name = $_POST['Name'];
        $Email = $_POST['Email'];
        $Phone = $_POST['Phone'];
        $Password = $_POST['Password'];

        // ràng buộc dữ liệu
        if(empty($Name)){
            $err['Name'] = 'Bạn chưa nhập tên';
        }
        if(empty($Phone)){
            $err['Phone'] = 'Bạn chưa nhập số điện thoại';
        }
        if(empty($Password)){
            $err['Password'] = 'Bạn chưa nhập mật khẩu';
        }
        // var_dump(empty($err));
        if(empty($err)){

            $sql = "INSERT INTO user (ID, Name, Password, Phone, Email)
            VALUES('$ID','$Name','$Password','$Phone','$Email');
            ";
            mysqli_query($conn,$sql);
           
            header('location:dangnhap.php');
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
    <title>dangky</title>
    <link rel="stylesheet" href="./stylephp/stylelogin.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class ="col-md-3 col-0"> </div>
            <div class="col-md-6 col-12" style="background-color: white; opacity: 0.9">
                <form action="dangky.php" method="POST">
                    <legend>Đăng ký tài khoản</legend>
                    <div class="form-group">
                        <label for="">Tên người dùng</labels>
                        <input type="text"class="form-control"id=""placeholder="VD: Nguyễn Văn A" name="Name">
                        <!-- thông báo lỗi -->
                        <div class="has-error">
                            <span> <?php echo (isset($err['Name']))?$err['Name']:''  ?> </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text"class="form-control"id=""placeholder="VD: example@gmail.com" name="Email">
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="text"class="form-control"id=""placeholder="Nhập số điện thoại" name="Phone">
                        <!-- thông báo lỗi -->
                        <div class="has-error">
                            <span> <?php echo (isset($err['Phone']))?$err['Phone']:''  ?> </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Mật khẩu</label>
                        <input type="password"class="form-control"id=""placeholder="Nhập mật khẩu" name="Password">
                        <!-- thông báo lỗi -->
                        <div class="has-error">
                            <span> <?php echo (isset($err['Password']))?$err['Password']:''  ?> </span>
                        </div>
                    </div>

                    
                    <button style="float: right; margin: 10px;" type="submit" name="dangky" class="btn btn-primary">Submit</button>
                    <p class="dangky-text" style="padding-top: 20px;">Bạn đã có tài khoản? <a href="./dangnhap.php">Đăng nhập tại đây</a>.</p>
                </form>
            </div>
        </div>
    </div>
    <style>
		body{	
			background-image:url("./image/banner.png");
		}
	</style>
</body>
</html>