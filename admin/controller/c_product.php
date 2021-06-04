<?php
    include('model/product.php');
    include('model/pager.php');
    class C_product {
        public function getAllProduct() {
            $m_product= new M_product();
            $products= $m_product->getAllProduct();
            return $products;
        }
        public function deleteProduct($id) {
            $m_product = new M_product();
            $result = $m_product->deleteProduct($id);
            return $result;
        }
        public function addProduct($name,$price,$brand,$cate,$code,$image,$imported_price,$status) {
            $m_product = new M_product();
            $a = $m_product->getProductByName($name);
            if($a!=false) {
                return 1;
            }


            $target_dir = "img/";
            $file_name = time().'.'.basename($image['name']);
            $target_file = $target_dir.basename($image["name"]);
            
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            
                $check = getimagesize($image["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }
                

                if ($image["size"] > 500000) {
                    $uploadOk = 0;
                }

                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                $uploadOk = 0;
                }

                
                if ($uploadOk == 0) {
                    return -1;
                } else {
                if (move_uploaded_file($image["tmp_name"], __DIR__.'/../../'.$target_file)) {
                    $m_product = new M_product();
                     $result= $m_product->addProduct($name,$price,$brand,$cate,$target_file,$code,$imported_price,$status); 
                    return 2 ;
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
                }
        } 
        public function updateProduct($id,$name,$price,$brand,$cate,$code,$image,$status,$imported_price) {
            if(strlen($image['name'])==0) {
                $m_product = new M_product();
                $result= $m_product->updateProduct($id,$name,$price,$brand,$cate,'',$code,$status,$imported_price);
                return true; 
            }
            else {
            $target_dir = "img/";
            $file_name = time().'.'.basename($image['name']);
            $target_file = $target_dir.basename($image["name"]);
            
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            
                $check = getimagesize($image["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }
                

                if ($image["size"] > 500000) {
                $uploadOk = 0;
                }

                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                $uploadOk = 0;
                }

                
                if ($uploadOk == 0) {
                    return -1;
                } else {
                if (move_uploaded_file($image["tmp_name"], __DIR__.'/../../'.$target_file)) {
                    $m_product = new M_product();
                     $result= $m_product->updateProduct($id,$name,$price,$brand,$cate,$target_file,$code,$status,$imported_price);
                    return 2;
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
                }

            }
        } 
        public function getProducts() {
            $m_product = new M_product();
            $trang_hientai=isset($_GET['page']) ?$_GET['page'] :1;
            $count  = $m_product->getCountProduct();
            $pagination = new pagination($count,$trang_hientai,6,5);
            $paginationHTML=$pagination->showPagination();
            $limit=$pagination->get_nItemOnPage();
            $vitri=($trang_hientai-1)*$limit;
            $products=$m_product->getProduct($vitri,$limit);
             return array('pagination'=>$paginationHTML,'products'=>$products);
        }
        public function getCountProducts() {
            $m_product = new M_product();
            return  $m_product->getCountProduct();
        }
        public function getProductById($id) {
            $m_product = new M_product();
            return  $m_product->getProductById($id);
        }
    }
?>