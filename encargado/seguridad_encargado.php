<?php
    session_start();
    if ((!isset($_SESSION['dni'])&&!isset($_SESSION['nomu']))||$_SESSION['rolu']!=2){
        header("LOCATION:../index.php");

    }
?>