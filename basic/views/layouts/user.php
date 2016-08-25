<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

$this->registerLinkTag([
    'rel' => 'icon',
    'type' => 'image/x-icon',
    'href' => '/images/favicon.ico',
]);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

        
    <!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
        <![endif]-->
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <!-- Page-->
    <div class="page">
      <!-- Page Header-->
      
      <?= $content ?>
      <!-- Brands carousel-->
      <section class="section-35 section-sm-75 bg-alabaster">
        <div class="shell">
          <div class="range">
            <div class="cell-xs-12">
              <div data-items="1" data-xs-items="2" data-sm-items="4" data-md-items="6" data-stage-padding="15" data-margin="30" data-nav="false" class="owl-carousel owl-carousel-centered">
                <div class="item">
                    <figure>
                      <?= Html::img('@web/images/offer/logo/2.png',['alt' => 'Kredito24', 'height' => 75]) ?>
                    </figure>
                </div>
                <div class="item">
                    <figure>
                      <?= Html::img('@web/images/offer/logo/4.png',['alt' => 'Ferratum', 'height' => 75]) ?>
                    </figure>
                </div>
                <div class="item">
                    <figure>
                      <?= Html::img('@web/images/offer/logo/3.png',['alt' => 'Lime', 'height' => 75]) ?>
                    </figure>
                </div>
                <div class="item">
                    <figure>
                      <?= Html::img('@web/images/offer/logo/5.png',['alt' => 'MangoMoney', 'height' => 75]) ?>
                    </figure>
                </div>
                <div class="item">
                    <figure>
                      <?= Html::img('@web/images/offer/logo/6.png',['alt' => 'Mili', 'height' => 75]) ?>
                    </figure>
                </div>
                <div class="item">
                    <figure>
                      <?= Html::img('@web/images/offer/logo/7.png',['alt' => 'MoneyMan', 'height' => 75]) ?>
                      
                    </figure>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Page Footer-->
      <footer class="page-foot">
        <section class="section-45 section-sm-75 bg-river-bed">
          <div class="shell text-center text-sm-left">
            <div class="range range-xs-center">
              <div class="cell-xs-12 cell-sm-6 cell-lg-6 offset-top-45 offset-lg-top-0">
                <h4>Подписка</h4>
                <hr class="hr-variant-1">
                <p>Подпишитесь на новые предложения.</p>
                <div name = "result-subcribe"></div>
                <!-- RD Mailform-->
                <?= $this->render('_subscribe') ?>
                
              </div>
              <!--<div class="cell-xs-12 cell-sm-6 cell-lg-3"><a href="index.html" class="brand offset-top-5"><span class="text-thin text-primary">[</span>
                  <div class="brand-name"><span class="text-ubold">Fin</span><span class="text-thin">Expert</span></div><span class="text-thin text-primary">]</span></a>
                <p class="offset-sm-top-34">
                  Welcome to the leading company
                  delivering services that combine
                  quality, reliability and compliance!
                </p>
                <div class="elements-group-1 offset-top-22"><span class="small text-italic">Follow Us:</span>
                  <ul class="list-inline">
                    <li><a href="#" class="icon icon-xxs icon-circle icon-dark icon-white-filled fa-facebook"></a></li>
                    <li><a href="#" class="icon icon-xxs icon-circle icon-dark icon-white-filled fa-twitter"></a></li>
                    <li><a href="#" class="icon icon-xxs icon-circle icon-dark icon-white-filled fa-google-plus"></a></li>
                  </ul>
                </div>
              </div>-->
              
              <div class="cell-xs-12 cell-sm-6 cell-lg-6 offset-top-45 offset-lg-top-0">
                <h4>Контакты</h4>
                <hr class="hr-variant-1">
                <address class="contact-info reveal-inline-block">
                  <ul class="contact-info-list">
                    <li class="unit unit-horizontal unit-spacing-md">
                      <div class="unit-left"><span class="icon icon-sm icon-picton-blue fa-phone"></span></div>
                      <div class="unit-body"><span class="text-bold"><a href="callto:#">(495) 663-00-00</a></span></div>
                    </li>
                    <li class="unit unit-horizontal unit-spacing-md">
                      <div class="unit-left"><span class="icon icon-sm icon-picton-blue fa-envelope-o"></span></div>
                      <div class="unit-body"><span><a href="mailto:#">info@eZaimExpert.ru</a></span></div>
                    </li>
                    <li class="unit unit-horizontal unit-spacing-md">
                      <div class="unit-left"><span class="icon icon-sm icon-picton-blue fa-clock-o"></span></div>
                      <div class="unit-body"><span>Mon - Sat: 9:00 - 18:00</span></div>
                    </li>
                    <li class="unit unit-horizontal unit-spacing-md">
                      <div class="unit-left"><span class="icon icon-sm icon-picton-blue fa-map-marker"></span></div>
                      <div class="unit-body"><span><a href="#"><span class="text-bold">ул. Ферганская, 17</span><span>109444, г. Москва</span></a></span></div>
                    </li>
                  </ul>
                </address>
              </div>
              
            </div>
          </div>
        </section>
        <section class="section-14 bg-ebony-clay">
          <div class="shell text-center">
            <p class="rights">&#169;&nbsp;<span id="copyright-year"></span>&nbsp;eZaimExpert.
              <!-- {%FOOTER_LINK}-->
            </p>
          </div>
        </section>
      </footer>
    </div>
    <!-- Global Mailform Output-->
    <div id="form-output-global" class="snackbars"></div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
