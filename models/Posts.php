<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property string $author
 * @property string $user_id
 * @property string $title
 * @property string $content
 * @property string $data_create
 * @property string $tag
 */
class Posts extends ActiveRecord
{

    const STATUS_ACTIVE = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content', 'author'], 'required'],
            [['content', 'author'], 'string'],
            [['data_create'], 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Author1',
            'author' => 'Author',
            'title' => 'Title',
            'content' => 'Content',
            'data_create' => 'Data Create',
        ];
    }

    public function getUsers(){
        return $this->hasOne(User::class,
            ['id' => 'user_id']
        );
    }

    public function getTags(){
        return $this->hasMany(Tags::class, ['id' => 'tag_id'])
            ->viaTable('tags_posts', ['post_id' => 'id']);
    }

    public function getLike(){
        return $this->hasMany(Like::class,
            ['post_id' => 'id'])
            ->count();
    }

    public function getSubscribe(){
        return $this->hasMany(Subscription::class,
            [
                'user_id' => 'user_id'
            ]);
    }

    public function fields()
    {
        return ['id', 'user_id', 'author', 'title', 'content', 'tags', "like", 'data_create'];
    }
}
