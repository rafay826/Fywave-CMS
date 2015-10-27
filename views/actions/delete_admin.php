<?php session_start(); ?>
<?php require_once( '../../inc/model/sessions.php'); ?>
<?php require_once( '../../inc/model/db_connect.php'); ?>
<?php require_once( '../../inc/model/functions.php'); ?>
<?php require_once( '../../inc/model/validation_func.php'); ?>
<?php main\find_selected_page(); ?>
<?php

if( isset($_POST["submit"]) )
{
    $username = main\mysql_prep($_POST["username"]);
    $password = main\mysql_prep($_POST["password"]);
    $hash = main\find_all_admins();
    
    validation\no_null($username);
    
    $query = "DELETE FROM admins
              WHERE username = '{$username}'
              LIMIT 1";
    $result = mysqli_query($db, $query);
    
    if($result)
    {
        $_SESSION["message"] = "Success!";
        main\redirect_to("../manage_content.php");
    } else {
        $_SESSION["message"] = "Fail!";
        main\redirect_to("delete_admin.php");
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
    <form action="delete_admin.php" method="post">
        <p>Admin Name: <select name="username">
                <?php
                    $admin_items = main\find_all_admins();
                    while($row = mysqli_fetch_assoc($admin_items)){
                ?>
               <option value="<?php echo $row["username"]; ?>">
                   <?php echo $row["username"]; ?>
               </option>
                <?php
                    }

                    mysqli_free_result($admin_items);
                ?>
            </select> </p>
<!--        <p>Password: <input type="text" name="password" value="">-->
        </p>
        <input type="submit" name="submit" value="Delete Admin">
    </form>
        <a href="../manage_content.php">cancel</a>
    </section>
</div>

<?php include('../../inc/views/layouts/footer.php'); ?>