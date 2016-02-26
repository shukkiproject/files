<?php 
session_start();
include("findAll.php");

$action="addUser.php";



if(isset($_GET['id'])) {
    $action="update.php";


}
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
    
    <?= isset($_SESSION["msg"])? $_SESSION["msg"] : "" ?>

    <form action="<?= $action ?>" method="POST">
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>"/>
      <label> Nom d'utilisateur :
        <input type="text" name="login">
      </label> Mot de Passe:
      <label><input type="text" name="pwd"></label>
      <input type="submit" value="Créer">
      </form>
    <a href="deleteAll.php">
      <button>Delete all users</button>
      </a>

      <?php if(isset($_GET['id'])) {

      ?>
          
          <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>"/>
        <label> Noveau nom d'utilisateur :
        <input type="text" name="login"/>
        </label> Noveau mot de Passe:
        <label><input type="text" name="pwd"></label>
        <input type="submit" value="update"/>
        </form>
      <?php } ?>
      <table class="table">
        
          <tr>
            <th class="col-xs-2">Id</th>
            <th class="col-xs-4">Login</th>
            <th class="col-xs-6">Action</th>
          </tr>
         <?php foreach ($users as $user) : ?>
        
          <tr>
            <td class="col-xs-4"><?= $user->getId(); ?></td>
            <td class="col-xs-4"><a  href="detail.php?id=<?= $user->getId(); ?>"><?= $user->getLogin(); ?></a></td>
            <td class="col-xs-4">
              <a class="col-xs-4" href="clone.php?id=<?= $user->getId(); ?>"><i class="fa fa-clone"></i></a>
                <a class="col-xs-4" href="index.php?id=<?= $user->getId(); ?>"><i class="fa fa-bolt"></i></a>
              <a class="col-xs-4" href="delete.php?id=<?= $user->getId(); ?>"><i class="fa fa-star-half-o fa-spin"></i></a></td>
          </tr>
        <?php endforeach; ?>
        
      </table>

      
        </div>
        </div>
  </div>
  </body>
</html>

<?php unset($_SESSION["msg"]); ?>