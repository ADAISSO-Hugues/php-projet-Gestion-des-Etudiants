<?php
use ism\lib\Session;
use ism\config\helper;

//verification des erreur de session
$array_error = [];
if (Session::keyExist("array_error")) {
    //recuperation des erreur de la session dans la variable local

    $array_error = Session::getSession("array_error");
    //dd($array_error);
    //suppression des erreur dans la session

    Session::destroyKey("array_error");
}
?>
    <form action=" <?php path("security/login") ?>"  method="post">
        <h2 class="mt-4 mb-3">CONNEXION</h2>

    <?php if (isset($array_error["error_login"])) : ?>
    <div class="alert alert-danger my-2 " role="alert">
        <strong><?= $array_error["error_login"] ?></strong>
    </div>
    <?php endif ?>
         <div>
                  <input type="text" id="a" name="login" placeholder="Qui êtes-vous ?"/>
                  <label for="a">login</label>
            </div>
             <?php if (isset($array_error["login"])) : ?>
                     <div id="emailHelp" class="form-text text-danger ">
                     <?= $array_error["login"]; ?></div>
            <?php endif; ?>
        <div>
                <input type="password" id="2" name="password" placeholder="Votre mot de passe ?" >
                <label for="2">Password</label>
        </div>
         <?php if (isset($array_error["password"])) : ?>
            <div id="emailHelp" class="form-text text-danger ">
                <?= $array_error["password"]; ?></div>
            <?php endif; ?>
      <input class="btn btn-outline-success" type="submit" value="Envoyer" />
    </form>

</div>
