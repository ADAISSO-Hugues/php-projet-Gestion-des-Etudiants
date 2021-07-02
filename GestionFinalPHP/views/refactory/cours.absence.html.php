<?php

use ism\models\CoursModel;

$this->model= new CoursModel();
$data = $this->model->selectAll();
?>
<form action="<?php path("user/showAbsenceCours")?>" method="post">
<h2> choisir le cours  </h2>
<div> 
<select class="form-control mt-3" name="idCours">
<?php foreach($data['data'] as $info ) : ?>
<option value="<?= $info["idCours"] ?>"><?= $info["moduleCours"] ?></option>
<?php endforeach; ?>
</select>
</div>
 <input class="btn btn-outline-success" type="submit" name="envoyer"value="Envoyer" />
</form>