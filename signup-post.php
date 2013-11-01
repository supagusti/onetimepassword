<?php

include 'include/base32.php';
include 'include/phpqrcode.php';
include 'include/seedhex.php';
include("dbconnect.php");


$USER =trim(strtolower($_POST['username']));
$PASS=trim($_POST['password']);
$PASS2=trim($_POST['retypepassword']);

$SEEDisHEX=trim($_POST['seedhex']);
if ($SEEDisHEX==="seedhex") 
    {
        $SEED=seedhex(trim($_POST['seed']));
        echo "You've selected that seed is a hex value!";
    } 
else 
    {
        $SEED=trim($_POST['seed']);
        echo "You've selected that seed is a char value!";
    }

$EMAIL=trim($_POST['email']);
$DOMAIN=trim($_POST['domain']);
$PERIOD=trim($_POST['period']);
$TRIM=trim($_POST['trim']);
$DIGITS=trim($_POST['digits']);
$ALGORITHM=trim($_POST['algorithm']);


// Überprüfen, ob das Formular abgeschickt wurde und ob alle Angaben gemacht wurden.
if( isset($USER, $PASS, $SEED, $EMAIL,$DOMAIN) && strcmp($USER,'') != 0 && strcmp($PASS,'') != 0 && strcmp($SEED,'') != 0 && strcmp($EMAIL,'') != 0 && strcmp($DOMAIN,'') != 0 && $PASS==$PASS2)
{
    
    // Initial Settings
    $MY_SITE_NAME=$DOMAIN.":".$USER."";

    // BASE32 ENCODING
    $base32obj = new Base32();
    $base32SECRET = $base32obj->base32_encode($SEED); 

    echo "<br />";

    mysql_select_db("supagustisql4", $con);

    $sql="INSERT INTO users (user,domain,email,seed,trim,period,digits,algorithm,encodedsecret,password) 
    VALUES 
    ('$USER','$DOMAIN','$EMAIL','$SEED','$TRIM','$PERIOD','$DIGITS','$ALGORITHM','$base32SECRET','$PASS') ";

    if (!mysql_query($sql,$con))
        {
                    die('Error: ' . mysql_error());
        }
    else 
        {
                
        // Generate QR Code
        // QRcode::png('some othertext 1234'); // creates code image and outputs it directly into browser
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
    

    mysql_close($con);
    
}
 else 
{
echo "Invalid Inputs - Go back an check again. Empty password?";    
}
?>
</BR>
<a href="index.php">Return to main screen</a>
</BR>
<iframe src="http://rcm-de.amazon.de/e/cm?t=supagusti-21&o=3&p=48&l=ur1&category=computer&banner=160GN795Y7B8SC5D9202&f=ifr" width="728" height="90" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>
<br>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- SACM_BANNER -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-6013764072977718"
     data-ad-slot="8698551187"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<br>
