<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Website bán sách giáo khoa</title>
    <style>
        a{
            color: blue;
            font-size: 16px;
        }
        a:hover {
        background-color: #7ABBF3;
        cursor: pointer;
    }
    </style>
</head>
<body>
    <table border="1px solid" style="margin: auto; text-align: center; width: 960px;">
        <tr class="normal">
            <td colspan="2">
                 <h2>TRANG WEB BÁN SÁCH GIÁO KHOA</h2>
            </td>
        </tr>
        <tr class="normal">
            <td colspan="2" style="text-align: center;">
               <a style="text-decoration: none;" href="index.php">Trang chủ</a>
            </td>
        </tr>
        <tr class="_normal">
            <td id="left" style="width: 20%; text-align:left;">
                <p><a style="text-decoration: none;" href="admin.php?aComp">Danh sách loại sản phẩm</a></p>
                <p><a style="text-decoration: none;" href="admin.php?aProd">Danh sách sản phẩm </a></p>            
            </td>
            <td id="main">
                <?php
                
                    if(isset($_REQUEST["aComp"])){
                        //hiển thị danh sách công ty
                        include_once "View/vCompany.php";
                        $p = new viewCompany();
                        $p->adminViewAllCompany();

                    }elseif(isset($_REQUEST["aProd"])){
                        //hiển thị danh sách sản phẩm
                        include_once "View/vProduct.php";
                        $p = new viewProduct();
                        $p ->adminAllProduct();
                    }elseif(isset($_REQUEST["addProd"])){
                        include_once "View/avAddProduct.php";
                    }elseif(isset($_REQUEST["DelProd"])){
                        include_once "View/avDellProduct.php";
                    }
                    elseif(isset($_REQUEST["EditProd"])){
                        include_once "View/avEditProduct.php";
                    }
                    else{
                        echo "Wellcom to admin";
                    }
                ?>
            </td>
        </tr>
        <tr class="normal">
            <td colspan="2">20015491 - Phan Huy Phong</td>
        </tr>
    </table>
</body>

</html>