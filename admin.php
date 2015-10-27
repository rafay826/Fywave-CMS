<?php session_start(); ?>
<?php require_once( 'inc/model/sessions.php'); ?>
<?php require_once( 'inc/model/db_connect.php'); ?>
<?php require_once( 'inc/model/functions.php'); ?>
<?php include('inc/views/layouts/header.php'); ?>
<?php 
    $user = "admin";
    main\find_selected_page();
?>
<?php main\menu($selected_subject_id, $selected_page_id); ?>
<?php //include('inc/views/layouts/admin_header.php') ?>
<div class="wrapper">
    <section class="content">
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
        echo "Take a look around!";
    }
    ?>
    </section>
</div>

<?php include('inc/views/layouts/footer.php'); ?>