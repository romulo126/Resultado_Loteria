<?php

namespace src;

require_once __DIR__ . '/../vendor/autoload.php';

use src\GetDateResultLoto;

class GetPages
{

    public function loterica(string $tipo=null)
    {
     
        $getData = new GetDateResultLoto;

        return $getData->GetAllDate($tipo);
    }
}
