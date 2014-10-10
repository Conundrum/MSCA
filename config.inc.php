<?php
  
  // port group 1, these ports should always have the same status (up or down)
  $port_group_1 = array(
  	"port1" => 2222,
    "port2" => 2224,
  	"port3" => 2226,
  	"port4" => 2228,
  	"port5" => 2230,
  );
  
  // port group 2, these port should always have the oposite status as port group 1
  $port_group_2 = array(
  	"port1" => 2232,
  	"port2" => 2234,
  	"port3" => 2236,
  	"port4" => 2238,
  	"port5" => 2240,
  );
  
  // servers to connect to, add as many as needed
  $servers = array(
  	"server1" => "server1",
  	"server2" => "server2"
  );
  
  // ssh port number
  $ssh_port = 22;
  
  //port timeout
  $timeout = 10;
  
  //File to keep track of group states
  $control_file = "/var/www/html/MSCA/control.txt";
  
  //location of public key file
  $public_key = "/var/www/html/MSCA/MSCA_appltst.pub";
  
  //location of private key file
  $private_key = "/var/www/html/MSCA/MSCA_appltst";
  
  //password for key file
  $key_pass = "";
  
  //ssh username to restart msca
  $msca_username = "appltst";
  
  //path to mwa_ctrl.sh script
  $mwa_ctrl = "/home/appltst/mwa_ctrl.sh";
  
?>