<?php
include 'include/phpqrcode.php';
echo "<h1>DEMO - RFC 6238 for Time-Based One-Time Passwords </h1>";
$exact_time = microtime(true);
echo '<p>Current server\'s time: '.date("D M j G:i:s T Y",$exact_time).' <a href="check-ntp.php">check time</a></p>';
QRcode::png("generate a unique QR code with your own TOTP seed!", 'tmp/qrcode.png');
?>

<p>This websites demonstrates an implementation of the RFC 6238 for time-based one-time passwords. You can check your generated TOTP with the 
    <a href="https://itunes.apple.com/us/app/google-authenticator/id388497605?mt=8">Google Authenticator App</a> or with 
    <a href="https://www.hde.co.jp/otp/en/">HDE OTP Generator</a>
</p>

<a href="signup.php">Signup and create your own TOTP Seed</a>    
</BR>
<a href="qrgen.php">Recreate the QR-code (if you missed it before)</a>    
</BR>
<a href="totp.php">Display your unique time-based one-time password</a>    
</BR>
<a href="login.php">See the login demo implementation</a>    
</BR>
</BR>
<?php
echo '<img src="tmp/qrcode.png" alt="QR-Code missing :-(">';
?>
</BR>
<a href="qrcode.php">Generate a QR Code with free text</a>    
</BR>
</BR>
<p>
    Check out the <a href="https://support.google.com/accounts/answer/1066447">Google Authenticator Documentation</a> for more information</br>
    You can also read <a href="http://www.supagusti.tk/coding/totp/155-demo-rfc-6238-for-time-based-one-time-passwords-with-qr-code-generation" target="_blank">this</a> artice on <a href='http://www.supagusti.tk' target='_blank'>my blog</a> to get more information.
</p>
<h3>Credits</h3>
<a href='https://github.com/NTICompass/PHP-Base32'>BASE32 Implementation in PHP by NTICompass/Eric Siegel aka Rocket Hazmat<a></br>
<a href='http://phpqrcode.sourceforge.net/'>QR-code generator in PHP by deltalab/Dominik Dzienia<a></br>
<a href='http://php.net/manual/en/function.hash-hmac.php'>A function implementing the algorithm outlined in RFC 6238 by Pete Walker <a></br>
<a href='http://www.xenocafe.com/tutorials/php/ntp_time_synchronization/index.php'>NTP Time Synchronization Script by Tony Bhimani</a>

<?php include 'include/counter.php'; ?>
<p>See even more interesting stuff on <a href='http://www.supagusti.tk/'>www.supagusti.tk<a></br>
Get the source code on <a href='https://github.com/supagusti/onetimepassword/'>Github<a></p></br>            

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
<iframe src="http://rcm-de.amazon.de/e/cm?t=supagusti-21&o=3&p=48&l=ur1&category=computer&banner=160GN795Y7B8SC5D9202&f=ifr" width="728" height="90" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>