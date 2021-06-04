<?php
    include_once('database.php');
    class M_user extends database {
        public function getUsers() {

            $sql="SELECT id,username,user_level,name,phone,address FROM users where user_level != 1 ";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }
        
        public function deleteUser($id) {
            $sql="DELETE from users WHERE id = $id";
            $this->setQuery($sql);
            
            return $this->execute();
        }
        public function getCountUser() {
            $sql="SELECT Count(*) from users WHERE user_level != 1";
            $this->setQuery($sql);
            
            return $this->loadRecord();
        }
    }
?>