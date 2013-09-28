


<script>
    
window.setInterval(function(){
  // call your function every 500ms
  showTOTP();
}, 500);


    
function showTOTP()
{

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("responseDiv").innerHTML=xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","totp-xmlhttp.php",true);
xmlhttp.send();
}


</script>

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
        
            $logon_ergebnis = mysql_query("SELECT lfdnr,user,domain,email,seed,period,trim,digits,algorithm,encodedsecret,password FROM users WHERE user='$USER' AND password='$PASS'") or 
                    die( 'Error[SELECT|User]: <br />
                           <pre>' . $sql . '</pre>
                           <br />
                           MySQL-Error: ' . mysql_error() );     

                                                                                                                                           
            if( mysql_num_rows($logon_ergebnis) != 1 ) 
                            {
                                echo "<h1>Login error</h1><br>";              
                             } 
			else {
                                session_start();
                                $userObj = mysql_fetch_object($logon_ergebnis);
                                $_SESSION['loggedIn'] = true;
                                $_SESSION['digits']=$userObj->digits;
                                $_SESSION['algorithm']=$userObj->algorithm;
                                $_SESSION['period']=$userObj->period;
                                $_SESSION['seed']=$userObj->seed;
                                $_SESSION['trim']=$userObj->trim;

                                echo '<p>You can now verify this TOTP code with the output of '; 
                                echo '<a href="https://itunes.apple.com/us/app/google-authenticator/id388497605?mt=8">Google Authenticator App</a> or with the output of ';
                                echo '<a href="https://www.hde.co.jp/otp/en/">HDE OTP Generator</a></p>';
                                
                                
                                echo '<p style="text-decoration:underline;">Time-based One-time Password:</p>';
                                echo '<div id="responseDiv">loading...</div><br>';
                              } 
        }
?>
<a href="index.php">Return to main screen</a>
</BR>
<iframe src="http://rcm-de.amazon.de/e/cm?t=supagusti-21&o=3&p=48&l=ur1&category=computer&banner=160GN795Y7B8SC5D9202&f=ifr" width="728" height="90" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>