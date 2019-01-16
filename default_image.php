<?php
  
ini_set('display_errors', 'On');
error_reporting(E_ALL);

include('een.php');

$een = new EagleEyeNetworks();

if(isset($_GET['c'])) {
        if(file_exists("/tmp/$_GET['c']")) {
                echo file_get_contents("/tmp/$_GET['c']");
        } else {
                $een->image($_GET['c']);
        }
}
?>