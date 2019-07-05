<?php


namespace app\controllers;

use yii\rest\ActiveController;
use app\models\User;
use yii\filters\auth\HttpBearerAuth;
use yii\web\HttpException;

class UserController extends ActiveController
{

    public $modelClass= User::class;

    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
        ];
        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        return $actions;
    }

    public function checkAccess($action, $model = null, $params = [])
    {
        parent::checkAccess($action, $model, $params);
    }
}