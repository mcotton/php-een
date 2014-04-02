<?php

#ini_set('display_errors', 'On');
#error_reporting(E_ALL);

include('een.php');

$een = new EagleEyeNetworks();

#$username = '<username>';
#$password = '<password>';

#$user_obj = $een->login($username, $password);
if(isset($_GET['c'])) $een->image($_GET['c']);

?>

