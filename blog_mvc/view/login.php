<h2 class="text-center">Veuillez vous connecter pour accéder au blog.</h2>

<form action="controller/logon.php" method="post">

    <div class="form-group">
        <label for="loginMembre">Nom d'utilisateur</label>
        <input type="text" class="form-control" id="loginMembre" name="loginMembre" placeholder="Votre nom d'utilisateur">
    </div>
    <div class="form-group">
        <label for="passMembre">Votre nom</label>
        <input type="password" class="form-control" id="passMembre" name="passMembre" placeholder="Votre mot de passe">
    </div>
    <button type="submit" class="btn btn-success">Connection</button> <!-- <a class="btn btn-primary" href="pages/public/accueil.php" role="button">Retour à l'accueil</a> -->

</form>

<a href="controller/logoff.php">déconnection</a>

