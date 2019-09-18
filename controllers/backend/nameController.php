<?php
    class nameController{
        public function index()
        {
            $a = $_POST['account'];
            $b = $_POST['password'];

            echo "$a";
            echo "<br>";
            echo "$b";
        }
    }
?>