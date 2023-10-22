<?php
    include_once "Controller/cProduct.php";
    class viewProduct{
        function viewAllProductBySearch(){
            $p = new ControllProduct();
            $dem = 0;
            if(isset($_REQUEST["btnSubmit"])){
                $txtSearch = $_REQUEST["txtSearch"];
                $tblProduct = $p->getAllProductBySearch($txtSearch);
            }else{
                $tblProduct = $p->getAllProduct();
            }
            if($tblProduct){
                if($tblProduct){
                    if(mysqli_num_rows($tblProduct) > 0){
                        echo "<table>";
                            echo "<tr>";
                            while ($row = mysqli_fetch_assoc($tblProduct)) {
                                echo "<td style='width:20%; height: 100px'>";
                                echo ("<img src='image/" . $row["ProdImage"] . "'alt='" . $row["ProdName"] . "' width='150px' height ='150px'/><br>");
                                echo ("<b>" . $row["ProdName"] . "</b>");
                                echo "<br>----------------------------";
                                echo ("<br><i>Giá: " . $row["ProdPrice"] . " VND</i>");
                                echo "</td>";
                                $dem++;
                                if ($dem == 5) {
                                    echo ("</tr>");
                                    echo ("<tr>");
                                    $dem = 0;
                                }
                            }
                        echo"</table>";
                    }else{
                        echo "Không tìm thấy sản phẩm";
                    }
                }else{
                    return "Erorr";
                }
            }
        }
        function viewAllProductByComp(){
            $p = new ControllProduct();
            $dem = 0;
            if(isset($_REQUEST["Comp"])){ 
                $cty = $_REQUEST["Comp"];
                $tblProduct = $p->getAllProductByComp($cty);
            }else{
                $tblProduct = $p->getAllProduct();
            }
            if($tblProduct){
                if(mysqli_num_rows($tblProduct) > 0){
                    echo "<table>";
                        echo "<tr>";
                        while ($row = mysqli_fetch_assoc($tblProduct)) {
                            echo "<td style='width:20%; height: 100px'>";
                            echo ("<img src='image/" . $row["ProdImage"] . "'alt='" . $row["ProdName"] . "' width='150px' height ='150px'/><br>");
                            echo ("<b>" . $row["ProdName"] . "</b>");
                            echo "<br>----------------------------";
                            echo ("<br><i>Giá: " . $row["ProdPrice"] . " VND</i>");
                            echo "</td>";
                            $dem++;
                            if ($dem == 5) {
                                echo ("</tr>");
                                echo ("<tr>");
                                $dem = 0;
                            }
                        }
                    echo"</table>";
                }else{
                    echo "Không tìm thấy";
                }
            }
        }
        function viewAllProduct(){
            $p = new ControllProduct;
            $dem = 0;
            $tblProduct = $p->getAllProduct();
            if($tblProduct){
                if(mysqli_num_rows($tblProduct) > 0){
                    echo "<table>";
                        echo "<tr>";
                        while ($row = mysqli_fetch_assoc($tblProduct)) {
                            echo "<td style='width:20%; height: 100px'>";
                            echo ("<img src='image/" . $row["ProdImage"] . "'alt='" . $row["ProdName"] . "' width='150px' height ='150px'/><br>");
                            echo ("<b>" . $row["ProdName"] . "</b>");
                            echo "<br>----------------------------";
                            echo ("<br><i>Giá: " . $row["ProdPrice"] . " VND</i>");
                            echo "</td>";
                            $dem++;
                            if ($dem == 5) {
                                echo ("</tr>");
                                echo ("<tr>");
                                $dem = 0;
                            }
                        }
                    echo"</table>";
                }else{
                    echo "Không tìm thấy";
                }
            }
        }
        function adminAllProduct(){
            $p = new ControllProduct();
            $tblProduct = $p->getAllProduct();
            if ($tblProduct) {
                if (mysqli_num_rows($tblProduct) > 0) {
                    echo "<h2>Quản lý đơn hàng</h2>";
                    echo "<a style='text-decoration: none'; href='admin.php?addProd'>Thêm sản phẩm</a>";
                    echo "<table border='1px solid' style='margin: auto; width=100%'>";
                    echo "<tr>
                    <td>Product ID</td>
                    <td>Product Name</td>
                    <td>Product Pice</td>
                    <td>Product Image</td>
                    <td>Product Description</td>
                    <td>Company ID</td>
                    <td>Action</td>
                    </tr>";
                    while ($row = mysqli_fetch_assoc($tblProduct)) {
                        //hiển thị kết quả nhận được
                        echo "<tr>";
                        echo "<td>" . $row["ProdID"] . "</td>";
                        echo "<td>" . $row["ProdName"] . "</td>";
                        echo "<td>" . $row["ProdPrice"] . "</td>";
                        echo "<td>" . "<img src='image/" . $row["ProdImage"] . "'alt='" . $row["ProdName"] . "' width='50px' height ='60px'/><br>" . "</td>";
                        echo "<td>" . $row["ProdDescription"] . "</td>";
                        echo "<td>" . $row["CompID"] . "</td>";
                        echo "<td><a style='text-decoration: none'; href='admin.php?EditProd=".$row["ProdID"]."'>Sửa</a>| 
                        <a style='text-decoration: none'; onclick ='return Del()' href='admin.php?DelProd=".$row["ProdID"]."'>Xóa</a></td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                }
            }
        }
    }
?>
<script>
    function Del(name){
        return confirm("Bạn có chắc xóa không");
    }
</script>
