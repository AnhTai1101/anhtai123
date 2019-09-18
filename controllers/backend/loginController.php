<?php
    // include loginModel
    include "models/backend/loginModel.php";
    class loginController extends controller{
        use loginModel;
        public function index(){
            $this->renderHTML("views/backend/login1.php");
        }
        public function login(){
            // goi ham login
            $data = $this->model_login();
            // neu nhu co ton tai $data->account => đăng nhập thành công
            // gán luôn $_Session['account']
            if(isset($data->account)){
                // dang nhap thanh cong
                $_SESSION["account"] = $data->account;
                $_SESSION["email"] = $data->email;
                $_SESSION["fullName"] = $data->fullName;
            }
            header("location:index.php?area=backend");
        }
    }
?>