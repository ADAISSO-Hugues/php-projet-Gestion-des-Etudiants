<?php

use ism\models\ClasseModel;
use ism\models\ProfesseurModel;
use ism\models\CoursModel;
$this->model= new ClasseModel();
$this->modelProf= new ProfesseurModel();
$modelCours= new CoursModel();
$data = $this->model->selectAll();
$data1 =$this->modelProf->selectAll();
$data2 =$modelCours->selectAll();
?>
 <form action=" <?php path("user/addCours") ?>"  method="post">
    <div>
            <input type="date" id="1" placeholder="Qui êtes-vous ?" name="dateCours" required>
     <label for="1">Date</label>
    </div>
</div>


    <div>
        
            <input type="text" id="2" placeholder="Qui êtes-vous ?"name="semestreCours" required>
            <label for="2">Semestre</label>
    </div>

    <div>
       
            <input type="text" id="3" placeholder="Qui êtes-vous ?" name="nbrHeureCours" required>
             <label for="3">Nbre d'heure</label>
    </div>

    <div >
       
            <input type="text" id="4" placeholder="Qui êtes-vous ?" name=" heureDebutCours" required>
             <label for="4">Heure Debut </label>
    </div>


    <div >
       
            <input type="text" id="5" placeholder="Qui êtes-vous ?" name=" heureFinCours" required>
             <label for="5">Heure Fin </label>
    </div>
    <h3>CLASSE</h3>

<div>
    <select class="form-control" name="classeCours" id="">
        <?php foreach ($data["data"] as  $info):?>
            <option  value="<?= $info["libelleClass"]." ".$info["niveauClass"]." ".$info["filiereClass"]?>" ><?= $info["libelleClass"]." ".$info["niveauClass"]." ".$info["filiereClass"]?></option>
        <?php endforeach;?>
    </select>

</div>
<h3>PROFESSEUR</h3>

<div>
    <select class="form-control" name="professeurCours" id="">
        <?php foreach ($data1["data"] as  $info): if($info['role']=="ROLE_PROF"):?>
            <option  value="<?= $info["matriculeProf"]?>" ><?= $info["nomProf"]." ".$info["prenomProf"]?></option>
        <?php endif; endforeach;?>
    </select>

</div>

<h3>COURS</h3>

<div>
    <select class="form-control" name="moduleCours" id="">
        <?php foreach ($data2["data"] as  $info):?>
            <option  value="<?= $info["moduleCours"]?>" ><?= $info["moduleCours"]?></option>
        <?php endforeach;?>
    </select>

</div>
    <input class="btn btn-outline-success" type="submit" value="Envoyer" />

</form>
