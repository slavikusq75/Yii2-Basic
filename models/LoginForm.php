<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 09.01.16
 * Time: 21:48
 */
namespace app\models;

use yii\base\Model;
use Yii;

class LoginForm extends Model
{
    public $username;
    public $password;
    public $email;
    public $rememberMe = true;
    public $status_id;

    public function rules()
    {
        return [
            [['username', 'password'], 'required', 'on' => 'default'],
            ['email', 'email'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword']
        ];
    }

    public function validatePassword()
    {

    }

    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'password' => 'Password',
            'rememberMe' => 'Remember Me'
        ];
    }

    public function login()
    {
        return true;
    }

}
