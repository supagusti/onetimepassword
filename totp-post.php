<?php

include("dbconnect.php");
include 'include/oauth_totp.php';


$USER =trim(strtolower($_POST['username']));
$PASS=trim($_POST['password']);

 if(( isset($_POST['username'], $_POST['password'])
    AND
    strcmp(trim($_POST['username']),'') != 0
    AND
    strcmp(trim($_POST['password']),'') != 0 ) )

	{
        
            $logon_ergebnis = mysql_query("SELECT lfdnr,user,domain,email,seed,period,trim,digits,algorithm,encodedsecret,password FROM users WHERE user='$USER' AND password='$PASS'") or die( 'Error[SELECT|User]: <br />
																	   <pre>' . $sql . '</pre>
																	   <br />
																	   MySQL-Error: ' . mysql_error() );     

                                                                                                                                           
            if( mysql_num_rows($logon_ergebnis) != 1 ) 
                            {
                                echo "ERROR";              
                                exit();
                             } 
			else {
                                $userObj = mysql_fetch_object($logon_ergebnis);
                                
                                $digits=$userObj->digits;
                                $algorithm=$userObj->algorithm;
                                $period=$userObj->period;
 /*                                
                                echo "User:".$userObj->user;
                                echo "</BR>";
                                echo "Domain:".$userObj->domain;
                                echo "</BR>";
                                echo "eMail:".$userObj->email;
                                echo "</BR>";
                              
                                echo "Period:".$period;
                                echo "</BR>";
                                echo $userObj->seed;
                                echo "</BR>";
                                echo $userObj->encodedsecret;
                                echo "</BR>";
 */
                                // Initial Settings - Seed
                                $MY_SECRET=$userObj->seed;
                                
                                // Initial Settings - Trim Time
                                $trim=$userObj->trim;
                                
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
                                echo '<p>You can now verify this TOTP code with the output of '; 
                                echo '<a href="https://itunes.apple.com/us/app/google-authenticator/id388497605?mt=8">Google Authenticator App</a> or with the output of ';
                                echo '<a href="https://www.hde.co.jp/otp/en/">HDE OTP Generator</a></p>';
                                
                                
                                echo '<p style="text-decoration:underline;">Time-based One-time Password:</p>';
                                echo "<h1>".$totp_generated."</h1>";
                                echo "time to expire: ".$time_to_expire."s <br>";
                              } 
        }
?>
</BR>
<a href="index.php">Return to main screen</a>