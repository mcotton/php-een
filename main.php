<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

include('een.php');

$een = new EagleEyeNetworks();

$username = '<username';
$password = '<password>';

$user_obj = $een->login($username, $password);
$user_devices = $een->list_devices();

print('<h1>User Object</h1>');
print('<ul>');
foreach($user_obj as $name => $value) {
        print('<li>'.$name.': '.$value.'</li>');
}
print('</ul>');

print('<h1>User Layouts</h1>');
print('<ul>');
foreach($user_obj->layouts as $name => $value) {
        print('<li>'.$name.': '.$value.'</li>');
}
print('</ul>');

print('<h1>User Devices</h1>');
print($user_devices);


print('<h1>Image Calls</h1>');
print('<img src="image.php?c=100aa8ae">');
?>

