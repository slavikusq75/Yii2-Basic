<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property string $title
 *
 * @property PostsCategories[] $postsCategories
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    /*public function getPostsCategories()
    {
        return $this->hasMany(PostsCategories::className(), ['category_id' => 'id']);
    }*/

    public function getPosts() {
        $this->hasMany(Posts::className(), ['id' => 'post_id'])
            ->viaTable('posts_categories', ['category_id' => 'id']);
    }
}
