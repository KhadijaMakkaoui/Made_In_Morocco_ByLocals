<?php
namespace app\core;
class Controller{
    //Par defaut le layout est main
    public string $layout='main';
    /**
     * Permet de modifier le layout principale de la page
     * @param string $layout  le nom du layout
     */
    public function setLayout($layout){
        $this->layout = $layout;
    }

    /**
     * 
     * @param array $params null si methode get sinon si post on passe les params envoyer par post
     */
    public function render($views, $params = []) {
        return Application::$app->router->renderView($views, $params);
    }

}