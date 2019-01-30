<?php

require_once "app/sessionService.class.php";

require "controller/userController.class.php";

    class FrontController{

        const DEFAULT_PAGE = "home";
        const DEFAULT_DIR = "view/";

        private $page;
        private $uctrl;
        private $session;

        //le frontcontroller prend le service session en paramètre pour pouvoir le manipuler
        public function __construct(){

            $this->session = new SessionService();
            $this->uctrl = new UserController();

            //si une page est demandée par l'url, on l'intègre au paramètre page
            if(isset($_GET['page'])){
                $this->setPage($_GET['page']);
            }

            //si une action est détectée dans l'url
            if(isset($_GET['action'])){

                //vérifions sa valeur
                switch($_GET['action']){
                    case "login"://connexion de l'utilisateur (validation du formulaire login)

                        //on récupère le résultat du login du controleur (qui prend la POST entière en paramètre)
                        $data = $this->uctrl->login($_POST);
                        $this->session->setUser($data["user"]['email_user']);//on met le pseudo de l'utilisateur en session
                        $this->session->setMessage($data["msg"]);//on insère le message en session
                        break;

                    case "register"://inscription (validation du formulaire inscription)

                        //même principe que le login
                        $data = $this->uctrl->register($_POST);
                        $this->session->setUser($data["user"]['email_user']);
                        if($data['user'] != false){ //mais ici, on met à jour le paramètre page du front, pour revenir à l'accueil après inscription réussie
                            $this->page = self::DEFAULT_PAGE;
                        }
                        $this->session->setMessage($data["msg"]);

                       break;

                    case "logout"://clic dans le menu du lien "Déconnexion"
                        $this->session->removeUser();
                        $this->session->setMessage($this->uctrl->logout());
                        break;
                }

            }

        }

        public function getPage(){
            return $this->page;
        }
        public function setPage($page){
            $this->page = $page;
        }
        public function getSession(){
            return $this->session;
        }

        //transfère la bonne information au bon controleur
        //en fonction du contexte
        public function dispatch($contexte, $cible){

        }
        //envoie (inclus ou affiche) une vue en fonction
        //de là où on en a besoin
        public function render($page){

            $file = self::DEFAULT_DIR.$page.".php";

            if(file_exists($file)){
                return $file;
            }
            else return self::DEFAULT_DIR.self::DEFAULT_PAGE.".php";
        }

    }
