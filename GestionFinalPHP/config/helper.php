<?php
function dd($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die();
}

function path(string $uri){
    echo WEB_ROOT.$uri;
}
?>