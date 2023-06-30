<?php
date_default_timezone_set("Europe/Bratislava"); 
print 'Ahoj <br>';
$date = date('d/m/Y');
$time = date('H:i:s');
$date_time = $date . " | " . $time;
print 'Teraz je ' . $time . ' | ' . $date;
if (date('H') >= 8) {
    print '<br> Meškáš!';
}

// LOGGER

if (date('H') >= 8) {
    file_put_contents("logger.log", $date_time . " Meškanie" . "\n", FILE_APPEND);
}
else {
    file_put_contents("logger.log", $date_time ."\n", FILE_APPEND);
}
