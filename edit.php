<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Client;

define('title', 'Atualizar');

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
  header('location: index.php?status=error');
  exit;
}

$objClient = Client::getClient($_GET['id']);

if(!$objClient instanceof Client){
  header('location: index.php?status=error');
  exit;
} 

if(isset($_POST['nameInput'],$_POST['addressInput'],$_POST['cepInput'],$_POST['telInput'],$_POST['celInput'],$_POST['sexoInput'],$_POST['emailInput'],$_POST['observationsInput'])) {
  $objClient->name = $_POST['nameInput'];
  $objClient->address = $_POST['addressInput'];
  $objClient->zip = $_POST['cepInput'];
  $objClient->phone = $_POST['telInput'];
  $objClient->mPhone = $_POST['celInput'];
  $objClient->gender = $_POST['sexoInput'];
  $objClient->email = $_POST['emailInput'];
  $objClient->obs = $_POST['observationsInput'];
  $objClient->update();

  header('location: index.php?status=success');
  exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/form.php';
include __DIR__ . '/includes/footer.php';