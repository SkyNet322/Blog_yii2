<?php


namespace app\controllers;

use app\models\Token;
use Yii;
use app\models\User;
use yii\rest\Controller;
use yii\web\HttpException;


class AuthController extends Controller
{

    /**
     * @OA\Post(
     *     path="/auth/register",
     *     @OA\Response(response="200", description="An example resource"),
     * )
     */

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
     * @OA\Get(
     *     path="/auth/login",
     *     @OA\Response(response="200", description="An example resource"),
     *     security={{"api_key":{}}}
     * )
     */

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