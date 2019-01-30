<?php

    class SessionService{
          
        public function __construct(){
            session_start();
        }
        public function isMessage(){
            if(isset($_SESSION['message'])){
                return true;
            }
            else return false;
        }
        public function getMessage(){
            if($this->isMessage()){
                return $_SESSION['message'];
            }
        }
        public function setMessage($m){
            $_SESSION['message'] = $m;
        }
        
        public function hasUser(){
            if(isset($_SESSION['user'])){
                return true;
            }
            else return false;
        }
        public function getUser(){
            return $_SESSION['user'];
        }
        public function setUser($u){
            $_SESSION['user'] = $u;
        }
        public function removeUser(){
            unset($_SESSION['user']);
        }
        
        public function __destruct(){
            unset($_SESSION['message']);
        }
    }
