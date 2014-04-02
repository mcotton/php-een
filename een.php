<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

class EagleEyeNetworks{

        var $HOST = "https://api.eagleeyenetworks.com";
        var $cookie = '/tmp/cookie.txt';

        function __construct() {
                $current_session = session_id();
                if(empty($current_session)) session_start();
                #echo "SID: ".SID."<br>session_id(): ".session_id()."<br>COOKIE: ".$_COOKIE["PHPSESSID"];
                session_write_close();
        }

        function login($user, $pass, $realm='eagleeyenetworks') {
                // Step 1 of login process, get token
                $cr = curl_init($this->HOST.'/g/aaa/authenticate');
                $data = array(  'username' => $user,
                                'password' => $pass,
                                'realm' => $realm);

                curl_setopt($cr, CURLOPT_POST, true);
                curl_setopt($cr, CURLOPT_POSTFIELDS, $data);
                curl_setopt($cr, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($cr, CURLOPT_COOKIEJAR, $this->cookie);
                curl_setopt($cr, CURLOPT_COOKIEFILE, $this->cookie);

                $response = curl_exec($cr);
                $obj =  json_decode($response);
                $token = ($obj->{'token'});

                curl_close($cr);

                // Step 2 of login process, exchange token for cookie
                $data = array('token' => $token);

                $cr = curl_init($this->HOST.'/g/aaa/authorize');
                curl_setopt($cr, CURLOPT_POST, true);
                curl_setopt($cr, CURLOPT_POSTFIELDS, $data);
                curl_setopt($cr, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($cr, CURLOPT_COOKIEJAR, $this->cookie);
                curl_setopt($cr, CURLOPT_COOKIEFILE, $this->cookie);

                $user_object = curl_exec($cr);

                curl_close($cr);

                if(isset($user_object)) {
                        return json_decode($user_object);
                } else {
                        return json_decode("[]");
                }
        }

        function list_devices() {
                $cr = curl_init($this->HOST.'/g/list/devices');
                curl_setopt($cr, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($cr, CURLOPT_COOKIEJAR, $this->cookie);
                curl_setopt($cr, CURLOPT_COOKIEFILE, $this->cookie);

                $device_list = curl_exec($cr);
                curl_close($cr);

                if(isset($device_list)) {
                        return $device_list;
                } else {
                        return json_decode("[]");
                }
        }

}

?>
