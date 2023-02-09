<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ShopProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shop Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Shop Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'product_name',
            'product_desc',
            'price',

            'stock' => [
                'attribute' => 'stock',
                'label' => 'Stock',
                'value' => function($value) {
                    return $value->stock === 0 ? Html::a('Available -> 0', ['/shop-products/change-stock', 'id' => $value->id]) : Html::a('Unavailable -> 1', ['/shop-products/change-stock', 'id' => $value->id]);
                },
                'format' => ['html']
            ],

            'gallery' => [
                'label' => 'Gallery',
                'attribute' => 'image',
                'value' => function($value) {
                    $gallery_model = \common\models\ShopProductsGalleries::find()->where(['product_id' => $value->id])->all();
                    $res = '';

                    foreach($gallery_model as $image) {
                        //$res .= Html::img($image->img, ['alt' => 'magnific_pictogram', 'width' => 100, 'height' => 100]);
                        $res .= '<img class="col-md-3" src="/abysand/backend/web/uploads/' . $image->img . '"/>';
                    }

                    return ($res);
                },
                'format' => ['html'],
            ],

            'category_id' => [
                'label' => 'Category',
                'attribute' => 'category_id',
                'value' => function($value) {
                    $model = \common\models\ShopCategories::findOne(['id' => $value->category_id]);

                    if (isset($model)) {
                        return $model->category_name;
                    }

                    return 'Error.';
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
