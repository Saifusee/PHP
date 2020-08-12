<?php include "function.php" ?>
<?php update(); ?>

<?php include "header.php"?>
  <h2 style="text-align: center; font-size: 40px">Update</h2>
  <form action="update.php" method="post">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" name="username" class="form-control" id="email" placeholder="Username">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password">
    </div>
    <div>
    <select id="" name="id">
    <?php id(); ?>
    </select>
    </div>
    <button type="submit" name="update" class="btn btn-default">Update</button>
<?php include "footer.php" ?>