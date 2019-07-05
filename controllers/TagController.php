<?php
/**
 * Created by PhpStorm.
 * User: wilix
 * Date: 7/5/19
 * Time: 5:35 PM
 */

namespace app\controllers;


use app\models\Tags;
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
}