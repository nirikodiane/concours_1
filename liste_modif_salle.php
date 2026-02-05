<?php
session_start();
if(!isset($_SESSION['id_utilisateur']) AND !isset($_SESSION['email_concours'])){header("Location:login.php?erreur=erreur");}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>Liste des Candidats</title>
    <script src="excellentexport.js"></script>
  </head>
  <body>
    <style>
    *{
      font-family: Arial Narrow;
      font-size: 13pt;
    }
      table, th, tr, td
      {
        border-collapse: collapse;
        border: 1px solid black;
        margin-right:auto;
        margin-left:auto;
      }
    .tete{
        text-align: center;
    margin-top:2%;
    font-weight: normal;
    }
  .ruban{
    background: lightgrey;
    font-size: 10pt;
    border-collapse: none;
    border-color: lightgrey;
    margin-right:auto;
    margin-left:auto;
    margin-top: -20px
  }
  .ruban tr td{
    width: 220px;
    border-collapse: none;
  }
  .logo img{
    margin-top: -30px;
    margin-left: -500px;
    width: 65px;
    height: 65px;
  }
  .chiffre_en_lettre
  {
    text-align: center;
  }
  .signature
  {
    margin-left: 100mm;
  }
  .titre
  {
    text-align: center;
    margin-top: 30px;
    margin-bottom: -20px;
  }
  h5
  {
    margin-top: -20px;
  }
  img{
    width: 75px;
    height: 73px;
  }
    </style>
    <page size="A4" backtop="10mm" backleft="10mm" backright="10mm" backbottom="10mm">
 


<?php

require('connect.php');

$recup=$bdd->query('SELECT * FROM candidats WHERE centre="Antsiranana" ORDER BY niveau, parcours1, nom, prenom');
?>
<table class="tableau" id="datatable">
  <tr>
      <th>Pos</th>
      <th>ID</th>
      <th>Nom et prénoms</th>
      <th>centre concours</th>
      <th>Parcours</th>
      <th>Salle</th>
      <th>Jury</th>
      <th>Modifier</th>
  </tr>
<?php
$i=1;
$utili=$_SESSION['nom']." ".$_SESSION['prenom'];
if ($_SESSION['groupe']=="admin")
{
$recup1=$bdd->query('SELECT * FROM candidats WHERE centre="Antsiranana" ORDER BY niveau, parcours1, nom, prenom');
}

else
{
$recup1=$bdd->prepare('SELECT * FROM candidats WHERE centre="Antsiranana" ORDER BY niveau, parcours1, nom, prenom');
$recup1->execute(array());
}
while($message=$recup1->fetch())

{

$p=$message['parcours1'];
$pa=$bdd->prepare('SELECT * FROM parcours WHERE parcours_abrevie=? ORDER BY id_parcours');
$pa->execute(array($p));
$parcours=$pa->fetch();

?>
  <tr>
       <td style="text-align:center"><?php echo $i;?></td>
       <td style="text-align:center"><?php echo sprintf("%'03d", $message['id_candidat']);?></td>
       <td style="width: 370px;"><?php echo $message['nom']." ".$message['prenom'];?></td>
       <td style="text-align:center;width: 180px;"><?php echo $message['centre'];?></td>
       <td style="text-align:center;width: 180px;"><?php echo $message['parcours1'];?></td>
       <td style="text-align:center;width: 180px;"><?php echo $message['salle'];?></td>
       <td style="text-align:center;width: 180px;"><?php echo $message['jury'];?></td>
       <td style="text-align:center;width: 180px;">

<form action='modif_salle.php' method='post'>
<input type='submit' value='Modifier'>
<input type='hidden' name='id_change' value="<?php echo $message['id_candidat']; ?>">
</form>

</td>
  </tr>
<?php
$i++;
}
?>
</table>
<br/>
  </page>
</body>
</html>