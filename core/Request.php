<?php
namespace app\core;
class Request{
    /**
     * Permet de recuperer l'URI (path après le premier slash)
     */
    public function getPath() { 
        $path=$_SERVER['REQUEST_URI']?? '/';
        $position=strpos($path,'?');
        if($position===false){
            return $path;
        }
        $path=substr($path,0,$position);
        return $path;
    }
    /**
     * permet de retourner le contenue de $_SERVER['REQUEST_METHOD'] en miniscule
     * @return string la methode du formulaire
     */
    public function method() { 
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
    /**
     * Permet de renvoyer true si le methode du form et get
     * @return bool
     */
    public function isGet() { 
        return $this->method()==='get';
    }
    /**
     * Permet de renvoyer true si le methode du form et post
     * @return bool
     */
    public function isPost() { 
        return $this->method()==='post';
    }
    /**
     * importe les données envoyer par soit la methode post ou get
     * @return array associative contient les données sous la forme key value
     */
    public function getBody(){
        $body=[];
        if ($this->method() === 'get'){
            foreach ($_GET as $key => $value){
                $body[$key]=filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
            return $body;
        }
        if ($this->method() === 'post'){
            foreach ($_POST as $key => $value){
                $body[$key]=filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
            return $body;
        }
    }
}