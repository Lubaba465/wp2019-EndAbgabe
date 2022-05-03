<?php
// display all error except deprecated and notice
error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );
// turn on output buffering 
ob_start();

require_once("constants.php");
require_once("webroot/libs/common_functions.php");
require_once ($_SERVER['DOCUMENT_ROOT']."/wp2019EndAbgabe/database/dbconfig.php");
require_once ("webroot/usermodul.php");


// set currentPage in the local scope
$currentPage = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);


?>