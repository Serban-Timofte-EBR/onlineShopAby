<?php

use yii\helpers\Html;
?>

<!--====== Page Banner Start ======-->

<section class="page-banner bg_cover" style="background-image: url();">
    <div class="container">
        <div class="page-banner-content text-center">
            <h2 class="title">Coș</h2>
            
        </div>
    </div>
</section>

<!--====== Page Banner Ends ======-->

<!--====== Cart Start ======-->

<section class="cart-page pt-80 pb-80">
    <form action="<?= Yii::$app->Url->path . 'site/update-cart' ?>" method="POST">
        <div class="container">
            <div class="cart-table table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="delete"></th>
                            <th class="product">Product</th>
                            <th class="price">Price</th>
                            <th class="quantity">Quantity</th>
                            <th class="Total">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                            foreach(Yii::$app->cart->getItems() as $item):
                                $product = $item->getProduct();
                                $img = \common\models\ShopProductsGalleries::findOne(['product_id' => $product->id]);
                        ?>
                            <tr>
                                <td class="delete">
                                    <?= Html::a('<i class="far fa-trash-alt"></i>', ['/site/item-cancel', 'id' => $product->id], ['class' => 'product-delete']); ?>
                                </td>
                                <td class="product">
                                    <div class="cart-product">
                                        <div class="product-image">
                                            <?= Html::img(Yii::$app->Url->imgUrl() . $img->img); ?>
                                        </div>
                                        <div class="product-content">
                                            <h5 class="title"><?= Html::a($product->product_name, ['/site/item', 'id' => $product->id]); ?></h5>
                                        </div>
                                    </div>
                                </td>
                                <td class="price">
                                    <p class="cart-price"><?= number_format($item->getPrice(), 2, ',', ' '); ?> RON</p>
                                </td>
                                <td class="quantity">
                                    <div class="product-quantity d-inline-flex">
                                        <button type="button" class="sub"><i class="fal fa-minus"></i></button>
                                        <input type="text" name="qty+<?= $product->id ?>" value="<?= $item->getQuantity() ?>" />
                                        <button type="button" class="add"><i class="fal fa-plus"></i></button>
                                    </div>
                                </td>
                                <td class="Total">
                                    <p class="cart-price"><?=  number_format($item->getCost(), 2, ',', ' ') ?> RON</p>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        
                    </tbody>
                </table>
            </div>
            <div class="cart-btn">
                <div class="cart-btn-left">
                    <?= Html::a('Continue Shopping', ['/site/shop'], ['class' => 'main-btn']); ?>
                    <div class="main-btn">Total: <?= number_format(Yii::$app->cart->getTotalCost(), 2, ',', ' '); ?> RON</div>
                </div>
                <div class="cart-btn-right">
                    <?= Html::a('Clear Cart', ['/site/clear-cart'], ['class' => 'main-btn main-btn-2']); ?>
                    <input type="submit" value="Update Cart" class="main-btn main-btn-2" />
                </div>
            </div>
                <div class="cart-total-btn mt-20">
                    <?= Html::a('Proceed to Checkout', ['/site/checkout'], ['class' => 'main-btn btn-block']); ?>
                </div>  
            </div>
        </div>
    </form>
</section>

<!--====== Cart Ends ======-->