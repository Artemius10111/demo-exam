<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "regForm".
 *
 * @property int $id
 * @property string $fio
 * @property string $login
 * @property string $email
 * @property string $password
 * @property int $admin
 *
 * @property Problem[] $problems
 */
class RegForm extends User
{
    public $passwordConfirm;
    public $agree;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'login', 'email', 'password'], 'required'],
            [['admin'], 'integer'],
            [['fio', 'login', 'email', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'ФИО',
            'login' => 'Login',
            'email' => 'Email',
            'password' => 'Пароль',
            'admin' => 'Admin',
            'passwordConfirm' => 'Подтверждение пароля',
            'agree' => 'Даю согласие на обработку персональных данных', 
        ];
    }

}
