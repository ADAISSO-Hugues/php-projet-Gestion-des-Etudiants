<?php
namespace ism\controllers;

use ism\lib\AbstractController;
use ism\lib\AbstractModel;
use ism\lib\Request;
use ism\lib\Response;
use ism\lib\Role;
use ism\lib\Session;
use ism\models\AbsenceModel;
use ism\models\EtudiantModel;
use ism\models\CoursModel;
use ism\models\ClasseModel;

class UserController extends AbstractController
{
    private AbstractModel $modelEtudiant;
    private AbstractModel $modelAbsence;
    private AbstractModel $modelCours;
    //**********************************************************************************
    public function showEtAnnee(Request $request)
    {
        $this->modelEtudiant= new EtudiantModel();
       if($request->isPost()){
        $annee = $request->getBody();
        $data = $this->modelEtudiant->selectEtByAnnee($annee["annee"]);
        Session::setSession("data",$annee["annee"]);
        $this->render("refactory/show.et.annee", ["ref" => $data]);
       }$this->render("refactory/et.annee");
    }
    public function showEtClasse(Request $request){
        $this->modelEtudiant= new EtudiantModel();
        $this->modelClasse= new ClasseModel();
      if($request->isPost()){
        $classe =$request->getBody();
        $data = $this->modelEtudiant->selectEtByClasse($classe["classe"]);
        Session::setSession("data",$classe["classe"]);
        $this->render("refactory/show.et.classe", ["ref" => $data]);
      }
      $this->render("refactory/et.classe");
    }
    public function showCoursProf(Request $request){
        $this->modelCours = new CoursModel();
        if($request->isPost()){
        $professeur = $request->getBody();
        $data = $this->modelCours->selectCoursByProf($professeur["cours"]);
        Session::setSession("data",$professeur["cours"]);
            $this->render("refactory/show.cours.prof", ["ref" => $data]);
        }$this->render("refactory/cours.prof");
    }
    public function showAbsenceEt(Request $request){
        if($request->isPost()){
        $this->modelAbsence = new AbsenceModel();
        $matricule = $request->getBody();
        $data = $this->modelAbsence->selectByMatriculeEtu($matricule["matricule"]);
        Session::setSession("data",$matricule["matricule"]);
        $this->render("ac/show.absence.by.et", ["ac" => $data]);
        }$this->render("refactory/et.absence");
    }
    public function showAbsenceCours(Request $request){
        if($request->isPost()){
        $this->modelAbsence = new AbsenceModel();
        $coursId = $request->getBody();
        $data = $this->modelAbsence->selectByCours($coursId["idCours"]);
        Session::setSession("data",$data["moduleCours"]);
        $this->render("ac/show.absence.by.cours", ["ac" => $data]);
        }$this->render("refactory/cours.absence");
    }
    public function doAbsence(Request $request){
        if(Role::estAC()){
            $this->render("ac/marquer.absence.et");
        }elseif (Role::estProf()){
            $this->render("professeur/marquer.absence.cours");
        }
    }
    public function print(){
        if (!Role::estAC())Response::redirectUrl("erreur/pageForbidden");
        $this->render("ac/print");
    }
    public function filtrer() {
        $this->modelClasse= new ClasseModel();
        $niveau = $this->modelClasse->SelectByNiv();
        $this->render("ac/filtrer");

    }
    public function addAbsence(Request $request ){
        $this->modelAbsence = new AbsenceModel();
        if($request->isPost()){
        if(Role::estAC()) {
            $data = $request->getBody();
            $dateAbsence= $data["dateAbsence"];
            $coursId = $data['cours'];
            $etudiantMatricule = $data['etudiant'];
            $this->modelAbsence->insert(["dateAbsence" => $dateAbsence, "etudiantMatricule" => $etudiantMatricule, "coursId" => $coursId]);
            Response::redirectUrl("user/doAbsence");
        }elseif (Role::estProf()) {
            $data = $request->getBody();
            $dateAbsence= $data["dateAbsence"];
            $coursId = $data['idCours'];
            $etudiantMatricule = $data['matriculeEtu'];
            $this->modelAbsence->insert(["dateAbsence" => $dateAbsence, "etudiantMatricule" => $etudiantMatricule, "coursId" => $coursId]);
            echo "Absence marquer avec succes";
            Response::redirectUrl("user/doAbsence");
        }
        }Response::redirectUrl("user/doAbsence");
    }
    //*************************************************************************************
    public function showAbsenceCoursMy(Request $request){
        if($request->isPost()){
        $this->modelAbsence = new AbsenceModel();
        $this->model = new CoursModel();
        $dat =$request->getBody();
        $coursId = $dat["cours"];
        $matriculeEtu =  Session::getSession("user_connect")["matriculeEtu"];
        $data = $this->modelAbsence->SelectByCoursId($coursId,$matriculeEtu);
        $module = $this->model->selectCours($coursId);
        Session::setSession("data",$module);
        $this->render("etudiant/show.absence.cours", ["etudiant" => $data]);
        }$this->render("refactory/absence.et");
    }
    public function showAbsenceSemestre(Request $request){
        if($request->isPost()){
        $this->modelAbsence = new AbsenceModel();
        $dat = $request->getBody();
        $semestre =$dat["semestre"];
        $matriculeEtu =  Session::getSession("user_connect")["matriculeEtu"];
        $data = $this->modelAbsence->SelectAbsenceBySemestre($semestre,$matriculeEtu);
        Session::setSession("data",$semestre);
        $this->render("etudiant/show.absence.semestre", ["etudiant" => $data]);
        }$this->render("refactory/absence.semestre");
    }
    public function showCours(Request $request){
        if($request->isPost()){
        $this->modelCours = new CoursModel();
        $dat = $request->getBody();
        $datedeb =$dat["datedebut"];
        $datefin =$dat["datefin"];
        //$matriculeEtu =  Session::getSession("user_connect")["matriculeEtu"];
        $data = $this->modelCours->selectCoursByDate($datedeb,$datefin ,"PPP-PPP-PPP");
        $this->render("etudiant/show.cours", ["ac" => $data]);
        }$this->render("refactory/cours.et");
    }

    //************************************************************************************
    public function showCoursMy(Request $request){
        $this->modelCours = new CoursModel();
        $professeur= Session::getSession("user_connect")["matriculeProf"];;
        $data = $this->modelCours->selectCoursByProf($professeur);
        $this->render("refactory/show.cours", ["ref" => $data]);
    }
    //***************************************************************************************
    public function doCours(Request $request){
        //if(!isset($request->getParams()[0]) || is_numeric($request->getParams()[0])){
            //Response::redirectUrl("user/ac");
        //}
        $this->render("rp/planner");
       // if(Role::estRP()){
         //   $this->render
        //}
    }
    public function addCours(Request $request){
        if($request->isPost()){
            $data = $request->getBody();
            
        $this->modelCours = new CoursModel();
        $this->modelCours->insert($data);
        Response::redirectUrl("user/doCours");
        } $this->render("rp/planner");
    }
    public function showCoursClasse(Request $request){
        if($request->isPost()){
            $dat = $request->getBody();
        $this->modelCours = new CoursModel();
        $classe = $dat["classe"];
        $data = $this->modelCours->selectCoursByCl($classe);
        $this->render("refactory/show.cours", ["ref" => $data]);
        } $this->render("refactory/cours.classe");

    }
    public function ac(){
        if(!Role::estAC())Response::redirectUrl("erreur/pageForbidden");
        $this->render("user/ac");
    }
    public function rp(){
        if(!Role::estRP())Response::redirectUrl("erreur/pageForbidden");
        $this->render("user/rp");
    }
    public function admin(){
        if(!Role::estAdmin())Response::redirectUrl("erreur/pageForbidden");
        $this->render("user/admin");
    }
    public function et(){
        if(!Role::estET())Response::redirectUrl("erreur/pageForbidden");
        $this->render("user/et");
    }
    public function prof(){
        if(!Role::estProf())Response::redirectUrl("erreur/pageForbidden");
        $this->render("user/prof");
    }

}



