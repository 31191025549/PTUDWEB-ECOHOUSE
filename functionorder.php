<?php 
    function thongtindonhang(){

    }


    function taogiohang($tensp, $hinhsp, $donggia, $soluong, $thanhtien, $idbill){
        $conn=ketnoidb();
        $sql="INSERT INTO cart (tensp, hinhsp, donggia, soluong, thanhtien, idbill) VALUES ('$tensp', '$hinhsp', '$donggia', '$soluong', '$thanhtien','')";
        $conn->exec($sql);
        $conn=null;
    }

    function taodonhang($billname, $address, $tel, $email, $total){
        $conn=ketnoidb();
        $sql="INSERT INTO bill (billname, address, tel, email, total) VALUES ('$billname', '$address', '$tel', '$email', '$total')";
        $conn->exec($sql);
        //trả về giá trị
        $last_id =$conn->lastInsertId();
        $conn=null;
        return $last_id;
    }

    function ketnoidb(){
        $servername="localhost";
        $username="root";
        $password="";
        $dbname="banhoa";

        try{
            $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO :: ATTR_ERRMODE,PDO :: ERRMODE_EXCEPTION);
            return$conn;
        }catch(PDOException$e){
           return $e->getMessage();
       }
    }


    function tongdonhang(){
        $tong=0;
        if(isset($_SESSION['giohang']) && (is_array($_SESSION['giohang']))){
            if (sizeof($_SESSION['giohang'])>0){
                for ($i=0; $i < sizeof($_SESSION['giohang']); $i++){
                    $tt=$_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3];
                    $tong+=$tt;
                }
            }
        }
        return $tong;
    }



    function showgiohang(){
        $ttgh="";
        if(isset($_SESSION['giohang']) && (is_array($_SESSION['giohang']))){
            if(sizeof($_SESSION['giohang'])>0){
                $tong=0;
                for ($i=0; $i < sizeof($_SESSION['giohang']); $i++){
                    $tt=$_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3];
                    $tong+=$tt;
                    echo '
                    <tr>
                        <td >
                            <div class="cart-info">
                                <img src="'.$_SESSION['giohang'][$i][0].'" alt="">
                                <div style="size:25px">
                                    <h2><strong>'.$_SESSION['giohang'][$i][1].'</strong></h2>
                                    <small>Giá: '.$_SESSION['giohang'][$i][2].'</small>
                                    </br>
                                    <a href="tranggiohang.php?delid='.$i.'">xóa</a>
                                </div>
                            </div>
                        </td>
                
                        <td class="text-center">'.$_SESSION['giohang'][$i][3].'</td>
                        <td>'.$tt.'</td>
                    </tr>
                    ';
                }
                $ttgh.= '
                    <tr>
                        <td> <h3 class= "texttotal">Tổng</h3> </td>
                        <td></td>
                        <td><h5 class= "texttotal">'.$tong.'</h5></td>
                    </tr>
                ';
            }
        }
        return $ttgh;
    }
?>