<?php

require('inc/model/classes.php');

isset($database) ? 'true' : 'false';

echo $database->mysql_prep("it is working!");

?>