<?php

require "model/userModel.class.php";

class UserController{

    private $usermodel;

    public function __construct() {
        $this->usermodel = new UserModel();
    }

    public function login($data){

        $email = htmlentities($data['email']);
        $pass = htmlentities($data['pass']);

        if(!empty($email) && !empty($pass)){

            if($this->user = $this->usermodel->selectUser($email, $pass)){
                //l'utilisateur est créé en session
                $msg = "";
            }
            else $msg = "Le nom ou le mot de passe ne correspondent pas !";
        }
        //si je viens bien du formulaire (après validation)
        //mais qu'aucun champ n'a été renseigné ou un des deux
        else $msg = "Veuillez remplir le formulaire avant de le valider...";

        return array(
            "user" => $this->user,
            "msg" => $msg
        );
    }

    public function register($data){

        $nom = htmlentities($data['nom']);
        $prenom = htmlentities($data['prenom']);
        $email = htmlentities($data['email']);
        $pass1 = htmlentities($data['pass1']);
        $pass2 = htmlentities($data['pass2']);
        $adresse = htmlentities($data['adresse']);
        $ville = htmlentities($data['ville']);
        $pays = htmlentities($data['pays']);
        $cp = htmlentities($data['cp']);

        if(!empty($email) && !empty($pass1) && !empty($pass2)){
            if(!$this->usermodel->checkUser($email)){
                if($pass1 === $pass2){

                    //si l'ajout d'un utilisateur a fonctionné
                    if($this->usermodel->createUser($pass1, $nom, $prenom, $email, $adresse, $pays, $ville, $cp) == true){
                        //on le sélectionne et l'affecte dans le paramètre user
                        $this->user = $this->usermodel->selectUser($pass1, $nom, $prenom, $email, $adresse, $pays, $ville, $cp);
                        $msg = "Félicitations, vous êtes inscrit, ".$prenom;
                    }
                    else $msg = "Un problème technique est survenu, toutes nos excuses !";
                }
                else $msg = "Les deux mots de passe sont différents, réessayez!";
            }
            else $msg = "Cette email est déjà utilisé, changez-en!";
        }
        else $msg = "Veuillez remplir le formulaire avant de le valider...";

        return array(
            "user" => $this->user,
            "msg" => $msg
        );
    }

    public function logout(){
        return "Vous êtes bien déconnecté";
    }

}
