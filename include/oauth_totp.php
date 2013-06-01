
<?php


/**
 * This function implements the algorithm outlined
 * in RFC 6238 for Time-Based One-Time Passwords
 *
 * @link http://tools.ietf.org/html/rfc6238
 * @param string $key    the string to use for the HMAC key
 * @param mixed  $time   a value that reflects a time (unix
 *                       time in the example)
 * @param int    $digits the desired length of the OTP
 * @param string $crypto the desired HMAC crypto algorithm
 * @return string the generated OTP
 */


function oauth_totp($key, $time, $digits=8, $crypto='sha1')
{
    $digits = intval($digits);
    $result = null;
   
    // Convert counter to binary (64-bit)      
    $data = pack('NNC*', $time >> 32, $time & 0xFFFFFFFF);
   
    // Pad to 8 chars (if necessary)
    if (strlen ($data) < 8) {
        $data = str_pad($data, 8, chr(0), STR_PAD_LEFT);
    }       
   
    // Get the hash
    $hash = hash_hmac($crypto, $data, $key);
   
    // Grab the offset
    $offset = 2 * hexdec(substr($hash, strlen($hash) - 1, 1));
   
    // Grab the portion we're interested in
    $binary = hexdec(substr($hash, $offset, 8)) & 0x7fffffff;
   
    // Modulus
    $result = $binary % pow(10, $digits);
   
    // Pad (if necessary)
    $result = str_pad($result, $digits, "0", STR_PAD_LEFT);
   
    return $result;
}

?>
