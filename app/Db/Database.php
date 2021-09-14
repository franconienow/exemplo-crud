<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Database {
  /**
   * Database host
   */
  const host = 'localhost';

  /**
   * Database name
   */
  const name = 'banco_exemplo';

  /**
   * Database password
   */
  const user = 'root';

  /**
   * Database password
   */
  const pass = 'Sksolo@15';

  /**
   * Database table
   *
   * @var string
   */
  private $table;

  /**
   * Db connection instace
   *
   * @var PDO
   */
  private $connection;

  /**
   * Defines the table and instace the connection
   *
   * @param string $table
   */
  public function __construct($table = null){
    $this->table = $table;
    $this->setConnection();
  }
  /**
   * Creates a connection with the db using PDO
   *
   * @return void
   */
  private function setConnection(){
    try {
      $this->connection = new PDO('mysql:host='.self::host.';dbname='.self::name,self::user,self::pass);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e){
      die('ERROR: '.$e->getMessage());
    }
  }

  /**
   * Execute queries
   *
   * @param string $query
   * @param array $params
   * @return PDOStatement
   */
  public function execute($query, $params = []){
    try {
      $statement = $this->connection->prepare($query);
      $statement->execute($params);
      return $statement;
    } catch (PDOException $e){
      die('ERROR: '.$e->getMessage());
    }
  }

  /**
   * Method responsable for insert new clients in to the DB
   *
   * @param array $values
   * @return integer client ID
   */
  public function insert($values){
    $fields = array_keys($values);
    $binds = array_pad([], count($fields), '?');

    $query = 'INSERT INTO ' . $this->table . ' ('.implode(',', $fields).') VALUES ('.implode(',', $binds). ')';

    $this->execute($query, array_values($values));

    return $this->connection->lastInsertId();
  }

  /**
   * Method responsable for select Clients in the DB
   *
   * @param string $where
   * @param string $order
   * @param string $limit
   * @param string $fields
   * @return PDOStatment
   */
  public function select($where = null, $order = null, $limit = null, $fields = '*'){
    $where = strlen($where) ? 'WHERE ' .$where : '';
    $order = strlen($order) ? 'ORDER BY ' .$order : '';
    $limit = strlen($limit) ? 'LIMIT ' .$limit : '';

    $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

    return $this->execute($query);
  }

  /**
   * Method resonsable for update a Client instance in the DB
   *
   * @param string $where
   * @param array $values
   * @return boolean
   */
  public function update($where, $values){
    $fields = array_keys($values);
    $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;

    $this->execute($query,array_values($values));

    return true;
  }


  /**
   * Método responsable for delete de Client in the DB
   * @param string $where
   * @return boolean
   */
  public function delete($where){
    $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

    $this->execute($query);

    return true;
  }

}