<?php

// SIGNUP - FORM

?>
<h1>Signup</h1>
<p>Please see <a href="http://code.google.com/p/google-authenticator/wiki/KeyUriFormat" target="_blank">this</a> documentation for proper field desciptions.</p>
<form action="signup-post.php" method="post" name="loginform">
    <table>
        <tr>
            <td>username</td>
            <td><input type="text" maxlength="40"  name="username" /></td>
            <td>(must be unique within this system)<td>
        </tr>
        <tr>
            <td>password</td>
            <td><input type="password" maxlength="40"  name="password" /></td>
            <td>(must not be empty)<td>
        </tr>
        <tr>
            <td>retype password</td>
            <td><input type="password" maxlength="40"  name="retypepassword" /></td>
            <td>(must be equal to password field above)<td>
        </tr>
        <tr>
            <td>domain</td>
            <td><input type="text" maxlength="40"  name="domain" /></td>
            <td>(used to identify which account a key is associated with)<td>
        </tr>
        <tr>
            <td>email</td>
            <td><input type="text" maxlength="40"  name="email" /></td>
            <td>(will not be checked, if valid...)<td>
        </tr>
        <tr>
            <td>seed</td>
            <td><input type="text" maxlength="40"  name="seed" /></td>
            <td>(the TOTP will be generated out of this, the longer the better!)</td>
        </tr>
        <tr>
            <td>seedhex</td>
            <td><input type="checkbox" maxlength="40" value="seedhex" name="seedhex" /></td>
            <td>(tick this, if the seed value is a hex value!)</td>
        </tr>
        <tr>
            <td>period</td>
            <td>
                <input type="text"  maxlength="4" value="30" name="period" />
            </td>
            <td>(in seconds, either 30s or 60s are supported)</td>
        </tr>
                <tr>
            <td>trim</td>
            <td>
                <input type="text"  maxlength="4" value="0" name="trim" />
            </td>
            <td>(in seconds, to correct problems with your server time.)</td>
        </tr>
        <tr>
            <td>digits</td>
            <td>
                <select name="digits"  type="hidden" id="digits" value="6" >
                    <option value="6">6</option>
                    <option value="8">8</option>
                    <!-- <input type="hidden" name="digits" value="6"/> -->
                </select>            
            </td>
        </tr>
        <tr>
            <td>algorithm</td>
            <td>
                <select name="algorithm"  type="hidden" id="algorithm" value="SHA1" >
                    <option value="SHA1">SHA1</option>
                    <option value="SHA256">SHA256</option>
                    <option value="SHA512">SHA512</option>
                    <option value="MD5">MD5</option>
                </select>            
                <!-- <input type="hidden" name="algorithm" value="SHA1"/> -->
            </td>
        </tr>
    </table>
    </BR>
    <input type="submit" VALUE=" Submit " name="submitbutton"/> 
</form>    
<h2>Additional fields</h2>
Some features defined in the RFC are not used yet in Google Autheticator.
<h3>Algorithm</h3>
OPTIONAL: The algorithm may have the values:</BR>
</BR>
    SHA1 (Default)</BR>
    SHA256</BR>
    SHA512</BR>
    MD5 </BR>
<h3>Digits</h3>
OPTIONAL: The digits parameter may have the values 6 or 8, and determines how long of a one-time passcode to display to the user. The default is 6.</BR>
<h3>Period</h3>
Defines a period that a TOTP code will be valid for, in seconds. The default value is 30.</BR>
The period parameter is no longer ignored by the Google Authenticator implementations. </BR>
<h3>Trim</h3>
This value is for "trimming" the time of the server. It can be positive or negative and is used if you can't change the server's time settings.
</BR>

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