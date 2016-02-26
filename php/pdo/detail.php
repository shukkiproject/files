<?php 
session_start();
include("UserDAO.php");
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <title>PDO</title>
    <style>
      .jumbotron, th {
        text-align: center;
      }
      
      table {
        margin: 0 auto;
      }
    </style>
  </head>
  <body>
  <div class="container" >
    <div class="jumbotron">
      <div class="center">

      <table class="table">
        
          <tr>
            <th>Id</th>
            <th>Login</th>
            <th>Password</th>
          </tr>
      <?php 

        if (isset($_GET['id'])) {
          $dao = new UserDAO(Db::getPdo());  
          $user=$dao->find($_GET['id']);
      ?>           
          <tr>
            <td><?= $user->getId(); ?></td>
             <td><?= $user->getLogin(); ?></td>
              <td><?= $user->getPwd(); ?></td>
          </tr>
        <?php } ?>
        
      </table>
      

      </div>
    </div>
  </div>
  </body>
</html>

<?php unset($_SESSION["msg"]); ?>