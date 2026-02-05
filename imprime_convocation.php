<?php
session_start();

if(!isset($_SESSION['id_utilisateur']) AND !isset($_SESSION['email_concours'])){header("Location:login.php");}

require "connect.php";
$id=$_GET['impr'];
$req = $bdd->prepare('UPDATE `candidats` SET `convoc`="OUI" WHERE `id_candidat`=?');
$req_impr=$req->execute(array($id));
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>Convocation</title>
  </head>
  <body>
    <style>
    *{
      font-family: Arial Narrow;
      font-size: 12pt;
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

    .photo{
    width: 150px;
    height: 150px;
    margin-top: -80px;
    margin-left: 526px;
    border: 2px solid;
    text-align: center;
    vertical-align: middle;
  }
  .convocation *{
    font-size: 15px;
    line-height: 1.2;
  }
  .convocation table tr td{
    height: 20px;
    border: 1px solid;
    padding-left: 20px;
    padding-right: 20px;
    vertical-align: middle;
  }
  .convocation table{
    border-collapse: collapse;
  }

        .signature
  {
    /*signature seulement*/
    margin-left: auto;
    text-align: center;
    background-image: url("img/dgs.png");
    background-repeat: no-repeat;
    background-size: 40%;
    background-position: center bottom;

    /*signature avec cachet*/
    /*margin-left: 150mm;
    text-align: center;
    background-image: url("img/dga.png");
    background-repeat: no-repeat;
    background-size: 30%;
    background-position: center bottom;*/
  }
    </style>
    <page size="A4" backtop="10mm" backleft="10mm" backright="10mm" backbottom="10mm">
    <div class="tete">
    <p style="margin-top:-15px;font-size: 9pt;">REPOBLIKAN’I MADAGASIKARA</p>
    <p style="margin-top:-15px;font-size: 9pt;">Fitiavana – Tanindrazana – Fandrosoana</p>
    <p style="margin-top:-15px;font-size: 9pt;">------oOo------</p>
    <p style="margin-top:-15px;font-size: 11pt;">MINISTERE DE L’ENSEIGNEMENT SUPERIEUR ET DE LA RECHERCHE SCIENTIFIQUE</p>
    <p style="margin-top:-15px;font-size: 9pt;">------oOo------</p>
  <div class="logo">
    <img src="img/logo_ist.png">
  </div>
    <h5 style="margin-top:-40px;color:blue;"><span style="color:red;">I</span>NSTITUT
      <span style="color:red;">S</span>UPERIEUR DE <span style="color:red;">T</span>ECHNOLOGIE <span style="color:red;">D</span>’ANTSIRANANA</h5>
    <table class="ruban">
      <tr class="ruban">
        <td class="ruban">B.P. 509 Antsiranana - 201</td>
        <td class="ruban">DIRECTION GENERALE</td>
        <td class="ruban">www.istdiego.net</td>
      </tr>
    </table>
  </div>
  <p></p>
<?php
require 'connect.php';
$candidat=$_GET['impr'];
$recup=$bdd->prepare('SELECT * FROM candidats WHERE id_candidat=? ORDER BY id_candidat');
$recup->execute(array($candidat));
$donnees=$recup->fetch();

$p=$donnees['parcours1'];
$pa=$bdd->prepare('SELECT * FROM parcours WHERE parcours_abrevie=? ORDER BY id_parcours');
$pa->execute(array($p));
$parcours=$pa->fetch();

$p2=$donnees['parcours2'];
$pa2=$bdd->prepare('SELECT * FROM parcours WHERE parcours_abrevie=? ORDER BY id_parcours');
$pa2->execute(array($p2));
$parcours2=$pa2->fetch();

  $vtmp=$bdd->prepare("SELECT * FROM date_concours WHERE Cycle=? ORDER BY ID DESC LIMIT 1");
  if ($donnees['niveau']=="DTS") {$cycle="cycle1";} else {$cycle="cycle2";}
  $vtmp->execute(array($cycle));
  $dateConcours=$vtmp->fetch();

$s=$donnees['salle'];
$sa=$bdd->prepare('SELECT * FROM salle WHERE id_salle=?');
$sa->execute(array($s));
$salle=$sa->fetch();

?>





  <div class="convocation">
    <h4 style="margin-top:40px;text-align:center;font-size:20px;">CONVOCATION</h4>
    <div class="photo">
      Photo 4x4
    </div>
    <div><br/>A <?php if ($donnees['sexe']=="M") {echo "Monsieur";} elseif ($donnees['sexe']=="F") {echo "Mademoiselle";}else {echo "Mr/Mme/Mlle";} ?>
    <strong><?php echo $donnees['nom']." ".$donnees['prenom']; ?></strong>
      <br/><br/>
      Vous êtes régulièrement 
       <?php if ($donnees['sexe']=="M") {echo "inscrit";} elseif ($donnees['sexe']=="F") {echo "inscrite";}else {echo "inscrit(e)";} ?>
      au concours d'entrée 
<?php
if ($donnees['niveau']=='DTS') { echo " en première année de formation des Techniciens Supérieurs ";}
if ($donnees['niveau']=='DTSS') { echo " en troisième année de formation des Techniciens Supérieurs Spécialisés ";}
if ($donnees['niveau']=='INGENIORAT') { echo " en formation d’ingénieurs niveau M1 ";}
?>
       à l'Institut Supérieur de Technologie d'Antsiranana (IST-D) au titre de l’année académique <?php echo date("Y") . "-" . (date("Y") + 1); ?> à l'<strong><?php echo $parcours['ecole_complet']." (".$parcours['ecole_abrevie'].")";?></strong>.
      <ul>
         <li>Parcours 1er choix : <strong><?php
        echo $parcours['parcours_complet']." (".$donnees['parcours1'].")";
         ?>  </strong> </li>
         <li>Parcours 2e choix : <strong><?php
        echo $parcours2['parcours_complet']." (".$donnees['parcours2'].")";
         ?>  </strong> </li>
         <li>Centre d'examen : <strong><?php echo $donnees['centre']; ?></strong></li>
         <li>Numéro d'inscription : <strong><?php echo sprintf("%'03d", $donnees['numero'])."24".$donnees['parcours1'];?></strong></li>

       </ul>

<p>
Les épreuves vont se dérouler le <strong><?php echo $dateConcours['Premier_Date']; ?></strong> et le <strong><?php echo $dateConcours['Deuxiem_Date']." ".date("Y");  ?></strong>
</p>

      <p>Les jours du concours, vous êtes 
      <?php if ($donnees['sexe']=="M") {echo "prié";} elseif ($donnees['sexe']=="F") {echo "priée";}else {echo "prié(e)";} ?> 
      de vous munir de la présente convocation et d'une <strong>pièce d'identité.</strong> <br>
      L'appel des candidats se fera une demi-heure avant le début de chaque épreuve.<br>
      Il est strictement interdit de sortir des salles d’examen durant la première heure de l’épreuve, auquel cas le candidat doit remettre sa copie ainsi que le sujet aux surveillants.<br>
      <b>N.B. :</b> Les téléphones et les calculatrices programmables sont strictement interdits dans la salle d'examen.
    </div>
    <strong style="text-decoration:underline;margin-top:15px;">Déroulement des épreuves</strong>
    <br/>
<?php
    if ($donnees['niveau']=='DTS')
    {
        if ($donnees['ecole']=='EGMCS') {include 'edt_egmcs.php';}
        if ($parcours['mention_abrevie']=='ME' OR $parcours['mention_abrevie']=='TC' OR $parcours['mention_abrevie']=='GM') {include 'edt_me_tc_mines.php';}
        if ($parcours['mention_abrevie']=='AGRO') {include 'edt_agro.php';}
        if ($parcours['mention_abrevie']=='GC' OR $parcours['mention_abrevie']=='GN') {include 'edt_gc_gn.php';}
        if ($parcours['mention_abrevie']=='MEB') {include 'edt_meb.php';}
    }
    else
    {
        include 'edt_second_cycle.php';
    }    
?>
    <br/>
    <div style='font-size:9px;'>Pour tous renseignement complémentaires, contacter <strong style='font-size:9px;'>032 03 100 55</strong> / <strong style='font-size:9px;'>032 03 456 46</strong> / <strong style='font-size:9px;'>032 04 859 21</strong> / <strong style='font-size:9px;'>032 03 100 50</strong> / <strong style='font-size:9px;'>032 57 532 76</strong>.</div>

  </div>

  </page>
</body>


<div class="signature">
<p><b>Fait à Antsiranana, le <?php echo date("d/m/Y");?><b></p>
<p><b>Le Directeur Général,<b></p>
<br><br>
<p><b>Dr. TSIMITAMBY Briand<b></p>
</div>
</html>