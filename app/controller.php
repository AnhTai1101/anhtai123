<?php
    // class controller la class dieu khien chinh gom layout va view
    class controller{
        public $layout = "";
        public $view = "";
        // ham xuat view
        public function renderHTML($fileView,$data = NULL){
            // $data co the la array nen ta se chuyen key thanh ten bien
            if($data != NULL){
                extract($data);
            }
            // doc noi dung file view va day ra mot bien nen ta se dung ob_start
            ob_start();
            include $fileView;
            $this->view = ob_get_contents();
            ob_get_clean();
            // ket thuc phien lam viec
            // --
            // phan trang
            // kiểm tra nếu có file layout thì ta load file layout
            if(file_exists($this->layout)){
                include $this->layout;
            }
            else{
                // neu khong co file layout thi ta xuat view
                echo $this->view;
            }
        }
        // tao ham xac thuc login
        // neu da ton tai Session nghia la da login
        public function authentication(){
            if($_SESSION["account"] == NULL){
                // neu khong ton tai roi thi ta se load file login vao
                header("location:index.php?area=backend&controller=login");
            }
        }
        // ham chuyen tieng viet co dau thanh khong co dau
        public function removeUnicode ($str){
			$unicode = array(
				'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
				'd'=>'đ',
				'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
				'i'=>'í|ì|ỉ|ĩ|ị',
				'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
				'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
				'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
				'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
				'D'=>'Đ',
				'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
				'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
				'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
				'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
				'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
			);
			
		   foreach($unicode as $nonUnicode=>$uni){
				$str = preg_replace("/($uni)/i", $nonUnicode, $str);
		   }
		   $str = str_replace(",", "", $str);
		   $str = str_replace(".", "", $str);       
		   $str = str_replace(" ", "-", $str);
		   $str = str_replace("?", "", $str);
		   $str = strtolower($str);
			return $str;
		}
    }
?>