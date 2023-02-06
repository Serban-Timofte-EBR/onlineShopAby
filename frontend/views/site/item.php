<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Abysand: ' . $product->product_name;
?>

<!--====== Page Banner Start ======-->
<section class="page-banner bg_cover" style="background-image: url();">
    <div class="container">
        <div class="page-banner-content text-center">
            <h2 class="title"><?= $product->product_name ?></h2>
        </div>
    </div>
</section>
<!--====== Page Banner Ends ======-->

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

<!--====== Product Simple Start ======-->
<section class="product-simple-area pt-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product-simple-image flex-wrap mt-50">
                    <button
                        class="product-gallery-popup"
                        data-hint="Click to enlarge"
                        data-images='[<?= $gallery_json_obj ?>]'>
                            <i class="far fa-search-plus"></i>
                    </button>
                    
                    <div class="product-simple-preview-image">
                        <?= Html::img(Yii::$app->Url->imgUrl() . $gallery_zoom_image->img, ['class' => 'product-zoom']); ?>
                    </div>

                    <div id="gallery_01" class="product-simple-thumb-image">
                        <?php 
                            $i = false;
                            foreach ($gallery as $img):
                        ?>
                            <div class="single-product-thumb">
                                <a <?php if ($i === false) { echo 'class="active"'; $i = true; } ?> href="#" data-image="<?= Yii::$app->Url->imgUrl() . $img->img ?>">
                                    <?= Html::img(Yii::$app->Url->imgUrl() . $img->img); ?>
                                </a>                                
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product-simple-details mt-50">
                    <h4 class="title">Oversized Check Dress</h4>
                    <p class="sku-id">REF. 1104693 - TOMY <span>9987 in stock</span></p>

                    <p class="review">
                        <i class="fas fa-star review-on"></i>
                        <i class="fas fa-star review-on"></i>
                        <i class="fas fa-star review-on"></i>
                        <i class="fas fa-star review-on"></i>
                        <i class="fas fa-star review-on"></i>
                        <a href="#">(3 customer reviews)</a>
                    </p>

                    <div class="product-price">
                        <span class="price">£200.00</span>
                    </div>
                    <div class="product-quantity-cart-wishlist-compare flex-wrap">
                        <form action="<?= Yii::$app->Url->path . 'site/add-to-cart' ?>" method="POST">
                            <div class="product-quantity d-flex">
                                <button type="button" class="sub"><i class="fal fa-minus"></i></button>
                                <input name="qty" type="text" value="1" />
                                <button type="button" class="add"><i class="fal fa-plus"></i></button>
                                <input name="id" type="text" value="<?= $product->id ?>" style="display: none" />
                            </div>
                            <div class="product-cart">
                                <input type="submit" class="main-btn add-to-cart" value="Add to Cart">
                            </div>
                        </form>
                    </div>

                    <div class="product-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam elementum turpis in leo eleifend ultrices. Fusce egestas vehi</p>

                        <ul class="description-list">
                            <li>Cotton-blend fabric</li>
                            <li>Check-pattern</li>
                            <li>Removable belt at the waist</li>
                            <li>High waist</li>
                        </ul>
                    </div>

                    <div class="product-meta">
                        <p>Categories: <a href="#">Metro,</a> <a href="">Women</a></p>
                        <p>Tags: <a href="#">Dress,</a> <a href="#">Fashion</a> <a href="#">Furniture,</a> <a href="#">Lookbook</a></p>
                    </div>

                    <div class="product-share">
                        <ul class="social">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== Product Simple Ends ======-->

<!--====== Photo Swipe Start ======-->

<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

<div class="pswp__bg"></div>

<div class="pswp__scroll-wrap">
    
    <div class="pswp__container">
        <div class="pswp__item"></div>
        <div class="pswp__item"></div>
        <div class="pswp__item"></div>
    </div>

    <div class="pswp__ui pswp__ui--hidden">

        <div class="pswp__top-bar">

            <div class="pswp__counter"></div>

            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

            <button class="pswp__button pswp__button--share" title="Share"></button>

            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

            <div class="pswp__preloader">
                <div class="pswp__preloader__icn">
                    <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
            <div class="pswp__share-tooltip"></div>
        </div>

        <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
        </button>

        <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
        </button>

        <div class="pswp__caption">
            <div class="pswp__caption__center"></div>
        </div>

    </div>
</div>
</div>

<!--====== Photo Swipe Ends ======-->

<!--====== Overlay Start ======-->

<div class="overlay"></div>

<!--====== Overlay Ends ======-->