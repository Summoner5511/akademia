<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
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
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];

    if (empty($name)) {
        print '<br>Napíš svoje meno';
    } else {
        // LOGGER     
        function logger($date_time, $name)
        {
            if (empty($name)) {
                print '<br>Napíš svoje meno';
            } else {
                $logMessage = $date_time . " | Meno: " . $name;
                if (date('H') >= 8) {
                    file_put_contents("logger.log", $logMessage . " | Meškanie \n", FILE_APPEND);
                } else {
                    file_put_contents("logger.log", $logMessage .  "\n", FILE_APPEND);
                }
            }
            $jsonData = file_get_contents("names.json");
            $names = json_decode($jsonData, true);
            $names[] = $name;
            file_put_contents("names.json", json_encode($names));
        }


        logger($date_time, $name);
    }
}
?>
<br>
<br>
<br>
<?php
// LOGGER READER
function getLogs()
{
    print "<pre>";
    $logs = file_get_contents('logger.log') or die('Log súbor neexistuje');
    print $logs;
    print "</pre>";
    print "<pre>";
    $names = file_get_contents('names.json') or die('Súbor s menami neexistuje');
    print $names;
    print "</pre>";
}
getLogs();

?>

