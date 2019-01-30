<?php

    require "app/model.class.php";

    class UserModel extends Model{
        //lorsqu'on créé une instance (objet) de la classe UserModel
        public function __construct(){
            parent::bddConnect();
        }

        public function createUser($mdp, $nom, $prenom, $email, $adresse, $pays, $ville, $cp){
            $sql = "INSERT INTO user (mdp_user, nom_user, prenom_user, email_user, adresse_user, pays_user, ville_user, cp_user )
                    VALUES('$mdp', '$nom', '$prenom', '$email', '$adresse', '$pays', '$ville', '$cp')";
            return $this->bdd->query($sql);
        }

        public function checkUser($pseudo){
            $sql = "SELECT email_user
                    FROM user
                    WHERE email_user = ?";
            $stmt = $this->bdd->prepare($sql);
            $stmt->execute(array($pseudo));

            if($stmt->fetch(PDO::FETCH_ASSOC)){
                return true;
            }
            else return false;
        }

        public function selectUser($nom, $pass){
            $sql = "SELECT email_user, mdp_user
                    FROM user
                    WHERE email_user = ?
                    AND mdp_user = ?";
            $stmt = $this->bdd->prepare($sql);
            $stmt->execute(array($nom, $pass));

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
