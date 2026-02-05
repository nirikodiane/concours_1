<?php
session_start();
if(!isset($_SESSION['id_utilisateur']) || !isset($_SESSION['email_concours'])){
    header("Location:login.php");
    exit;
}

require 'connect.php';

// Fonction pour récupérer effectifs par parcours selon niveau
function getEffectifsParcours($bdd, $niveau) {
    $req = $bdd->prepare('SELECT parcours_abrevie FROM parcours WHERE grade_abrevie = ? ORDER BY mention_abrevie');
    $req->execute([$niveau]);

    $effectifs = [];
    $parcoursList = [];

    while ($row = $req->fetch()) {
        $parcoursList[] = $row['parcours_abrevie'];
    }

    // Préparer la requête de comptage
    $countReq = $bdd->prepare('SELECT COUNT(*) AS effectif FROM candidats WHERE niveau = ? AND parcours1 = ?');

    foreach ($parcoursList as $parcours) {
        $countReq->execute([$niveau == "ING" ? "INGENIORAT" : $niveau, $parcours]);
        $res = $countReq->fetch();
        $effectifs[$parcours] = $res['effectif'];
    }

    return [$parcoursList, $effectifs];
}

// Récupérer les données DTS
list($dtsParcours, $dtsEffectifs) = getEffectifsParcours($bdd, "DTS");
$dtsTotal = $bdd->query('SELECT COUNT(*) AS total FROM candidats WHERE niveau = "DTS"')->fetch()['total'];

// Récupérer les données DTSS
list($dtssParcours, $dtssEffectifs) = getEffectifsParcours($bdd, "DTSS");
$dtssTotal = $bdd->query('SELECT COUNT(*) AS total FROM candidats WHERE niveau = "DTSS"')->fetch()['total'];

// Récupérer les données Ingéniorat
list($ingParcours, $ingEffectifs) = getEffectifsParcours($bdd, "ING");
$ingTotal = $bdd->query('SELECT COUNT(*) AS total FROM candidats WHERE niveau = "INGENIORAT"')->fetch()['total'];

$totalGlobal = $dtsTotal + $dtssTotal + $ingTotal;

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Effectif des candidats - Concours IST-D 2025-2026</title>

<style>
  /* Police générale et taille pour l'écran */
  body {
    font-family: 'Trebuchet MS', sans-serif;
    font-size: 16px; /* un peu grande */
    margin: 0;
    padding: 0 15px;
  }

  h4 {
    font-size: 1.4rem;
    margin-bottom: 1rem;
  }

  .container {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap; /* responsive sur petits écrans */
    justify-content: space-between;
  }

  .box {
    flex: 1 1 300px;
    min-width: 280px;
    margin-bottom: 2rem;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #000;
    font-size: 1rem;
  }

  th, td {
    border: 1px solid #000;
    padding: 8px 12px;
    text-align: center;
  }

  p {
    margin-top: 2rem;
    font-size: 1rem;
  }

  /* --- Styles pour impression --- */
  @media print {
    @page {
      size: A4 landscape;
      margin: 15mm 15mm 15mm 15mm;
    }

    body {
      font-family: 'Trebuchet MS', sans-serif;
      font-size: 12pt; /* taille confortable à l'impression */
      margin: 0;
      padding: 0;
      line-height: 1.2;
      -webkit-print-color-adjust: exact;
      color-adjust: exact;
    }

    h4 {
      font-size: 14pt;
      margin-bottom: 12pt;
      page-break-after: avoid;
    }

    .container {
      display: flex !important;
      flex-wrap: nowrap !important; /* force 1 ligne pour tous les tableaux */
      justify-content: space-between;
      gap: 10pt;
    }

    .box {
      flex: 1 1 32% !important;
      min-width: auto !important;
      margin: 0 !important;
      page-break-inside: avoid !important;
    }

    table {
      font-size: 11pt !important;
      border: 1px solid #000 !important;
      border-collapse: collapse !important;
      width: 100% !important;
      page-break-inside: avoid !important;
    }

    th, td {
      border: 1px solid #000 !important;
      padding: 6px 8px !important;
      font-size: 11pt !important;
    }

    p {
      font-size: 12pt;
      margin-top: 12pt;
      page-break-before: avoid;
    }

    /* Cacher tout ce qui n’est pas utile à l’impression */
    a, button, .no-print {
      display: none !important;
    }
  }
</style>




</head>
<body>
  <h4>Institut Supérieur de Technologie d'Antsiranana</h4>
  <h4>Effectif des candidats au concours 2024-2025</h4>

  <div class="container">
    <!-- DTS -->
    <div class="box">
      <h4>DTS</h4>
      <table>
        <thead>
          <tr><th>Parcours</th><th>Effectif</th></tr>
        </thead>
        <tbody>
          <?php foreach($dtsParcours as $parcours): ?>
            <tr>
              <td><?= htmlspecialchars($parcours) ?></td>
              <td><?= $dtsEffectifs[$parcours] ?? 0 ?></td>
            </tr>
          <?php endforeach; ?>
          <tr>
            <td><strong>TOTAL</strong></td>
            <td><strong><?= $dtsTotal ?></strong></td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- DTSS -->
    <div class="box">
      <h4>DTSS</h4>
      <table>
        <thead>
          <tr><th>Parcours</th><th>Effectif</th></tr>
        </thead>
        <tbody>
          <?php foreach($dtssParcours as $parcours): ?>
            <tr>
              <td><?= htmlspecialchars($parcours) ?></td>
              <td><?= $dtssEffectifs[$parcours] ?? 0 ?></td>
            </tr>
          <?php endforeach; ?>
          <tr>
            <td><strong>TOTAL</strong></td>
            <td><strong><?= $dtssTotal ?></strong></td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Ingéniorat -->
    <div class="box">
      <h4>Ingéniorat</h4>
      <table>
        <thead>
          <tr><th>Parcours</th><th>Effectif</th></tr>
        </thead>
        <tbody>
          <?php foreach($ingParcours as $parcours): ?>
            <tr>
              <td><?= htmlspecialchars($parcours) ?></td>
              <td><?= $ingEffectifs[$parcours] ?? 0 ?></td>
            </tr>
          <?php endforeach; ?>
          <tr>
            <td><strong>TOTAL</strong></td>
            <td><strong><?= $ingTotal ?></strong></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <p><strong>Total global : <?= $totalGlobal ?></strong></p>
  <p>Fait à Antsiranana, le <?= date("d/m/Y") ?></p>
</body>
</html>
