<?php
    // day la doan code gan the vao duong dan de chay
    $area = "frontend";
    $controller = "home";
    $action = "index";
    // lay cac bien tu hinh thuc GET trong url
    $area = isset($_GET['area']) ? $_GET['area'] : $area;
    $controller = isset($_GET['controller']) ? $_GET['controller'] : $controller;
    $action = isset($_GET['action']) ? $_GET['action'] : $action;
    // -- 
    // goi cac bien de gan thanh duong dan vat ly
    $fileController = "controllers/$area/$controller"."Controller.php";
    // gio ta include duong dan vao file controller -> load MVC
    // kiem tra xem co ton tai file hay khong
    if(file_exists($fileController)){
        // neu ton tai thi ta load file vao
        include $fileController;
        // ten class
        $className = $controller."Controller";
        // neu ton tai className thi  goi ham action
        if(class_exists($className)){
            // tao object cua class vi class la type obj
            $obj = new $className();
            $obj->$action();
            // neu khong ton tai class se bao ra loi
        }else{
            die("Class co ten $className khong ton tai");
        }
    }
?>