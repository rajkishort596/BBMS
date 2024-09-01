 <?php
  session_start();

  // Include the database connection
  // include('db.php'); //relative path
  include(dirname(__DIR__) . '/config/db.php'); //absolute path

  // Include the AuthController

  // include('../controllers/AuthController.php');//relative path
  include(dirname(__DIR__) . '/controllers/AuthController.php'); //absolute path
  ?>