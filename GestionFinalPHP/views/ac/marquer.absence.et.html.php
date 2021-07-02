 <?php
use ism\models\EtudiantModel;
use ism\models\CoursModel;
 $model= new EtudiantModel();
 $modelCours= new CoursModel();
$data = $model->selectAll();
$data1 =$modelCours->selectAll();
?>
<form action="<?php path("user/addAbsence")?>" method="post">
<h3 class="mt-5 mb-3">MARQUER ABSENCE</h3>
     <div>
       
             <input type="date" id="1" placeholder="Qui êtes-vous ? name="dateAbsence" required>
               <label for="1">Date</label>
     </div>
      <h3 for="2">Etudiant</h3>
     <div>
           
            <select class="form-control" name="etudiant" id="2">
            <?php foreach ($data["data"] as  $info): if($info["role"]=="ROLE_ET"):?>
                    <option  value="<?= $info["matriculeEtu"]?>"> <?=$info["nomEtu"]." ".$info["prenomEtu"]?></option>
            <?php endif; endforeach;?>
            </select>   
    </div>
     <h3 for="3">Cours</h3>
 <div>
           
             <select class="form-control" name="cours" id="3">
                 <?php foreach ($data1["data"] as  $info):?>
                         <option  value="<?= $info["idCours"]?>" ><?= $info["moduleCours"]?></option>
                <?php endforeach;?>
            </select>
</div>
<input class="btn btn-outline-success" type="submit" value="Envoyer" />
 </form>
