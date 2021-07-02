<?php

use ism\lib\Role;
use ism\lib\Session; ?>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark mt-1 mb-4">
    <a class="navbar-brand" href="<?php path('layout/security') ?>">HOME PAGE <?php
        if (Role::estProf()) {
            $mat = Session::getSession("user_connect")["matriculeProf"];
            echo "Mat : ".$mat;
        }
        if (Role::estET()) {
            $mat = Session::getSession("user_connect")["matriculeEtu"];
            echo "Mat : ".$mat;
        }
        ?></a>
    <a class="navbar-toggler d-lg-none" type="a" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </a>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <?php if (Role::estConnect()) : ?>
                <li class="nav-item dropdown">
                <?php if (Role::estEt()) : ?>
                    <li class="nav-item dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" id="dropdownId1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Lister mes absences
                        </a>
                        <section class="dropdown-menu  dropdown-menu-dark" aria-labelledby="dropdownId1">
                            <a class="dropdown-item" href="<?php path('user/showAbsenceCoursMy') ?>"> par cours </a>
                            <hr class="dropdown-divider">
                            <a class="dropdown-item" href="<?php path('user/showAbsenceSemestre') ?>"> par semestre </a>
                        </section>
                        </li>
                        <?php endif ?>
                        <?php if (Role::estAC() || Role::estRP() || Role::estProf()) : ?>
                            <li class="nav-item dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" id="dropdownId2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Lister les etudiants
                            </a>

                            <section class="dropdown-menu  dropdown-menu-dark" aria-labelledby="dropdownId2">
                                <a class="dropdown-item" href="<?php path('user/showEtAnnee') ?>"> par annee</a>
                                <hr class="dropdown-divider">
                                <a class="dropdown-item" href="<?php path('user/showEtClasse') ?>">par classe </a>
                            </section>
                            </li>
                            <?php endif ?>
                            
                            <?php if (Role::estAC()) : ?>
                                <li class="nav-item dropdown">
                            <a class="btn btn-secondary pl-4  dropdown-toggle" href="#" id="dropdownId3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                lister absences
                            </a>

                            <section class="dropdown-menu  dropdown-menu-dark" aria-labelledby="dropdownId3">
                                <a class="dropdown-item" href="<?php path('user/showAbsenceEt') ?>">par etudiant</a>
                                <hr class="dropdown-divider">
                                <a class="dropdown-item" href="<?php path('user/showAbsenceCours') ?>">par cours</a>
                            </section>
                            </li>
                            <?php endif ?>
                            <?php if (Role::estAC()) : ?>
                                <li class="nav-item dropdown">
                            <a class="btn btn-secondary pl-4 dropdown-toggle" href="#" id="dropdownId4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Filtrer etudiants
                            </a>
                            <section class="dropdown-menu  dropdown-menu-dark" aria-labelledby="dropdownId4">
                                <a class="dropdown-item" href="<?php path('user/filtrer') ?>"> par niveau</a>
                            </section>
                            </li>
                            <?php endif ?>
                            <?php if (Role::estRP()) : ?>
                                <li class="nav-item dropdown">
                            <a class="btn btn-secondary pl-2 dropdown-toggle" href="#" id="dropdownId5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                lister Cours
                            </a>
                            <section class="dropdown-menu  dropdown-menu-dark" aria-labelledby="dropdownId5">
                                <a class="dropdown-item" href="<?php path('user/showCoursProf') ?>">par professeur </a>
                                <hr class="dropdown-divider">
                                <a class="dropdown-item" href="<?php path('user/showCoursClasse') ?>">par classe  </a>
                            </section>
                            </li>
                            <?php endif ?>
                    <li class="nav-item dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            UseCase
                    </a>
                    <?php endif ?>
                    <section class="dropdown-menu  dropdown-menu-dark" aria-labelledby="dropdownId">
                        <?php if (Role::estEt()) : ?>
                        <a class="dropdown-item" href="<?php path('user/showCours') ?>">Lister mes cours </a>
                            <hr class="dropdown-divider">
                        <a class="dropdown-item"   href="<?php path('security/update') ?>">Modifier</a>
                        <?php endif ?>
                        <?php if (Role::estAdmin()) : ?>
                            <a class="dropdown-item"  href="<?php path('security/register') ?>">Ajouter</a>
                            <hr class="dropdown-divider">
                            <a class="dropdown-item"   href="<?php path('security/delete') ?>">Supprimer</a>
                            <hr class="dropdown-divider">
                            <a class="dropdown-item"   href="<?php path('security/update') ?>">Modifier</a>
                        <?php endif ?>
                        <?php if (Role::estProf()) : ?>
                            <a class="dropdown-item" href="<?php path('user/showCoursMy') ?>">Lister mes cours </a>
                            <hr class="dropdown-divider">
                            <a class="dropdown-item" href="<?php path('user/doAbsence') ?>">Marquez absences d'un cours </a>
                            <hr class="dropdown-divider">
                            <a class="dropdown-item"  href="<?php path('security/update') ?>">Modifier</a>
                        <?php endif ?>
                        <?php if (Role::estAC()) : ?>
                            <a class="dropdown-item"  href="<?php path('security/register') ?>">inscrire un etudiant </a>
                            <hr class="dropdown-divider">
                            <a class="dropdown-item" href="<?php path('user/showCoursProf') ?>">lister cours </a>
                            <hr class="dropdown-divider">
                            <a class="dropdown-item" href="<?php path('user/doAbsence') ?>">Marquer absence  </a>
                            <hr class="dropdown-divider">
                            <hr class="dropdown-divider">
                            <a class="dropdown-item" href="<?php path('user/print') ?>"> Imprimer  </a>
                            <hr class="dropdown-divider">
                            <a class="dropdown-item"  href="<?php path('security/update') ?>">Modifier</a>
                        <?php endif ?>
                        <?php if (Role::estRP()) : ?>
                            <a class="dropdown-item" href="<?php path('security/register') ?>">ajouter professeur </a>
                            <hr class="dropdown-divider">
                            <a class="dropdown-item" href="<?php path('user/doCours') ?>">planifier un cours</a>
                            <hr class="dropdown-divider">
                            <a class="dropdown-item"  href="<?php path('security/update') ?>">Modifier</a>
                        <?php endif ?>
                    </section>
                </li>
        </ul>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0 mr-5">
            <?php if (Role::estConnect()) : ?>
                <li class="nav-item" style="color: white;">
                    <?php
                    if(Role::estAdmin() || Role::estRP() || Role::estAC()) {
                        $nom = Session::getSession("user_connect")["nom"];
                        echo $nom;
                    }
                    if (Role::estProf()) {
                        $nom = Session::getSession("user_connect")["nomProf"];
                        $prenom = Session::getSession("user_connect")["prenomProf"];
                        echo $nom .'  '. $prenom ;
                    }
                    if (Role::estET()) {
                        $nom = Session::getSession("user_connect")["nomEtu"];
                        $prenom = Session::getSession("user_connect")["prenomEtu"];
                        echo $nom .'  '. $prenom ;
                    }
                    ?>
                </li>
            <?php endif ?>

        </ul>
        <ul class="navbar-nav  mt-2 mt-lg-0 mr-2">
            <li class="nav-item dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Setting</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <?php if (!Role::estConnect()) : ?>
                        <a class="dropdown-item" href="<?php path('security/login') ?>">login</a>
                    <?php endif ?>
                    <?php if (Role::estConnect()) : ?>
                        <a class="dropdown-item" href="<?php path('security/logout') ?>">logout </a>
                    <?php endif ?>
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#"> Avatar </a>
            </li>
        </ul>

    </div>
</nav>