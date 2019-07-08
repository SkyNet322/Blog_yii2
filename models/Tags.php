<?php

namespace app\models;

use phpDocumentor\Reflection\DocBlock\Tag;
use Yii;
use yii\db\ActiveRecord;
use app\controllers\TagController;

/**
 * This is the model class for table "tags".
 *
 * @property int $id
 * @property string $tag
 */
class Tags extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tag'], 'required'],
            [['tag'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag' => 'Tags',
        ];
    }

    public function getPosts(){
        return $this->hasMany(Posts::class, ['id' => 'posts_id'])
            ->viaTable('tags_posts', ['tag_id' => 'id']);
    }
}
