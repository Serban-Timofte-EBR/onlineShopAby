<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!-- Preloader start -->
<div class="preloader">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>
<!-- Preloader end -->

<!--====== Header Start ======-->
<header class="header-area">
    <div class="header-navbar">
        <div class="container-fluid custom-container">
            <div class="header-wrapper d-flex justify-content-between align-items-center">

                <div class="header-logo">
                    <?= Html::a(Html::img(Yii::$app->Url->assetImgUrl() . '/favicon-logo.png', ['alt' => 'logo, abysand']), ['/']); ?>
                </div>

                <div class="header-menu site-nav d-none d-lg-block">
                    <ul class="main-menu">
                        <li class="static active">
                            
                        </li>
                        <li class="static">
                            <?= Html::a('Magazin', ['/']); ?>
                            <ul class="sub-menu sub-mega-menu flex-wrap">
                                <li>
                                    <ul class="sub-mega-item">
                                        <?= Html::a('Magazin', ['/site/shop']); ?>
                                        <?= Html::a('Galerie', ['/site/gallery']); ?>
                                    </ul>
                                </li>
                                
                                <li>
                                    <a class="menu-title" href="#">Comenzi</a>
                                    <ul class="sub-mega-item">
                                        
                                        <li><?= Html::a('Checkout', ['/site/checkout']); ?></li>
                                        <li><?= Html::a('Coș', ['/site/view-cart']); ?></li>
                                        
                                    </ul>
                                </li>
                                <li>
                                    <a class="menu-image" href="shop-sidebar.html">
                                        <?= Html::img(Yii::$app->Url->assetImgUrl() . '/poza21.jpg', ['alt' => 'menu, menu photo']) ?>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Utile</a>
                            <ul class="sub-menu">
                                <li>
                                    <?= Html::a('Despre Noi', ['/site/about']); ?> 
                                </li>
                                <li>
                                    <?= Html::a('Serviciile Noastre', ['/site/services']); ?>
                                </li>
                            </ul>
                        </li>
                        <li><?= Html::a('Galerie', ['/site/gallery']); ?> <span>Hot</span></li>
                        
                        <li><?= Html::a('Contact', ['/site/contact']); ?></li>
                    </ul>
                </div>

                <div class="header-meta">
                    <ul class="meta">
                        <li><a class="cart-toggle" href="javascript:void(0)"><i class="far fa-Shopping-cart"></i><span><?= Yii::$app->cart->getTotalCount() ?></span></a></li>
                        <li><a class="search-toggle" href="javascript:void(0)"><i class="far fa-search"></i></a></li>
                        <li><a class="sidebar-toggle" href="javascript:void(0)"><i class="fal fa-bars"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>

        <div id="dl-menu" class="dl-menuwrapper d-lg-none">
            <button class="dl-trigger"></button>
            
            <ul class="dl-menu">
                <li>
                    <a href="#">Shop</a>
                    <ul class="dl-submenu">
                        <li><?= Html::a('Magazin', ['/site/shop']) ?></li>
                        <li><?= Html::a('Galerie', ['/site/gallery']) ?></li>
                        <li>
                            <a href="#">Comenzi</a>
                            <ul class="dl-submenu">
                                <li><?= Html::a('Checkout', ['/site/checkout']) ?></li>
                                <li><?= Html::a('Coș', ['/site/view-cart']) ?></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Utile</a>
                    <ul class="dl-submenu">
                        <li>
                            <a href="about-01.html">Despre noi</a>
                            <?= Html::a('Despre Noi', ['/site/about']) ?>
                        </li>
                        <li><?= Html::a('Serviciile Noastre', ['/site/services']) ?></li>
                    </ul>
                </li>
                <li><?= Html::a('Contact', ['/site/contact']) ?></li>
            </ul>
        </div>
    </div>
</header>
<!--====== Header Ends ======-->

<!--====== Search Start ======-->
<div class="search-wrapper">
    <div class="search-box">
        <a href="javascript:void(0)" class="search-close"><i class="fal fa-times"></i></a>
        <div class="search-form">
            <label>Start typing and press Enter to search</label>
            <div class="search-input">
                <form action="#">
                    <input type="text" placeholder="Search entire store…">
                    <button><i class="far fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--====== Search Ends ======-->

<!--====== Off Canvas Cart Start ======-->
<div class="off-canvas-cart-wrapper">
    <div class="off-canvas-cart-box">
        <a href="javascript:void(0)" class="cart-close"><i class="fal fa-times"></i></a>
        <div class="off-canvas-cart-content">
            <div class="cart-title">
                <h5 class="title">Shopping Cart</h5>
            </div>
            <div class="cart-product-widget">
                <ul>
                    <?php
                        foreach(Yii::$app->cart->getItems() as $item): 
                            $product = $item->getProduct();
                            $img = \common\models\ShopProductsGalleries::findOne(['product_id' => $product->id]);
                    ?>
                    <li>
                        <div class="cart-product d-flex">
                            <div class="cart-product-image">
                                <a href="product-simple-01.html"><img src="<?= Yii::$app->Url->imgUrl() . $img->img ?>" alt="product"></a>
                            </div>
                            <div class="cart-product-content media-body">
                                <h6 class="title"><?= Html::a($product->product_name, ['/site/item', 'id' => $product->id]) ?></a> <br/>
                                <span class="price"><?= $item->getQuantity(); ?>x <span><?= $product->price ?></span><span>RON</span></span>
                            </div>
                            <?= Html::a('<i class="fal fa-times"></i>', ['/site/item-cancel', 'id' => $product->id], ['class' => 'product-cancel']) ?>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>   
                <div class="cart-product-total">
                    <p class="value">Subtotal</p>
                    <p class="price"><?= number_format(Yii::$app->cart->getTotalCost(), 2, ',', ' ') ?></p><p>RON</p>
                </div>           
                <div class="cart-product-btn">
                    <?= Html::a('View Cart', ['/site/view-cart'], ['class' => 'main-btn btn-block']) ?>
                    <?= Html::a('To Checkout', ['/site/checkout'], ['class' => 'main-btn btn-block']) ?>
                </div>           
            </div>
        </div>
    </div>
</div>
<!--====== Off Canvas Cart Ends ======-->

<!--====== Off Canvas Sidebar Start ======-->
 <div class="off-canvas-sidebar">
    <div class="off-canvas-sidebar-wrapper">
        <a class="sidebar-close" href="javascript:void(0)"><i class="fal fa-times"></i></a>
        <div class="off-canvas-sidebar-box">
            <a class="logo" href="index11.html">
                <?= Html::img(Yii::$app->Url->assetImgUrl() . '/favicon-logo.png', ['alt' => 'logo, abysand']) ?>
            </a>
            <p class="text">ABYSAND, producator de mobilier tapitat acreditat si certificat atat pentru piata din Romania cat si la nivel international. Oferim o selecție inspirată de paturi moderne, canapele de colț contemporane, canapele cu 3 și 2 locuri multifunctionale si fotolii unde confortul iti defineste existenta.. <a href="http://www.top10k.ro/galerie-trofee-2000169-Abysan/"> Locul 4 in Top 10k Galati</a></p>
            <ul class="sidebar-social">
                <li><a href="https://www.facebook.com/MobilaAbysand/" target="_blank"><i class="fab fa-facebook-f"></i></a></li> 
            </ul>
            <div class="sidebar-image">
                <img src="" alt="">
            </div>
            <ul class="sidebar-info">
                <li>
                    <div class="single-info">
                        <div class="info-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="info-content">
                            <p><a href="tel:61292515600">+40 755 904 567</a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="single-info">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info-content">
                            <p><a href="mailto://info@hasthemes.com">office@abysand.ro</a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="single-info">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-content">
                            <p>Galați, str Regimentul 11 Siret nr 8, Bl C12, Ap 52</p>
                        </div>
                    </div>
                </li>
            </ul>
            <p class="copyright">&copy; Copyright 2020 Created  <a href="https://www.facebook.com/TSV-Code-424671588449471/?modal=admin_todo_tour" target="_blank">TSV Code </a></p>
        </div>
    </div>
</div>

<!--====== Off Canvas Sidebar Ends ======-->

<?= $content ?>

<!--====== Footer Start ======-->
<footer class="footer-area pt-50 pb-55" style="margin-top: 20px">
    <div class="footer-widget">
        <div class="container footer-container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-logo-copyright mt-30">
                        <a href="index-11.html">
                            <?= Html::img(Yii::$app->Url->assetImgUrl() . '/favicon-logo.png', ['alt' => 'logo, abysand']) ?>
                        </a>
                        <p class="copyright">&copy; Copyright <?= date('Y') ?>. Designed by <a href="https://www.facebook.com/TSV-Code-424671588449471/?modal=admin_todo_tour" target="_blank">TSV Code</a>. Built by <a href="https://www.facebook.com/moldovan.andrei.391">Andrei Moldovan</a>.</p>
                    </div>
                    <div class="footer-social mt-30">
                        <ul class="social">
                            <li><a href="https://www.facebook.com/MobilaAbysand/?ref=page_internal" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer-link-wrapper flex-wrap">
                        <div class="footer-link mt-30">
                            <h5 class="footer-title">Useful Link</h5>
                            <ul class="link">
                                <li><a href="contact.html">Help & Contact</a></li>
                                <li><a href="contact.html">Returns & Refunds</a></li>
                                <li><a href="terms.html">Terms & Conditions</a></li>
                            </ul>
                        </div>
                        <div class="footer-link mt-30">
                            <h5 class="footer-title">Company</h5>
                            <ul class="link">
                                <li><a href="about-01.html">About Us</a></li>
                                <li><a href="our-services.html">Serviciile noastre</a></li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-3">
                    <iframe SameSite="None" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2800.2890508515907!2d28.03287037250647!3d45.42367428241336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b6dee5d499d1d7%3A0x9825ee9c879ed65!2sStrada%20Regimentul%2011%20Siret%208%2C%20Gala%C8%9Bi!5e0!3m2!1sro!2sro!4v1598271586407!5m2!1sro!2sro" width="280" height="180" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--====== Footer Ends ======-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
