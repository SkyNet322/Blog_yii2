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
        ];
        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        return $actions;
    }

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
