<?php
include 'include/phpqrcode.php';
// Generate QR Code
// QRcode::png('some othertext 1234'); // creates code image and outputs it directly into browser
//NEIN => $QRTEXT="otpauth://totp/thomas@test.com?secret=GEZDGNBVGY3TQOJQ&period=30&digits=6&algorithm=sha1";
//JA ===> $QRTEXT="otpauth://totp/thomas@test.com?secret=GEZDGNBVGY3TQOJQ";
$QRTEXT="otpauth://totp/thomas@test.com?secret=GEZDGNBVGY3TQOJQ&period=30&digits=6&algorithm=SHA256";
QRcode::png($QRTEXT, 'tmp/qrcode.png');

echo "QRTEXT=".$QRTEXT;
echo "</BR>";
echo "</BR>";
echo '<img src="tmp/qrcode.png" alt="QR-Code missing :-(">';
?>
