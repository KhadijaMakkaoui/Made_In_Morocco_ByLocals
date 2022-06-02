<?php
namespace app\core;

class Response{
    /**
     * Permet de donner un code de status pour la methode http_response_code()
     * @param $code - code de status
     */
    public function setStatusCode($code){
        http_response_code($code);
    }
    /**
     * Permet la redirection vers l'url passer en parametre
     */
    public function redirect(string $url){
        header('Location: '.$url);
    }


}