<?php
//MAIN FUNCTIONS
namespace main;

define('ROOT_PATH', 'http://' . $_SERVER['HTTP_HOST']);

ob_start();

function redirect_to($new_location){
    header("Location: " . $new_location);
    exit;
}

function mysql_prep($string) {
    global $db;
    $safe_result = mysqli_real_escape_string($db, $string);
    return $safe_result;
}

//CONFIRM DATABASE QUERY 
function confirm_query($result_set){
    if (!$result_set) {
                die("Database query failed.");
            }
}

//PARENT-NAV
function find_all_subjects($public=true) {
    global $db;
    $query  = "SELECT * 
               FROM subjects ";
    if ($public) {
        $query .= "WHERE visible = 1 ";
    }
            $result = mysqli_query($db, $query);
            // Test if there was a query error
            confirm_query($result);
            return $result;
}

//FIND ALL ADMINS
function find_all_admins() {
    global $db;
    $query  = "SELECT * 
               FROM admins";
            $admin_result = mysqli_query($db, $query);
            // Test if there was a query error
            confirm_query($admin_result);
            return $admin_result;
}

//PASSWORD ENCRYPT
function password_encrypt($password){
    $hash_format = "$2y$10$";   // Tells PHP to use Blowfish with a "cost" of 10
	  $salt_length = 22; 					// Blowfish salts should be 22-characters or more
	  $salt = generate_salt($salt_length);
	  $format_and_salt = $hash_format . $salt;
	  $hash = crypt($password, $format_and_salt);
		return $hash;
};

//GENERATE SALT
function generate_salt($length) {
	  // Not 100% unique, not 100% random, but good enough for a salt
	  // MD5 returns 32 characters
	  $unique_random_string = md5(uniqid(mt_rand(), true));
	  
		// Valid characters for a salt are [a-zA-Z0-9./]
	  $base64_string = base64_encode($unique_random_string);
	  
		// But not '+' which is valid in base64 encoding
	  $modified_base64_string = str_replace('+', '.', $base64_string);
	  
		// Truncate string to the correct length
	  $salt = substr($modified_base64_string, 0, $length);
	  
		return $salt;
	}

function password_check($password, $existing_hash) {
    // existing hash contains format and salt at start
	  $hash = crypt($password, $existing_hash);
	  if ($hash === $existing_hash) {
	    return true;
	  } else {
	    return false;
	  }
}

//CHILD-NAV
function find_subject_pages($subject_page, $public=true){
    global $db;
    
    $safe_subject_page = mysqli_real_escape_string($db, $subject_page);
    
        $query  = "SELECT * 
                   FROM pages
                   WHERE subject_id = {$safe_subject_page} ";
        if ($public) {
            $query .= "AND visible = 1 ";
        }
        $query .= "ORDER BY position ASC";
        $page_result = mysqli_query($db, $query);
        confirm_query($page_result);
        return $page_result;
}

//MENU
function menu($subject_id, $page_id){
    global $db;
?>
<div id="nav-container">
    <ul class="parent-nav">
        <li><a href="<?php ROOT_PATH; ?>/">Home</a></li>
            <li>Settings
                <ul>
                    <li><a href="<?php ROOT_PATH; ?>/views/actions/new_subject.php">+ add a menu item</a></li>
        <li><a href="<?php ROOT_PATH; ?>/views/actions/delete_menu_items.php">- delete a menu item</a></li>
                </ul>
            </li>
        <li><a href="<?php ROOT_PATH; ?>/admin.php">Admin Settings</a>
            <ul>
                        <li><a href="<?php ROOT_PATH; ?>/views/actions/new_admin.php">+ admins</a></li>
                <li><a href="<?php ROOT_PATH; ?>/views/actions/delete_admin.php">- admins</a></li>
                <li><a href="<?php ROOT_PATH; ?>/views/actions/logout.php">Logout</a></li>
                    </ul>
        </li>
        <?php 
            $result = find_all_subjects(false);
			while($subjects = mysqli_fetch_assoc($result)) {
		
            $safe_subject_id = mysqli_real_escape_string($db, $subject_id);         ?>
        <li <?php if($subject_id && $subjects["id"] == $safe_subject_id){ ?> class="selected" <?php } ?> >
            <a href="<?php ROOT_PATH; ?>/views/manage_content.php?subject=<?php echo urlencode($subjects["id"]) ?>"> <?php echo $subjects["menu_name"]; ?> </a>
        </li>
         <?php
            $page_result = find_subject_pages($subjects["id"], false);
         ?>
        <ul class="child-nav">
        <?php
            // 3. Use returned data (if any)
            while($pages = mysqli_fetch_assoc($page_result)) {
        ?>
        <?php $safe_page_id = mysqli_real_escape_string($db, $page_id); ?>
        <li <?php if($page_id && $pages["id"] == $safe_page_id){ ?> class="selected" <?php } ?> >
            <a href="<?php ROOT_PATH; ?>/views/manage_content.php?page=<?php echo urlencode($pages["id"]) ?>"> <?php echo $pages["menu_name"]; ?> </a>
                
        </li>
        <?php }
                mysqli_free_result($page_result); ?>
        </ul>
    <?php } mysqli_free_result($result); ?>
    </ul>
</div>
<?php
 
}

function public_menu($subject_id, $page_id){
    global $db;
?>
<div id="nav-container">
    <ul class="parent-nav">
        <li><a href="http://yodas.brain">Home</a></li>
        <?php 
            $result = find_all_subjects();
			while($subjects = mysqli_fetch_assoc($result)) {
		
            $safe_subject_id = mysqli_real_escape_string($db, $subject_id);         ?>
        <li <?php if($subject_id && $subjects["id"] == $safe_subject_id){ ?> class="selected" <?php } ?> >
            <a href="<?php ROOT_PATH; ?>/index.php?subject=<?php echo urlencode($subjects["id"]) ?>"> <?php echo $subjects["menu_name"]; ?> </a>
        </li>
         <?php
            $page_result = find_subject_pages($subjects["id"]);
         ?>
        <ul class="child-nav">
        <?php
            // 3. Use returned data (if any)
            while($pages = mysqli_fetch_assoc($page_result)) {
        ?>
        <?php $safe_page_id = mysqli_real_escape_string($db, $page_id); ?>
        <li <?php if($page_id && $pages["id"] == $safe_page_id){ ?> class="selected" <?php } ?> >
            <a href="<?php ROOT_PATH; ?>/index.php?page=<?php echo urlencode($pages["id"]) ?>"> <?php echo $pages["menu_name"]; ?> </a>
                
        </li>
        <?php }
                mysqli_free_result($page_result); ?>
        </ul>
    <?php } mysqli_free_result($result); ?>
    </ul>
</div>
<?php
 
}

//Find Subjects By ID
function find_subject_by_id($subject_id){
    global $db;
    $safe_subject = mysqli_real_escape_string($db, $subject_id);
    
    $query = "SELECT *
              FROM subjects
              WHERE id = {$safe_subject}
              LIMIT 1";
    $id_result = mysqli_query($db, $query);
    confirm_query($id_result);
    
    if( $id = mysqli_fetch_assoc($id_result) )
    { return $id; }
    else
    { return null; }
}

//Find Pages By ID
function find_pages_by_id($page_id){
    global $db;
    $safe_page = mysqli_real_escape_string($db, $page_id);
    
    $query = "SELECT *
              FROM pages
              WHERE id = {$safe_page}
              LIMIT 1";
    $content_result = mysqli_query($db, $query);
    confirm_query($content_result);
    
    if( $content = mysqli_fetch_assoc($content_result) )
    { return $content; }
    else
    { return null; }   
}

function find_selected_page() {
    global $selected_subject_id;
    global $selected_page_id;
    
if (isset($_GET["subject"])){
        $selected_subject_id = $_GET["subject"];
        $selected_page_id = null;
    }
    elseif (isset($_GET["page"])){
        $selected_subject_id = null;
        $selected_page_id = $_GET["page"];
    }
    else{
        $selected_subject_id = null;
        $selected_page_id = null;
    }
}

function form_errors($errors=array()) {
		$output = "";
		if (!empty($errors)) {
		  $output .= "<div class=\"error\">";
		  $output .= "Please fix the following errors:";
		  $output .= "<ul>";
		  foreach ($errors as $key => $error) {
		    $output .= "<li>{$error}</li>";
		  }
		  $output .= "</ul>";
		  $output .= "</div>";
		}
		return $output;
	}

//FIND ALL ADMINS
function find_admins_by_username($username) {
    global $db;
    
    $user = mysqli_real_escape_string($db, $username);
    
    $query  = "SELECT * 
               FROM admins
               WHERE username = '{$user}'
               LIMIT 1";
            $admin_result = mysqli_query($db, $query);
            // Test if there was a query error
            confirm_query($admin_result);
            if($admin = mysqli_fetch_assoc($admin_result)){
            return $admin;
            } else {
                return null;
            }
}

function attempt_login($username, $password) {
    $admin = find_admins_by_username($username);
    if ($admin) {
			// found admin, now check password
			if (password_check($password, $admin["hashed_password"])) {
				// password matches
				return $admin;
			} else {
				// password does not match
				return false;
			}
		} else {
			// admin not found
			return false;
		}
    
}

function logged_in() {
    return isset($_SESSION['admin_id']);
}

function confirm_login() {
    if ( !logged_in() ) {
        redirect_to('../views/actions/login.php');
    } 
}
	

?>