<?php

namespace app\controllers;

use yzh\phhpmvc\Application;
use yzh\phhpmvc\Controller;
use yzh\phhpmvc\Request;
use yzh\phhpmvc\Response;
use app\models\LoginForm;
use app\models\User;
use yzh\phhpmvc\middlewares\AuthMiddleware;

/**
 * Class AuthController
 * 
 * @author Yavor Zhekov
 * @package app\controllers
 */
class AuthController extends Controller
{
    public function __construct()
    {
        //restrict authcontroller
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }
    public function login(Request $request, Response $response) {
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/');
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function register(Request $request) {
        $user = new User;
        if ($request->isPost()) {
            
            $user->loadData($request->getBody());
            
            
            if ($user->validate() && $user->save()) {

               
                Application::$app->session->setFlash('success', 'Thanks for registering!');
                Application::$app->response->redirect('/');
                exit;
            }

            return $this->render('register', [
                'model' => $user
            ]);

        }
        //if request is get render template
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $user
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/login');

    }

    public function profile()
    {
        return $this->render('profile');
    }

}
