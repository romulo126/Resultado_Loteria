<?php

namespace src;

use request\Request;
use src\exception\ExceptionGetDateResultLoto;

require_once __DIR__ . '/../vendor/autoload.php';

class GetDateResultLoto extends Request
{

    public function GetAllDate(string $name)
    {
        $return['url'] = $this->GetBaseUrl($name);
        if (!isset($return['url']['status']))
            $return['result'] = $this->ResultGame($return['url']);
        else
            $return = $return['url'];
        return $return;
    }

    public function GetBaseUrl(string $slug)
    {
        $exept = new ExceptionGetDateResultLoto;
        $body = $this->request(
            "http://loterias.caixa.gov.br/wps/portal/loterias/landing/$slug/",
            'http://loterias.caixa.gov.br/',
            'GET'
        );


        preg_match(
            '@<base\s*href=[\'\"](.*?)[\'\"]@is',
            $body,
            $base_url
        );


        if (!isset($base_url[1])) {
            return $exept->errorurl();
            die;
        }

        preg_match(
            '@<input\s*type=[\'\"]hidden[\'\"]\s*value=[\'\"](.*?res/id=buscaResultado.*?)=/[\'\"]@is',
            $body,
            $key_url
        );

        if (!isset($key_url[1])) {
            return $exept->errorurlkey();
            die;
        }


        return $base_url[1] . $key_url[1] . '?timestampAjax=' . strtotime(date('Y-m-d H:i:s'));
    }

    public function ResultGame(string $url)
    {

        $body = $this->request(
            $url,
            'http://loterias.caixa.gov.br/wps/portal/loterias/landing/',
            'GET'
        );

        return json_decode($body);
    }
}
