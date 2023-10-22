<?php
    class clsKetNoi{
        function ketNoiDB(& $conn){
            $hostname = "localhost";
            $username = "userphong";
            $password = "12345";
            $dbname = "dbtest";
            $conn = mysqli_connect($hostname, $username,$password,$dbname);
            $conn ->set_charset("utf8");
            if($conn){
                return mysqli_select_db($conn, $dbname);
            }else{
                echo "Chưa kết nối";
            }
        }
        function dongketnoi($conn){
            mysqli_close($conn);
        }
    }
?>