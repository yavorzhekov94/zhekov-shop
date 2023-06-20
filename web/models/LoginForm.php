<?php
namespace app\web\models;;

use yzh\phhpmvc\Application;
use yzh\phhpmvc\Model;
use app\web\models\User;

/**
 * Class LoginForm
 * 
 * @author Yavor Zhekov
 * @package app\controllers
 */


class LoginForm extends Model {
    public string $email = '';
    public string $password = '';

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED],
        ];
    }

    public function labels(): array
    {
        return [
            'email' => 'Your email',
            'password' => "Paasword"
        ];
    }

    public function login() {
    
        $user = User::findOne(['email' => $this->email]);
        if (!$user) {
            $this->addError('email', 'User does not exists with this Email');
            return false;
        }

        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Password is incorrect');
            return false;
        }
        

        return Application::$app->login($user);

    }
}
