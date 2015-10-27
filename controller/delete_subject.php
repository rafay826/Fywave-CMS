<?php 
    session_start(); 
    require_once("../inc/model/sessions.php"); 
?>
<?php require_once( '../inc/model/db_connect.php'); ?>
<?php require_once( '../inc/model/functions.php'); ?>

<?php

$current_subject = main\find_subject_by_id($_GET["subject"]);
    if(!$current_subject){
        main\redirect_to("../views/manage_content.php");
    }

$id = $current_subject["id"];
$query = "DELETE FROM subjects WHERE id = {$id} LIMIT 1";
$result = mysqli_query($db, $query);

if ( $result && mysqli_affected_rows($db) == 1 ) {
    
    //SUCESS
    $_SESSION["message"] = "Subject Deleted";
    main\redirect_to("../views/manage_content.php");
} else {
    $_SESSION["message"] = "Subject delete failed.";
    main\redirect_to("../views/manage_content.php?subject={$id}");
}

?>