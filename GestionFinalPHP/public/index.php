<?php
require_once(dirname(__DIR__).DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR."constante.php");
require_once(dirname(__DIR__).DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR."helper.php");
require_once(dirname(__DIR__).DIRECTORY_SEPARATOR."vendor".DIRECTORY_SEPARATOR."autoload.php");
use \ism\lib\Router;
$router = new Router();
$router-> resolve();
