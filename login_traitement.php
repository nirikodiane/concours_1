<?php
// Hachage du mot de passe
//$pass_hache = sha1($_POST['pass']);
// Vérification des identifiants
require('connect.php');
$req = $bdd->prepare('SELECT * FROM utilisateur WHERE pseudo = ?
AND mdp = ?');
$req->execute(array($_POST['email_concours'], $_POST['mdp_concours']));
$resultat = $req->fetch();
if (!$resultat)
{
header("Location:login.php?erreur=erreur");
}
else
{
session_start();
$_SESSION['id_utilisateur'] = $resultat['id_utilisateur'];
$_SESSION['email_concours'] = $resultat['pseudo'];
$_SESSION['nom'] = $resultat['nom'];
$_SESSION['prenom'] = $resultat['prenom'];
$_SESSION['groupe'] = $resultat['groupe'];
$_SESSION['ecole'] = $resultat['ecole'];
$_SESSION['niveau'] = $resultat['niveau'];
//echo 'Vous êtes connecté !';
header("Location:index.php");
}