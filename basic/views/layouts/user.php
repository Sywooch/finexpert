<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    
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
      <header class="page-head">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-lg-stick-up-clone="true" data-md-stick-up-offset="157px" data-lg-stick-up-offset="157px" class="rd-navbar rd-navbar-default">
            <div class="rd-navbar-inner">
              <!-- RD Navbar Panel-->
              <div class="rd-navbar-panel">
                <!-- RD Navbar Toggle-->
                <button data-rd-navbar-toggle=".rd-navbar-nav-wrap" class="rd-navbar-toggle"><span></span></button>
                <!-- RD Navbar Brand--><a href="index.html" class="rd-navbar-brand"><span class="text-thin text-primary">[</span>
                  <div class="brand-name"><span class="text-ubold text-river-bed">eZaim</span><span class="text-thin">Expert</span></div><span class="text-thin text-primary">]</span></a>
              </div>
              <div class="rd-navbar-aside">
                <div data-rd-navbar-toggle=".rd-navbar-aside" class="rd-navbar-aside-toggle"><span></span></div>
                <div class="rd-navbar-aside-content">
                  <ul class="block-wrap-list">
                    <li class="block-wrap">
                      <div class="unit unit-sm-horizontal unit-align-center unit-middle unit-spacing-sm">
                        <div class="unit-left">
                          <figure><!--<img src="images/icon-clock-32x32.png" alt="" width="32" height="32"/>-->
                          <span class="icon icon-md-variant-1 icon-primary fa-clock-o"></span>
                          </figure>
                        </div>
                        <div class="unit-body">
                          <address class="contact-info"><span class="text-bold text-gray-base">Выберите сумму</span><span class="text-bold text-gray-base">и срок займа</span></address>
                        </div>
                      </div>
                    </li>
                    <li class="block-wrap">
                      <div class="unit unit-sm-horizontal unit-align-center unit-middle unit-spacing-sm">
                        <div class="unit-left">
                          <figure><!--<img src="images/icon-map-marker-25x33.png" alt="" width="25" height="33"/>-->
                            <span class="icon icon-md-variant-1 icon-primary fa-pencil-square-o"></span>
                          </figure>
                        </div>
                        <div class="unit-body">
                          <address class="contact-info"><span class="text-bold text-gray-base">Заполните</span><span class = "text-bold text-gray-base">форму</span></address>
                        </div>
                      </div>
                    </li>
                    <li class="block-wrap">
                      <div class="unit unit-sm-horizontal unit-align-center unit-middle unit-spacing-sm">
                        <div class="unit-left">
                          <figure><!--<img src="images/icon-phone-28x29.png" alt="" width="28" height="29"/>-->
                            <span class="icon icon-md-variant-1 icon-primary fa-money"></span>
                          </figure>
                        </div>
                        <div class="unit-body">
                          <address class="contact-info"><span class="text-bold text-gray-base">Получите займ в</span><span class="text-bold text-gray-base">течение нескольких минут</span></address>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <div class="bg-athens-gray bg-wrap">
                    <div class="block-container">
                      <div class="block-left">
                        <p class="rd-navbar-fixed--hidden small">Добро пожаловать в eZaimExpert, ваш эксперт в микрозаймах!</p>
                      </div>
                      <div class="block-right">
                        <ul class="list-inline">
                          <li><a href="#" class="icon icon-xxs icon-circle icon-dark icon-alto-filled fa-facebook"></a></li>
                          <li><a href="#" class="icon icon-xxs icon-circle icon-dark icon-alto-filled fa-twitter"></a></li>
                          <li><a href="#" class="icon icon-xxs icon-circle icon-dark icon-alto-filled fa-google-plus"></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="rd-navbar-nav-wrap rd-navbar-nav-dark">
                <div class="rd-navbar-nav-wrap-inner">
                  <!-- RD Navbar Search-->
                  <div class="rd-navbar-search">
                    <!-- RD Search-->
                    <form action="search-results.html" method="GET" data-search-live="rd-search-results-live" class="rd-search">
                      <div class="form-group">
                        <label for="rd-search-form-input" class="form-label">Поиск...</label>
                        <input id="rd-search-form-input" type="text" name="s" autocomplete="off" class="form-control">
                        <div id="rd-search-results-live" class="rd-search-results-live"></div>
                      </div>
                      <button type="submit" class="rd-search-submit"></button>
                    </form>
                    <div data-rd-navbar-toggle=".rd-navbar-search" class="rd-navbar-search-toggle"></div>
                  </div>
                  <!-- RD Navbar Nav-->
                  <ul class="rd-navbar-nav">
                    <li class="active"><a href="index.html">Главная</a>
                      
                    </li>
                    <li><a href="about.html">Займы</a>
                      <!-- RD Navbar Dropdown-->
                      <ul class="rd-navbar-dropdown">
                        <li><a href="">Займны на карту</a></li>
                        <li><a href="">Займы на QIWI</a></li>
                        <li><a href="">Займы наличными</a></li>
                      </ul>
                    </li>
                    <li><?= Html::a('Калькулятор',['site/calculator']) ?></li>
                    
                    <li><a href="">Контакты</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <?= $content ?>
      <!-- Brands carousel-->
      <section class="section-35 section-sm-75 bg-alabaster">
        <div class="shell">
          <div class="range">
            <div class="cell-xs-12">
              <div data-items="1" data-xs-items="2" data-sm-items="4" data-md-items="6" data-stage-padding="15" data-margin="30" data-nav="false" class="owl-carousel owl-carousel-centered">
                <div class="item"><a href="#" class="link-image">
                    <figure><img src="images/home-7-170x75.png" alt="" width="170" height="75"/>
                    </figure></a></div>
                <div class="item"><a href="#" class="link-image">
                    <figure><img src="images/home-8-170x75.png" alt="" width="170" height="75"/>
                    </figure></a></div>
                <div class="item"><a href="#" class="link-image">
                    <figure><img src="images/home-9-170x75.png" alt="" width="170" height="75"/>
                    </figure></a></div>
                <div class="item"><a href="#" class="link-image">
                    <figure><img src="images/home-10-170x75.png" alt="" width="170" height="75"/>
                    </figure></a></div>
                <div class="item"><a href="#" class="link-image">
                    <figure><img src="images/home-11-170x75.png" alt="" width="170" height="75"/>
                    </figure></a></div>
                <div class="item"><a href="#" class="link-image">
                    <figure><img src="images/home-12-170x75.png" alt="" width="170" height="75"/>
                    </figure></a></div>
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
              <div class="cell-xs-12 cell-sm-6 cell-lg-3 offset-top-45 offset-lg-top-0">
                <h4>Подписка</h4>
                <hr class="hr-variant-1">
                <p>Подпишитесь на новые предложения.</p>
                <!-- RD Mailform-->
                <form data-form-output="form-output-global" data-form-type="subscribe" method="post" action="bat/rd-mailform.php" class="rd-mailform rd-mailform-inline max-width-300">
                  <div class="form-group">
                    <label for="footer-contact-email" class="form-label">E-Mail</label>
                    <input id="footer-contact-email" type="email" name="email" data-constraints="@Required @Email" class="form-control">
                  </div>
                  <button type="submit" class="btn btn-xs btn-picton-blue">Отправить</button>
                </form>
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
              
              <div class="cell-xs-12 cell-sm-6 cell-lg-9 offset-top-45 offset-lg-top-0">
                <h4>Contact info</h4>
                <hr class="hr-variant-1">
                <address class="contact-info reveal-inline-block">
                  <ul class="contact-info-list">
                    <li class="unit unit-horizontal unit-spacing-md">
                      <div class="unit-left"><span class="icon icon-sm icon-picton-blue fa-phone"></span></div>
                      <div class="unit-body"><span class="text-bold"><a href="callto:#">(123) 45678910</a></span></div>
                    </li>
                    <li class="unit unit-horizontal unit-spacing-md">
                      <div class="unit-left"><span class="icon icon-sm icon-picton-blue fa-envelope-o"></span></div>
                      <div class="unit-body"><span><a href="mailto:#">info@demolink.org</a></span></div>
                    </li>
                    <li class="unit unit-horizontal unit-spacing-md">
                      <div class="unit-left"><span class="icon icon-sm icon-picton-blue fa-clock-o"></span></div>
                      <div class="unit-body"><span>Mon - Sat: 9:00 - 18:00</span></div>
                    </li>
                    <li class="unit unit-horizontal unit-spacing-md">
                      <div class="unit-left"><span class="icon icon-sm icon-picton-blue fa-map-marker"></span></div>
                      <div class="unit-body"><span><a href="#"><span class="text-bold">267 Park Avenue</span><span>New York, NY 90210</span></a></span></div>
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
