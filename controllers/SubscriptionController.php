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
use yii\data\ActiveDataProvider;
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
        unset($actions['index']);
        unset($actions['create']);
        return $actions;
    }

    /**
     * @return ActiveDataProvider
     * @throws \yii\base\InvalidConfigException
     * @throws NotFoundHttpException
     */

    /**
     * @OA\Get(
     *     path="/subscription",
     *     tags={"subscription"},
     *     @OA\Response(response="200", description="An example resource"),
     *     security={{"api_key":{}}}
     * )
     */

    public function actionIndex()
    {
        $user_id = Yii::$app->user->identity->id;

        $activeData = new ActiveDataProvider([
            'query' => Subscription::find()->where(['user_id' => $user_id]),
            'pagination' => [
                'defaultPageSize' => 5,
            ],
        ]);

        return $activeData;
    }

    /**
     * @OA\Post(
     *     path="/subscription/create",
     *     tags={"subscription"},
     *     @OA\Response(response="200", description="An example resource"),
     *     security={{"api_key":{}}}
     * )
     */

    /**
     * @return Subscription
     * @throws NotFoundHttpException
     * @throws \yii\base\InvalidConfigException
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
}