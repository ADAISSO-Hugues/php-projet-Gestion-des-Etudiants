<?php
namespace ism\controllers;
use ism\lib\AbstractController;

class ErreurController extends AbstractController {

    public function pageNotFound(){
        http_response_code(404);
        $this->render("error/404");

    }
    public function pageForbidden(){
        http_response_code(403);
        $this->render("error/403");
    }
}