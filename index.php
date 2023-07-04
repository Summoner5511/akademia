<form method="post" action="index.php">
    Meno: <input type="text" name="name">
    <input type="submit">
</form>


<?php
date_default_timezone_set("Europe/Bratislava");
print 'Ahoj <br>';
$date = date('d/m/Y');
$time = date('H:i:s');
$date_time = $date . " | " . $time;
print 'Teraz je ' . $date_time;
if (date('H') >= 8) {
    print '<br> Meškáš!';
}

// LOGGER
$name = $_POST['name'];

function logger($date_time,$name)
{
    if (empty($name)) {
        echo '<br>Napíš svoje meno';
    } else {
        if (date('H') >= 8) {
            file_put_contents("logger.log", $date_time . " Meškanie " . "| Meno: " . $name . "\n", FILE_APPEND);
        } else {
            file_put_contents("logger.log", $date_time . "| Meno: " . $name .  "\n", FILE_APPEND);
        }
    }
}
logger($date_time,$name);

?>
<br>
<br>
<br>
<?php
// LOGGER READER
function getLogs(){
    $logs = file_get_contents('logger.log')or die('Log súbor neexistuje');
    $formattedlogs = nl2br($logs);
    print $formattedlogs ;
}
getLogs();

?>

