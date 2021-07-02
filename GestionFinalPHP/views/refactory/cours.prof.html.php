<?php

use ism\models\ProfesseurModel;
$this->model= new ProfesseurModel();
$data = $this->model->selectAll();
?>
<form action="<?php path("user/showCoursProf")?>" method="post">
<h2>CHOISIR PROFESSEUR </h2>

<div> 
<select class="form-control mt-3" name="cours">
<?php foreach($data['data'] as $info ) : if($info["role"]=="ROLE_PROF"):  ?>
<option value="<?= $info["matriculeProf"] ?>"><?= $info["nomProf"]." ".$info["prenomProf"] ?></option>
<?php endif; endforeach; ?>
</select>
</div>
 <input class="btn btn-outline-success" type="submit" name="envoyer"value="Envoyer" />
</form>