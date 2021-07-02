<?php

namespace ism\controllers;
use ism\lib\Role;
use ism\lib\Request;
use ism\lib\Session;
use ism\lib\Response;
use ism\models\UserModel;
use ism\models\EtudiantModel;
use ism\models\ProfesseurModel;
use ism\lib\AbstractController;
use ism\lib\PasswordEncoder;

/**
 * Undocumented class
 */
class SecurityController extends AbstractController{
    public function login(Request $request){
        if(Role::estConnect())Response::redirectUrl("erreur/pageForbidden");
        if($request->isPost()){
            $data= $request->getBody();
            if(!$this->validator->estVide($data["login"], "login")){
                $this->validator->estMail($data["login"], "login");
            }
            $this->validator->estVide($data["password"], "password");
            if($this->validator->formValide()){
                $model= new UserModel;
                $modelEtudiant = new EtudiantModel();
                $modelProfesseur = new ProfesseurModel();
                $user = $model->selectUserByLogin($data["login"],$data["password"]);
                if(empty($user)){
                    $this->validator->setErrors("error_login","login ou mot de passe incorrect");
                    Session::setSession("array_error",$this->validator->getErrors());
                    Response::redirectUrl("security/login");
                }else{
                    Session::setSession("user_connect",$user);
                    if($data["password"]==$user["password"]){
                        if($user["role"]=="ROLE_ADMIN"){
                            Response::redirectUrl("user/admin");
                        }
                        elseif($user["role"]=="ROLE_ET"){
                            Response::redirectUrl("user/et");
                        } elseif ($user["role"] == "ROLE_PROF") {
                            Response::redirectUrl("user/prof");
                        } elseif ($user["role"] == "ROLE_AC") {
                            Response::redirectUrl("user/ac");
                        }elseif($user["role"]=="ROLE_RP"){
                            Response::redirectUrl("user/rp");
                        }
                    }else{
                        $this->validator->setErrors("error_login","login ou mot de passe incorrect");
                        Session::setSession("array_error",$this->validator->getErrors());
                        Response::redirectUrl("security/login");
                    }
                }
            }else {
                Session::SetSession("array_error",$this->validator->getErrors());
                Response::redirectUrl("security/login");
            }
        }else {
            $this->render("security/login");
        }
    }
    public function register(Request $request){
        if($request->isPost()) {
            $data = $request->getBody();
            if (Role::estAdmin()) {
                $model = new UserModel();
                $nom= $data["nom"];
                $datauser = ["login"=>$data["login"] ,"password"=>$data['password'],"role"=>$data["role"] ,"nom"=> $nom,"avatar"=>$data["avatar"]];
                $this->validator->estVide($data["nom"], "nom");
                if (!$this->validator->estVide($data["login"], "login")) {
                    if ($this->validator->estMail($data["login"], "login")) {

                        if ($model->loginExiste($data["login"])) {
                            $this->validator->setErrors("login", "ce login existe deja dans le systeme");
                        }
                    }
                }
                $this->validator->estVide($data["password"], "password");
                if ($this->validator->formValide()) {
                    $model->insert($datauser);
                    Response::redirectUrl("security/register");
                } else {
                    Session::SetSession("array_error", $this->validator->getErrors());
                    Session::SetSession("array_post", $data);
                    Response::redirectUrl("security/register");
                }
            }
        if (Role::estAC()){
            $modelEtudiant = new EtudiantModel();
            $dataEtudiant = ["login"=>$data["login"] ,"password"=> $data["password"],"role"=> $data['role'],"nomEtu"=>$data["nomEtu"],"prenomEtu"=> $data["prenomEtu"],
                "competenceEtu"=>$data["competenceEtu"],"classeEtu"=>$data['classeEtu'], "parcoursEtu"=>$data["parcoursEtu"], "anneeScolaire"=>$data["anneeScolaire"],
                "avatarEtu"=>$data["avatarEtu"] ,"dateNaissanceEtu"=> $data["dateNaissanceEtu"],$data["matriculeEtu"],"sexeEtu"=>$data["sexeEtu"]];
            $this->validator->estVide($data["nomEtu"], "nomEtu");
            $this->validator->estVide($data["prenomEtu"], "prenomEtu");
            $this->validator->estVide($data["classeEtu"], "classeEtu");
            $this->validator->estVide($data["competenceEtu"], "cp");
            $this->validator->estVide($data["parcoursEtu"], "parcoursEtu");
            if(!$this->validator->estVide($data["login"], "login")){
                if($this->validator->estMail($data["login"], "login")){

                    if($modelEtudiant->loginExiste($data["login"])){
                        $this->validator->setErrors("login","ce login existe deja dans le systeme");
                    }
                }
            }
            $this->validator->estVide($data["password"], "password");
            if($this->validator->formValide()){
                $modelEtudiant->insert($dataEtudiant);
                Response::redirectUrl("security/register");
            }else{
                Session::SetSession("array_error",$this->validator->getErrors());
                Session::SetSession("array_post",$data);
                Response::redirectUrl("security/register");
            }
        }
            if (Role::estRP()){
                $model = new UserModel();
                $modelProfesseur = new ProfesseurModel();;
                $dataProfesseur = ["login"=>$data["login"] ,"password"=>$data['password'],"role"=>$data["role"] ,"nomProf"=>$data['nomProf'],"avatarProf"=>$data["avatarProf"],"prenomProf" =>$data["prenomProf"],
                    "moduleProf"=>$data["moduleProf"],"classeProf"=> $data['classeProf'], "gradeProf"=>$data["gradeProf"],
                    "dateNaissanceProf"=>$data["dateNaissanceProf"],"matriculeProf"=>$data["matriculeProf"],"sexeProf"=>$data["sexeProf"]];
                $this->validator->estVide($data["nomProf"], "nom");
                $this->validator->estVide($data["prenomProf"], "prenom");
                $this->validator->estVide($data["classeProf"], "classe");
                $this->validator->estVide($data["moduleProf"], "cp");
                if(!$this->validator->estVide($data["login"], "login")){
                    if($this->validator->estMail($data["login"], "login")){
                        if($model->loginExiste($data["login"])){
                            $this->validator->setErrors("login","ce login existe deja dans le systeme");
                        }
                    }
                }
                $this->validator->estVide($data["password"], "password");
                if($this->validator->formValide()){
                    $modelProfesseur->insert($dataProfesseur);
                    Response::redirectUrl("security/register");
                }else{
                    Session::SetSession("array_error",$this->validator->getErrors());
                    Session::SetSession("array_post",$data);
                    Response::redirectUrl("security/register");
                }
            }
    }$this->render("security/register");
    }
    public function logout(){
        Session::destroySession();
        Response::redirectUrl("security/login");
    }
    public function update(Request $request){
        if (!Role::estConnect())Response::redirectUrl("erreur/pageForbidden");
        if($request->isPost()){
            $model= new UserModel();

            $data=$request->getBody();
            if(Role::estAdmin() || Role::estAC() || Role::estRP()){
            if(!$this->validator->estVide($data["login"], "login")){
                if($this->validator->estMail($data["login"], "login")){
                    if($model->loginExiste($data["login"])){
                        $this->validator->setErrors("login","ce login existe deja dans le systeme");
                    }
                }
            }
            $this->validator->estVide($data["password"], "password");
            if($this->validator->formValide()){
                $model->update($data);
                if(Role::estAdmin()){
                    Response::redirectUrl("user/admin");
                }
                if(Role::estAC()){
                    Response::redirectUrl("user/ac");
                }
                if(Role::estRP()){
                    Response::redirectUrl("user/rp");
                }
            }else{
                Session::SetSession("array_error",$this->validator->getErrors());
                Session::SetSession("array_post",$data);
                Response::redirectUrl("security/update");
            }
        }
        if(Role::estET()){
            if(!$this->validator->estVide($data["login"], "login")){
                if($this->validator->estMail($data["login"], "login")){

                    if($model->loginExiste($data["login"])){
                        $this->validator->setErrors("login","ce login existe deja dans le systeme");
                    }
                }
            }
            $this->validator->estVide($data["password"], "password");
            if($this->validator->formValide()){
                $model->update($data);
                Response::redirectUrl("user/et");
            }else{
                Session::SetSession("array_error",$this->validator->getErrors());
                Session::SetSession("array_post",$data);
                Response::redirectUrl("security/update");
            }
        }
        if(Role::estProf()){
            if(!$this->validator->estVide($data["login"], "login")){
                if($this->validator->estMail($data["login"], "login")){

                    if($model->loginExiste($data["login"])){
                        $this->validator->setErrors("login","ce login existe deja dans le systeme");
                    }
                }
            }
            $this->validator->estVide($data["password"], "password");
            if($this->validator->formValide()){
                $model->update($data);
                Response::redirectUrl("user/prof");
            }else{
                Session::SetSession("array_error",$this->validator->getErrors());
                Session::SetSession("array_post",$data);
                Response::redirectUrl("security/update");
            }
        }
        }
        $this->render("security/parametre");
    }
    public function delete(Request $request){
        if (!Role::estAdmin())Response::redirectUrl("erreur/pageForbidden");
        if($request->isPost()){
            $data = $request->getBody();
            $model = new UserModel();
            $model->delete($data);
            Response::redirectUrl("security/delete");
        }
        $this->render("security/delete");
    }
    public function empty(){
        $this->render("refactory/empty");
    }

}