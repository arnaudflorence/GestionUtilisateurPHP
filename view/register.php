<h1 class='titre'>Création de compte</h1>

<form id="form" method="post" action="index.php?page=register&action=register">
  <div class="form-group">
    <div class="row">
      <div class="col">
        <label for="name">Prénom :</label>
        <input class="form-control" placeholder="Mon prenom ici" type="text" name="prenom"
           value="<?php if(isset($keepname)){ echo $keepname;}?>" required>
      </div>
      <div class="col">
        <label for="name">Nom :</label>
        <input class="form-control" placeholder="Mon nom ici" type="text" name="nom" required><br/>
      </div>
    </div>
    <div >
      <label for="name">Identifiant :</label>
      <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
          </div>
            <input class="form-control" placeholder="Mon identifiant ici" type="email" name="email" required><br/>
      </div>
    </div>
    <br>

    <label for="name">Mot de passe :</label>
    <input class="form-control" placeholder="Mon mot de passe ici" type="password" name="pass1" required><br/>

    <label for="name">Répéter le mot de passe :</label>
    <input class="form-control" placeholder="Répéter mon mot de passe ici" type="password" name="pass2" required><br/>

    <label for="name">Adresse :</label>
    <input class="form-control" placeholder="Mon adresse ici" type="text" name="adresse" required><br/>

    <label for="name">Ville :</label>
    <input class="form-control" placeholder="Ma ville ici" type="text" name="ville" required><br/>

    <div class="row">
      <div class="col">
      <label for="name">Code postal :</label>
      <input class="form-control" placeholder="Mon code postal ici" type="int" name="cp" required><br/>
      </div>
      <div class="col">
      <label for="name">Pays :</label>
      <select class="form-control" name="pays" required>
        <option value="France">France</option>
        <option value="Allemagne">Allemagne</option>
        <option value="Angleterre">Angleterre</option>
      </select>
      </div>
    </div>
  </div>
  <hr>
    <input class="btn" type="submit" value="Création de compte">
</form>
<br>
<br>
<a href="index.php?page=home">Retour</a>
