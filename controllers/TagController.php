<?php
/**
 * Created by PhpStorm.
 * User: wilix
 * Date: 7/5/19
 * Time: 5:35 PM
 */

namespace app\controllers;


use app\models\Tags;
use Yii;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;

class TagController extends ActiveController
{
    public $modelClass = Tags::class;

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
     * @return Tags
     * @throws \yii\base\InvalidConfigException
     */

    public function actionTag()
    {
        $tags = new Tags();
        $tags->load(Yii::$app->getRequest()->getBodyParams(), '');
        $tags->save();

        return $tags;
    }
}