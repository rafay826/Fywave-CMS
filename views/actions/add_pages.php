<?php 
    session_start(); 
    require_once("../../inc/model/sessions.php"); 
?>
<?php require_once( '../../inc/model/db_connect.php'); ?>
<?php require_once( '../../inc/model/functions.php'); ?>
<?php main\confirm_login(); ?>
<?php main\find_selected_page(); ?>
<?php $current_page = main\find_pages_by_id($selected_subject_id); ?>
<?php $current_subject = main\find_subject_by_id($selected_subject_id); ?>

<?php

if( isset($_POST["submit"]) )
{
    $id = $current_subject["id"];
    $menu_name = main\mysql_prep($_POST["menu_name"]);
    $content = main\mysql_prep($_POST["content"]);
    $position = (int) $_POST["position"];
    $visible = (int) $_POST["visible"];
    
    $query = "INSERT INTO pages
              (subject_id, menu_name, content, position, visible)
              VALUES
              ('{$id}', '{$menu_name}', '{$content}', {$position}, {$visible} )
             ";
    $result = mysqli_query($db, $query);
    
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
    $_SESSION["message"] = "Fail!";
}

?>
<?php $user = "admin"; ?>
<?php include('../../inc/views/layouts/header.php'); ?>
<?php 
    main\menu($selected_subject_id, $selected_page_id); 
?>

<div class="wrapper">
    <section class="content">
    <form action="add_pages.php?subject=<?php echo $current_subject["id"] ?>" method="post">
        <p>Menu Name: <?php echo $current_subject["menu_name"] ?> </p>
        <p>Page Name: <input type="text" name="menu_name" value=""> </p>
        <p>Content:</p>
        <textarea name="content">
        </textarea>
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
            Yes<input type="radio" name="visible" value="1">
            No<input type="radio" name="visible" value="0">
        </p>
        <input type="submit" name="submit" value="Create Page">
    </form>
        <a href="../../index.php">cancel</a>
    </section>
</div>

<?php include('../../inc/views/layouts/footer.php'); ?>