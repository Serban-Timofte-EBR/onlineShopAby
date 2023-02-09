<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ShopCategories */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Shop Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="shop-categories-view">

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
            'id',
            'category_name',
            'img' => [
                'label' => 'Image',
                'format' => ['html'],
                'attribute' => 'img',
                'value' => function($value) {
                    return '<img class="col-md-6" src="' . Yii::$app->Url->imgUrl() . $value->img . '">';
                }
            ],
        ],
    ]) ?>

</div>
