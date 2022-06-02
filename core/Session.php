<?php
namespace app\core;
class Session{
//flash message est le message a afficher dans alert
    protected const FLASH_KEY='flash_messages';

    public function __construct() {
        session_start();
        $flashMessages =$_SESSION[self::FLASH_KEY]?? [];
         foreach ($flashMessages as $key => &$flashMessage) {
             # Mark to be removed
            $flashMessage['remove'] =true;

         }
         $_SESSION[self::FLASH_KEY]=$flashMessages;
    }
    /**
     * Permet de stocker le key et le message donner en parametre dans le tableau session
     * @param string $key - key du tableau
     * @param string $message message à afficher
     */
    public function setFlash($key, $message) {
        $_SESSION[self::FLASH_KEY][$key] = [
            'remove' =>false,
            'value' => $message
        ];
    }
    public function getFlash($key) {
        return $_SESSION[self::FLASH_KEY][$key]['value'] ?? false;
    }
    /**
     * setter de variable de SESSION permet de donner la valeur en parametre à la session dont le key est donné en parametre
     */
    public function set($key, $value) {
        $_SESSION[$key]=$value;
    }
    /**
     * getter de variable de $_SESSION ayant le $key donner en parametre
     */
    public function get($key) {

        return $_SESSION[$key] ?? false;
    }
    /**
     * Permet de rénitialiser la variable de $_SESSION du $key donné en parametre à l'aide de la methode unset()
     */
    public function remove($key) {
        unset($_SESSION[$key]);
    }
   public function __destruct(){
       #Iterate over marker to
       $flashMessages =$_SESSION[self::FLASH_KEY]?? [];
         foreach ($flashMessages as $key => &$flashMessage) {
             if($flashMessage['remove']){
                 unset($flashMessages[$key]);
             }
         }
         $_SESSION[self::FLASH_KEY]=$flashMessages;

   }
}