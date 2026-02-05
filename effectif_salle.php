<?php
ini_set('display_errors', 1);
ini_set('display_sta­rtuperrors', 1);
error_reporting(E_ALL);

session_start();
if(!isset($_SESSION['id_utilisateur']) AND !isset($_SESSION['email_concours'])){header("Location:login.php");}



require'connect.php';

$nbdts=$bdd->query('SELECT COUNT(*) AS nombre_dts FROM candidats WHERE niveau="DTS"');
$nombre_dts=$nbdts->fetch();

$nbdtsmeem=$bdd->query('SELECT COUNT(*) AS nombre_dts_meem FROM candidats WHERE niveau="DTS" AND parcours1="MEEM"');
$nombre_dts_meem=$nbdtsmeem->fetch();

$nbdtsmeft=$bdd->query('SELECT COUNT(*) AS nombre_dts_meft FROM candidats WHERE niveau="DTS" AND parcours1="MEFT"');
$nombre_dts_meft=$nbdtsmeft->fetch();

$nbdtsmsa=$bdd->query('SELECT COUNT(*) AS nombre_dts_msa FROM candidats WHERE niveau="DTS" AND parcours1="MSA"');
$nombre_dts_msa=$nbdtsmsa->fetch();

$nbdtsrt=$bdd->query('SELECT COUNT(*) AS nombre_dts_rt FROM candidats WHERE niveau="DTS" AND parcours1="RT"');
$nombre_dts_rt=$nbdtsrt->fetch();

$nbdtstim=$bdd->query('SELECT COUNT(*) AS nombre_dts_tim FROM candidats WHERE niveau="DTS" AND parcours1="TIM"');
$nombre_dts_tim=$nbdtstim->fetch();

$nbdtstbm=$bdd->query('SELECT COUNT(*) AS nombre_dts_tbm FROM candidats WHERE niveau="DTS" AND parcours1="TBM"');
$nombre_dts_tbm=$nbdtstbm->fetch();



$nbdtsminesem=$bdd->query('SELECT COUNT(*) AS nombre_dts_minesem FROM candidats WHERE niveau="DTS" AND parcours1="Mines_EM"');
$nombre_dts_minesem=$nbdtsminesem->fetch();

$nbdtsminestm=$bdd->query('SELECT COUNT(*) AS nombre_dts_minestm FROM candidats WHERE niveau="DTS" AND parcours1="Mines_TM"');
$nombre_dts_minestm=$nbdtsminestm->fetch();



$nbdtsbat=$bdd->query('SELECT COUNT(*) AS nombre_dts_bat FROM candidats WHERE niveau="DTS" AND parcours1="BAT"');
$nombre_dts_bat=$nbdtsbat->fetch();

$nbdtstp=$bdd->query('SELECT COUNT(*) AS nombre_dts_tp FROM candidats WHERE niveau="DTS" AND parcours1="TP"');
$nombre_dts_tp=$nbdtstp->fetch();

$nbdtstaf=$bdd->query('SELECT COUNT(*) AS nombre_dts_taf FROM candidats WHERE niveau="DTS" AND parcours1="TAF"');
$nombre_dts_taf=$nbdtstaf->fetch();

$nbdtstecna=$bdd->query('SELECT COUNT(*) AS nombre_dts_tecna FROM candidats WHERE niveau="DTS" AND parcours1="TecNa"');
$nombre_dts_tecna=$nbdtstecna->fetch();

$nbdtspaq=$bdd->query('SELECT COUNT(*) AS nombre_dts_paq FROM candidats WHERE niveau="DTS" AND parcours1="PAq"');
$nombre_dts_paq=$nbdtspaq->fetch();

$nbdtscom=$bdd->query('SELECT COUNT(*) AS nombre_dts_com FROM candidats WHERE niveau="DTS" AND parcours1="COM"');
$nombre_dts_com=$nbdtscom->fetch();

$nbdtsrh=$bdd->query('SELECT COUNT(*) AS nombre_dts_rh FROM candidats WHERE niveau="DTS" AND parcours1="RH"');
$nombre_dts_rh=$nbdtsrh->fetch();

$nbdtsgan=$bdd->query('SELECT COUNT(*) AS nombre_dts_gan FROM candidats WHERE niveau="DTS" AND parcours1="GAN"');
$nombre_dts_gan=$nbdtsgan->fetch();

$nbdtstba=$bdd->query('SELECT COUNT(*) AS nombre_dts_tba FROM candidats WHERE niveau="DTS" AND parcours1="TBA"');
$nombre_dts_tba=$nbdtstba->fetch();

$nbdtsgfc=$bdd->query('SELECT COUNT(*) AS nombre_dts_gfc FROM candidats WHERE niveau="DTS" AND parcours1="GFC"');
$nombre_dts_gfc=$nbdtsgfc->fetch();

$nbdtsagri=$bdd->query('SELECT COUNT(*) AS nombre_dts_agri FROM candidats WHERE niveau="DTS" AND parcours1="AGRI"');
$nombre_dts_agri=$nbdtsagri->fetch();

$nbdtsagri=$bdd->query('SELECT COUNT(*) AS nombre_dts_agri FROM candidats WHERE niveau="DTS" AND parcours1="PAn"');
$nombre_dts_agri=$nbdtsagri->fetch();

$nbdtsiaa=$bdd->query('SELECT COUNT(*) AS nombre_dts_iaa FROM candidats WHERE niveau="DTS" AND parcours1="IAA"');
$nombre_dts_iaa=$nbdtsiaa->fetch();


    $salles=array('AMPHI',
    'S2',
    'S3',
    'S4',
    'S6',
    'S7',
    'S8',
'SC1',
'SC2',
'SC3',
'SC4',
'SD1',
'SD2',
'SD3',
'SD4',
'SD5',
'SD6',
'SD7',
'SD8',

    'L1',
    'L2',
    'L3',
    'L4',
    'L5'
     );
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Liste de candidats</title>
    <link rel="stylesheet" href="../css/styles.css">
    <style>
    table, tr, td, th {
      border-collapse: collapse;
      border: 1px solid;
    }

.row {
  margin-left:-5px;
  margin-right:-5px;
}
  
.column {
  float: left;
  width: 50%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}

    </style>
  </head>
  <body>
<?php 

 for ($i=0; $i < 24 ; $i++) {
$salle=$salles[$i];
$nbdts=$bdd->prepare('SELECT COUNT(*) AS nombre_dts FROM candidats WHERE niveau="DTS" AND salle=?');
$nbdts->execute(array($salle));
$nombre_dts=$nbdts->fetch();

$nbdtsmeem=$bdd->prepare('SELECT COUNT(*) AS nombre_dts_meem FROM candidats WHERE niveau="DTS" AND parcours1="MEEM" AND salle=?');
$nbdtsmeem->execute(array($salle));
$nombre_dts_meem=$nbdtsmeem->fetch();

$nbdtsmeft=$bdd->prepare('SELECT COUNT(*) AS nombre_dts_meft FROM candidats WHERE niveau="DTS" AND parcours1="MEFT" AND salle=?');
$nbdtsmeft->execute(array($salle));
$nombre_dts_meft=$nbdtsmeft->fetch();

$nbdtsmsa=$bdd->prepare('SELECT COUNT(*) AS nombre_dts_msa FROM candidats WHERE niveau="DTS" AND parcours1="MSA" AND salle=?');
$nbdtsmsa->execute(array($salle));
$nombre_dts_msa=$nbdtsmsa->fetch();

$nbdtsrt=$bdd->prepare('SELECT COUNT(*) AS nombre_dts_rt FROM candidats WHERE niveau="DTS" AND parcours1="RT" AND salle=?');
$nbdtsrt->execute(array($salle));
$nombre_dts_rt=$nbdtsrt->fetch();

$nbdtstim=$bdd->prepare('SELECT COUNT(*) AS nombre_dts_tim FROM candidats WHERE niveau="DTS" AND parcours1="TIM" AND salle=?');
$nbdtstim->execute(array($salle));
$nombre_dts_tim=$nbdtstim->fetch();

$nbdtsbat=$bdd->prepare('SELECT COUNT(*) AS nombre_dts_bat FROM candidats WHERE niveau="DTS" AND parcours1="BAT" AND salle=?');
$nbdtsbat->execute(array($salle));
$nombre_dts_bat=$nbdtsbat->fetch();

$nbdtstp=$bdd->prepare('SELECT COUNT(*) AS nombre_dts_tp FROM candidats WHERE niveau="DTS" AND parcours1="TP" AND salle=?');
$nbdtstp->execute(array($salle));
$nombre_dts_tp=$nbdtstp->fetch();

$nbdtstaf=$bdd->prepare('SELECT COUNT(*) AS nombre_dts_taf FROM candidats WHERE niveau="DTS" AND parcours1="TAF" AND salle=?');
$nbdtstaf->execute(array($salle));
$nombre_dts_taf=$nbdtstaf->fetch();

$nbdtstecna=$bdd->prepare('SELECT COUNT(*) AS nombre_dts_tecna FROM candidats WHERE niveau="DTS" AND parcours1="TecNa" AND salle=?');
$nbdtstecna->execute(array($salle));
$nombre_dts_tecna=$nbdtstecna->fetch();

$nbdtspaq=$bdd->prepare('SELECT COUNT(*) AS nombre_dts_paq FROM candidats WHERE niveau="DTS" AND parcours1="PAq" AND salle=?');
$nbdtspaq->execute(array($salle));
$nombre_dts_paq=$nbdtspaq->fetch();

$nbdtscom=$bdd->prepare('SELECT COUNT(*) AS nombre_dts_com FROM candidats WHERE niveau="DTS" AND parcours1="COM" AND salle=?');
$nbdtscom->execute(array($salle));
$nombre_dts_com=$nbdtscom->fetch();

$nbdtsrh=$bdd->prepare('SELECT COUNT(*) AS nombre_dts_rh FROM candidats WHERE niveau="DTS" AND parcours1="RH" AND salle=?');
$nbdtsrh->execute(array($salle));
$nombre_dts_rh=$nbdtsrh->fetch();

$nbdtsgan=$bdd->prepare('SELECT COUNT(*) AS nombre_dts_gan FROM candidats WHERE niveau="DTS" AND parcours1="GAN" AND salle=?');
$nbdtsgan->execute(array($salle));
$nombre_dts_gan=$nbdtsgan->fetch();

$nbdtstba=$bdd->prepare('SELECT COUNT(*) AS nombre_dts_tba FROM candidats WHERE niveau="DTS" AND parcours1="TBA" AND salle=?');
$nbdtstba->execute(array($salle));
$nombre_dts_tba=$nbdtstba->fetch();

$nbdtsgfc=$bdd->prepare('SELECT COUNT(*) AS nombre_dts_gfc FROM candidats WHERE niveau="DTS" AND parcours1="GFC" AND salle=?');
$nbdtsgfc->execute(array($salle));
$nombre_dts_gfc=$nbdtsgfc->fetch();

$nbdtsagri=$bdd->prepare('SELECT COUNT(*) AS nombre_dts_agri FROM candidats WHERE niveau="DTS" AND parcours1="AGRI" AND salle=?');
$nbdtsagri->execute(array($salle));
$nombre_dts_agri=$nbdtsagri->fetch();

$nbdtspan=$bdd->prepare('SELECT COUNT(*) AS nombre_dts_pan FROM candidats WHERE niveau="DTS" AND parcours1="PAn" AND salle=?');
$nbdtspan->execute(array($salle));
$nombre_dts_pan=$nbdtspan->fetch();

$nbdtsiaa=$bdd->prepare('SELECT COUNT(*) AS nombre_dts_iaa FROM candidats WHERE niveau="DTS" AND parcours1="IAA" AND salle=?');
$nbdtsiaa->execute(array($salle));
$nombre_dts_iaa=$nbdtsiaa->fetch();


$nbdtstbm=$bdd->prepare('SELECT COUNT(*) AS nombre_dts_tbm FROM candidats WHERE niveau="DTS" AND parcours1="TBM" AND salle=?');
$nbdtstbm->execute(array($salle));
$nombre_dts_tbm=$nbdtstbm->fetch();

$nbdtsminesem=$bdd->prepare('SELECT COUNT(*) AS nombre_dts_minesem FROM candidats WHERE niveau="DTS" AND parcours1="Mines_EM" AND salle=?');
$nbdtsminesem->execute(array($salle));
$nombre_dts_minesem=$nbdtsminesem->fetch();

$nbdtsminestm=$bdd->prepare('SELECT COUNT(*) AS nombre_dts_minestm FROM candidats WHERE niveau="DTS" AND parcours1="Mines_TM" AND salle=?');
$nbdtsminestm->execute(array($salle));
$nombre_dts_minestm=$nbdtsminestm->fetch();
?>


<table>
  <tr> <th>Salle</th> <th>Mention</th> <th>Parcours</th> <th>Effectif</th></tr>
<tr> <td rowspan="21"><?php echo $salle; ?></td> <td rowspan="3">ME</td> <td>MEEM</td> <td><?php echo $nombre_dts_meem['nombre_dts_meem']; ?></td></tr>
<tr> <td>MEFT</td> <td><?php echo $nombre_dts_meft['nombre_dts_meft']; ?></td> </tr>
<tr> <td>MSA</td> <td><?php echo $nombre_dts_msa['nombre_dts_msa']; ?></td> </tr>
<tr> <td rowspan="3">TC</td> <td>RT</td> <td><?php echo $nombre_dts_rt['nombre_dts_rt']; ?></td></tr>
<tr> <td>TIM</td> <td><?php echo $nombre_dts_tim['nombre_dts_tim']; ?></td></tr>
<tr> <td>TBM</td> <td><?php echo $nombre_dts_tbm['nombre_dts_tbm']; ?></td></tr>

<tr> <td rowspan="3">AGRO</td> <td>AGRI</td> <td><?php echo $nombre_dts_agri['nombre_dts_agri']; ?></td></tr>
<tr> <td>PAn</td> <td><?php echo $nombre_dts_pan['nombre_dts_pan']; ?></td></tr>
<tr> <td>IAA</td> <td><?php echo $nombre_dts_iaa['nombre_dts_iaa']; ?></td></tr>

<tr> <td rowspan="2">Mines</td> <td>Mines_EM</td> <td><?php echo $nombre_dts_minesem['nombre_dts_minesem']; ?></td></tr>
<tr> <td>Mines_TM</td> <td><?php echo $nombre_dts_minestm['nombre_dts_minestm']; ?></td></tr>

<tr> <td rowspan="3">GC</td> <td>BAT</td> <td><?php echo $nombre_dts_bat['nombre_dts_bat']; ?></td></tr>
<tr> <td>TP</td> <td><?php echo $nombre_dts_tp['nombre_dts_tp']; ?></td></tr>
<tr> <td>TAF</td> <td><?php echo $nombre_dts_taf['nombre_dts_taf']; ?></td></tr>
<tr> <td rowspan="2">GN</td> <td>TecNa</td> <td><?php echo $nombre_dts_tecna['nombre_dts_tecna']; ?></td></tr>
<tr> <td>PAq</td> <td><?php echo $nombre_dts_paq['nombre_dts_paq']; ?></td></tr>
<tr> <td rowspan="3">CS/TH</td> <td>COM</td> <td><?php echo $nombre_dts_com['nombre_dts_com']; ?></td></tr>
<tr> <td>RH</td> <td><?php echo $nombre_dts_rh['nombre_dts_rh']; ?></td> </tr>
<tr> <td>GAN</td> <td><?php echo $nombre_dts_gan['nombre_dts_gan']; ?></td> </tr>
<tr> <td rowspan="2">FBA</td> <td>TBA</td> <td><?php echo $nombre_dts_tba['nombre_dts_tba']; ?></td></tr>
<tr> <td>GFC</td> <td><?php echo $nombre_dts_gfc['nombre_dts_gfc']; ?></td></tr>
<tr> <td colspan="3"><b>TOTAL</b></td> <td><b><?php echo $nombre_dts['nombre_dts']; ?></b></td></tr>
</table>
  </div>
    
<p></p>
<?php }
?>


  </body>
</html>
