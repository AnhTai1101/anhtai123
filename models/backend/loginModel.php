<?php
    trait loginModel{
        public function model_login(){
            $account = $_POST["account"];
            $password = $_POST["password"];
            // goi ham ma hoa password
            $password = md5($password);
            // goi bien ket noi csdl
            $conn = connection::getInstance();
            // chuan bi truy van 
            $query = $conn->prepare("select account,email,fullName from user where account=:account and password=:password");
            // set kieu truy van va type tra ve
            $query->setFetchMode(PDO::FETCH_OBJ);
            // thuc thi cau truy van
            $query->execute(array("account"=>$account,"password"=>$password));
            // lay mot ban ghi
            $result = $query->fetch();
            // return result
            return $result;
        }
    }
?>