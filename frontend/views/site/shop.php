<?php

    use yii\helpers\Html;
?>

<!--====== Shop Page Start ======-->
<section class="shop-page pt-30 pb-80" style="margin-top: 60px;">
    <div class="container-fluid shop-container">
        <div class="row flex-md-row-reverse justify-content-between">                
            <div class="col-lg-9 content-col">
                <div class="shop-top-bar mt-35">
                    <div class="shop-top-left">  
                    </div>

                    <div class="shop-top-right">
                        <div class="shop-sort">
                            <form id="frm" action="#" method="GET">
                                <select id="resizing_select">
                                    <option value="0" selected="selected">Sortare</option>
                                    <option value="4">Cele mai noi</option>
                                    <option value="5">Preț - mic la mare</option>
                                    <option value="6">Preț - mare la mic</option>
                                </select>
                            </form>
                            <i class="fal fa-chevron-down"></i>
                            <select id="width_tmp_select">
                                <option id="width_tmp_option"></option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="shop-product">
                    <div class="row">
                        <?php
                            foreach ($products as $product):
                                $img = \common\models\ShopProductsGalleries::findOne(['product_id' => $product->id]);
                        ?>
                            <div class="product-col col-xl-3 col-lg-4 col-sm-6">
                                <div class="single-product mt-50">
                                    <div class="product-image">
                                        <div class="image">
                                            <?= Html::img(Yii::$app->Url->imgUrl() . $img->img); ?>
                                            <a class="link" href="<?= Yii::$app->Url->path . 'site/item/' . $product->id ?>"></a>
                                        </div>
                                        <ul class="product-meta text-center">
                                            <li><a data-tooltip="tooltip" data-placement="top" title="Add to Cart" href="#"><i class="fal fa-Shopping-cart"></i></a></li>
                                            <li><a data-tooltip="tooltip" data-placement="top" title="Quick Shop" data-toggle="modal" data-target="#productQuick" href="#"><i class="fal fa-search-plus"></i></a></li>
                                            <li><a data-tooltip="tooltip" data-placement="top" title="Add to Wishlist" href="#"><i class="fal fa-heart"></i></a></li>
                                            <li><a data-tooltip="tooltip" data-placement="top" title="Add to Compare" href="#"><i class="fal fa-repeat-alt"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product-content d-flex justify-content-between">
                                        <div class="product-title">
                                            <h4 class="title"><?= Html::a($product->product_name, ['/site/item', 'id' => $product->id]); ?></h4>
                                        </div>
                                        <div class="product-price">
                                            <span class="price"><?= $product->price ?> RON</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <div class="pagination-items mt-80">
                    <ul class="pagination justify-content-center">
                        <li><a class="prev" href="#">Previous</a></li>
                        <li><a href="#">1</a></li>
                        <li><a class="active" href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a class="next" href="#">Next</a></li>
                    </ul>                    
                </div>                    
            </div>

            <div class="col-xl-3 sidebar-col">
                <div class="shop-sidebar">
                    <div class="shop-sidebar-search mt-50">
                        <h4 class="sidebar-title">Căutare</h4>

                        <div class="sidebar-search-form">
                            <form action="#">
                                <input type="text" placeholder="Introdu produsul căutat…">
                                <button><i class="far fa-search"></i></button>
                            </form>
                        </div>
                    </div>

                    <div class="shop-sidebar-category mt-50">
                        <h4 class="sidebar-title">Categorii</h4>

                        <div class="sidebar-category">
                            <ul class="category-list">
                                <li><?= Html::a('Toate Produsele', ['/site/shop']) ?></li>
                                <?php foreach ($categories as $category): ?>
                                    <li><?= Html::a($category->category_name, ['/site/shop', 'category' => $category->id]) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== Shop Page Ends ======-->