<?php
    include_once "ketnoi.php";
    class modellCompany{
        function SelectAllCompany(){
            $p = new clsKetNoi();
            if($p->ketNoiDB($conn)){
                $query = "SELECT * FROM company";
                $tblCompany = mysqli_query($conn, $query);
                return $tblCompany;
            }
            else{
                return false;
            }
        }
    }
?>