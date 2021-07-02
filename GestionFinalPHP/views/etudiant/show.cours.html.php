<?php
use ism\lib\Response; 
if(empty($ac)){
    Response::redirectUrl("security/empty");
}
?>
<center><h1>LISTE DES COURS</h1></center>
<table class="table mt-5 container table-bordered">
    <thead>
    <tr>
        <th>date</th>
        <th>classe</th>
        <th>matricule prof</th>
        <th>Module</th>
        <th>semestre</th>
        <th>Nombres heures</th>
        <th>Heure Debut </th>
        <th>Heure fin</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($ac['data'] as  $info):?>
        <tr>
            <td><?= $info["dateCours"] ?></td>
            <td><?= $info["classeCours"] ?></td>
            <td><?= $info["professeurCours"] ?></td>
            <td><?= $info["moduleCours"] ?></td>
            <td><?= $info["semestreCours"] ?></td>
            <td><?= $info["nbrHeureCours"] ?></td>
            <td><?= $info["heureDebutCours"] ?></td>
            <td><?= $info["heureFinCours"] ?></td>

        </tr>
    <?php  endforeach;?>


    </tbody>
</table>
