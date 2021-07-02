<center><h1 class="mt-5">BIENVENU <?php
        use ism\lib\Session;
        echo Session::getSession("user_connect")['nomProf'];
        echo"  ";
        echo Session::getSession("user_connect")['prenomProf'];?></h1>
</center>