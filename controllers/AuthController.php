<?php


namespace app\controllers;

use app\models\Token;
use Yii;
use app\models\User;
use yii\db\Exception;
use yii\rest\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;

class AuthController extends Controller
{

    /**
     * @return User
     * @throws \yii\base\Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function actionRegister()
    {
        $model = new User();
        $model->security = Yii::$app->security;
        $model->load(Yii::$app->request->getBodyParams(), '');
        if ($model->validate()) {
            $model->hashPassword();
            $model->save(false);
        }

        return $model;
    }

    /**
     * @return Token
     * @throws HttpException
     * @throws \yii\base\Exception
     */

    public function actionLogin()
    {
        $model = User::findOne(['login' => Yii::$app->request->post('login')]);
        $model->security = Yii::$app->security;
        if ($model->validatePassword(Yii::$app->request->post('pass'))) {
            $token = new Token();
            $token->user_id = $model->id;
            $token->access_token = $model->generateToken();
            $token->save();
            return $token;
        }

        throw new HttpException(404, 'Not valid');
    }
}