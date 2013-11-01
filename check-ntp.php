<h1>Checking for ntp servers...</h1>
<?php
//--------------------------------------------------------------------------------------   
//Source: http://www.xenocafe.com/tutorials/php/ntp_time_synchronization/index.php
//Written by Tony Bhimani
//April 10, 2006
///Mod by Supagusti 2013
//--------------------------------------------------------------------------------------

  // ntp time servers to contact
  // we try them one at a time if the previous failed (failover)
  
  $time_servers = array("3.at.pool.ntp.org",
                        "nist1.datum.com",
                        "3.pool.ntp.org",
                        "time.nist.gov",
                        "time-a.timefreq.bldrdoc.gov",
                        "utcnist.colorado.edu",
                        "time.windows.com");

  // a flag and number of servers
  $valid_response = false;
  $ts_count = sizeof($time_servers);

  for ($i=0; $i<$ts_count; $i++) {
    $time_server = $time_servers[$i];
    //@-sign to supress errors!  
    @$fp = fsockopen($time_server, 37, $errno, $errstr, 30);
    if (!$fp) {
      echo "$time_server: $errstr ($errno)<br>";
      echo "Trying next available server...<br><br>";
    } else {
      $data = NULL;
      while (!feof($fp)) {
        $data .= fgets($fp, 128);
      }
      fclose($fp);

      // we have a response...is it valid? (4 char string -> 32 bits)
      if (strlen($data) != 4) {
        echo "NTP Server {$time_server} returned an invalid response.\n";
        if ($i != ($ts_count - 1)) {
          echo "Trying next available server...\n\n";
        } else {
          echo "Time server list exhausted\n";
        }
      } else {
        $valid_response = true;
        break;
      }
    }
  }

  if ($valid_response) {
    // time server response is a string - convert to numeric
    $NTPtime = ord($data{0})*pow(256, 3) + ord($data{1})*pow(256, 2) + ord($data{2})*256 + ord($data{3});

    // convert the seconds to the present date & time
    // 2840140800 = Thu, 1 Jan 2060 00:00:00 UTC
    // 631152000  = Mon, 1 Jan 1990 00:00:00 UTC
    $TimeFrom1990 = $NTPtime - 2840140800;
    $TimeNow = $TimeFrom1990 + 631152000;

    echo "<p>Current NTP time: ".date("D M j G:i:s T Y",$TimeNow);

  } else {
    echo "<p>The system time could not be updated. No time servers available.";
  }
  
$exact_time = microtime(true);
echo "<br>Current server's time: ".date("D M j G:i:s T Y",$exact_time)."</p>";

?>

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