<?php
ob_start();


session_start();
if(isset($_SESSION['id_utilisateur']) AND isset($_SESSION['email_concours'])){


include 'connect.php';
?>

<form class="" method="POST" action="enregistre_candidat.php">
    <hr>
    <div class="carre row">
        <div class="col-md-3"></div>
        <h4>INFORMATION DU CANDIDAT</h4>
        <div class="col-md-3"></div>

    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" class="form-control" id="exampleInputEmail1" placeholder="Nom du candidat" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="prenom">Prénoms :</label>
                <input type="text"  name="prenom" class="form-control" id="exampleInputEmail1" placeholder="Prénoms du candidat">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="sexe">Sexe :</label>
                <select  name="sexe" class="form-control" required>
                    <option></option>
                    <option value="M">M</option>
                    <option value="F">F</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="date_naissance">Date de naissance :</label>
                <input type="date"  name="date_naissance" class="form-control" id="exampleInputEmail1" placeholder="JJ/MM/AAAA" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="lieu_naissance">Lieu de naissance :</label>
                <input type="text"  name="lieu_naissance" class="form-control" id="exampleInputEmail1" placeholder="Lieu de naissance" required>
            </div>
        </div>
    </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="adresse">Adresse :</label>
                <input type="text"   name="adresse" class="form-control" id="exampleInputEmail1" placeholder="Adresse du candidat" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="telephone">Téléphone :</label>
                <input type="text"  name="telephone" class="form-control" id="exampleInputEmail1" placeholder="N° téléphone du candidat" required>
            </div>
        </div>
                

    </div>


                <input type="hidden"   name="N_CIN" class="form-control" id="exampleInputEmail1" placeholder="Numéro CIN du candidat" value="0" >

                <input type="hidden"  name="Date_CIN" class="form-control" id="exampleInputEmail1" placeholder="JJ/MM/AAAA" value="0">

                <input type="hidden"   name="Lieu_CIN" class="form-control" id="exampleInputEmail1" placeholder="lieu de CIN du candidat" value="0">
                <input type="hidden"  name="adresse_email" class="form-control" id="exampleInputEmail1" placeholder="Adresse email du candidat" value="0">
    <hr>
    <div class="carre row">
        <div class="col-md-3"></div>
        <h4>INFORMATION BACC</h4>
        <div class="col-md-3"></div>
    </div>


    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="type_candidat">Candidat :</label>
                <select class="form-control" name="type_candidat" required>
                    <option></option>
                    <option value="Scolaire">Scolaire</option>
                    <option value="Entreprise">Entreprise</option>
                    <option value="Etranger">Etranger</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="serie_bacc">Série Bacc :</label>
                <select class="form-control" name="serie_bacc" required>
                    <option></option>
                    <?php if ($_GET['ecole']=='EGI' OR $_GET['ecole']=='EGCGN') {?>
                    <option value="A2">A2</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="S">S</option>
                    <option value="OSE">OSE</option>
                    <option value="Technique Industriel">Tech. Industriel</option>
                    <option value="Technique Génie Civil">Tech. Génie Civil</option>
                    <?php } ?>

                    <?php if ($_GET['ecole']=='EGMCS') {?>
                    <option value="A1">A1</option>
                    <option value="A2">A2</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="L">L</option>
                    <option value="ES">ES</option>
                    <option value="OSE">OSE</option>
                    <option value="S">S</option>
                    <option value="Technique Tertiaire">Tech. Tertiaire</option>
                    <option value="G1">G1</option>
                    <option value="G2">G2</option>
                    <option value="CG">CG</option>
                    <?php } ?>

                </select>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="annee_bacc">Année Bacc :</label>
                <input type="number" name="annee_bacc" class="form-control" id="exampleInputEmail1" placeholder="Année Bacc" min="2018" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="mention_bacc">Mention Bacc :</label>
                <select class="form-control" name="mention_bacc" required>
                    <option></option>
                    <option value="Passable">Passable</option>
                    <option value="Assez Bien">Assez Bien</option>
                    <option value="Bien">Bien</option>
                    <option value="Très Bien">Très Bien</option>
                </select>
            </div>
        </div>

    </div>


    <hr>
    <div class="carre row">
        <div class="col-md-3"></div>
        <h4>INFORMATION MENTION ET PARCOURS</h4>
        <div class="col-md-3"></div>
    </div>

    <div class="row">

    

        <div class="col-md-4">
            <div class="form-group">
                <label for="parcours1">Parcours 1er choix :</label>
                <select class="form-control" name="parcours1" required>
                    <option></option>


<?php
    $reponse1=$bdd->prepare('SELECT * FROM parcours WHERE ecole_abrevie=? AND grade_abrevie=? GROUP BY parcours_abrevie ORDER BY ecole_abrevie, id_parcours ');
    $reponse1->execute(array($_GET['ecole'], 'DTS'));
    while($donnees1=$reponse1->fetch())

    {
        $parcours1=$donnees1['parcours_abrevie'];
?>
<option  value="<?php echo $parcours1 ?>"><?php echo $parcours1 ?></option>
<?php } ?>

                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="parcours2">Parcours 2e choix :</label>
                <select class="form-control" name="parcours2" required>
                    <div class="form-group">
                        <option></option>


<?php
    $reponse2=$bdd->prepare('SELECT * FROM parcours WHERE ecole_abrevie=? AND grade_abrevie=? GROUP BY parcours_abrevie ORDER BY ecole_abrevie, id_parcours ');
    $reponse2->execute(array($_GET['ecole'], 'DTS'));
    while($donnees2=$reponse2->fetch())

    {
        $parcours2=$donnees2['parcours_abrevie'];
?>
<option  value="<?php echo $parcours2 ?>"><?php echo $parcours2 ?></option>
<?php } ?>

                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="centre">Centre d'examen :</label>
                <select class="form-control" name="centre" required>
                    <option></option>
                    <option value="Antsiranana">Antsiranana</option>
                    <option value="Ambilobe">Ambilobe</option>
                    <option value="Ambanja">Ambanja</option>
                    <option value="Antsohihy">Antsohihy</option>
                    <option value="Sambava">Sambava</option>
                    <option value="Mahajanga">Mahajanga</option>
                    <option value="Antananarivo">Antananarivo</option>
                    <option value="Toamasina">Toamasina</option>
                    <option value="Fianarantsoa">Fianarantsoa</option>
                    <option value="Toliara">Toliara</option>
                </select>
            </div>
        </div>
    </div>


    <hr>
    <div class="carre row">
        <div class="col-md-3"></div>
        <h4>INFORMATION DOSSIER</h4>
        <div class="col-md-3"></div>
    </div>


    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="num_arrivee">N° Arrivée :</label>
                <input type="text" name="num_arrivee" class="form-control" id="exampleInputEmail1" placeholder="N° Arrivée" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="date_arrivee">Date d'arrivé :</label>
                <input type="date" name="date_arrivee" class="form-control" id="exampleInputEmail1" placeholder="Date d'arrivé" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="mode_paiement">Mode de paiement :</label>
                <select class="form-control" name="mode_paiement" required>
                    <option></option>
                    <option value="Versement bancaire">Versement bancaire</option>
                    <option value="Versement caisse">Versement caisse</option>
                    <option value="Virement bancaire">Virement bancaire</option>
                    <option value="Cheque">Chèque</option>
                    <option value="Autres">Autres</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="dossier_complet">Dossier complet :</label>
                <select class="form-control" name="dossier_complet" required>
                <option></option>
                    <option value="OUI">OUI</option>
                    <option value="NON">NON</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="obs">Observation :</label>
                <input type="text" name="obs" class="form-control" id="exampleInputEmail1" placeholder="Dossier manquant">
            </div>
        </div>
        <?php $ecole=$_GET['ecole'] ?>
        <input type="hidden" name="ecole" value="<?php echo $ecole; ?>">
        <input type="hidden" name="niveau" value="DTS">
        <input type="hidden" name="saisi_par" value="<?php echo $_SESSION['nom']." ".$_SESSION['prenom']; ?>">
        <div class="col-md-4">
            <input type="submit" class="form-control btn btn-primary mt-4" value="Enregistrer">
        </div>
    </div>





</form>


<?php $content = ob_get_clean();

if ($_GET['ecole']=='EGI')
{
$menu = "Nouveau candidat DTS / EGI";
$menu_dts_egi="nav-link active";
$menu_dts_egcgn="nav-link";
$menu_dts_egmcs="nav-link";
$menu_saisi="nav-item menu-open";
}

if ($_GET['ecole']=='EGCGN')
{
$menu = "Nouveau candidat DTS / EGCGN";
$menu_dts_egi="nav-link";
$menu_dts_egcgn="nav-link active";
$menu_dts_egmcs="nav-link";
$menu_saisi="nav-item menu-open";
}

if ($_GET['ecole']=='EGMCS')
{
$menu = "Nouveau candidat DTS / EGMCS";
$menu_dts_egi="nav-link";
$menu_dts_egcgn="nav-link";
$menu_dts_egmcs="nav-link active";
$menu_saisi="nav-item menu-open";
}


?>
<?php require('template.php'); ?>


<?php }else{header("Location:login.php");} ?>

