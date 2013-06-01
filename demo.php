<?php

include 'include/base32.php';
include 'include/phpqrcode.php';
include 'include/oauth_totp.php';


// Initial Settings
$MY_SECRET="ThisIsATestSample";
$MY_SITE_NAME="wheresmymoney.tk";

// Determine the time window
$time_window = 30;

// Get the exact time from the server
$exact_time = microtime(true);

// Round the time down to the time window
$rounded_time = floor($exact_time/$time_window);

// Generate TOTP
$totp_generated=oauth_totp($MY_SECRET, $rounded_time, $digits=6, $crypto='sha1');

// BASE32 ENCODING
$base32obj = new Base32();
$base32SECRET = $base32obj->base32_encode($MY_SECRET); 
//BASE32 DECODE would be: $string = $a->base32_decode('KRSXG5A='); // Test
  
// Generate QR Code
// QRcode::png('some othertext 1234'); // creates code image and outputs it directly into browser
$QRTEXT="otpauth://totp/".$MY_SITE_NAME."?secret=".$base32SECRET;
QRcode::png($QRTEXT, 'tmp/qrcode.png');


// Site Output for Demo
echo "<h1>DEMO - RFC 6238 for Time-Based One-Time Passwords </h1>";
echo "exact_time=".date("D M j G:i:s T Y",$exact_time);
echo "</BR>";
echo "TOTP(generated)=".$totp_generated;
echo "</BR></BR>";
echo "MY_SECRET=".$MY_SECRET;
echo "</BR>";
echo "base32(MY_SECRET)=".$base32SECRET;
echo "</BR>";  
echo "MY_SITE_NAME=".$MY_SITE_NAME;
echo "</BR>";
echo "QRTEXT=".$QRTEXT;
echo "</BR>";
echo "</BR>";
echo '<img src="tmp/qrcode.png" alt="QR-Code missing :-(">';


?>


