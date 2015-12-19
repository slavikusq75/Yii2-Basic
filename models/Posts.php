<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property integer $id
 * @property string $post
 * @property string $author
 *
 * @property PostsCategories[] $postsCategories
 */
class Posts extends \yii\db\ActiveRecord
{
    public $category;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post', 'author'], 'required'],
            [['post', 'author'], 'string', 'max' => 255],
            ['category', 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post' => 'Post',
            'author' => 'Author',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostsCategories()
    {
        return $this->hasMany(PostsCategories::className(), ['post_id' => 'id']);
    }

    public function getCategories(){
        return $this->hasMany(Categories::className(),['id'=>'category_id'])
            ->viaTable('posts_categories',['post_id'=>'id']);
    }

}
