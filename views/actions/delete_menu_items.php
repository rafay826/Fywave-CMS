<?php session_start(); ?>
<?php require_once( '../../inc/model/db_connect.php'); ?>
<?php require_once( '../../inc/model/functions.php'); ?>
<?php require_once( '../../inc/model/validation_func.php'); ?>
<?php main\confirm_login(); ?>
<?php main\find_selected_page(); ?>
<?php

if( isset($_POST["submit"]) )
{
    $menu_name = main\mysql_prep($_POST["menu_name"]);
    
    validation\no_null($menu_name);
    
    $query = "DELETE FROM subjects
              WHERE menu_name = '{$menu_name}'
              LIMIT 1";
    $result = mysqli_query($db, $query);
    
    if($result)
    {
        $_SESSION["message"] = "Success!";
        main\redirect_to("../../index.php");
    } else {
        $_SESSION["message"] = "Fail!";
        main\redirect_to("delete_menu_items.php");
    }
}
else
{

}

?>
<?php include('../../inc/views/layouts/header.php'); ?>
<?php main\menu($selected_subject_id, $selected_page_id); ?>

<div class="wrapper">
    <section class="content">
    <form action="delete_menu_items.php" method="post">
        <p>Menu Name: <select name="menu_name">
                <?php
                    $menu_items = main\find_all_subjects(false);
                    while($row = mysqli_fetch_assoc($menu_items)){
                ?>
               <option value="<?php echo $row["menu_name"]; ?>">
                   <?php echo $row["menu_name"]; ?>
               </option>
                <?php
                    }

                    mysqli_free_result($menu_items);
                ?>
            </select> </p>
        <input type="submit" name="submit" value="Delete Subject">
    </form>
        <a href="../manage_content.php">cancel</a>
    </section>
</div>

<?php include('../../inc/views/layouts/footer.php'); ?>