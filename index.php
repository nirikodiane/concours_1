<?php
ob_start();

session_start();
if (isset($_SESSION['id_utilisateur']) AND isset($_SESSION['email_concours'])) {

    require 'connect.php';

    // Requête unique pour compter candidats par niveau et école
    $sql = "SELECT niveau, ecole, COUNT(*) as nb FROM candidats GROUP BY niveau, ecole";
    $result = $bdd->query($sql);

    // Initialisation des tableaux
    $data = [];
    $totaux_niveau = ['DTS' => 0, 'DTSS' => 0, 'INGENIORAT' => 0];

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $niveau = $row['niveau'];
        $ecole = $row['ecole'];
        $nb = (int)$row['nb'];

        $data[$niveau][$ecole] = $nb;
        if (isset($totaux_niveau[$niveau])) {
            $totaux_niveau[$niveau] += $nb;
        } else {
            // Cas où niveau inattendu, on l'ajoute
            $totaux_niveau[$niveau] = $nb;
        }
    }

    $total_candidats = array_sum($totaux_niveau);
?>

<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $totaux_niveau['DTS'] ?? 0 ?></h3>
                <p>Candidat DTS</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="effectif_niveau.php" class="small-box-footer">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $totaux_niveau['DTSS'] ?? 0 ?></h3>
                <p>Candidat DTSS</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="effectif_niveau.php" class="small-box-footer">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $totaux_niveau['INGENIORAT'] ?? 0 ?></h3>
                <p>Candidat Ingéniorat</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="effectif_niveau.php" class="small-box-footer">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?= $total_candidats ?></h3>
                <p>Total des candidats</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="far fa-chart-bar"></i>
                    Effectif des candidats DTS et DTSS par école
                </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-6 col-md-3 text-center">
                        <input type="text" class="knob" value="<?= $data['DTS']['EGI'] ?? 0 ?>" data-width="90" data-max="<?= $totaux_niveau['DTS'] ?? 0 ?>" data-height="90" data-fgColor="#3c8dbc" readonly>
                        <div class="knob-label">DTS EGI</div>
                    </div>
                    <div class="col-6 col-md-3 text-center">
                        <input type="text" class="knob" value="<?= $data['DTS']['EGCGN'] ?? 0 ?>" data-width="90" data-height="90" data-max="<?= $totaux_niveau['DTS'] ?? 0 ?>" data-fgColor="#f56954" readonly>
                        <div class="knob-label">DTS EGCGN</div>
                    </div>
                    <div class="col-6 col-md-3 text-center">
                        <input type="text" class="knob" value="<?= $data['DTSS']['EGI'] ?? 0 ?>" data-min="0" data-max="<?= $totaux_niveau['DTSS'] ?? 0 ?>" data-width="90" data-height="90" data-fgColor="#00a65a" readonly>
                        <div class="knob-label">DTSS EGI</div>
                    </div>
                    <div class="col-6 col-md-3 text-center">
                        <input type="text" class="knob" value="<?= $data['DTSS']['EGCGN'] ?? 0 ?>" data-min="0" data-max="<?= $totaux_niveau['DTSS'] ?? 0 ?>" data-width="90" data-height="90" data-fgColor="#00c0ef" readonly>
                        <div class="knob-label">DTSS EGCGN</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 text-center">
                        <input type="text" class="knob" value="<?= $data['DTS']['EGMCS'] ?? 0 ?>" data-width="90" data-height="90" data-max="<?= $totaux_niveau['DTS'] ?? 0 ?>" data-fgColor="#932ab6" readonly>
                        <div class="knob-label">DTS EGMCS</div>
                    </div>
                    <div class="col-6 text-center">
                        <input type="text" class="knob" value="<?= $data['DTSS']['EGMCS'] ?? 0 ?>" data-min="0" data-max="<?= $totaux_niveau['DTSS'] ?? 0 ?>" data-width="90" data-height="90" data-fgColor="#39CCCC" readonly>
                        <div class="knob-label">DTSS EGMCS</div>
                    </div>
                </div>
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="far fa-chart-bar"></i>
                    Effectif des candidats Ingéniorat par école
                </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-4 text-center">
                        <input type="text" class="knob"
                            value="<?= $data['INGENIORAT']['EGI'] ?? 0 ?>"
                            data-width="90" data-height="90"
                            data-max="<?= $totaux_niveau['INGENIORAT'] ?? 0 ?>"
                            data-fgColor="#6f42c1" readonly>
                        <div class="knob-label">Ingéniorat EGI</div>
                    </div>
                    <div class="col-4 text-center">
                        <input type="text" class="knob"
                            value="<?= $data['INGENIORAT']['EGCGN'] ?? 0 ?>"
                            data-width="90" data-height="90"
                            data-max="<?= $totaux_niveau['INGENIORAT'] ?? 0 ?>"
                            data-fgColor="#d6336c" readonly>
                        <div class="knob-label">Ingéniorat EGCGN</div>
                    </div>
                    <div class="col-4 text-center">
                        <input type="text" class="knob"
                            value="<?= $data['INGENIORAT']['EGMCS'] ?? 0 ?>"
                            data-width="90" data-height="90"
                            data-max="<?= $totaux_niveau['INGENIORAT'] ?? 0 ?>"
                            data-fgColor="#198754" readonly>
                        <div class="knob-label">Ingéniorat EGMCS</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-6">
        <a href="effectif_niveau.php" class="btn btn-block btn-lg bg-gradient-primary text-white">Effectif par niveau</a>
    </div>
    <div class="col-lg-3 col-6">
        <a href="effectif_centre.php" class="btn btn-block btn-lg bg-gradient-primary text-white">Effectif par centre DTS</a>
    </div>
    <div class="col-lg-3 col-6">
        <a href="effectif_centre_dtss.php" class="btn btn-block btn-lg bg-gradient-primary text-white">Effectif par centre DTSS et INGENIORAT</a>
    </div>
    <div class="col-lg-3 col-6">
        <a href="#" class="btn btn-block btn-lg bg-gradient-primary text-white">Autres</a>
    </div>
</div>

<?php
$content = ob_get_clean();
$menu = "Tableau de bord";
$menu_stat = "";
require('template.php');
} else {
    header("Location:login.php");
    exit;
}
?>
