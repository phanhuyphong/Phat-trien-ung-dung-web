<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        a{
            color: blue;
            font-size: 20px;
        }
        a:hover {
        background-color: #7ABBF3;
        cursor: pointer;
    }
    </style>
    <title>Website bán sách giáo khoa</title>
</head>
<body >
    <table border="1px solid" style="margin: auto; text-align: center; width: 960px">
        <tr class="normal">
            <td colspan="2">
                <h2>TRANG WEB BÁN SÁCH GIÁO KHOA</h2>
            </td>
        </tr>
        <tr class="normal">
            <td colspan="2">
                <div style="text-align:left"> 
                    <a style="text-decoration: none;" href="index.php">Trang chủ</a> |<a style="text-decoration: none;" href="admin.php">Quản lý</a>
                    <form action="#" method="get">
                            <input type="text" name="txtSearch" value="">
                            <input type="submit" name="btnSubmit" value="Tìm kiếm">
                    </form>
                </div>
            </td>
        </tr>
        <tr id="left" class="_normal">
            <td id="left" style="width: 20%">
                <?php
                    include_once "View/vCompany.php";
                    $p = new viewCompany();
                    $tblViewComp = $p->viewAllCompany();
                ?>
            </td>
            <td id="main">
                <?php
                include_once "View/vProduct.php";
                $p = new viewProduct();
                if (isset($_REQUEST["Comp"])) {
                    $p->viewAllProductByComp($_REQUEST["Comp"]);
                }elseif(isset($_REQUEST["txtSearch"])){
                    $p->viewAllProductBySearch($_REQUEST["txtSearch"]);
                }
                else {
                    $p->viewAllProduct();
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