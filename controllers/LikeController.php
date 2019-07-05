<?php
/**
 * Created by PhpStorm.
 * User: wilix
 * Date: 7/1/19
 * Time: 12:53 PM
 */

namespace app\controllers;


use app\models\Like;
use Yii;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;

class LikeController extends ActiveController
{
    public $modelClass = Like::class;

    /**
     * @return mixed
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
            'only' => ['create', 'update', 'delete'],
        ];
        return $behaviors;
    }

    /**
     * @OA\Get(
     *     path="/like/create",
     *     @OA\Response(response="200", description="An example resource"),
     *     security={{"api_key":{}}}
     * )
     */

    /**
     * @return Like
     * @throws \yii\base\InvalidConfigException
     */
    public function actionCreate()
    {
        $like = new Like();
        $like->load(Yii::$app->getRequest()->getBodyParams(), '');
        $like->save();

        return $like;
    }

}
