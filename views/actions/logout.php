<?php session_start(); ?>
<?php require_once( '../../inc/model/sessions.php'); ?>
<?php require_once( '../../inc/model/functions.php'); ?>

<?php

    $_SESSION["admin_id"] = null;
    $_SESSION["username"] = null;
    main\redirect_to("login.php");

?>