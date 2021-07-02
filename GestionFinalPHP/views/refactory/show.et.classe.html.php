<?php
use ism\lib\Response; 
if(empty($ref)){
    Response::redirectUrl("security/empty");
    die;
}
?>
<center><h1>LISTE DES ETUDIANTS DE LA CLASSE  <?php
    use ism\lib\Session;
    echo Session::getSession("data"); ?></h1></center>
<table class="table mt-5 container table-bordered">
    <thead>
    <tr>
        <th>Matricule</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Date Naissance</th>
        <th>Sexe</th>
        <th>Classe</th>
        <th>Competences</th>
        <th>Parcours</th>
        <th>Avatar</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($ref as  $info):?>
        <tr>
            <td><?= $info["matriculeEtu"] ?></td>
            <td><?= $info["nomEtu"] ?></td>
            <td><?= $info["prenomEtu"] ?></td>
            <td><?= $info["dateNaissanceEtu"] ?></td>
            <td><?= $info["sexeEtu"] ?></td>
            <td><?= $info["classeEtu"] ?></td>
            <td><?= $info["competenceEtu"] ?></td>
            <td><?= $info["parcoursEtu"] ?></td>
            <td><?= $info["avatarEtu"] ?></td>
        </tr>
        <?php  endforeach;?>
    </tbody>
</table>
