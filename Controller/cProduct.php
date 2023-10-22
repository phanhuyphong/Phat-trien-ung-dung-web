<?php
    include_once "Modell/mProduct.php";
    class ControllProduct{
        function getAllProductBySearch($search){
            $p = new modeProduct();
            $tblProductBySearch = $p->SelectAllProductBySearch($search);
            return $tblProductBySearch;
        }
        function getAllProductByComp($comp){
            $p = new modeProduct();
            $tblProductByComp = $p->SelectAllProductByCompany($comp);
            return $tblProductByComp;
        }
        function getAllProduct(){
            $p = new modeProduct();
            $tblProduct = $p->SelectAllProduct();
            return $tblProduct;
        }
        function addProduct($ten, $gia, $mota, $cty, $file, $tenanh, $loaianh, $sizeanh){
            if($loaianh == "image/ipg" || $loaianh == "image/png" || $loaianh == 'image/jpeg'){
                if($sizeanh <=2*1024*1024){
                    if(move_uploaded_file($file,"image/".$tenanh)){
                        $p = new modeProduct();
                        $ins = $p->InsertProduct($ten, $gia, $tenanh, $mota, $cty);
                        if($ins){
                            return 1;
                        }else{
                            return 0;
                        }
                    }else{
                        return -1;
                    }
                }else{
                    return -2;
                }
            }else{
                return -3;
            }
        }
        function getDeleteProduct($maSP){
            $p = new modeProduct();
            $tblDelProd = $p->DeleteProduct($maSP);
            return $tblDelProd;
        }
        function getProdByID($ProdID){
            $p = new modeProduct();
            $tblProdID = $p->SelectByProdID($ProdID);
            return $tblProdID;
        }
        function UpProduct($ProdID, $ten, $gia, $hinh, $mota, $cty, $file, $tenanh, $loaianh, $sizeanh){
            if($tenanh !=""){
                if($loaianh == "image/ipg" || $loaianh == "image/png" || $loaianh == 'image/jpeg'){
                    if($sizeanh <=2*1024*1024){
                        if(move_uploaded_file($file,"image/".$tenanh)){
                            $p = new modeProduct();
                            $ins = $p->UpdateProduct($ProdID, $ten, $gia, $hinh, $mota, $cty);
                            if($ins){
                                return 1;
                            }else{
                                return 0;
                            }
                        }else{
                            return -1;
                        }
                    }else{
                        return -2;
                    }
                }else{
                    return -3;
                }
            }else{
                $p = new modeProduct();
                $update = $p->UpdateProduct($ProdID, $ten, $gia, $hinh, $mota, $cty);
                var_dump($update);
                if($update){
                    return 1;
                }else{
                    return 0;
                }
            }
        }
    }
?>