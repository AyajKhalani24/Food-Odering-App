<?php
    require "starter.php";
    session_start();
    session_unset();
    session_destroy();
 ?>