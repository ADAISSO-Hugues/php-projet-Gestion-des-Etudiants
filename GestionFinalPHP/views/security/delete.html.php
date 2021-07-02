<?php

use ism\models\UserModel;

$this->model= new UserModel();
$data = $this->model->selectAll();
?>
<form action="<?php path("security/delete")?>" method="post">
<h2 class="mt-3"> SUPPRIMER</h2>

<div> 
<select class="form-control mt-3" name="login">
<?php foreach($data['data'] as $info ) : if ($info["role"] == "ROLE_AC" || $info["role"] == "ROLE_RP") : ?>
<option value="<?=$info["login"] ?>"><?= $info["nom"]?></option>
<?php endif; endforeach; ?>
</select>
</div>
 <input class="btn btn-outline-success" type="submit"value="Envoyer" />
</form>