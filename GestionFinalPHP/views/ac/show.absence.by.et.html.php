<?php 
use ism\lib\Response;
if(empty($ac)){
    Response::redirectUrl("security/empty");
    die;
}
?>
<center><h1>LISTE DES ABSENCES DE 
    <?php
    use ism\lib\Session;
    echo Session::getSession("data"); ?></h1></center>
<table class="table mt-5 container table-bordered">
    <thead>
    <tr>
       
        <th>cours</th>
        <th>date</th>
        <th>Heure Debut</th>
        <th>Heure fin </th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($ac as  $info):?>
        <tr>
            <td><?= $info["moduleCours"] ?></td>
            <td><?= $info["dateAbsence"] ?></td>
            <td><?= $info["heureDebutCours"] ?></td>
            <td><?= $info["heureFinCours"] ?></td>
        </tr>
    <?php  endforeach;?>


    </tbody>
</table>
