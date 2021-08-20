<?php

namespace src;

require_once __DIR__ . '/vendor/autoload.php';
header('Content-Type: application/json');
class api
{
    public function start()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            return json_encode(['status' => 'error', 'msg' => 'O metodo permitido e somente GET']);
        }
        if (!isset($_GET['resultado'])) {
            return  json_encode(['status' => 'sucesso', 'msg' => 'Tipos suportado', 'data' => [
                'megasena',
                'lotofacil',
                'quina',
                'lotomania',
                'timemania',
                'diadesorte',
                'supersete',
                'all'
            ]]);
        }

        if (($_GET['resultado'] != 'megasena') && $_GET['resultado'] != 'lotofacil' && $_GET['resultado'] != 'quina'
            && $_GET['resultado'] != 'lotomania' && $_GET['resultado'] != 'timemania' 
            && $_GET['resultado'] != 'diadesorte' && $_GET['resultado'] != 'supersete'
        ) {
            return json_encode(['status' => 'error', 'msg' => 'Tipo não suportado']);
        }


        return json_encode(call_user_func_array(__NAMESPACE__ . "\GetPages::loterica", array($_GET['resultado'])));
    }
}
$ts = new api;
echo $ts->start();
