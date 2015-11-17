<?php
    session_start();
    require_once( 'inc/model/sessions.php');
?>
<?php require_once( 'inc/model/classes.php'); ?>
<?php include('inc/model/functions.php'); ?>
<?php 
    $user = "public";
    main\find_selected_page();
?>
<?php include( 'inc/views/layouts/header.php'); ?>
<?php main\public_menu($selected_subject_id, $selected_page_id); ?>
<div class="wrapper">
    <section class="content">
    <p><?php sessions\message(); ?></p>
    <?php if($selected_page_id){
            $current_page = main\find_pages_by_id($selected_page_id); 
    ?>
<h1><?php echo $current_page["menu_name"] . "<br>" . "<br>"; ?></h1>
<div><p><?php echo $current_page["content"];?></p></div>
        <?php
        
        if ( main\logged_in() ) {
        
        ?>
<a href="views/actions/edit_pages.php?page=<?php echo $current_page["id"]; ?>" class="btn btn-warning" >Edit Page</a>
<?php
        }
    }elseif($selected_subject_id){
            $current_subject = main\find_subject_by_id($selected_subject_id);
            ?>
        <h1><?php echo htmlentities($current_subject["menu_name"]);?></h1>
        <?php
        
        if ( main\logged_in() ) {
        
        ?>
        <a href="views/actions/edit_subject.php?subject=<?php echo $current_subject["id"]; ?>" class="btn btn-warning" >Edit</a>
        <a href="views/actions/add_pages.php?subject=<?php echo $current_subject["id"]; ?>" class="btn btn-success">Add Pages</a>
        <?php
        }
    }else {
        echo "Take a look around!";
    }
    ?>
    </section>
</div>

<?php include( 'inc/views/layouts/footer.php'); ?>