<?php
/**
 * Created by PhpStorm.
 * User: wilix
 * Date: 7/2/19
 * Time: 1:04 PM
 */

namespace app\controllers;


use app\models\Subscription;
use app\models\User;
use http\Exception;
use Yii;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;

class SubscriptionController extends ActiveController
{
    public $modelClass= Subscription::class;
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
        unset($actions['delete']);
        return $actions;
    }

    /**
     * @return Subscription
     * @throws \yii\base\InvalidConfigException
     * @throws NotFoundHttpException
     */
    public function actionCreate()
    {
        $model = new Subscription();
        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        if ($model->validate()) {
            $model->save();
        }else{
            throw new NotFoundHttpException('You are already subscribe');
        }

        return $model;
    }

    /**
     * @return Subscription
     * @throws \Throwable
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete()
    {
        $model = new Subscription();
        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        $model->delete();

        return $model;
    }


}