<?php
namespace App\routing;

use FastRoute\Dispatcher;

class Web
{
    public static function getDispatcher():Dispatcher{
        return \FastRoute\simpleDispatcher(
            function (\FastRoute\RouteCollector $route){
                $route->addRoute('GET','/', ['App\controllers\HomeController','index']);
                $route->addRoute('GET','/quienes-somos',['App\controllers\WhoController','index']);
                $route->addRoute('GET','/donde-estamos',['App\controllers\WhereController','index']);
                $route->addRoute('GET','/users',['App\controllers\UsersController','index']);
                $route->addRoute('GET','/register',['App\controllers\auth\RegisterController','index']);
                $route->addRoute('POST','/register',['App\controllers\auth\RegisterController','register']);
                $route->addRoute('GET','/login',['App\controllers\auth\LoginController','index']);
                $route->addRoute('POST','/login',['App\controllers\auth\LoginController','login']);
                $route->addRoute('GET','/paneldecontrol',['App\controllers\DashBoardController','index']);
                $route->addRoute('GET','/salir',['App\controllers\auth\LogOutController','index']);
                $route->addRoute('GET','/create-post',['App\controllers\PostController','index']);
                $route->addRoute('POST','/create-post',['App\controllers\PostController','create']);
                $route->addRoute('GET','/delete-post/{id}',['App\controllers\PostController','delete']);
                $route->addRoute('GET','/edit-post/{id}',['App\controllers\PostController','index']);
                $route->addRoute('POST','/edit-post/{id}',['App\controllers\PostController','update']);
                $route->addRoute('GET','/perfil',['App\controllers\auth\ProfileController','index']);
            }
        );

    }
}