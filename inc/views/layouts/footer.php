<footer>
    <p>
        <?php echo date('Y') ?>
    </p>
</footer>
</body>
</html>

<?php
  // 5. Close database connection
  if(isset($db))
  {
      mysqli_close($db);
  }
?>

