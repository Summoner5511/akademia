<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Meno: <input type="text" name="name">
    <input type="submit">
</form>
<?php
date_default_timezone_set("Europe/Bratislava");
$date = date('d/m/Y');
$time = date('H:i:s');
$date_time = $date . " | " . $time;
welcome($date_time);
function welcome($date_time)
{
    print 'Ahoj <br>';
    print 'Teraz je ' . $date_time;
    checkTimeAndName($date_time);
    getLogs();
}

/*          
FUNCTIONS

*/

function checkTimeAndName($date_time)
{
    if (date('H') >= 20) {
        print '<br>Príchod sa nemôže zapísať.';
        exit;
    }
    if (date('H') >= 8) {
        print '<br> Meškáš!';
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = $_POST['name'];

        if (empty($name)) {
            print '<br>Napíš svoje meno';
        } else {
            loggerOfStudents($date_time, $name);
        }
    }
}
function loggerOfStudents($date_time, $name)
{
    if (empty($name)) {
        return '<br>Napíš svoje meno';
    }
    $logMessage = $date_time . " | Meno: " . $name;
    if (date('H') >= 8) {
        file_put_contents("logger.log", $logMessage . " | Meškanie \n", FILE_APPEND);
    } else {
        file_put_contents("logger.log", $logMessage .  "\n", FILE_APPEND);
    }

    $jsonData = file_get_contents("names.json");
    $names = array();
    if ($jsonData) {
        $names = json_decode($jsonData, true);
    }
    if (date('H') >= 8) {
        $names[] = array(
            'meno' => $name,
            'order' => count($names) + 1,
            'late' => 'yes'
        );
    } else {
        $names[] = array(
            'meno' => $name,
            'order' => count($names) + 1,
            'late' => 'no'
        );
    }

    file_put_contents("names.json", json_encode($names, JSON_PRETTY_PRINT));
}
function getLogs()
{
    print "<pre>";
    $logs = file_get_contents('logger.log') or die('Log súbor neexistuje');
    print $logs;
    print "</pre>";
    print "<pre>";
    $names = file_get_contents('names.json') or die('Súbor s menami neexistuje');
    $name = json_decode($names, true);

    $namesInJson = '';
    foreach ($name as $box) {
        $namesInJson .= '| Meno:' . $box['meno'] . ' , Poradie:' . $box['order'] . ' , Late: ' . $box['late'] . '|<br>';
    }
    print $namesInJson;
    print "</pre>";
}
