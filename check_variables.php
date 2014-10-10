<?php
function check_variables() {
  
	switch ($GLOBALS['action']) {
		case '' :
			die_server();
			die_port();
			break;
		
		case 'R' :
      die_groupswitch();
			break;
   
	}
}


function die_server() {
	// die if trying to check multiple servers
	if ($GLOBALS['server'] == '') {
		die ( "checking multiple servers is not currently supported" );
	}
}


function die_port() {
	// die if trying to check multiple ports
	if ($GLOBALS['port_to_check'] == '') {
		die ( "checking multiple ports is not currently supported" );
	}
}

function die_groupswitch() {
  if ($GLOBALS['groupswitch'] != '1' && $GLOBALS['groupswitch'] != 2) {
    die ("When action is Restart, you must specify a group to become active either 1 or 2");
  }
}
?>
  
  
  
  
  
  
  