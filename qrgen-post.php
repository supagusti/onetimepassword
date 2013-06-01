<?php

include("dbconnect.php");
include 'include/phpqrcode.php';


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
                                
                                $DOMAIN=$userObj->domain;
                                $USER=$userObj->user;
                                $base32SECRET=$userObj->encodedsecret;
                                $PERIOD=$userObj->period;
                                $DIGITS=$userObj->digits;
                                $ALGORITHM=$userObj->algorithm;
                                $MY_SITE_NAME=$DOMAIN.":".$USER."";
                                
                                $base32SECRET=str_replace("=", "", $base32SECRET);
                                $QRTEXT="otpauth://totp/".$MY_SITE_NAME."?secret=".$base32SECRET."&period=".$PERIOD."&digits=".$DIGITS."&algorithm=".$ALGORITHM;
                                QRcode::png($QRTEXT, 'tmp/qrcode.png');
                                echo '<p>You can scan this QR code now with the '; 
                                echo '<a href="https://itunes.apple.com/us/app/google-authenticator/id388497605?mt=8">Google Authenticator App</a> or with ';
                                echo '<a href="https://www.hde.co.jp/otp/en/">HDE OTP Generator</a></p>';
                                
                                echo "QRTEXT=".$QRTEXT;
                                echo "</BR>";
                                echo "</BR>";
                                echo '<img src="tmp/qrcode.png" alt="QR-Code missing :-(">';
                              } 
        }
        else
            
        {
        echo "Invalid Inputs - Go back an check again. Empty password?";    
        }
?>
</BR>
<a href="index.php">Return to main screen</a>