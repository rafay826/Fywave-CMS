<?php 
    session_start(); 
    require_once("../inc/model/sessions.php"); 
?>
<?php require_once( '../inc/model/db_connect.php'); ?>
<?php require_once( '../inc/model/functions.php'); ?>
<?php main\confirm_login(); ?>
<?php main\find_selected_page(); ?>
<?php

$current_page = main\find_pages_by_id($_GET["page"]);
    if(!$current_page){
        main\redirect_to("../views/manage_content.php");
    }

$id = $current_page["id"];
$query = "DELETE FROM pages WHERE id = {$id} LIMIT 1";
$result = mysqli_query($db, $query);

if ( $result && mysqli_affected_rows($db) == 1 ) {
    
    //SUCESS
    $_SESSION["message"] = "Page Deleted";
    main\redirect_to("../views/manage_content.php");
} else {
    $_SESSION["message"] = "Page delete failed.";
    main\redirect_to("../views/manage_content.php?subject={$id}");
}

?>