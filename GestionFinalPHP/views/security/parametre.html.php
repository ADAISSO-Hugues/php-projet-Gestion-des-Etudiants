<?php

use ism\lib\Session;
use ism\lib\Role;
//verification des erreur de session
$array_error = [];
if (Session::keyExist("array_error")){
    //recuperation des erreur de la session dans la variable local
    $array_error = Session::getSession("array_error");
    Session::destroyKey("array_error");
}
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
    <form action=" <?php path("security/update")?>" method="post" class="mt-5">
        <h2 class="mt-5 mb-3">MODIFICATION</h2>
        <?php if (Role::estConnect() ) :?>
    <div>
            <input type="text" name="login" id="1" placeholder="Qui êtes-vous ?">
        <label for="1">Login</label>
    </div>
    <?php if (isset($array_error["login"])) : ?>
            <div id="emailHelp" class="form-text text-danger ">
                <?= $array_error["login"]; ?></div>
        <?php endif; ?>
    <div>
            <input type="password" name="password" id="2" placeholder="Votre mot de passe ?">
        <label for="2" >Password</label>
    </div>
    <?php if (isset($array_error["password"])) : ?>
            <div id="emailHelp" class="form-text text-danger ">
                <?= $array_error["password"]; ?></div>
        <?php endif; ?>
                <div class="mb-3">
                    <input type="file" name="photo" id="fileUpload">
                     <label for="fileUpload">Avatar</label>
                </div>
        <?php endif; ?>
         <input class="btn btn-outline-success" type="submit"value="Envoyer" />
        </form>
