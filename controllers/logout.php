<?php
//include init.php for SITEURL
include('../config/init.php');
//destroy the session
session_destroy();
//redirect to index.php page
header("Location: ../public/index.php");
