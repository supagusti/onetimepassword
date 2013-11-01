<?php

include 'include/base32.php';
include 'include/phpqrcode.php';
include 'include/oauth_totp.php';


// Initial Settings
$MY_SECRET="ThisIsATestSample";
$MY_SITE_NAME="testapp";

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
<br>
<a href="index.php">Return to main screen</a>
</BR>
<iframe src="http://rcm-de.amazon.de/e/cm?t=supagusti-21&o=3&p=48&l=ur1&category=computer&banner=160GN795Y7B8SC5D9202&f=ifr" width="728" height="90" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>
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
