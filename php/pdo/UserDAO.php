<?php // UserDAO.php

require_once('user.php');
require_once('DB.php');

class UserDAO{

  private $pdo;

  public function __construct(PDO $pdo){
    $this->pdo=$pdo;
  }

  public function insert(User $user){
      
      $pdoStatement = $this->pdo->prepare("INSERT INTO user(login, pwd) VALUES (?, ?);");
      $pdoStatement->bindParam(1, $user->getLogin()); 
      $pdoStatement->bindParam(2, $user->getPwd());
      $pdoStatement->execute();

      $user->setId($this->pdo->lastInsertId());
      
      $pdoStatement->closeCursor();
  }

  public function delete($id){
    
      $pdoStatement = $this->pdo->prepare("DELETE FROM user WHERE id = ? ;");
      $pdoStatement->bindParam(1, $id, PDO::PARAM_INT); 
      
      $pdoStatement->execute();
      
      $pdoStatement->closeCursor();

  }

  public function update(User $user){

    $pdoStatement = $this->pdo->prepare("UPDATE user SET login= ? , pwd= ? WHERE id = ? ;");
    $pdoStatement->bindParam(1, $user->getLogin()); 
    $pdoStatement->bindParam(2, $user->getPwd()); 
    $pdoStatement->bindParam(3, $user->getId(), PDO::PARAM_INT);   
    $pdoStatement->execute();
      
    $pdoStatement->closeCursor();

  }

  public function findAll(){
    $users = [];

    $pdoStatement = $this->pdo->prepare("SELECT id, login, pwd FROM user;");

    $pdoStatement->execute();

    $rows= $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rows as $row) {

      $user = new User();
      $user->setId($row['id'])
            ->setLogin($row['login'])
            ->setPwd($row['pwd']);
      $users[]=$user;
    }

    $pdoStatement->closeCursor();

    return $users;
  }

  public function find($id){
    $user = null;
    
    $pdoStatement = $this->pdo->prepare("SELECT id, login, pwd FROM user WHERE id = ? ;");
    $pdoStatement->bindParam(1, $id, PDO::PARAM_INT);
    $pdoStatement->execute();

    $data= $pdoStatement->fetch(PDO::FETCH_ASSOC);

      
      if ($data) {
        $user = new User();
        $user->setId($data['id'])
            ->setLogin($data['login'])
            ->setPwd($data['pwd']);
      }
      
    $pdoStatement->closeCursor();

    return $user;
  }

  public function deleteAll(){

      $pdoStatement = $this->pdo->prepare("DELETE FROM user ;");
      $pdoStatement->execute();
      $pdoStatement->closeCursor();
  }

  // Bonus
  public function findStartingWith($letter){
    $users = [];
    $let=$letter.'%';
    $pdoStatement = $this->pdo->prepare("SELECT id, login, pwd FROM user WHERE login LIKE ? ;");
    $pdoStatement->bindParam(1, $let);
    $pdoStatement->execute();

    $rows= $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
       
    if ($data) {
        foreach ($rows as $row) {

          $user = new User();
          $user->setId($row['id'])
                ->setLogin($row['login'])
                ->setPwd($row['pwd']);
          $users[]=$user;
        }
    }
    
    $pdoStatement->closeCursor();

    return $users;
  }


}














