<?php

use ism\lib\Session;
use ism\lib\Role;
use ism\lib\Validator;
$mat = Validator::generateRandomString();
//verification des erreur de session
$array_error = [];
if (Session::keyExist("array_error")){
    //recuperation des erreur de la session dans la variable local
    $array_error = Session::getSession("array_error");
    Session::destroyKey("array_error");    
}
// Vérifier si le formulaire a été soumis
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Vérifie si le fichier a été uploadé sans erreur.
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        //Extensions Valides
        $allowed = [
            "jpg" => "image/jpg",
            "jpeg" => "image/jpeg",
            "gif" => "image/gif",
            "png" => "image/png"
        ];
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];

        // recupere l'extension du fichier
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

        // Vérifie la taille du fichier - 5Mo maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

        // Vérifie le type MIME du fichier
        if(in_array($filetype, $allowed)){
            // Vérifie si le fichier existe avant de le télécharger.
            if(file_exists("upload/" . $_FILES["photo"]["name"])){
                echo $_FILES["photo"]["name"] . " existe déjà.";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $_FILES["photo"]["name"]);
                echo "Votre fichier a été téléchargé avec succès.";
            }
        } else{
            echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.";
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
}
?>
<?php if (Role::estAC() || Role::estRP() || Role::estAdmin() ) :?> 
    <form action=" <?php path("security/register")?>" method="post" enctype="multipart/form-data">
        <h2 class="mt-5 mb-3">INSCRIPTION</h2>
    <?php if (Role::estAC() || Role::estRP()) :?>
    <div>
                        <input type="text" id="1" placeholder="Qui êtes-vous ?" name="<?php
                        if(Role::estAC()){ echo 'matriculeEtu';} elseif(
                        Role::estRP()){ echo 'matriculeProf';}elseif (Role::estAdmin()){ echo 'nom';} ?>" value="<?= $mat?>">
                     <label for ="1">Matricule</label>
    </div>
                <?php endif; ?>
    <?php if (Role::estAdmin() || Role::estAC() || Role::estRP()) :?>
                <div class="mb-3">
                   
                        <input type="text" id="2" placeholder="Qui êtes-vous ?" name="<?php
                        if(Role::estAC()){ echo 'nomEtu';} elseif(
                        Role::estRP()){ echo 'nomProf';}elseif (Role::estAdmin()){ echo 'nom';} ?>" value="<?php
                        echo !isset($array_error["nom"]) && isset($array_post["nom"]) ? trim($array_post["nom"]) : ''; ?>
                            ">
                             <label for="2">Nom</label>
                </div>
                <?php if (isset($array_error["nom"])) : ?>
                    <div class="form-text text-danger ">
                        <?= $array_error["nom"]; ?></div>
                    <?php endif; ?>
            <?php endif; ?>
            <?php if (Role::estAC() || Role::estRP()) :?>
            <div>
                    
                        <input type="text" id="3" placeholder="Qui êtes-vous ?" name="<?php
                        if(Role::estAC()){ echo 'prenomEtu';} elseif(
                        Role::estRP()){ echo 'prenomProf';} ?>">
                    <label for="3">Prénom</label>  
                </div>
                <?php if (isset($array_error["prenom"])) : ?>
                    <div class="form-text text-danger ">
                        <?= $array_error["prenom"]; ?></div>
                    <?php endif; ?>
                <?php endif; ?>
            <div>
                    <input type="text" id="4" placeholder="Qui êtes-vous ?" name="login">
                 <label for="4">Login</label>
            </div>
             <?php if (isset($array_error["login"])) : ?>
                    <div id="emailHelp" class="form-text text-danger ">
                        <?= $array_error["login"]; ?></div>
                <?php endif; ?>
            <div>
                    <input type="password" id="5" placeholder="Qui êtes-vous ?" name="password">
                <label for="5">Password</label>
            </div>
             <?php if (isset($array_error["password"])) : ?>
                    <div id="emailHelp" class="form-text text-danger ">
                        <?= $array_error["password"]; ?></div>
                <?php endif; ?>
            <div>
               
                <input type="file" name="photo" id="fileUpload">
                 <label for="fileUpload">Avatar</label>
            </div>
    <?php if (Role::estAC() || Role::estRP()) :?>
        <div>
                <input type="date" id="6" placeholder="Qui êtes-vous ?" name="<?php
                if(Role::estAC()){ echo 'dateNaissanceEtu';} elseif(
                Role::estRP()){ echo 'dateNaissanceProf';} ?>" required>
             <label for="6">Date de naissance</label>
            </div>
              <?php if (isset($array_error["dateNaiss"])) : ?>
            <div id="emailHelp" class="form-text text-danger ">
                <?= $array_error["dateNaiss"]; ?></div>
            <?php endif; ?>
              <h3 for="7">Sexe</h3>
        <div>
          
            <select class="form-control" name="<?php
                if(Role::estAC()){ echo 'sexeEtu';} elseif(
                Role::estRP()){ echo 'sexeProf';} ?>" id="">
                <option value="M">M</option>

                <option value="F">F</option>
            </select>
            
            </div>
            <?php if (isset($array_error["sexe"])) : ?>
            <div class="form-text text-danger ">
                <?= $array_error["sexe"]; ?></div>
            <?php endif; ?>
            <?php endif; ?>
    <?php if (Role::estAdmin() || Role::estAC() || Role::estRP()) :?>
    <h3 for="8">Role</h3>
                <div>
                    
                        <select class="form-control" name="role" id="">
                            <?php endif; ?>
                            <?php if (Role::estAdmin()) : ?>
                                <option value="ROLE_AC">ASSISTANT DE CLASSE</option>
                                <option value="ROLE_RP">RESPONSABLE PEDAGOGIQUE</option>
                            <?php endif; ?>
                            <?php if (Role::estAC()) :?>
                                <option value="ROLE_ET">ETUDIANT</option>
                            <?php endif; ?>
                            <?php if (Role::estRP()) :?>
                                <option value="ROLE_PROF">PROFESSEUR</option>
                            <?php endif; ?>
                        </select>
                </div>
 <?php if (Role::estAC() || Role::estRP()) :?>
        <div>
                <input type="text" id="9" placeholder="Qui êtes-vous ?"  name="<?php
                if(Role::estAC()){ echo 'classeEtu';} elseif(
                Role::estRP()){ echo 'classeProf';} ?>">
             <label for="9"><?php
                if(Role::estAC()){ echo 'Classe';} elseif(
                Role::estRP()){ echo 'Classes';} ?></label>
        </div>
         <?php if (isset($array_error["classe"])) : ?>
                <div class="form-text text-danger ">
                    <?= $array_error["classe"]; ?></div>
            <?php endif; ?>
            
        <div>
                <input type="text" id="10" placeholder="Qui êtes-vous ?"  name="<?php if( Role::estAC()){ echo 'competenceEtu';} elseif(
                Role::estRP()){ echo 'moduleProf';} ?>">
             <label for="10"><?php if(Role::estAC()){ echo 'Ses Competences';} elseif(
                Role::estRP()){ echo 'Ses Modules';} ?></label>
    </div>
    <?php if (isset($array_error["Cp"])) : ?>
                <div class="form-text text-danger ">
                    <?= $array_error["Cp"]; ?></div>
            <?php endif; ?>
    <?php endif; ?>
        <?php if (Role::estRP()) :?>
            <h3 for="">Grade</h3>
    <div>
            
            <select class="form-control" name="gradeProf" id="">
                    <option value="GRADE_ING">INGENIEUR</option>

                    <option value="GRADE_DOCTEUR ">DOCTEUR</option>
            </select>
    </div>
        <?php endif; ?>
             <?php if (Role::estAC()) :?>
                     <div>
                        
                             <input type="text" id="11" placeholder="Qui êtes-vous ?" name="parcoursEtu" required>
                          <label for="11">Parcours </label>
                     </div>
                      <?php if (isset($array_error["parcoursEtu"])) : ?>
                             <div id="emailHelp" class="form-text text-danger ">
                                 <?= $array_error["parcoursEtu"]; ?></div>
                         <?php endif; ?>
                <div>
                        <input type="date" id="12" placeholder="Qui êtes-vous ?" name="anneeSColaire" required>
                        <label for="12">Annee scolaire en cours </label>
                   
                </div>
                 <?php if (isset($array_error["anneeScolaire"])) : ?>
                        <div id="emailHelp" class="form-text text-danger ">
                            <?= $array_error["anneeScolaire"]; ?></div>
                    <?php endif; ?>
             <?php endif; ?>
             <input class="btn btn-outline-success" type="submit"value="Envoyer" />

    </form>
<?php endif; ?> 