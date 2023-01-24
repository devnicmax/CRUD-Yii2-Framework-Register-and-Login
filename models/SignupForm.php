<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;


/**
 * This is the model class for table "users".
 *

 * @property string $username
 * @property string $password
 * @property string $email
 *
 * @property User[] $users
 */
class SignupForm extends Model
{

    public $username;
    public $password;
    public $email;
    public $verifyCode;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            ['username', 'trim'],
            ['username', 'required', 'message' => 'El usuario es obligatorio.'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'El usuario fue creado con éxito!'],
            ['username', 'string', 'min' => 8, 'max' => 255, 'message' => 'El usuario debe tenner mas de 8 caracteres'],
            ['email', 'trim'],
            ['email', 'required', 'message' => 'La contraseña es obligatoria'],
            ['email', 'email', 'message' => 'Debe ser un formato de correo. Ej: tu@corre.com.'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'El correo ya existe en la base de datos.'],
            ['password', 'required', 'message' => 'El password es obligatorio.'],
            ['password', 'string', 'min' => 6, 'max' => 255, 'message' => 'El password debe contener mas de 6 caracteres'],
            ['verifyCode', 'captcha', 'message' => 'Verifique el captcha para validar.'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    public function signup() {
        if (!$this->validate()) return null;

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        return $user->save();
    }
}
