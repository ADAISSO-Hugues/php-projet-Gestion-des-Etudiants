<center><h1 class="mt-5">BIENVENU <?php
    use ism\lib\Session;
        echo Session::getSession("user_connect")['nom']; ?></h1></center>
