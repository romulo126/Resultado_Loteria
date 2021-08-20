<?php
namespace src\exception;
class ExceptionGetDateResultLoto{
    public function errorurl()
    {
        return ['status'=>'error','msg'=>'Erro ao pegar a url da consulta'];
        die;
    }
    public function errorurlkey()
    {
        return ['status'=>'error','msg'=>'Erro ao pegar a chave da consulta'];
        die;
    }
}
