<?php

namespace App\Core;

use Exception;

class Application {

    public string $layout = 'main';
    public static string $ROOT_DIR;
    public Router $router;
    public Response $response;
    public Request $request;
    public static Application $app;
    public ?Controller $controller = null;
    public Database $db;
    public Session $session;
    public ?UserModel $user;
    public View $view;
    public string $userClass;

    public function __construct($rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);  
        $this->db = new Database($config['db']);
        $this->userClass = $config['userClass'];
        $this->view = new View();
        
        
        $primaryValue = $this->session->get('user');
        if ($primaryValue) {
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
        } else {
            $this->user = null;
        }
    }

    public function setController(Controller $controller)
    {
        $this->controller = $controller;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function run()
    {
        try {
            echo $this->router->resolve();
        } catch (Exception $e) {
            echo $this->router->renderView('_error', [
                'exception' => $e
            ]);
        }
    }

    public function login(DbModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }

    public static function isGuest(): bool
    {
        return !self::$app->user;
    }
}


?>