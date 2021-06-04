<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    include('model/m_user.php');
    class C_user {
        public function getUsers() {
            $m_user = new M_user();
            return $m_user->getUsers();   
        }
        public function getCountUser() {
            $m_user = new M_user();
            return $m_user->getCountUser();
        }
    }