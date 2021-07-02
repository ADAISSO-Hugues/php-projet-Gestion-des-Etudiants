<?php

use ism\lib\Session;
?>
 <form action="<?php path("user/showCours")?>" method="post">
<h3>LISTE DES COURS ENTRE DEUX DATE </h3>
     <div>
       
             <input type="date" id="1" placeholder="" name="datedebut" required>
               <label for="1">DateDebut</label>
     </div>
     <div>
             <input type="date" id="2" placeholder=""  name="datefin" required>
         <label for="2">DateFin</label>
     </div>
 </div>
  <input class="btn btn-outline-success" type="submit" name="envoyer"value="Envoyer" />
 </form>