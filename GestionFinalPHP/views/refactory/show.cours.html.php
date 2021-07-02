<?php 
use ism\lib\Response;
if(empty($ref)){
    Response::redirectUrl("security/empty");
    die;
}
?>
<center><h1>LISTE DES COURS </h1></center>

<table class="table mt-5 container table-bordered" style="width:1000px;">
   <center><thead>
    <tr>
    <th>cours</th>
        <th>date</th>
        <th>semestre</th>
        <th>Professeur</th>
        <th>nombre heure cours</th>
        <th>heure Debut </th>
        <th>heure fin </th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($ref as  $info):?>
        <tr>
        <td><?= $info["moduleCours"] ?></td>
            <td><?= $info["dateCours"] ?></td>
            <td><?= $info["semestreCours"] ?></td>
            <td><?= $info["professeurCours"] ?></td>
            <td><?= $info["nbrHeureCours"] ?></td>
            <td><?= $info["heureDebutCours"] ?></td>
            <td><?= $info["heureFinCours"] ?></td>
        </tr>
    <?php  endforeach;?>

    </tbody></center> 
</table>