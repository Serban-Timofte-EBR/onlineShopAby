<?php

    use yii\helpers\Html;

    $this->title = 'Despre Noi';
?>

<!--====== Page Banner Start ======-->
<section class="page-banner banner-02 bg_cover" style="background-image: url();">
    <div class="container">
        <div class="page-banner-content text-center">
            <h2 class="title">Despre noi</h2>
            
        </div>
    </div>
</section>
<!--====== Page Banner Ends ======-->

<!--====== About Start ======-->
<section class="about-area pt-50">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-content mt-45">
                    <h2 class="title">Bun venit la <?= Html::img(Yii::$app->Url->assetImgUrl() . 'favicon-logo.png'); ?></h2>
                    <p>ABYSAND,  producator de mobilier tapitat acreditat si certificat atat pentru piata din Romania cat si la nivel international. Oferim o selecție inspirată de paturi moderne, canapele de colț contemporane, canapele cu 3 și 2 locuri multifunctionale si fotolii unde confortul iti defineste existenta.<br> <br> Toate gamele noastre de produse, oferă un design excepțional și sunt disponibile din material textil sau inlocuitor de piele, cu opțiuni de dimensiuni multiple. Suntem convinsi ca, rasfoind catalogul nostru online, ve-ti gasi cu siguranta modelul de mobilier tapitat preferat. Cu o experiență de peste 10 ani pe piața modernă de mobilă, ne-am straduit sa devenim din ce in ce mai buni, pentru a oferii atat modele de mobilier moderne si atractive dar si o calitate excelenta a produselor noastre.</p>
                    <div class="about-signature">
                        <br><br>
                        <p>Valeria Șipoș • Director General</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-image mt-50">
                    <?= Html::img(Yii::$app->Url->assetImgUrl() . 'rsz_poza3.jpg'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== About Ends ======-->

<!--====== Features Start ======-->
<section class="features-area-3 pt-90">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 col-sm-7">
                <div class="features-inner-box text-center mt-30">
                    <div class="box-icon">
                        <i class="far fa-cut"></i>
                    </div>
                    <div class="box-contents">
                        <h5 class="title">Design Creative</h5>
                        <p>Design potrivit pentru orice tip de locuință în funcție de preferințele cumpărătorului</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-7">
                <div class="features-inner-box text-center mt-30">
                    <div class="box-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="box-contents">
                        <h5 class="title">Livrare rapidă</h5>
                        <p>Realizarea și livrarea produsului în doar căteva zile</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-7">
                <div class="features-inner-box text-center mt-30">
                    <div class="box-icon">
                        <i class="fas fa-user-lock"></i>
                    </div>
                    <div class="box-contents">
                        <h5 class="title">Cumpărături în siguranță</h5>
                        <p>Experiența de navigare, cât și întreg procesul de cumpărare, sunt făcute în condiții de siguranță</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>        
<!--====== Features Ends ======-->

<!--====== Progress Bar Start ======-->
<section class="progress-area pt-110">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center pb-30">
                    <h2 class="title">Vă oferim</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="skill-progress-bar">
                    <div class="skill-item mt-30">
                        <div class="skill-header">
                            <h6 class="skill-title">Design fresh</h6>                                
                        </div>
                        <div class="skill-bar">
                            <div class="bar-inner">
                                <div class="bar progress-line" data-width="100">
                                    <span class="skill-percentage">100%</span>                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="skill-item mt-30">
                        <div class="skill-header">
                            <h6 class="skill-title">Realizare în timp scurt</h6>                                
                        </div>
                        <div class="skill-bar">
                            <div class="bar-inner">
                                <div class="bar progress-line" data-width="80">
                                    <span class="skill-percentage">80%</span>                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-6">
                <div class="skill-progress-bar">
                    <div class="skill-item mt-30">
                        <div class="skill-header">
                            <h6 class="skill-title">Produse calitative</h6>                                
                        </div>
                        <div class="skill-bar">
                            <div class="bar-inner">
                                <div class="bar progress-line" data-width="100">
                                    <span class="skill-percentage">100%</span>                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="skill-item mt-30">
                        <div class="skill-header">
                            <h6 class="skill-title">Consultanță în alegeri</h6>                                
                        </div>
                        <div class="skill-bar">
                            <div class="bar-inner">
                                <div class="bar progress-line" data-width="70">
                                    <span class="skill-percentage">70%</span>                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== Progress Bar Ends ======-->