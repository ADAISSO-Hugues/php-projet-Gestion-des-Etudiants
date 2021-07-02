<center><h1 class="mt-5">BIENVENU <?php
        use ism\lib\Session;
        echo Session::getSession("user_connect")['nomEtu'];
        echo"  ";
        echo Session::getSession("user_connect")['prenomEtu'];?></h1>
</center>