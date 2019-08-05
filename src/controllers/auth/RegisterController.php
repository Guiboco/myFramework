<?php
namespace App\controllers\auth;
use App\controllers\Controller;
use App\db\entities\User;
use App\services\UserService;

class RegisterController extends Controller
{

    /**
     * @Inject 
     * @var UserService
     */
    private $userService;
    private $error;

    public function index(){
        $this->error=null;
        $this->viewManager->renderTemplate('register.twig.html');
        
    }

    public function register(){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
      
        $result = $this->userService->findUserByEmail($email);
        if($result) {
            $this->error= "El usuario ya existe";
            return  $this->viewManager->renderTemplate('register.twig.html',['error'=>$this->error]);
        } 
          $user = new User();
          $user->name = $name;
          $user->email = $email;
          $user->password = sha1($password);
          $userResult = $this->userService->createUser($user);
          if(!$userResult) {
            $this->error= "Error en la creación de usuario";
            return  $this->viewManager->renderTemplate('register.twig.html',['error'=>$this->error]);
        } 
        $this->redirectTo('login');

    }

}