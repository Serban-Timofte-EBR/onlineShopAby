<?php

    use yii\helpers\Html;

    $this->title = 'Serviciile Noastre';
?>

<!--====== Page Banner Start ======-->
<section class="page-banner banner-03 bg_cover" style="background-image: url();">
    <div class="container">
        <div class="page-banner-content page-banner-content-2 text-center">
            <h2 class="title" style="color:black">Serviciile noastre</h2>
        </div>
    </div>
</section>
<!--====== Page Banner Ends ======-->

<!--====== Service Start ======-->
<section class="services-page pt-100 pb-160">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="services-title text-center">
                    <h2 class="title">Cele mai bune servicii</h2> 
                    <?= Html::img(Yii::$app->Url->assetImgUrl() . 'favicon-logo.png') ?>
                    
                    <p style='color:green'>Echipa noastră <b>construiește</b>: </p>
                </div>
            </div>
        </div>
        <div class="services-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="services-image mt-50">
                    <?= Html::img(Yii::$app->Url->assetImgUrl() . 'rsz_poza23.jpg') ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="services-content mt-50">
                        <p class="subheading">“Moda este armura care te ajută să supraviețuiești zi de zi”</p>
                        <h4 class="name">Fernande Garvin</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="services-element pt-110">
            <div class="row flex-md-row-reverse">
                <div class="col-md-6">
                    <div class="services-element-image mt-50">
                    <?= Html::img(Yii::$app->Url->assetImgUrl() . 'rsz_patrosu8.jpg') ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="services-element-content mt-50">
                    <!--<br><br><br><br><br>-->
                        <h4 class="title">Design pentru paturi tapițate fixe sau rabatabile</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="services-element pt-110">
            <div class="row">
                <div class="col-md-6">
                    <div class="services-element-image mt-50">
                        <?= Html::img(Yii::$app->Url->assetImgUrl() . 'pozapt6.jpeg') ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="services-element-content mt-50">
                    <!--<br><br><br><br><br>-->
                        <h4 class="title">Design pentru colțare extensibile</h4>
                    </div>
                </div>                    
            </div>
        </div>
        
        <div class="services-element pt-110">
            <div class="row flex-md-row-reverse">
                <div class="col-md-6">
                    <div class="services-element-image mt-50">
                        <?= Html::img(Yii::$app->Url->assetImgUrl() . 'rsz_poza19.jpg') ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="services-element-content mt-50">
                    <!--<br><br><br><br>-->
                        <h4 class="title">Design pentru canapele fixe sau extensibile</h4>
                    </div>
                </div>
                
            </div>
        </div>
        
        <div class="services-element pt-110">
            <div class="row ">
                <div class="col-md-6">
                    <div class="services-element-image mt-50">
                    <?= Html::img(Yii::$app->Url->assetImgUrl() . 'rsz_poza23.jpg') ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="services-element-content mt-50">
                    <!--<br><br><br><br><br>-->
                        <h4 class="title">Diverse modele pentru fotolii și tabureți</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!--<br><br><br><br><br><br><br><br>-->
<div class="section-title text-center">
    <h2 class="title">Certificări</h2>
</div>

<section class="services-page pt-100 pb-160">
    <div class="container">
        <div class="services-element pt-110">
            <div class="row flex-md-row-reverse">
                <div class="col-md-6">
                    <div class="services-element-image mt-50">
                        <?= Html::img(Yii::$app->Url->assetImgUrl() . 'cert1.jpeg') ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="services-element-content mt-50">
                    <!--<br><br><br><br><br>-->
                        <h4 class="title">Locul 2 în Top Afaceri România 2019</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="services-element pt-110">
            <div class="row">
                <div class="col-md-6">
                    <div class="services-element-image mt-50">
                        <?= Html::img(Yii::$app->Url->assetImgUrl() . 'cert2.jpeg') ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="services-element-content mt-50">
                    <br><br><br><br><br>
                        <h4 class="title">Firmă de încredere 2020 - Elite</h4>
                    </div>
                </div>                    
            </div>
        </div>
        
            <div class="services-element pt-110">
            <div class="row flex-md-row-reverse">
                <div class="col-md-6">
                    <div class="services-element-image mt-50">
                        <?= Html::img(Yii::$app->Url->assetImgUrl() . 'cert3.jpeg') ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="services-element-content mt-50">
                    <br><br><br><br><br><br><br>
                        <h4 class="title">Firmă de încredere 2019 - Gold</h4>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="services-element pt-110">
            <div class="row">
                <div class="col-md-6">
                    <div class="services-element-image mt-50">
                        <?= Html::img(Yii::$app->Url->assetImgUrl() . 'cert4.jpeg') ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="services-element-content mt-50">
                    <!--<br><br><br><br><br><br><br>-->
                        <h4 class="title">Sistem de management al calității</h4>
                    </div>
                </div>                    
            </div>
        </div>
</section>
<!--====== Service Ends ======-->