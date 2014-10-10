<?php

function get_variables() {
  global $action, $server, $system, $port_to_check, $groupswitch;
  
  // parse command line parameters into get variables if run from the CLI
  if (isset($argv[1])) {
    $_GET['action'] = $argv[1];
  }
  if (isset($argv[2])) {
    $_GET['groupswitch'] = $argv[2];
  }
  
  
  
	if (isset ( $_GET ['action'] )) {
		$action = strtoupper ( $_GET ['action'] );
	} else {
		$action = '';
	}
	
	// check get variables for system name, if exists assign to system
	if (isset ( $_GET ['system'] )) {
		$system = strtoupper ( $_GET ['system'] );
	} else {
		$system = '';
	}
	
	// check if server get variable exists, if so assign to server_to_check
	if (isset ( $_GET ['server'] )) {
		$server = $_GET ['server'];
	} else {
		$server = '';
	}
	
	// find get variable if it exists, and assign it to port_to_check
	if (isset ( $_GET ['port'] )) {
		$port_to_check = $_GET ['port'];
	} else {
		$port_to_check = '';
	}
 
  // return the number for the group to turn on 1 or 2 -- Must be used with action R
  if (isset($_GET['groupswitch'])) {
    $groupswitch = $_GET['groupswitch'];
  } else {
    $groupswitch = '';
  }
}

?>