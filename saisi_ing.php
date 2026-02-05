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
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="N_CIN">N° CIN:</label>
                <input type="text"   name="N_CIN" class="form-control" id="exampleInputEmail1" placeholder="N° CIN du candidat" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="date_CIN">Date CIN :</label>
                <input type="date"  name="Date_CIN" class="form-control" id="exampleInputEmail1" placeholder="JJ/MM/AAAA" required>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="Lieu_CIN">Lieu CIN:</label>
                <input type="text"   name="Lieu_CIN" class="form-control" id="exampleInputEmail1" placeholder="Lieu CIN du candidat" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="adresse_email">Adresse e-mail :</label>
                <input type="text"  name="Adresse_email" class="form-control" id="exampleInputEmail1" placeholder="Adresse email du candidat" required>
            </div>
        </div>

    </div>
    <hr>
    <div class="carre row">
        <div class="col-md-3"></div>
        <h4>INFORMATION DIPLOME</h4>
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
                <label for="serie_bacc">Dernier diplôme obtenu :</label>
                <select class="form-control" name="serie_bacc" required>
                    <option></option>
                    <option value="DTS">DTS</option>
                    <option value="DTSS">DTSS</option>
                    <option value="Bacc+2">Bacc+2</option>
                    <option value="Bacc+3">Bacc+3</option>
                    <option value="Licence">Licence</option>
                </select>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="annee_bacc">Année d'obtention :</label>
                <input type="number" name="annee_bacc" class="form-control" id="exampleInputEmail1" placeholder="Année" min="2000" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="mention_bacc">Mention :</label>
                <select class="form-control" name="mention_bacc" required>
                    <option></option>
                    <option value="Passable">Passable</option>
                    <option value="Assez Bien">Assez Bien</option>
                    <option value="Bien">Bien</option>
                    <option value="Très Bien">Très Bien</option>
                    <option value="En cours">En cours</option>
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
    $reponse1->execute(array($_GET['ecole'], 'ING'));
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
                <select class="form-control" name="parcours2">
                    <div class="form-group">
                    <option></option>
<?php
    $reponse2=$bdd->prepare('SELECT * FROM parcours WHERE ecole_abrevie=? AND grade_abrevie=? GROUP BY parcours_abrevie ORDER BY ecole_abrevie, id_parcours ');
    $reponse2->execute(array($_GET['ecole'], 'ING'));
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
<?php
    $reponse_centre=$bdd->prepare('SELECT * FROM centre WHERE etat_centre="OUI" ORDER BY id_centre');
    $reponse_centre->execute();
    while($donnees_centre=$reponse_centre->fetch())

    {
        $centre=$donnees_centre['nom_centre'];
?>
<option  value="<?php echo $centre ?>"><?php echo $centre ?></option>
<?php } ?>
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
        <input type="hidden" name="ecole" value="<?php echo $_GET['ecole']; ?>">
        <input type="hidden" name="niveau" value="INGENIORAT">
        <input type="hidden" name="saisi_par" value="<?php echo $_SESSION['nom']." ".$_SESSION['prenom']; ?>">
        <div class="col-md-4">
            <input type="submit" class="form-control btn btn-primary mt-4" value="Enregistrer">
        </div>
    </div>





</form>


<?php $content = ob_get_clean();
if ($_GET['ecole']=='EGI')
{
$menu = "Nouveau candidat Ingénieur / EGI";
$menu_ing_egi="nav-link active";
$menu_ing_egcgn="nav-link";
$menu_ing_egmcs="nav-link";
$menu_saisi_ing="nav-item menu-open";
}

if ($_GET['ecole']=='EGCGN')
{
$menu = "Nouveau candidat Ingénieur / EGCGN";
$menu_ing_egi="nav-link";
$menu_ing_egcgn="nav-link active";
$menu_ing_egmcs="nav-link";
$menu_saisi_ing="nav-item menu-open";
}

if ($_GET['ecole']=='EGMCS')
{
$menu = "Nouveau candidat Ingénieur / EGMCS";
$menu_ing_egi="nav-link";
$menu_ing_egcgn="nav-link";
$menu_ing_egmcs="nav-link active";
$menu_saisi_ing="nav-item menu-open";
}
?>
<?php require('template.php'); ?>


<?php }else{header("Location:login.php");} ?>

