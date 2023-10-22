<?php
    include_once "ketnoi.php";
    class modeProduct{
        function SelectAllProductBySearch($search){
            $p = new clsKetNoi();
            if($p->ketNoiDB($conn)){
                $query = "SELECT * FROM product WHERE ProdName LIKE '%".$search."%'";
                $tblProductBySearch = mysqli_query($conn,$query);
                $p->dongketnoi($conn);
                return $tblProductBySearch;
            }else{
                return false;
            }
        }
        function SelectAllProductByCompany($comp){
            $p = new clsKetNoi();
            if($p->ketNoiDB($conn)){
                $query = "SELECT * FROM product WHERE compID =".$comp;
                $tblProductByComp = mysqli_query($conn,$query);
                $p->dongketnoi($conn);
                return $tblProductByComp;
            }else{
                return false;
            }
        }
        function SelectAllProduct(){
            $p = new clsKetNoi();
            if($p->ketNoiDB($conn)){
                $query = "SELECT * FROM product";
                $tblProduct = mysqli_query($conn, $query);
                return $tblProduct;
            }
            else{
                return false;
            }
        }
        function SelectAllProductPage($start, $limit){
            $p = new clsKetNoi();
            if($p -> ketNoiDB($conn)){
                $query = "SELECT * FROM Product ORDER BY ProdID desc limit $start, $limit";
                $tblProdPage = mysqli_query($conn, $query);
                $p->dongketnoi($conn);
                return $tblProdPage;
            }else{
                return false;
            }
        }
        function InsertProduct($ten, $gia, $hinh, $mota, $cty){
            $p = new clsKetNoi();
            if($p->ketNoiDB($conn)){
                $query = "INSERT INTO Product(ProdName, ProdPrice, ProdImage, ProdDescription, CompID) values ('$ten', $gia, '$hinh','$mota', '$cty')";
                $insertProd = mysqli_query($conn, $query);
                return $insertProd; 
            }else{
                return false;
            }
        }
        function DeleteProduct($maSP){  
            $p = new clsKetNoi();
            if($p->ketNoiDB($conn)){
                $query = "DELETE FROM Product WHERE ProdID =".$maSP;
                $tblDelProd = mysqli_query($conn, $query);
                $p->dongketnoi($conn);
                return $tblDelProd;
            }else{
                return false;
            }
        }
        function SelectByProdID($ProdID){
            $p = new clsKetNoi();
            if($p->ketNoiDB($conn)){
                $query = "SELECT * FROM Product WHERE ProdID=".$ProdID;
                $tblProdID = mysqli_query($conn, $query);
                $p->dongketnoi($conn);
                return $tblProdID;
            }else{
                return false;
            }
        }
        function UpdateProduct($ProdID, $ten, $gia,$hinh, $mota, $cty){
            $p = new clsKetNoi();
            if($p->ketNoiDB($conn)){
                $query = "UPDATE Product SET ProdName ='".$ten."',ProdPrice ='".$gia."',ProdImage ='".$hinh."', ProdDescription= '".$mota."', CompID = '".$cty."' WHERE ProdID = ".$ProdID;
                $tblUpdateProd = mysqli_query($conn,$query);
                $p -> dongketnoi($conn);
                return $tblUpdateProd;
            }
            return false;
        }
    }
?>