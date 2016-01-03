<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Users extends ActiveRecord implements \yii\web\IdentityInterface
{
    public static function tableName()
    {
        return Users;
    }
	public function rules()
    {
        return [
            // username and password are both required
            [['password','id'], 'required','on'=>'login'],
            // password is validated by validatePassword()
            ['password', 'validatePassword','on'=>'login'],
            [['password','username','role'],'required','on'=>'register'],
        ];
    }
    public function scenarios()
    {
        return [
            'login'=>['password','id'],
            'register'=>['password','username','role'],

        ];
    }

	public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

        public function login()
    {

        if ($this->validate()) {
        return Yii::$app->user->login($this->getUser(), 3600*24*30 );
            
        }
        return false;
    }
     public function getUser()
    {
        $user = Users::find()->where(['id'=>$this->id])->one();           
        return $user;//new static($user);
    }

        public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !($user->password === $this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }
}
?>