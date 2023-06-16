<?php
  require_once("../controllers/person.php");
  $email = $_POST['email'];
  $password = $_POST['password'];
  $person=new person;
  $rows=$person->login($email,$password);
  if (!empty($rows)) {
    $roleId=$rows[0]['roleid'];
    $response = array('success' => true, 'roleId' => $roleId);
  } else {
    $response = array('success' => false);
  }

  header('Content-Type: application/json');
  echo json_encode($response);
