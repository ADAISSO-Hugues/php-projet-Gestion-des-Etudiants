<?php

use ism\models\ClasseModel;

$this->model= new ClasseModel();
$data = $this->model->selectAll();
?>
<form action="<?php path("user/showEtClasse")?>" method="post">
<h2> CHOISIR CLASSE </h2>

<div> 
<select class="form-control mt-3" name="classe">
<?php foreach($data['data'] as $info ) : ?>
<option value="<?= $info["libelleClass"]." ".$info["niveauClass"]." ".$info["filiereClass"] ?>"><?= $info["libelleClass"]." ".$info["niveauClass"]." ".$info["filiereClass"] ?></option>
<?php endforeach; ?>
</select>
</div>
 <input class="btn btn-outline-success" type="submit" name="envoyer"value="Envoyer" />
</form>