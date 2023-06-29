
<?php
date_default_timezone_set('Europe/Bratislava');
print 'Ahoj <br>';
$date = date('d/m/Y', time());
$time = date('H:i:s', time());
print 'Teraz je ' . $time . ' | ' . $date;

if (date('H') > 8) {
    print '<br> Meškanie';
}
