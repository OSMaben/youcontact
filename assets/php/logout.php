<?php
    require 'server.php';
    session_destroy();
    header("location: login.php");
?>