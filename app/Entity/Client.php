<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Client{
  /**
   * Unique identifier
   * 
   * @var integer
   */
  public $id;
  /**
   * Client name
   *
   * @var string
   */
  public $name;
  /**
   * Client address
   *
   * @var string
   */
  public $address;
  /**
   * Client zip code
   *
   * @var string
   */
  public $zip;
  /**
   * Client residential phone
   *
   * @var string
   */
  public $phone;
  /**
   * Client mobile phone
   *
   * @var string
   */
  public $mPhone;
  /**
   * Client email phone
   *
   * @var string
   */
  public $email;
  /**
   * Client gender
   *
   * @var string
   */
  public $gender;
  /**
   * Client observations
   *
   * @var string
   */
  public $obs;

  /**
   * Creates a new client in the db
   *
   * @return boolean
   */
  public function create() {
    // Insert the client in the db
    $db = new Database('cliente');
    $this->id = $db->insert([
      'name' => $this->name,
      'address' => $this->address,
      'zip' => $this->zip,
      'phone' => $this->phone,
      'mPhone' => $this->mPhone,
      'email' => $this->email,
      'gender' => $this->gender,
      'obs' => $this->obs,
    ]);

    // Return success
    return true;
  }

  /**
   * Static method to get all clients in the DB
   *
   * @param string $where
   * @param string $order
   * @param string $limit
   * @return array
   */
  public static function getClients($where = null, $order = null, $limit = null) {
    return (new Database('cliente'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
  }

  /**
   * Static method to get one single client base on his id
   *
   * @param integer $id
   * @return Client
   */
  public static function getClient($id){
    return (new Database('cliente'))->select('id = '.$id)->fetchObject(self::class);
  }

  /**
   * Method responsable for update a client instance in the DB
   *
   * @return boolean
   */
  public function update(){
    return (new Database('cliente'))->update('id = '.$this->id, [
      'name' => $this->name,
      'address' => $this->address,
      'zip' => $this->zip,
      'phone' => $this->phone,
      'mPhone' => $this->mPhone,
      'email' => $this->email,
      'gender' => $this->gender,
      'obs' => $this->obs,
    ]);
  }

  /**
   * Method responsable for exclude de Client
   * @return boolean
   */
  public function delete(){
    return (new Database('cliente'))->delete('id = '.$this->id);
  }
}