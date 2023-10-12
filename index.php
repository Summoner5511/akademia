<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Meno: <input type="text" name="name">
    <input type="submit">
</form>
<?php
date_default_timezone_set("Europe/Bratislava");
class logOfStudents
{

    public $date_time;
 
 
    /*     
    ---------------     
        METHODS    
    ---------------      
    */


    public function __construct()
    {
        $this->date_time = date('d/m/Y H:i:s');
    }
    public function welcome()
    {
        
        print 'Ahoj <br>';
        print 'Teraz je ' . $this->date_time;
        $this->checkTimeAndName();
        
    }
    
    public function loggerOfStudents($name)
    {
        if (empty($name)) {
            return '<br>Napíš svoje meno';
        }
        $logMessage = $this->date_time . " | Meno: " . $name;
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
        
        $late = (date('H') >= 8) ? 'yes' : 'no';
        $names[] = [
            'meno' => $name,
            'order' => count($names) + 1,
            'late' => $late
        ];

        file_put_contents("names.json", json_encode($names, JSON_PRETTY_PRINT));
    }
    private function checkTimeAndName()
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
        } elseif (isset($_GET['meno'])) {
            $name = $_POST['meno'];
        }
        if (empty($name)) {
            print '<br>Napíš svoje meno';
        } else {
            $this->loggerOfStudents($name);
        }
    }
    
}
class PrintLogs
{
    public static function getLogs()
    {
        print "<pre>";
        $logs = file_get_contents('logger.log') or die('Log súbor neexistuje');
        print $logs;
        print "</pre>";
        print "<pre>";
        $names = file_get_contents('names.json') or die('Súbor s menami neexistuje');
        $student = json_decode($names, true);

        $namesInJson = '';
        foreach ($student as $info) {
            $namesInJson .= '| Meno:' . $info['meno'] . ' , Poradie:' . $info['order'] . ' , Late: ' . $info['late'] . '|<br>';
        }
        print $namesInJson;
        print "</pre>";
    }
}
$welcome = new logOfStudents;
$welcome->welcome();
PrintLogs::getLogs();


