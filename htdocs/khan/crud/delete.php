<?php include "function.php" ?>
<?php delete(); ?>

<?php include "header.php"?>
  <h2 style="text-align: center; font-size: 40px">Delete</h2>
  <form action="delete.php" method="post"><br><br>
    <div style="text-align:center">
    <select id="" name="id">
    <?php id(); ?>
    </select>
    </div>
    <div style="text-align:center"><br>
    <button type="submit" name="delete" class="btn btn-default">Delete</button>
    </div>
<?php include "footer.php" ?>