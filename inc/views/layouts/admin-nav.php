<?php require_once( '../../inc/model/db_connect.php'); ?>

<div>
    <ul>
        <?php
            // 2. Perform database query
            $query  = "SELECT * 
                       FROM subjects";
            $subject_result = mysqli_query($db, $query);
            // Test if there was a query error
            if (!$subject_result) {
                die("Database query failed.");
            }
      
			// 3. Use returned data (if any)
			while($subjects = mysqli_fetch_assoc($subject_result)) {
				// output data from each row
		?>
        
        <li>
            <?php 
                echo $subjects["menu_name"]; 
                ?>
             <?php
            // 2. Perform database query
            $query  = "SELECT * 
                       FROM pages
                       WHERE visible = 1
                       ORDER BY position ASC";
            $page_result = mysqli_query($db, $query);
            // Test if there was a query error
            if (!$page_result) {
                die("Database query failed.");
            }
            ?>
            <ul>
                <?php
                    // 3. Use returned data (if any)
                    while($pages = mysqli_fetch_assoc($page_result)) {
                ?>
                    <li>
                <?php 
                // output data from each row
                echo $pages["menu_name"]; 
                ?>
            </li>
                <?php
                }

                // 4. Release returned data
                mysqli_free_result($page_result);

                ?>
               
        </ul>
            <?php
                }

            // 4. Release returned data
            mysqli_free_result($subject_result);

            ?>
    
</div>