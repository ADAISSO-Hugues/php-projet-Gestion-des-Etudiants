<?php

use ism\models\EtudiantModel;

$this->model= new EtudiantModel();
$data = $this->model->selectAll();
?>
<form action="<?php path("user/showEtAnnee")?>" method="post">
<h2> CHOISIR ANNEE </h2>

<div> 
<select class="form-control mt-3" name="annee">
<?php foreach($data['data'] as $info ) : if($info["role"]=="ROLE_ET"): ?>
<option value="<?= $info["anneeScolaire"] ?>"><?= $info["anneeScolaire"] ?></option>
<?php endif; endforeach; ?>
</select>
</div>
 <input class="btn btn-outline-success" type="submit" name="envoyer"value="Envoyer" />
</form>