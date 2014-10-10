<?php
 
 
  if (PHP_SAPI === 'cli') {
    // handle command line options
    // a = action
    // g = groupswitch - group to be turned on, other group will be turned off
    $options = getopt("a::g::");

    if (isset($options['a'])) {
      $_GET['action'] = $options['a'];
    }
  
    if (isset($options['g'])) {
      $_GET['groupswitch'] = $options['g'];
    }
  }

  // return status of a telnet listener
  
  // include config file 
  require_once("config.inc.php");
  require_once("check_variables.php");
  require_once("get_variables.php");
  require_once("control.php");
  
    
  
  // process all get variables
  get_variables();
  
  // check to make sure appropriate variables are set correctly
  check_variables();
  
  
  if ($GLOBALS['action'] == 'R') {
  	// restart the system
  	cycle_msca();
  }
  
  
  if ($GLOBALS['action'] == '') {
  
    if (check_schedule($port_to_check) == true) {
      // now we have a server and port, lets find the status return 1 for up 0 for down
      $socket = fsockopen( $server, $port_to_check, $errno, $errstr, $timeout);
      $online = ( $socket != false );
  
      if($online == true){
  	    print("<html><body>1</body></html>");
      }
      else {
  	    print("<html><body>0</body></html>");
      }
    }
    else {
      print("<html><body>0</body></html>");
    }
  }
  
  

?>

  
  