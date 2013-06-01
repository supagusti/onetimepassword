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
        
            $logon_ergebnis = mysql_query("SELECT lfdnr,user,domain,email,seed,period,digits,algorithm,encodedsecret,password FROM users WHERE user='$USER' AND password='$PASS'") or die( 'Error[SELECT|User]: <br />
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
                                echo $userObj->user;
                                echo "</BR>";
                                echo $userObj->domain;
                                echo "</BR>";
                                echo $userObj->email;
                                echo "</BR>";
                              
                                echo $userObj->lfdnr;
                                echo "</BR>";
                                echo $userObj->seed;
                                echo "</BR>";
                                echo $userObj->encodedsecret;
                                echo "</BR>";
*/                                
                                
                                // Initial Settings
                                $MY_SECRET=$userObj->seed;
                                
                                // Determine the time window
                                $time_window = $period;

                                // Get the exact time from the server
                                $exact_time = microtime(true);

                                // Round the time down to the time window
                                $rounded_time = floor($exact_time/$time_window);

                                // Generate TOTP
                                $totp_generated=oauth_totp($MY_SECRET, $rounded_time, $digits, $algorithm);
                                echo '<p>You can now verify this TOTP code with the output of '; 
                                echo '<a href="https://itunes.apple.com/us/app/google-authenticator/id388497605?mt=8">Google Authenticator App</a> or with the output of ';
                                echo '<a href="https://www.hde.co.jp/otp/en/">HDE OTP Generator</a></p>';
                                
                                
                                echo '<p style="text-decoration:underline;">Time-based One-time Password:</p>';
                                echo "<h1>".$totp_generated."</h2>";
                              } 
        }
?>
</BR>
<a href="index.php">Return to main screen</a>