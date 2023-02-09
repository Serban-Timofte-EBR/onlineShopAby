<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ShopProducts */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Shop Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="shop-products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
        ],
    ]) ?>

</div>
