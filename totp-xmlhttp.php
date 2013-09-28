<?php

include 'include/oauth_totp.php';

    session_start();
    if( !$_SESSION['loggedIn'] ) 
        {
        echo 'error'; 
        exit();
        }
        

$digits=$_SESSION['digits'];
$algorithm=$_SESSION['algorithm'];
$period= $_SESSION['period'];

// Initial Settings - Seed
$MY_SECRET=$_SESSION['seed'];

// Initial Settings - Trim Time
$trim=$_SESSION['trim'];

// Determine the time window
$time_window = $period;
//echo "TimeWindow:".$time_window."<br>";

// Get the exact time from the server
$exact_time = microtime(true)+$trim;
//echo "exact_time:".$exact_time".<br>";

// Round the time down to the time window
$rounded_time = floor($exact_time/$time_window);
//echo "rounded time:".$rounded_time."<br>";

// Seconds until key expires
$str_time_to_expire = $exact_time/$time_window;
$array_time_to_expire= explode(".", $str_time_to_expire);
$erg_time_to_expire="0.".$array_time_to_expire[1];
$time_to_expire=$time_window-floor($erg_time_to_expire*$time_window);

// Generate TOTP
$totp_generated=oauth_totp($MY_SECRET, $rounded_time, $digits, $algorithm);

echo '<h1>'.$totp_generated."</h1>";
echo "time to expire: ".$time_to_expire."s";

?>
