
<boby>
<meta charset="UTF-8">
    <h2>
        Sửa thông tin sản phẩm
    </h2>
<?php
        include "Controller/cProduct.php";
        $p = new ControllProduct();
        if(isset($_REQUEST["EditProd"])){
        $ProdID = $_REQUEST["EditProd"];
        $tblProduct = $p->getProdByID($ProdID);
        echo "Mã sản phẩm: ".$ProdID; 
        if($tblProduct > 0){
            while($row = mysqli_fetch_assoc($tblProduct)){
                $tenSP = $row["ProdName"];
                $gia = $row["ProdPrice"];
                $hinh = $row["ProdImage"];
                $mota = $row["ProdDescription"];
                $cty = $row["CompID"];
            }
        }
    }
?>
    <form action="#" method="post" enctype="multipart/form-data">
        <table style="margin: auto; text-align:left">
            <tr>
                <td>Tên sản phẩm</td>
                <td>
                    <input type="text" name="txtTenSP" value="<?php echo $tenSP; ?>">
                </td>
            </tr>
            <tr>
                <td>Giá sản phẩm</td>
                <td>
                    <input type="number" name="txtGiaSP" value="<?php echo $gia; ?>">
                </td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td>
                <img src='image/<?php echo $hinh ?>' alt="" width="50px"; height="50px">
                    
                </td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td>
                    <textarea name="txtMota" id="" cols="30" rows="10"><?php echo $mota; ?></textarea>
                </td>
            </tr>
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
                <td></td>
                <td>
                    <input type="submit" name="btnUpload" value="Cập nhập">
                    <input type="reset" value="Nhập lại">
                </td>
            </tr>
        </table>
    </form>
</boby>
<?php
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
            $kq = $p->UpProduct($ProdID, $ten, $gia,$hinh, $mota, $cty, $file, $tenanh, $loaianh, $sizeanh);
            //hiển thị cách thông báo cần thiết
            if($kq ==1){
                echo "<script>alert('Cập nhật thành công thành công')</script>";
                echo header("refresh:0; url='admin.php?aProd'");
            }elseif($kq ==0){
                echo "<script>alert('Không thể cập nhật')</script>";
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