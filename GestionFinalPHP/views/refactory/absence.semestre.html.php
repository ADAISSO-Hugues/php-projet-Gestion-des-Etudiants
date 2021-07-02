<?php
use ism\models\EtudiantModel;
use ism\models\CoursModel;
$modelCours = new CoursModel();
$data = $modelCours->selectCoursByCl("L1 web designer");
//$data = $modelCours->selectCoursByCl(Session::getSession("user_connect")["classeEtu"]);
?>
<form action="<?php path("user/showAbsenceSemestre")?>" method="post">
<h2 class="mt-5 mb-3">LISTE DES SEMESTRES</h2>
 <div>
     <select class="form-control" name="semestre" id="">
         <?php foreach ($data as  $info):?>
             <option  value="<?= $info["semestreCours"]?>"><?= $info["semestreCours"]?></option>
         <?php endforeach;?>
     </select>
     </div>
      <input class="btn btn-outline-success" type="submit" name="envoyer"value="Envoyer" />
 </form>