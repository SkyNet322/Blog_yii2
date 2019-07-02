<?php

namespace app\models;

use Yii;
use yii\base\Exception;
use yii\base\Security;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * Class User
 * @package app\models
 * @property string $email
 * @property string $pass
 * @property string $login
 * @property string $id
 */
class User extends ActiveRecord implements IdentityInterface
{

    /** @var Security $security */
    public $security;

    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'pass', 'nickname', 'email'], 'required'],
            [['login', 'pass', 'email', 'nickname'], 'string', 'min' => 3, 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'pass' => 'Pass',
            'email' => 'Email',
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
//    public static function findIdentityByAccessToken($token, $type = null)
//    {
//        foreach (self::$users as $user) {
//            if ($user['accessToken'] === $token) {
//                return new static($user);
//            }
//        }
//
//        return null;
//    }


//    public function login(){
//        if($this->validate()) {
//            return Yii::$app->user->login($this->getUser());
//        }
//        return false;
//    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @throws Exception
     */
    public function hashPassword(){
        $this->pass = $this->security->generatePasswordHash($this->pass);
    }

    public function validatePassword($password)
    {
        return $this->security->validatePassword($password, $this->pass);
    }

    /**
     * @return string
     * @throws Exception
     */
    public function generateToken(){

        return $this->security->generateRandomString(32);

    }

    public function getPosts(){
        return $this->hasMany(Posts::class,
            ['user_id' => 'id']
        );
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return User::find()
            ->joinWith('token')
            ->where(['token.access_token' => $token])
            ->one();
    }

    public function getToken(){
        return $this->hasMany(Token::class,
            ['user_id' => 'id']
        );
    }

    public function getLike(){
        return $this->hasMany(Like::class,
            ['user_id' => 'id']
        );
    }

    public function getSubscriptions(){
        return $this->hasMany(Subscription::class, ['user_id' => 'id']);
    }

    public function fields()
    {
        return ['id', 'login', 'email', 'subscriptions'];
    }
}
