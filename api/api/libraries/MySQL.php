<?php
class MySQL
{
  private $dbHost = DB_HOST;
  private $dbUser = DB_USER;
  private $dbPass = DB_PASS;
  private $dbName = DB_NAME;

  private $statement;
  private $dbHandler;
  private $error;
  public function __construct()
  {
    $conn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;
    $options = [
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];
    try {
      $this->dbHandler = new PDO(dsn: $conn, username: $this->dbUser, password: $this->dbPass, options: $options);
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      echo $this->error;
      header(header: 'location:' . URLROOT . '/errors/e503');
    }
  }

  // create a new method tahat allwos us to create quaries
  public function query($sql): void
  {
    try {
      $this->statement = $this->dbHandler->prepare($sql);
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      echo $this->error;
      header(header: 'location:' . URLROOT . '/errors/e503');
    }
  }

  // this will bind the value and the parameters in the database
  public function bind($parameter, $value, $type = null): void
  {
    switch (is_null(value: $type)) {
      case is_int(value: $value):
        $type = PDO::PARAM_INT;
        break;
      case is_bool(value: $value):
        $type = PDO::PARAM_BOOL;
        break;
      case is_null(value: $value):
        $type = PDO::PARAM_NULL;
        break;
      default:
        $type = PDO::PARAM_STR;
    }
    try {
      $this->statement->bindValue(param: $parameter, value: $value, type: $type);
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      echo $this->error;
      header(header: 'location:' . URLROOT . '/errors/e503');
    }
  }
  // this will execute the prapared quaries
  public function execute()  {
    try {
      return $this->statement->execute();
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      echo $this->error;
      header(header: 'location:' . URLROOT . '/errors/e503');
    }
  }

  // this will return an array of data frm the database
  public function resultSet()
  {
    try {
      $this->execute();
      return $this->statement->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      echo $this->error;
      header(header: 'location:' . URLROOT . '/errors/e503');
    }
  }

  // this will return an array of data frm the database
  public function resultSetAssoc()
  {
    try {
      $this->execute();
      return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      echo $this->error;
      header(header: 'location:' . URLROOT . '/errors/e503');
    }
  }

  // this will return one single row of the data
  public function single()
  {
    try {
      $this->execute();
      return $this->statement->fetch(mode: PDO::FETCH_OBJ);
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      echo $this->error;
      header(header: 'location:' . URLROOT . '/errors/e503');
    }
  }

  // this will count the row of data fetched 
  public function rowCount()
  {
    try {
      $this->execute();
      return $this->statement->rowCount();
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      echo $this->error;
      header(header: 'location:' . URLROOT . '/errors/e503');
    }
  }
  // this will begin the transactions 
  public function beginTransaction()
  {
    try {
      return $this->dbHandler->beginTransaction();
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      echo $this->error;
      header(header: 'location:' . URLROOT . '/errors/e503');
    }
  }
  // this will commit the code 
  public function commit()
  {
    try {
      return $this->dbHandler->commit();
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      echo $this->error;
      header(header: 'location:' . URLROOT . '/errors/e503');
    }
  }
  // this will check if the code is still proocessing
  public function inTransaction()
  {
    try {
      return $this->dbHandler->inTransaction();
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      echo $this->error;
      header(header: 'location:' . URLROOT . '/errors/e503');
    }
  }
  // this will rollback the code 
  public function rollBack()
  {
    try {
      return $this->dbHandler->rollBack();
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      echo $this->error;
      header(header: 'location:' . URLROOT . '/errors/e503');
    }
  }
}
