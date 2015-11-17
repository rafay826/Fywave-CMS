<?php session_start(); ?>
<?php require_once( 'inc/model/sessions.php'); ?>
<?php require_once( 'inc/model/classes.php'); ?>
<?php require_once( 'inc/model/functions.php'); ?>
<?php main\confirm_login(); ?>
<?php include('inc/views/layouts/header.php'); ?>
<?php 
    $user = "admin";
    main\find_selected_page();
?>
<?php main\menu($selected_subject_id, $selected_page_id); ?>
<?php //include('inc/views/layouts/admin_header.php') ?>

    <section class="content">
    <h1><?php if (!isset($_SESSION["username"])) {
        $_SESSION["username"] = null;
} else {
    echo "Welcome " . $_SESSION["username"];
}
    ?></h1>
    <p>
        <?php 
        sessions\message();
        ?>
    </p>
        
    <?php 
    if($selected_page_id){
            $current_page = main\find_pages_by_id($selected_page_id);
            ?>
        <h1>
            <?php echo $current_page["menu_name"] . "<br>" . "<br>"; ?>
        </h1>
        <div>
            <p><?php echo $current_page["content"];?></p>
        </div>
        <a href="actions/edit_pages.php?page=<?php echo $current_page["id"]; ?>" >Edit Page</a>
<?php
    }elseif($selected_subject_id){
            $current_subject = main\find_subject_by_id($selected_subject_id);
            ?>
        <h1><?php echo $current_subject["menu_name"];?></h1>
        <?php
        ?>
        <a href="actions/edit_subject.php?subject=<?php echo $current_subject["id"]; ?>" >Edit</a>
        <a href="actions/add_pages.php?subject=<?php echo $current_subject["id"]; ?>">Add Pages</a>
        <?php
    }else {
       
    }
    ?>
        <p>add pages to menu:</p>
    
    <?php 
            $result = main\find_all_subjects(false);
			while($subjects = mysqli_fetch_assoc($result)) {
		
            //$safe_subject_id = $db->escape_string($subject_id);         ?>
        <li class="dropdown" >
            <a href="<?php ROOT_PATH; ?>/index.php?subject=<?php echo urlencode($subjects["id"]) ?>" ><?php echo $subjects["menu_name"]; ?> </a>
            <?php
            $page_result = main\find_subject_pages($subjects["id"]);
         ?>
        <ul class="child-nav dropdown-menu">
        <?php
            // 3. Use returned data (if any)
            while($pages = mysqli_fetch_assoc($page_result)) {
        ?>
        <?php $safe_page_id = $db->escape_string($page_id); ?>
        <li <?php if($page_id && $pages["id"] == $safe_page_id){ ?> class="selected" <?php } ?> >
            <a href="<?php ROOT_PATH; ?>/index.php?page=<?php echo urlencode($pages["id"]) ?>"> <?php echo $pages["menu_name"]; ?> </a>
                
        </li>
        <?php }
                mysqli_free_result($page_result); ?>
        </ul>
    <?php } mysqli_free_result($result); ?>
        
    </section>

<?php include('inc/views/layouts/footer.php'); ?>