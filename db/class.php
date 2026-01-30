<?php
	error_reporting(-1);
	set_time_limit(0);
	ini_set('memory_limit','2048M');
	session_start();	
	$_SESSION['token']='ab12345gh';	
	require('db.php');

class theClass
{
  //class variables and other functions here
	
	//private $mysqli;
global $mysqli;
  function __construct($mysqli) { 
    $this->mysqli = $mysqli;
  }
  function runQuery()
  {
	
    $query = "SELECT `serial` FROM rangdhon_atcris_db.tree ";
    $stmt = $mysqli->prepare($query);
    stmt->execute();
    $stmt->bind_result($r);

    while($stmt->fetch())
    {
      echo $r . "<br>";
    }
  }
};