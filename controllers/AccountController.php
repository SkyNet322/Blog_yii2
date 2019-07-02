<?php
/**
 * Created by PhpStorm.
 * User: wilix
 * Date: 7/1/19
 * Time: 5:39 PM
 */

namespace app\controllers;


use app\models\Posts;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;

class AccountController extends ActiveController
{
    public $modelClass= Posts::class;
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
        unset($actions['index']);
        return $actions;
    }

    /**
     * @return ActiveDataProvider
     */
    public function actionIndex()
    {
        $user_id = Yii::$app->user->identity->id;

        $activeData = new ActiveDataProvider([
            'query' => Posts::find()->where(['user_id' => $user_id]),
            'pagination' => [
                'defaultPageSize' => 5,
            ],
        ]);

        return $activeData;
    }
}