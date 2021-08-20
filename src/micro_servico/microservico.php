<?php

namespace src;

class microservico
{
    public function GetRaffleNumber(object $result)
    {
        return $result->numero;
    }

    public function GetAccumulated(object $result)
    {
        return $result->acumulado;
    }

    public function GetAccumulatedAmountNextContest(object $result)
    {
        return $result->valorAcumuladoProximoConcurso;
    }

    public function GetAmountCollected(object $result)
    {
        return $result->valorArrecadado;
    }

    public function GetCounty(object $result)
    {
        return $result->nomeMunicipioUFSorteio;
    }

    public function GetDateNextContest(object $result)
    {
        return $result->dataProximoConcurso;
    }

    public function GetEstimatedValueNextCompetition(object $result)
    {
        return $result->valorEstimadoProximoConcurso;
    }

    public function GetTipyGame(object $result)
    {
        return $result->tipoJogo;
    }

    public function GetNumberContestNext(object $result)
    {
        return $result->numeroConcursoProximo;
    }

    public function GetNumberDraw(object $result)
    {
        return $result->dezenasSorteadasOrdemSorteio;
    }
}
