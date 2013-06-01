<?php

// Login-FORM

?>
<h1>Login /w Time-based One Time Password</h1>
<p>Try to login with your credentials and the TOTP output of the
    <a href="https://itunes.apple.com/us/app/google-authenticator/id388497605?mt=8">Google Authenticator App</a> or of 
    <a href="https://www.hde.co.jp/otp/en/">HDE OTP Generator</a> to see if it works correcty. If the TOTP you typed in is wrong, the right one is displayed.</BR>
    If you don't have a user/password yet, please use the <a href='signup.php'>signup-form.</a>
<form action="login-post.php" method="post" name="loginform">
    <table>
        <tr>
            <td>username</td>
            <td><input type="text" maxlength="40"  name="username" /></td>
        </tr>
        <tr>
            <td>password</td>
            <td><input type="password" maxlength="40"  name="password" /></td>
        </tr>
        <tr>
            <td>totp</td>
            <td><input type="password" maxlength="40"  name="totp" /></td>
        </tr>
    </table>
    </BR>
    <input type="submit" VALUE=" Submit " name="submitbutton"/> 
</form>    
</BR>
<a href="index.php">Return to main screen</a>
</BR>
<iframe src="http://rcm-de.amazon.de/e/cm?t=supagusti-21&o=3&p=48&l=ur1&category=computer&banner=160GN795Y7B8SC5D9202&f=ifr" width="728" height="90" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>