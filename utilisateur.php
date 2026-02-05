<?php
ob_start();

session_start();
if(isset($_SESSION['id_utilisateur']) AND isset($_SESSION['email_concours'])){


require('connect.php');
$requette=$bdd->query('SELECT * FROM utilisateur ORDER BY id_utilisateur');
?>







      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Utilisateur <a href="ajout_utili.php">Ajouter</a></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="">
                          ID
                      </th>
                      <th style="">
                          Nom
                      </th>
                      <th style="">
                          Pénoms
                      </th>
                      <th>
                          Mail
                      </th>
                      <th>
                          Mot de passe
                      </th>
                      <th>
                          Groupe
                      </th>
                      <th style="">
                        
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php
                $i=0;
                while ($donnees=$requette->fetch()) {
                $i=$i+1;
                ?>
                                <tr>
                      <td>
                          <?php echo $i; ?>
                      </td>
                      <td>
                        <?php echo $donnees["nom"]; ?>
                      </td>
                      <td>
                        <?php echo $donnees["prenom"]; ?>
                      </td>
                      <td>
                        <?php echo $donnees["email"]; ?>
                      </td>
                      <td class="project_progress">
                        <?php echo "********" //if ($donnees['groupe']=="admin") {echo "********";} else echo $donnees["mdp"]; ?>
                      </td>
                      <td class="project-state">
                        <?php echo $donnees["groupe"]; ?>
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="modif_utilisateur.php?id_utili=<?php echo $donnees["id_utilisateur"]; ?>">
                              <i class="fas fa-folder">
                              </i>
                              Modifier
                          </a>
<!--    <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Modif
                          </a>
                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-danger">
                          <i class="fas fa-trash">
                          </i>
                          <input type="submit" name="valide_suppr" value="Supprimer"/>
                          </a>-->
                          
                          <a class="btn btn-danger btn-sm" data-target="#modal-danger" href="confirme_suppr_utili.php?valeur_suppr=<?php echo $donnees["id_utilisateur"]; ?>">
                          <i class="fas fa-trash">
                          </i>
                          Supprimer
                          </a>


                      </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>





<?php $content = ob_get_clean();
$menu=""; 
$menu_utili=""; 
?>
<?php require('template.php'); ?>

<?php }else{header("Location:login.php");} ?>