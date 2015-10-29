<?php session_start(); ?>
<?php require_once( '../../inc/model/classes.php'); ?>
<?php require_once( '../../inc/model/functions.php'); ?>
<?php require_once( '../../inc/model/validation_func.php'); ?>
<?php main\confirm_login(); ?>
<?php main\find_selected_page(); ?>
<?php

if( isset($_POST["submit"]) )
{
    $menu_name = main\mysql_prep($_POST["menu_name"]);
    $position = (int) $_POST["position"];
    $visible = (int) $_POST["visible"];
    
    validation\no_null($menu_name);
    
    $query = "INSERT INTO subjects
              (menu_name, position, visible)
              VALUES
              ( '{$menu_name}', {$position}, {$visible} )
             ";
    $result = $db->query($query);
    
    if($result)
    {
        $_SESSION["message"] = "Success!";
        main\redirect_to("../manage_content.php");
    } else {
        $_SESSION["message"] = "Fail!";
        main\redirect_to("../actions/new_subject.php");
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
    <form action="new_subject.php" method="post">
        <p>Menu Name: <input type="text" name="menu_name" value=""> </p>
        <p>Position: 
            <select name="position">
                <?php
                    
                $subject_result = main\find_all_subjects();
                $subject_count = mysqli_num_rows($subject_result);

                for( $count=1; $count <= ($subject_count + 1); $count++ )
                {
                ?>
                <option value="<?php echo $count ?>"><?php echo $count ?>                   </option>
                <?php
                }
                ?>
            </select>
        </p>
        <p>Visible:
            Yes<input type="radio" name="visible" value="0">
            No<input type="radio" name="visible" value="1">
        </p>
        <input type="submit" name="submit" value="Create Subject">
    </form>
        <a href="manage_content.php">cancel</a>
    </section>
</div>

<?php include('../../inc/views/layouts/footer.php'); ?>