<?php
namespace app\core;

use app\models\User;

class Application{
	/**
	 */
	public static $ROOT_DIR;

	public string $userClass;
    public Router $router;
    public Request $request;
	public Response $response;
	public Session $session;
	public Database $db;

	public ?User $user;

	//Le user peut être null
	// public ?DbModel $user;

	public static Application $app;
	public Controller $controller; 

	/**
	 */
	public function __construct($rootPath,array $config){

		$this->userClass = $config['userClass'];
		self::$ROOT_DIR=$rootPath;
		self::$app=$this;
		$this->request = new Request();
		$this->response = new Response();
		$this->session = new Session();
		//this
		$this->controller=new Controller();
		$this->router = new Router($this->request,$this->response);

		$this->db=new Database($config['db']);

		//Avoir le user disponible globalement
		$primaryValue=$this->session->get('user');
		
		if($primaryValue){ 			
			$primaryKey=$this->userClass::primaryKey();
			$this->user=$this->userClass::findOne([$primaryKey => $primaryValue ]);
			
		}else{
			$this->user=null;
		}			
	}
	public function run(){
		echo $this->router->resolve();
	}

	/**
	 * Get the value of controller
	 */ 
	public function getController()
	{
		return $this->controller;
	}

	/**
	 * Set the value of controller
	 *
	 * @return  self
	 */ 
	public function setController($controller)
	{
		$this->controller = $controller;

		return $this;
	}
	public function login(User $user){
		//save user in session
		$this->user=$user;
		$primaryKey = $user->primaryKey();
		$primaryValue=$user->{$primaryKey};
		Application::$app->session->set('user',$primaryValue);
		// $this->session->set('user',$primaryValue);
		return true;
	}
	public static function isGuest(){
		return !self::$app->user;

	}
	public function logout(){
		$this->user=null;
		self::$app->session->remove('user');
	}
}