<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 08.01.16
 * Time: 13:27
 */
namespace app\models;

use yii\base\Model;
use Yii;
use \yii\db\ActiveRecord;

class RegForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $status_id;

    public function rules()
    {
        return [
            [
                ['username', 'email', 'password'],'filter', 'filter' => 'trim'
            ],

            [
                'username', 'string', 'min' => 2, 'max' => 255
            ],

            [
                'password', 'string', 'min' => 6, 'max' => 255
            ],


            [
                'username', 'unique',
                    'targetClass' => Userblog::className(),
                    'message' => 'This username already exists.'
            ],

            [
                'email', 'unique',
                'targetClass' => User::className(),
                'message' => 'This email already exists.'
            ],

            [
                'status_id', 'default', 'value' => Userblog::STATUS_ACTIVE, 'on' => 'default'
            ],

            [
                'status_id', 'in', 'range' => [
                Userblog::STATUS_NOT_ACTIVE,
                Userblog::STATUS_ACTIVE
            ]],

            [
                ['username', 'email', 'password'],
                'required'
            ]

        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password'
        ];
    }

    public function reg()
    {
        $userblog = New Userblog();
        $userblog->username = $this->username;
        $userblog->email = $this->email;
        $userblog->status_id = $this->status_id;
        $userblog->setPassword($this->password);
        $userblog->generateAuthKey();
        return $userblog->save() ? $userblog : null;
    }
}