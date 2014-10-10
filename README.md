MSCA
====

This is a quick php project to help fix authentication issues with oracle MSCA/MWA

in the 11 version of MSCA, theres a problem where after the telnet listeners go over a certain number of connections
(oracle recommends no more than 10), the telnet daemon becomes unstable, and returns errors when trying to login
to fix this issue, I wrote this program.

this is for use with an external load balancer, if your using the one that comes with msca, this won't work for you.

This will allow a group of telnet daemons to be active at one time while not killing any connections to the ones
that are inactive. you must offload the connection from the loadbalancer

installation:
extract the files to your webserver
modify the config.inc.php file to suite your environment.
setup your loadbalancer to check http://webname.com/MSCA.php?server=<server>&port=<port>
setup ssh keys for passwordless login from your webserver to your msca server
copy the mwa_ctrl.sh and mwa.env files to your msca server
modify the mwa.env to suite your environment.

usage:
to switch groups setup a crontab to run "php MSCA.php -aR -g#" where -aR is action restart and -g# is the group number to make active


Like I said this was pretty quick and dirty, and could use alot of cleanup. hopefully I'll be able to do that in the near
future, before we upgrade and this problem just goes away naturally.
-

