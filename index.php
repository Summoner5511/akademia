<?php
date_default_timezone_set("Europe/Bratislava"); 
print 'Ahoj <br>';
$date = date('d/m/Y');
$time = date('H:i:s');
print 'Teraz je ' . $time . ' | ' . $date;
if (date('H') > 8) {
    print '<br> Meškáš!';
}

// LOGGER
$logger = fopen("logger.log", "a");
if (date('H') <= 8) {
    fwrite($logger, $date . " | " . $time . "\n");
}
if (date('H') > 8) {
    fwrite($logger, $date . " | " . $time . "  Meškanie" . "\n");
}
fclose($logger);
