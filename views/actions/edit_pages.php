<?php 
    session_start(); 
    require_once("../../inc/model/sessions.php"); 
?>
<?php require_once( '../../inc/model/db_connect.php'); ?>
<?php require_once( '../../inc/model/functions.php'); ?>
<?php require_once( '../../inc/model/validation_func.php'); ?>
<?php main\confirm_login(); ?>
<?php main\find_selected_page(); ?>
<?php $current_page = main\find_pages_by_id($selected_page_id); ?>
<?php

$errors = array();

if(!$current_page) {
    main\redirect_to('../manage_content.php');
}
?>

<?php
if (isset($_POST['submit'])) {
    
    // validations
	$required_fields = array("menu_name", "position", "visible", "content");
	validation\validate_presences($required_fields);
	
	$fields_with_max_lengths = array("menu_name" => 30);
	validation\validate_max_lengths($fields_with_max_lengths);


        $id = $current_page["id"];
		$menu_name = main\mysql_prep($_POST["menu_name"]);
        $content = main\mysql_prep($_POST["content"]);
		$position = (int) $_POST["position"];
		$visible = (int) $_POST["visible"];
	
		$query  = "UPDATE pages SET 
                   menu_name = '{$menu_name}',
                   content = '{$content}',
                   position = {$position}, 
                   visible = {$visible} 
                   WHERE id = {$id} 
                   LIMIT 1";
		$result = mysqli_query($db, $query);

		if ($result && mysqli_affected_rows($db) == 1) {
			// Success
			$_SESSION["message"] = "Page updated.";
			main\redirect_to("../manage_content.php");
		} else {
			// Failure
			$message = "Page update failed.";
		}

	
	}
 else {
	// This is probably a GET request
	
} // end: if (isset($_POST['submit']))

?>
<?php $user = "admin"; ?>
<?php include('../../inc/views/layouts/header.php'); ?>

<?php 
    main\menu($selected_subject_id, $selected_page_id); 
?>

<div class="wrapper">
    <section class="content">
        <h1>Edit Subject: <?php echo htmlentities($current_page["menu_name"]); ?></h1>
    <form action="edit_pages.php?page=<?php echo $current_page["id"]; ?>" method="post">
        <p>Menu Name: <input type="text" name="menu_name" value="<?php echo htmlentities($current_page["menu_name"]); ?>"> </p>
        <p>Content:</p>
        <textarea name="content"><?php echo htmlentities($current_page["content"]); ?></textarea>
        <p>Position: 
            <select name="position">
            <?php
                    
                $subject_result = main\find_all_subjects();
                $subject_count = mysqli_num_rows($subject_result);
                for($count=1; $count <= $subject_count; $count++) {
            ?>        
                <option value="<?php $count; ?>"
                <?php
                if ($current_page["position"] == $count) {
                    echo "selected";
                } ?>
                ><?php echo $count; ?></option>
                <?php
                }
				?>
            </select>
        </p>
         <p>Visible:
		    <input type="radio" name="visible" value="0" <?php if ($current_page["visible"] == 0) { echo "checked"; } ?> /> No
		    &nbsp;
		    <input type="radio" name="visible" value="1" <?php if ($current_page["visible"] == 1) { echo "checked"; } ?>/> Yes
		  </p>
        <input type="submit" name="submit" value="Edit Subject">
    </form>
        <a href="../../index.php">cancel</a>
        <br>
        <br>
        <a href="../../controller/delete_subject.php?subject=<?php echo $current_page["id"] ?>" onclick="return confirm('you are about to delete this subject, are you sure?');">Delete Menu</a>
        <a href="../../controller/delete_pages.php?page=<?php echo $current_page["id"] ?>" onclick="return confirm('you are about to delete this subject, are you sure?');">Delete Page</a>
    </section>
</div>

<?php include('../../inc/views/layouts/footer.php'); ?>