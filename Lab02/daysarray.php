<?php
  $days = array(
  "Monday",
  "Tuesday",
  "Wednesday",
  "Thursday",
  "Friday",
  "Saturday",
  "Sunday"
  );
  
  echo "<p>The days of the week are: ,</p>";
  echo "<p>",$days[0],",",$days[1],",",$days[2],",",$days[3],",",$days[4],",",$days[5],",",$days[6],"</p>";
  
  $days[0] = 'Lundi';
  $days[1] = 'Mardi';
  $days[2] = 'Mercredi';
  $days[3] = 'Jeudi';
  $days[4] = 'Vendredi';
  $days[5] = 'Samedi';
  $days[6] = 'Dimanchi';
  echo "<p>The days of the week in French are: ,</p>";
  echo "<p>",$days[0],",",$days[1],",",$days[2],",",$days[3],",",$days[4],",",$days[5],",",$days[6],"</p>";

?>
