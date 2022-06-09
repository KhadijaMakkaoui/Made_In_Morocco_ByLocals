<?php
namespace app\core;

use app\controllers\SiteController;

class Router{
    public Request $request;
    public Response $response;
    protected array $routes=[] ;

    public function __construct(Request $request,Response $response){
        $this->request = $request;
        $this->response = $response;
    }
    /**
     * Permet de stocker $callback dans le tableau routes['get'][$path]
     * @param string $path URI
     * @param string $callback function 
     */
    public function get($path,$callback){
        $this->routes['get'][$path] = $callback;
    }
    /**
     * Permet de stocker $callback dans le tableau routes['post'][$path]
     * @param string $path URI
     * @param string $callback function 
     */
    public function post($path,$callback){
        $this->routes['post'][$path] = $callback;
    }
    /**
     * Permet de retourner la methode renderView($callback) si $callback est false, string  
     * Sinon retourn call_user_func($callback,$this->request,$this->response)
     * @return string|false|the_function_result
     */
    public function resolve(){
        //recuperer le path
        $path=$this->request->getPath();
        //recuperer la methode (get ou post)
        $method=$this->request->method();

        //stocker dans $callback si ce route[][] existe sinon stock false
        $callback=$this->routes[$method][$path]??false;
        
        if($callback===false){
            Application::$app->controller=new SiteController();
            $this->response->setStatusCode(404);
            return $this->renderView('_404');
        }
        if(is_string($callback)){
            return $this->renderView($callback);
        }
        if(is_array($callback)){
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }
        return call_user_func($callback,$this->request,$this->response);
    }
    /**
     * permet de inclur le layout et remplacer {{content}} situer dans le layout par le view
     * @param string $view 
     * @param array $params les parametres
     */
    public function renderView($view,$params=[]){
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view,$params);
        return str_replace('{{content}}', $viewContent, $layoutContent);

    }
    /**
     * Permet d'inclure le code d'un view du dossier layout 
     */
    protected function layoutContent(){
        $layout=Application::$app->controller->layout;
        //Object buffring: les données de sortie sont stockées dans une variable et envoyées au navigateur en un seul morceau à la fin du script
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/$layout.php";
        return ob_get_clean();
    }
    /**
     * Permet d'inclure le view 
     */
    protected function renderOnlyView($view,$params){
        foreach($params as $key=>$val){
            $$key=$val; //is key = name = $name = value 
        }
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }
} 
