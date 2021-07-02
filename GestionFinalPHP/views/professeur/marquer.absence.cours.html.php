<?php

use ism\lib\Session;
use ism\models\UserModel;
use ism\models\EtudiantModel;
use ism\models\CoursModel;

$model= new EtudiantModel();
$modelCours= new CoursModel();
$data = $model->selectAll();
$data1 =$modelCours->selectCoursByProf(Session::getSession("user_connect")["matriculeProf"]);
?>
 <form action="<?php path("user/addAbsence")?>" method="post">
<h3 class="mt-5 mb-3">MARQUER ABSENCE</h3>
     <div>
        
             <input type="date" id="1" placeholder="Qui êtes-vous ? " name="dateAbsence" required>
              <label for="1">Date</label>
     </div>
     <i class="fas fa-h3">Etudiant</i>
<div >

<select class="form-control" name="etudiant" id="">
    <?php foreach ($data["data"] as  $info):if($info["role"]=="ROLE_ET"):?>
        <option  value="<?= $info["matriculeEtu"]?>"> <?=$info["nomEtu"]." ".$info["prenomEtu"]?></option>
    <?php endif; endforeach;?>
    </select>   
    </div>
     <i class="fas fa-h3">Cours</i>
 <div>

     <select class="form-control" name="cours" id="">
         <?php foreach ($data1["data"] as  $info):?>
             <option  value="<?= $info["idCours"]?>" ><?= $info["moduleCours"]?></option>
         <?php endforeach;?>
     </select>
     </div>
  <input class="btn btn-outline-success" type="submit" value="Envoyer" />
 </form>