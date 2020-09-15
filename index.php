<?php

//richiamo il file di configurazione
require_once __DIR__ . '/config.php';

//creo la class API per le operazioni GET
class API
{
    function Select()
    {
        $db = new Connect;
        $users = array();
        $data = $db->prepare('SELECT * FROM users ORDER BY id');
        $data->execute();
        while ($OutputData = $data->fetch(PDO::FETCH_ASSOC)) {
            $users[$OutputData['id']] = array(
                'id'   => $OutputData['id'],
                'name' => $OutputData['name'],
                'age'  => $OutputData['age']
            );
        }

        return json_encode($users);
    }
}
//stampo il risultato della classe che effettua il GET
$API = new API;
header('Content-Type: application/json');
echo $API->Select();
