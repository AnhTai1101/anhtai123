<?php
    class connection{
        // goi bien global
        public function getInstance(){
            global $host;
            global $user;
            global $dbname;
            global $password;
            // ket noi voi csdl
            $conn = new PDO("mysql:host=$host;dbname=$dbname","$user","$password");
            // charset tieng viet
            $conn->exec("set names 'utf8'");
            // return ket qua
            return $conn;
        }

    }
?>