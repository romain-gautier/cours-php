<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>

<body class="container">

<form action="controller/logon.php" method="post">

    <div class="form-group">
        <label for="loginMembre">Nom d'utilisateur</label>
        <input type="text" class="form-control" id="loginMembre" name="loginMembre" placeholder="Votre nom d'utilisateur">
    </div>
    <div class="form-group">
        <label for="passMembre">Votre nom</label>
        <input type="password" class="form-control" id="passMembre" name="passMembre" placeholder="Votre mot de passe">
    </div>
    <button type="submit" class="btn btn-success">Connection</button> <a class="btn btn-primary" href="pages/public/accueil.php" role="button">Retour à l'accueil</a>

</form>

<a href="controller/logoff.php">déconnection</a>

</body>
</html>