<?php

  function cycle_msca() {
    include('config.inc.php');
    // make ssh connection 
      //check if file exits
      if (!(file_exists($control_file))) {
        //if file doesn't exist, create it and allow group 1 to be on
        $file_handle = fopen($control_file, 'w+');
        fwrite($file_handle, '1');
        fclose($file_handle);
      }
      
      if ($GLOBALS['groupswitch'] == 1) {
        // make group 1 active
        foreach($port_group_1 as $i) {
          foreach($servers as $serverToSwitch) {
              $connection = ssh2_connect($serverToSwitch, 22);
              if (ssh2_auth_pubkey_file($connection, $msca_username,
                          $public_key,
                          $private_key, $key_pass)) {

              ssh2_exec($connection, "$mwa_ctrl stop $i");
              print("stoped $serverToSwitch port $i\n");
              ssh2_exec($connection, "$mwa_ctrl start $i");
              print("started $serverToSwitch port $i\n");
            }
            else {
              print("Failed to connect to ssh server $serverToSwitch");
            }
          }
          $file_handle = fopen($control_file, 'w+');
          fwrite($file_handle, '1');
          fclose($file_handle);
        }
        
      }
      
      if ($GLOBALS['groupswitch'] == 2) {
        // make group 2 active
        foreach($port_group_2 as $i) {
          foreach($servers as $serverToSwitch) {
              $connection = ssh2_connect($serverToSwitch, 22);
              if (ssh2_auth_pubkey_file($connection, $msca_username,
                          $public_key,
                          $private_key, $key_pass)) {
              ssh2_exec($connection, "$mwa_ctrl stop $i\n");
              print("stoped $serverToSwitch port $i\n");
              ssh2_exec($connection, "$mwa_ctrl start $i\n");
              print("started $serverToSwitch port $i\n");
            }
            else {
              print("Failed to connect to ssh server $serverToSwitch");
            }
          $file_handle = fopen($control_file, 'w+');
          fwrite($file_handle, '2');
          fclose($file_handle);
        }
      }
    }
  }
  
  function check_schedule($check_port) {
    include('config.inc.php');
    $file_handle = fopen($control_file, 'r');
    $active_group = fread($file_handle, 1);
    if ($active_group == 1)
    {
      //group 1 is active, if port is in group 1 return true, else return false
      foreach($port_group_1 as $i) {
        if($i == $check_port) {
          return true;
        }
      }
      return false;
    }
    
    if($active_group == 2) {
      // group 2 is active if port is in group 2 return true, else return false
      foreach($port_group_2 as $i) {
        if($i == $check_port) {
          return true;
        }
      }
      return false;
    }
  }

?>