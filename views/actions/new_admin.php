<?php session_start(); ?>
<?php require_once( '../../inc/model/sessions.php'); ?>
<?php require_once( '../../inc/model/classes.php'); ?>
<?php require_once( '../../inc/model/functions.php'); ?>
<?php require_once( '../../inc/model/validation_func.php'); ?>
<?php main\confirm_login(); ?>
<?php main\find_selected_page(); ?>
<?php

if( isset($_POST["submit"]) )
{
    $username = main\mysql_prep($_POST["username"]);
    $password = main\password_encrypt($_POST["password"]);
    
    validation\no_null($username);
    
    $query = "INSERT INTO admins
              (username, hashed_password)
              VALUES
              ( '{$username}', '{$password}' )
             ";
    $result = $db->query($query);
    
    if($result)
    {
        $_SESSION["message"] = "Success!";
        main\redirect_to("../manage_content.php");
    } else {
        $_SESSION["message"] = "Fail!";
        main\redirect_to("new_admin.php");
    }
}
else
{

}

?>
<?php include('../../inc/views/layouts/header.php'); ?>
<?php main\menu($selected_subject_id, $selected_page_id); ?>
<?php //include('../../inc/views/layouts/admin_header.php'); ?>
<div class="wrapper">
    <section class="content">
    <form action="new_admin.php" method="post">
        <p>Admin Name: <input type="text" name="username" value=""> </p>
        <p>Password: <input type="password" name="password" value="">
        </p>
        <input type="submit" name="submit" value="Create Admin">
    </form>
        <a href="../manage_content.php">cancel</a>
    </section>
</div>

<?php include('../../inc/views/layouts/footer.php'); ?>