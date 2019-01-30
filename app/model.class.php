<?php

    abstract class Model{
        protected $bdd;
        protected function bddConnect(){
            try{
                $this->bdd = new PDO('mysql:host=localhost;dbname=recrue','root', ''
                );

            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage() . "<br/>";
                die();
            }
        }
    }
