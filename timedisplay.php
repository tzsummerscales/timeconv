<html>
   <head>
	<title>Time Display</title>
   </head>
   <body>
    
    <table width=100%>
    <tr>
    <td width=20%><a href="http://www.ligo.caltech.edu">
    <img src="../detchar/LIGOLogo.gif" border="0"></a></td>
    <td><center><h2><font face="arial">GPS Time Converter</font></center>
    </h2></td>
    <td width=20%><right><a href="http://www.andrews.edu">
    <img align="right" src="../detchar/aubullet.gif" border="0"></right></td>
    </tr>
    </table>

    <hr width = "100%"> 

    <h3><center>Time Conversion Results</center></h3>

<?php

// Define leap seconds
   function getleaps() {
      $leaps = array(46828800, 78364801, 109900802, 173059203, 252028804, 315187205, 346723206, 393984007, 425520008, 457056009, 504489610, 551750411, 599184012, 820108813, 914803214, 1025136015, 1119744016, 1167264017);
      return $leaps;
   } 

// Test to see if a gps second is a leap second
   function isleap($gpsTime) {
      $isLeap = FALSE;
      $leaps = getleaps();
      $lenLeaps = count($leaps);
      for ($i = 0; $i < $lenLeaps; $i++) {
         if ($gpsTime == $leaps[$i]) {
            $isLeap = TRUE;
         }
      }
      return $isLeap;
   }
 
// Count number of leap seconds that have passed
   function countleaps($gpsTime, $dirFlag){
      $leaps = getleaps();
      $lenLeaps = count($leaps);
      $nleaps = 0;  // number of leap seconds prior to gpsTime
      for ($i = 0; $i < $lenLeaps; $i++) {
         if (!strcmp('unix2gps', $dirFlag)) {
	    if ($gpsTime >= $leaps[$i] - $i) {
               $nleaps++;
            }
         } elseif (!strcmp('gps2unix', $dirFlag)) {
            if ($gpsTime >= $leaps[$i]) {
               $nleaps++;
            }
         } else {
            echo "ERROR Invalid Flag!";
         }
      }
      return $nleaps;
   }


// Convert Unix Time to GPS Time 
   function unix2gps($unixTime){
      // Add offset in seconds
      if (fmod($unixTime, 1) != 0) {
         $unixTime = $unixTime - 0.5;
	 $isLeap = 1;
      } else { 
         $isLeap = 0;
      }
      $gpsTime = $unixTime - 315964800;
      $nleaps = countleaps($gpsTime, 'unix2gps');
      $gpsTime = $gpsTime + $nleaps + $isLeap;
      return $gpsTime;
   }

// Convert GPS Time to Unix Time
   function gps2unix($gpsTime){
     // Add offset in seconds
     $unixTime = $gpsTime + 315964800;
     $nleaps = countleaps($gpsTime, 'gps2unix');
     $unixTime = $unixTime - $nleaps;
     if (isleap($gpsTime)) {
        $unixTime = $unixTime + 0.5;
     }
     return $unixTime;
   }

// Output a Unix Time in different timezones 
   function outputTime($unixTime, $gpsTime){
      echo "<table border=1 cellpadding = 2, cellspacing = 2><tr>";
      echo "<td>UTC</td><td>".gmstrftime("%b %d, %Y", $unixTime);
      echo "</td><td>";
      if (isleap($gpsTime)) {
         echo gmstrftime("%H:%M", $unixTime-1);
         echo ":60";
      } else {
         echo gmstrftime("%H:%M:%S", $unixTime);
      }
      echo "</td><td>UTC";
      putenv("TZ=US/Central");
      echo "</td></tr><tr>";
      echo "<td>Central</td><td>".strftime("%b %d, %Y", $unixTime);
      echo "</td><td>";
      if (isleap($gpsTime)) {
	 echo strftime("%H:%M", $unixTime-1);
         echo ":60";
      } else {
         echo strftime("%H:%M:%S", $unixTime);
      }
      echo "</td><td>".strftime("%Z", $unixTime);
      putenv("TZ=US/Pacific");
      echo "</td></tr><tr>";
      echo "<td>Pacific</td><td>".strftime("%b %d, %Y", $unixTime);
      echo "</td><td>";
      if (isleap($gpsTime)) {
         echo strftime("%H:%M", $unixTime-1);
	 echo ":60";
      } else {
         echo strftime("%H:%M:%S", $unixTime);
      }
      echo "</td><td>".strftime("%Z", $unixTime);
      echo "</td></tr></table>";
   }

// Convert a human-formatted time to unix time 
   function time2unix($month, $day, $year, $hour, $min, $sec, $zone){   
      $monthn = monthnum($month);
      if ($sec == 60) {
          $isLeap = TRUE;
          $sec = $sec - 1;
      } else {
          $isLeap = FALSE;
      }
      if (!strcmp("UTC", $zone)) {
          $unixTime = gmmktime($hour, $min, $sec, $monthn, $day, $year);
      } elseif (!strcmp("Central", $zone)) {
          putenv("TZ=US/Central");
          $unixTime = mktime($hour, $min, $sec, $monthn, $day, $year);
      } elseif (!strcmp("Pacific", $zone)) {
          putenv("TZ=US/Pacific");
          $unixTime = mktime($hour, $min, $sec, $monthn, $day, $year);
      } else {
	  echo "ERROR: Invalid Time Zone! \n";
      }
      if ($isLeap) {
          $unixTime = $unixTime + .5;
      } 
      return $unixTime;
   }

   function monthnum($month) {
      if (!strcmp("Jan", $month)) {
         $monthn = 1;
      } elseif (!strcmp("Feb", $month)) {
         $monthn = 2;
      } elseif (!strcmp("Mar", $month)) {
         $monthn = 3;
      } elseif (!strcmp("Apr", $month)) {
         $monthn = 4;
      } elseif (!strcmp("May", $month)) {
         $monthn = 5;
      } elseif (!strcmp("Jun", $month)) {
         $monthn = 6;
      } elseif (!strcmp("Jul", $month)) {
         $monthn = 7;
      } elseif (!strcmp("Aug", $month)) {
         $monthn = 8;
      } elseif (!strcmp("Sep", $month)) {
         $monthn = 9;
      } elseif (!strcmp("Oct", $month)) {
         $monthn = 10;
      } elseif (!strcmp("Nov", $month)) {
         $monthn = 11;
      } elseif (!strcmp("Dec", $month)) {
         $monthn = 12;
      } else {
         echo "ERROR: Invalid month! \n";
      }
      return $monthn;
}

?>

<p> <?php 
	if (!strcmp("time", $_POST['timevsgps'])) {
	    $hour = $_POST['hour'];
            if (!strcmp("pm", $_POST['type']) && $hour<12){
                $hour = $hour + 12;
            } elseif (!strcmp("am", $_POST['type']) && $hour==12){
                $hour = 0;
            }
            $month = $_POST['month']; 
	    $day = $_POST['day'];
	    $year = $_POST['year'];
	    $min = $_POST['min']; 
	    $sec = $_POST['sec']; 
	    $zone = $_POST['zone'];
 	    $unixTime = time2unix($month, $day, $year, $hour, $min, $sec, $zone);
	    $gpsTime = unix2gps($unixTime); 	
	} elseif (!strcmp("gps", $_POST['timevsgps'])) {
	    $gpsTime = $_POST['gps'];
	    $unixTime = gps2unix($gpsTime); 
	} else {
            $unixTime = time();
            $gpsTime = unix2gps($unixTime);
        }

 	echo "<center>";
        echo "Unix Time = ".$unixTime."<br><br>";
	outputTime($unixTime, $gpsTime);
	echo '<br> GPS Time = ';
	echo $gpsTime;
	echo "</center>";
?> </p>

<p><center>
<form method="link" action="timeconvert.php">
<input type="submit" value="Convert New Time">
</form>
</center></p>

</body>
</html>
