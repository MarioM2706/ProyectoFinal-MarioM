<?php
    session_start();
    if ((!isset($_SESSION['dni'])&&!isset($_SESSION['nomu']))||$_SESSION['rolu']!=0){
        header("LOCATION:../index.php");

    }
?>