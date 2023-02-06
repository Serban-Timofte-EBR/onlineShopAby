<?php

use yii\helpers\Html;

$this->title = 'Abysand - Home'
?>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable">
         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         <h4><i class="icon fa fa-check"></i>Success!</h4>
         <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissable">
         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         <h4><i class="icon fa fa-check"></i>Error!</h4>
         <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>

<!--====== Category Start ======-->
<section class="category-area-3 pt-80">
    <div class="container-fluid custom-container-2">
        <div class="row category-active">
            <?php foreach($categories as $category): ?>
                <div class="col-lg-3">
                    <div class="single-category-3">
                        <?= Html::a(Html::img(Yii::$app->Url->imgUrl() . $category->img)); ?>
                        <div class="category-content text-center">
                            <h5 class="title"><?= Html::a($category->category_name, ['/site/shop', 'category' => $category->id]) ?></h5>
                        </div>                        
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!--====== Category Ends ======-->

<section class="product-area pt-85 pb-110">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title-3 text-center pb-60">
                    <h2 class="title">CELE MAI BUNE PRODUSE</h2>
                </div>
            </div>
        </div>
        <div class="product-menu">
            <ul class="nav nav-2 justify-content-center">
                <li>
                    <a class="active"  data-toggle="tab" href="#all" >All</a>
                </li>

                <?php 
                    $i = 1;
                    foreach ($categories as $category):
                ?>
                    <li>
                        <a  data-toggle="tab" href="#tab<?= $i ?>" ><?= $category->category_name ?></a>
                    </li>
                <?php 
                    $i++;
                    endforeach;
                ?>
            </ul>
        </div>
    </div>

    <div class="container-fluid custom-container-2">
        <div class="tab-content" >
            <div class="tab-pane fade show active" id="all">
                <div class="row">
                    <?php foreach ($products as $product): ?>
                        <!-- Single Product -->
                        <div class="col-xl-3 col-md-4 col-sm-6">
                            <div class="single-product mt-50">
                                <div class="product-image">
                                    <div class="image">
                                    <?= Html::img(
                                        Yii::$app->Url->imgUrl() . \common\models\ShopProductsGalleries::findOne(['product_id' => $product->id])->img,
                                        ['class' => 'product-1']
                                    ) ?>
                                        <a class="link" href="<?= Yii::$app->Url->path ?>site/item/<?= $product->id ?>"></a>
                                    </div>
                                    <ul class="product-meta text-center">
                                        <li><a data-tooltip="tooltip" data-placement="top" title="Add to Cart" href="#"><i class="fal fa-Shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-content d-flex justify-content-between">
                                    <div class="product-title">
                                        <h4 class="title"><a href="product-simple-01.html"></a></h4>
                                    </div>
                                    <div class="product-price">
                                        <span class="price"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Product End -->
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- Get all panels -->
            <?php
                $i = 1;
                foreach($categories as $category):
            ?>
                <div class="tab-pane fade" id="tab<?= $i ?>">
                    <div class="row">
                        <?php
                            $tmp_model = \common\models\ShopProducts::find()->where(['category_id' => $category->id])->limit(12)->all();
                            foreach ($tmp_model as $product):
                        ?>
                            <!-- Single Product -->
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="single-product mt-50">
                                    <div class="product-image">
                                        <div class="image">
                                            <?= Html::img(
                                                Yii::$app->Url->imgUrl() . \common\models\ShopProductsGalleries::findOne(['product_id' => $product->id])->img,
                                                ['class' => 'product-1']
                                            ) ?>
                                            <a class="link" href="<?= Yii::$app->Url->path ?>site/item/<?= $product->id ?>"></a>
                                        </div>
                                        <ul class="product-meta text-center">
                                            <li>
                                                <a data-tooltip="tooltip" data-placement="top" title="Add to Cart" href="#"><i class="fal fa-Shopping-cart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-content d-flex justify-content-between">
                                        <div class="product-title">
                                            <h4 class="title"><a href="product-simple-01.html"></a></h4>
                                        </div>
                                        <div class="product-price">
                                            <span class="price"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Product End -->
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php 
                $i++;
                endforeach;
            ?>
        </div>
    </div>
</section>