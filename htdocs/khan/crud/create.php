<?php include "function.php"?>
<?php create(); ?>

<?php include "header.php"?>
  <h2 style="text-align: center; font-size: 40px">Create</h2>
  <form action="create.php" method="post">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" name="username" class="form-control" id="email" placeholder="Username">
    </div>

    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password">
    </div>
    <button type="submit" name="create" class="btn btn-default">Create</button>
<?php include "footer.php" ?>