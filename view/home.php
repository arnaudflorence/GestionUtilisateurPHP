<?php
    //si l'utilisateur n'est pas stocké dans la session
    if($front->getSession()->hasUser()){
		      echo "<h1>Bienvenue !</h1>
                <p>vous êtes bien connecté</p>
		            <a href='index.php?action=logout'>Déconnexion</a>";
    }
    //sinon, j'affiche le formulaire

    else {
      echo "<h1>Bonjour !</h1>
            <a href='index.php?page=form'>Se connecter</a><br>
            <a href='index.php?page=register'>Inscription</a>";
    }

?>
