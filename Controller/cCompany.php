<?php
    include_once "Modell/mCompany.php";
    class ControllCompany{
        function getAllCompany(){
            $p = new modellCompany();
            $tblCompany = $p->SelectAllCompany();
            return $tblCompany;
        }
    }
?>