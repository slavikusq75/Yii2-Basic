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

    public function rules()
    {
        return [
            [
                ['username', 'password'],
                'required'
            ]

        ];
    }
}