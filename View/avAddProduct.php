<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
        include "Controller/cProduct.php";
        if(isset($_REQUEST["btnUpload"])){
            $ten = $_REQUEST["txtTenSP"];
            $gia = $_REQUEST["txtGiaSP"];
            $mota = $_REQUEST["txtMota"];
            $cty = $_REQUEST["cboCty"];
            $file = $_FILES["ffile"]["tmp_name"];
            $type = $_FILES["ffile"]["type"];
            $name = $_FILES["ffile"]["name"];
            $size = $_FILES["ffile"]["size"];
            $p = new ControllProduct();
            $kq = $p->addProduct($ten, $gia, $mota, $cty, $file, $name, $type, $size);
            //hiển thị cách thông báo cần thiết
            if($kq ==1){
                echo "<script>alert('Thêm dữ liệu thành công')</script>";
                echo header("refresh:0; url='admin.php?aProd'");
            }elseif($kq ==0){
                echo "<script>alert('Không thể insert')</script>";  
            }elseif($kq ==-1){
                echo "<script>alert('Không thể load ảnh')</script>";
            }elseif($kq==-2){
                echo "<script>alert('kích thước lớn')</script>";
            }elseif($kq ==-3){
                echo "<script>alert('Không đúng định dạng')</script>";
            }else{
                echo "Lỗi gì đó";
            }

        }

    ?>
<body>
    <h2>Thêm sản phẩm</h2>
    <form action="#" method="post" enctype="multipart/form-data">
        <table style="margin: auto; text-align:left; line-height:30px">
        <tr>
                <td>Sách lớp</td>
                <td>
                    <select name="cboCty" id="">
                        <?php
                            include "Controller/cCompany.php";
                            $p = new ControllCompany();
                            $tblComp = $p->getAllCompany();
                            if(mysqli_num_rows($tblComp)){
                                while($row = mysqli_fetch_assoc($tblComp)){
                                    echo "<option value='".$row["CompID"]."'>".$row["CompName"]."</option>";
                                }
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tên sản phẩm</td>
                <td>
                    <input type="text" name="txtTenSP" required>
                </td>
            </tr>
            <tr>
                <td>Giá sản phẩm</td>
                <td>
                    <input type="number" name="txtGiaSP" required>
                </td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td>
                    <input type="file" name="ffile" required>
                </td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td>
                    <textarea name="txtMota" id="" cols="30" rows="10"></textarea>
                </td>
            </tr>
            
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="btnUpload" value="Thêm">
                    <input type="reset" value="Nhập lại">
                </td>
            </tr>
        </table>
    </form>

</body>
</html>