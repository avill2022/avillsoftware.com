<?php
  header('Content-Type: application/json');
  $response=array('status' => 'OK');

  session_start();   
  
  unset($_SESSION['user_id']);
  unset($_SESSION['email']);

  session_destroy(); // Destroy the session

  echo json_encode($response);
?>