<?php
    include_once "Controller/cProduct.php";
    $p = new ControllProduct();
    $ProdID = $_REQUEST["DelProd"];
     if($p->getDeleteProduct($ProdID)){
        echo "<script>alert('Successfuly Delete')</script>";
        echo header("refresh:0; url= 'admin.php?aProd'");
     }
?>