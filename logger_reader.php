<?php

function getLogs(){
    $logs = file_get_contents('logger.log')or die('Log súbor neexistuje');
    $formattedlogs = nl2br($logs);
    print $formattedlogs ;
    
}
getLogs();
