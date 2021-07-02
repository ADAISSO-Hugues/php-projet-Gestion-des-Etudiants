<?php
namespace ism\lib;

abstract class AbstractController{
    protected Validator $validator;
    protected string $layout="default";
/**
 * Chargement d'une View 
 *
 * @return void
 */
    public function __construct(){
        Session::openSession();
        $this->validator= new Validator();
    }
    
    public function render(string $view="security/login", array $data=[]){

        ob_start();
        extract($data);
        //contenu de la vue a charger
        require_once(ROOT_VIEWS.$view.".html.php");
        $content_for_layout=ob_get_clean();
        require_once(ROOT_LAYOUT.$this->layout.".html.php");

    }
}
