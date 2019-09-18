<?php
    class homeController extends controller{
        public function __construct(){
            // goi ham xac thuc dang nhap tu controller
            $this->authentication();
        }
        // neu da login
        public function index()
        {
            // renderHTML file home
            $this->renderHTML("views/backend/home.php");
        }
    }
?>