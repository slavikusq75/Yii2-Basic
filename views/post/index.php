<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Posts', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            /*[
                'attribute' => 'category_id',
                'value' => 'categories.category_id',
            ],*/


            [
                'label' => 'Categories',
                'format' => 'raw',
                'value' => function(\app\models\Posts $model){
                    $result = '' ;
                    foreach($model->categories  as $category ){
                        $result.=  Html::a($category->title, ['category/view', 'id' => $category->id]);
                        $result.='<br>';
                    }
                    return $result;
                }
            ],


            //'categories.category_id',
            'id',
            'post',
            'author',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
