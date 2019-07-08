<?php
/**
 * Created by PhpStorm.
 * User: wilix
 * Date: 7/1/19
 * Time: 5:39 PM
 */

namespace app\controllers;


use app\models\Like;
use app\models\Posts;
use app\models\Subscription;
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
     * @OA\Get(
     *     path="/account",
     *     tags={"account"},
     *     @OA\Response(response="200", description="An example resource"),
     *     security={{"api_key":{}}}
     * )
     */

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

    /**
     * @OA\Get(
     *     path="/account/like",
     *     tags={"account"},
     *     @OA\Response(response="200", description="An example resource"),
     *     security={{"api_key":{}}}
     * )
     */

    public function actionLike()
    {
        $user_id = Yii::$app->user->identity->id;

        $activeLike = new ActiveDataProvider([
            'query' => Posts::find()
                ->where([
                    'IN',
                    'id',
                    Like::find()
                        ->select('post_id')
                        ->where(['user_id' => $user_id])
                        ->asArray()
                ])
        ]);

        return $activeLike;
    }
}