<?php
session_start();
if (!isset($_SESSION['id_utilisateur']) AND !isset($_SESSION['email_concours'])) {
    header("Location:login.php");
    exit;
}

require 'connect.php';

// 1) Récupérer le nombre de candidats par centre, ecole, niveau, parcours1 depuis candidats (pas de jointure)
$sql_counts = "
    SELECT 
        centre, 
        ecole, 
        niveau, 
        parcours1 AS parcours, 
        COUNT(*) AS effectif
    FROM candidats
    GROUP BY centre, ecole, niveau, parcours1
    ORDER BY centre, ecole, niveau, parcours1
";

$stmt_counts = $bdd->query($sql_counts);
$data_counts = $stmt_counts->fetchAll(PDO::FETCH_ASSOC);

// 2) Récupérer les mentions abrégées par parcours_abrevie depuis parcours
$sql_mentions = "
    SELECT parcours_abrevie, MIN(mention_abrevie) AS mention_abrevie
    FROM parcours
    GROUP BY parcours_abrevie
";
$stmt_mentions = $bdd->query($sql_mentions);
$mentions = $stmt_mentions->fetchAll(PDO::FETCH_KEY_PAIR); // clé=parcours_abrevie, valeur=mention_abrevie

// 3) Fusionner les données (remplacer parcours par la mention abrégée)
foreach ($data_counts as &$row) {
    $parcours = $row['parcours'];
    if (isset($mentions[$parcours]) && $mentions[$parcours] !== null && trim($mentions[$parcours]) !== '') {
        $row['mention'] = $mentions[$parcours];
    } else {
        $row['mention'] = '<i>Non défini</i>';
    }
}
unset($row);

// 4) Calcul des rowspan et affichage (comme avant)
$rowspanCentre = [];
$rowspanCentreEcole = [];
$rowspanCentreNiveau = [];
$rowspanCentreNiveauMention = [];

foreach ($data_counts as $row) {
    $centre = $row['centre'];
    $ecole = $row['ecole'];
    $niveau = $row['niveau'];
    $mention = $row['mention'];

    $keyCentre = $centre;
    $keyCentreEcole = $centre . '__' . $ecole;
    $keyCentreNiveau = $centre . '__' . $ecole . '__' . $niveau;
    $keyCentreNiveauMention = $centre . '__' . $ecole . '__' . $niveau . '__' . $mention;

    $rowspanCentre[$keyCentre] = ($rowspanCentre[$keyCentre] ?? 0) + 1;
    $rowspanCentreEcole[$keyCentreEcole] = ($rowspanCentreEcole[$keyCentreEcole] ?? 0) + 1;
    $rowspanCentreNiveau[$keyCentreNiveau] = ($rowspanCentreNiveau[$keyCentreNiveau] ?? 0) + 1;
    $rowspanCentreNiveauMention[$keyCentreNiveauMention] = ($rowspanCentreNiveauMention[$keyCentreNiveauMention] ?? 0) + 1;
}

function afficherValeur($valeur) {
    if ($valeur === null || trim($valeur) === '') {
        return '<i>Non défini</i>';
    }
    return htmlspecialchars($valeur);
}

$afficheCentre = [];
$afficheCentreEcole = [];
$afficheCentreNiveau = [];
$afficheCentreNiveauMention = [];

echo '<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Effectif par centre</title>
<style>
table {
    border-collapse: collapse;
    width: 100%;
    font-family: "Trebuchet MS", Arial, sans-serif;
    font-size: 13px;
}
th, td {
    border: 1px solid #333;
    padding: 5px;
    text-align: center;
}
th {
    background-color: #ddd;
}
</style>
</head>
<body>
<h2>Effectif par centre, école, niveau, mention et parcours</h2>
<table>
<thead>
<tr>
<th>Centre</th>
<th>École</th>
<th>Niveau</th>
<th>Mention</th>
<th>Parcours</th>
<th>Effectif</th>
</tr>
</thead>
<tbody>';

$totalGeneral = 0;
$currentCentre = '';
$sousTotalCentre = 0;

foreach ($data_counts as $row) {
    $centre = $row['centre'];
    $ecole = $row['ecole'];
    $niveau = $row['niveau'];
    $mention = $row['mention'];
    $parcours = $row['parcours'];
    $effectif = (int)$row['effectif'];

    $keyCentre = $centre;
    $keyCentreEcole = $centre . '__' . $ecole;
    $keyCentreNiveau = $centre . '__' . $ecole . '__' . $niveau;
    $keyCentreNiveauMention = $centre . '__' . $ecole . '__' . $niveau . '__' . $mention;

    if ($currentCentre !== '' && $currentCentre !== $centre) {
        echo '<tr style="font-weight:bold; background:#f0f0f0;">
            <td colspan="5" style="text-align:right;">Sous-total Centre ' . afficherValeur($currentCentre) . '</td>
            <td>' . $sousTotalCentre . '</td>
        </tr>';
        $sousTotalCentre = 0;
    }
    $currentCentre = $centre;

    echo '<tr>';
    if (!isset($afficheCentre[$keyCentre])) {
        echo '<td rowspan="' . $rowspanCentre[$keyCentre] . '">' . afficherValeur($centre) . '</td>';
        $afficheCentre[$keyCentre] = true;
    }
    if (!isset($afficheCentreEcole[$keyCentreEcole])) {
        echo '<td rowspan="' . $rowspanCentreEcole[$keyCentreEcole] . '">' . afficherValeur($ecole) . '</td>';
        $afficheCentreEcole[$keyCentreEcole] = true;
    }
    if (!isset($afficheCentreNiveau[$keyCentreNiveau])) {
        echo '<td rowspan="' . $rowspanCentreNiveau[$keyCentreNiveau] . '">' . afficherValeur($niveau) . '</td>';
        $afficheCentreNiveau[$keyCentreNiveau] = true;
    }
    if (!isset($afficheCentreNiveauMention[$keyCentreNiveauMention])) {
        echo '<td rowspan="' . $rowspanCentreNiveauMention[$keyCentreNiveauMention] . '">' . afficherValeur($mention) . '</td>';
        $afficheCentreNiveauMention[$keyCentreNiveauMention] = true;
    }

    echo '<td>' . afficherValeur($parcours) . '</td>';
    echo '<td>' . $effectif . '</td>';
    echo '</tr>';

    $totalGeneral += $effectif;
    $sousTotalCentre += $effectif;
}

if ($currentCentre !== '') {
    echo '<tr style="font-weight:bold; background:#f0f0f0;">
        <td colspan="5" style="text-align:right;">Sous-total Centre ' . afficherValeur($currentCentre) . '</td>
        <td>' . $sousTotalCentre . '</td>
    </tr>';
}

echo '<tr style="font-weight:bold; background:#ccc;">
    <td colspan="5" style="text-align:right;">Total Général</td>
    <td>' . $totalGeneral . '</td>
</tr>';

echo '</tbody></table></body></html>';
?>
