<?php
    class logoutController{
        public function index(){
            unset($_SESSION["account"]);
            header("location:index.php?area=backend");
        }
    }
?>