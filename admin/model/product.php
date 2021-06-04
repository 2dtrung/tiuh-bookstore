<?php
    require_once('database.php');
    class M_product extends database {
        public function getAllProduct() {
            $sql="SELECT * FROM products";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }
        
        public function deleteProduct($id) {
            $sql="DELETE from products WHERE id = $id";
            $this->setQuery($sql);
            
            return $this->execute();
        }
        public function addProduct($name,$price,$brand,$cate,$filename,$code,$imported_price,$status) {
            $price = floatval($price);
            $sql="INSERT INTO products(name,brand,category,status,code,price,image,imported_price) VALUES(?,?,?,?,?,?,?,?)";
            $this->setQuery($sql);
            
            return $this->execute(array($name,$brand,$cate,$status,$code,$price,$filename,$imported_price));
        }    

        public function updateProduct($id,$name,$price,$brand,$cate,$filename,$code,$status,$imported_price) {
            if(strlen($filename)==0) {
                
            $sql="UPDATE  products set name = ?, brand= ?, category =?,code = ?, price =? ,status=?, imported_price =? where id = ?  ";
            $this->setQuery($sql);
            
            return $this->execute(array($name,$brand,$cate,$code,$price,$status,$imported_price,$id));
            }
            else {
            $sql="UPDATE  products set name = ?, brand= ?, category =?,code = ?, price =? ,image=? where id = ?  ";
            $this->setQuery($sql);
            return $this->execute(array($name,$brand,$cate,$code,$price,$filename, $id));

            }
        }
        public function getProduct($vitri=-1,$limit=-1) {
            $sql="SELECT * FROM products  ";
            if($vitri >=0 && $limit >1) {
                $sql="SELECT * FROM products ORDER BY id DESC LIMIT $vitri,$limit";
                $this->setQuery($sql);
                return $this->loadAllRows(array($vitri,$limit));
            }
            else {
                $this->setQuery($sql);
                return $this->loadAllRows(array($id));
            };
        }
        public function getCountProduct() {
            $sql="SELECT COUNT(*) from products";
            $this->setQuery($sql);
            return $this->loadRecord();
        }   
        public function getProductById($id) {
            $sql="SELECT * from products where id =$id";
            $this->setQuery($sql);
            return $this->loadRow();
        }   
        public function getProductByName($name) {
            $sql="SELECT * from products where name = ? ";
            $this->setQuery($sql);
            return $this->loadRecord(array($name));
        }   
    }
?>