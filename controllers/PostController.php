<?php


namespace app\controllers;

use app\models\PostSearch;
use app\models\Tags;
use app\models\TagsPosts;
use Yii;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;
use app\models\Posts;
use yii\web\ServerErrorHttpException;



class PostController extends ActiveController
{

    /**
     * @OA\Get(
     *     path="/posts",
     *     tags={"post"},
     *     @OA\Response(response="200", description="All posts"),
     * )
     */

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
            'only' => ['create', 'update', 'delete'],
        ];
        return $behaviors;
    }

    /**
     * @OA\Get(
     *     path="/posts/{id}",
     *     tags={"post"},
     *     @OA\Response(response="200", description="Detail posts"),
     * )
     */

    public function actions() {

        $actions = parent::actions();
        unset($actions['create']);
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        return $actions;
    }

    public function prepareDataProvider() {

        $searchModel = new PostSearch();
        return $searchModel->search(\Yii::$app->request->queryParams);
    }

    /**
     * @OA\Post(
     *     path="/posts",
     *     tags={"post"},
     *     @OA\Response(response="200", description="New posts"),
     *     security={{"api_key":{}}}
     * )
     */

    /**
     * @return Posts
     * @throws ServerErrorHttpException
     * @throws \yii\base\InvalidConfigException
     */

    public function actionCreate()
    {
        $model = new Posts();
        $model->user_id = Yii::$app->user->id;
        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        $tags = Yii::$app->request->getBodyParam('tags');
        if ($model->save() && $tags) {
            foreach ($tags as $tagId) {
                $tagPost = new TagsPosts;
                $tagPost->post_id = $model->id;
                $tagPost->tag_id = $tagId;
                $tagPost->save();
            }
        }

        return $model;
    }

    /**
     * @throws \yii\base\InvalidConfigException
     */
}