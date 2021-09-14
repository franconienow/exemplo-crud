<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Client;

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
  header('location: index.php?status=error');
  exit;
}

$objClient = Client::getClient($_GET['id']);

if(!$objClient instanceof Client){
  header('location: index.php?status=error');
  exit;
}

// if(!$objClient instanceof Client){
//   header('location: index.php?status=error');
//   exit;
// }


if(isset($_POST['delete'])){
  $objClient->delete();

  header('location: index.php?status=success');
  exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/remove-confirmation.php';
include __DIR__ . '/includes/footer.php';