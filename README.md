####Introduction####

PHP wrapper for the [Eagle Eye Networks API](https://apidocs.eagleeyenetworks.com).  The wrapper itself is in `een.php` and you can find examples of using in the file `main.php`

####Getting Started####

    //create a new instance of the API
    $een = new EagleEyeNetworks();


    //supply your EEN credentials
    $username = '<username>';
    $password = '<password>';


    //pass your username/password into the login function and get your user object
    $user_obj = $een->login($username, $password);


    //now that you're logged-in you can get all your devices
    $user_devices = $een->list_devices();



####Requirements####

This was tested using PHP 5.3 and php_curl
