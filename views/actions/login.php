<?php session_start(); ?>
<?php require_once( '../../inc/model/sessions.php'); ?>
<?php require_once( '../../inc/model/db_connect.php'); ?>
<?php require_once( '../../inc/model/functions.php'); ?>
<?php require_once( '../../inc/model/validation_func.php'); ?>
<?php main\find_selected_page(); ?>
<?php
$username = "";

if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("username", "password");
  validation\validate_presences($required_fields);
  
  if (empty($errors)) {
    // Attempt Login

		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$found_admin = main\attempt_login($username, $password);

    if ($found_admin) {
      // Success
			// Mark user as logged in
            $_SESSION["message"] = "Welcome to the Admin area ";
			$_SESSION["admin_id"] = $found_admin["id"];
			$_SESSION["username"] = $found_admin["username"];
      main\redirect_to("../../admin.php");
    } else {
      // Failure
      $_SESSION["message"] = "Username/password not found.";
    }
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>

<?php $user = "admin"; ?>
<?php include('../../inc/views/layouts/header.php'); ?>
<?php main\public_menu($selected_subject_id, $selected_page_id); ?>
<?php //include('../../inc/views/layouts/admin_header.php'); ?>
<div class="wrapper">
    <?php echo sessions\message(); ?>
    <?php echo main\form_errors($errors); ?>
    <?php if (!isset($_SESSION["username"])) {
        $_SESSION["username"] = null;
} else {
    echo "Welcome " . $_SESSION["username"];
}
    ?>
    <section class="content">
    <form action="login.php" method="post">
        <p>Username: <input type="text" name="username" value="<?php echo htmlentities($username); ?>"></p>
        <p>Password: <input type="password" name="password" value="">
        </p>
        <input type="submit" name="submit" value="Submit">
    </form>
    </section>
</div>

<?php include('../../inc/views/layouts/footer.php'); ?>