<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->registerJsFile('@web/js/core.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<!-- Swiper-->
      <header class="page-head">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-lg-stick-up-clone="true" data-md-stick-up-offset="157px" data-lg-stick-up-offset="157px" class="rd-navbar rd-navbar-default">
            <div class="rd-navbar-inner">
              <!-- RD Navbar Panel-->
              <div class="rd-navbar-panel">
                <!-- RD Navbar Toggle-->
                <button data-rd-navbar-toggle=".rd-navbar-nav-wrap" class="rd-navbar-toggle"><span></span></button>
                <!-- RD Navbar Brand-->
                <?= $this->render('brand') ?>
                
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
                        <div class="pluso" data-background="transparent" data-options="medium,round,line,horizontal,counter,theme=06" data-services="vkontakte,odnoklassniki,facebook,twitter"></div>
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
                    <form data-search-live="rd-search-results-live" class="rd-search">
                      <div class="form-group">
                        <label for="rd-search-form-input" class="form-label">Населенный пункт</label>
                        <input id="rd-search-form-input" type="text" name="s" autocomplete="off" class="form-control">
                        <div id="rd-search-results-live" class="rd-search-results-live">
                          test
                        </div>
                      </div>
                      <button type="submit" class="rd-search-submit"></button>
                    </form>
                    <div data-rd-navbar-toggle=".rd-navbar-search" class="rd-navbar-search-toggle"></div>
                  </div>
                  <!-- RD Navbar Nav-->
                  <?= $this->render('_menu',[
                      'city' => NULL,
                  ]) ?>
                  
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <div data-min-height="400px" class="swiper-container swiper-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide bg-gray-lighter"><img src="images/home-slide-11.jpg" alt="" width="1"/>
            <div class="swiper-slide-caption">
              <!-- Solutions that never miss the aim-->
              <section class="section-68 section-sm-top-125 section-sm-bottom-152 section-lg-top-152 section-lg-bottom-235">
                <div class="shell text-center text-sm-left">
                  <div class="range">
                    <div class="cell-xs-12 cell-md-preffix-1 cell-xl-preffix-0">
                      <h1>Решения, которые<br>никогда не упустят цель</h1>
                      <div class="group-md offset-top-25">
                        <?= Html::a('Калькулятор займов',['site/calculator'],['class' => 'btn btn-sm btn-curious-blue-variant-1 min-width-160']) ?>
                      </div>
                    </div>
                  </div>
                </div>

              </section>
            </div>
          </div>
          <div class="swiper-slide bg-gray-darker"><img src="images/home-slide-22.jpg" alt="" width="2"/>
            <div class="swiper-slide-caption">
              <!-- Solutions that never miss the aim-->
              <section class="section-68 section-sm-top-125 section-sm-bottom-152 section-lg-top-125 section-lg-bottom-235">
                <div class="shell text-center text-sm-left">
                  <div class="range">
                    <div class="cell-xs-12 cell-md-preffix-1 cell-xl-preffix-0">
                      <h1>Эксперт займов</h1>
                      <p class="big">Опираясь на опыт более 5 лет<br class="veil reveal-sm-block">мы уверены, что вы получите лучшее предложение</p>
                      <div class="group-md offset-top-25">
                      <?= Html::a('Калькулятор займов',['site/calculator'],['class' => 'btn btn-sm btn-curious-blue-variant-1 min-width-160']) ?>
                      </div>
                    </div>
                  </div>
                </div>
              </section>

            </div>
          </div>
        </div>
        <!-- Swiper Navigation-->
        <div class="swiper-nav">
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
      </div>
      <!-- Page Content-->
      <main class="page-content">
        <!-- Main services-->
        <section class="section-top-60 section-bottom-55">
          <div class="shell">
            <div class="range range-sm-center">
              <div class="cell-xs-12 cell-sm-5 cell-lg-3">
                <div class="product">
                  <div class="icon-decoration-border">
                    <div class="icon-decoration-border-inner"><span class="icon icon-md-variant-2 icon-primary fa-key"></span></div>
                  </div>
                  <h4>Безопасность и конфиденциальность</h4>
                  <p>
                    Мы гарантируем сохранность персональных данных. Хранятся сервисом в зашифрованном виде.
                    
                  </p>
                </div>
              </div>
              <div class="cell-xs-12 cell-sm-5 cell-lg-3 offset-top-56 offset-sm-top-0">
                <div class="product">
                  <div class="icon-decoration-border">
                    <div class="icon-decoration-border-inner"><span class="icon icon-md-variant-2 icon-primary fa-globe"></span></div>
                  </div>
                  <h4>Займы доступны по всей России</h4>
                  <p>
                    Вы можете получить микрозайм в любом месте РФ. Все, что вам нужно – доступ к сети интернет.
                    
                  </p>
                </div>
              </div>
              <div class="cell-xs-12 cell-sm-5 cell-lg-3 offset-top-56 offset-lg-top-0">
                <div class="product product-inset-1">
                  <div class="icon-decoration-border">
                    <div class="icon-decoration-border-inner">
                      <span class="icon icon-md-variant-2 icon-primary fa-money"></span>
                    </div>
                  </div>
                  <h4>Перечисление на любой счёт</h4>
                  <p>
                    Получение микрозайма удобным для вас способом – Киви, банковская карта Visa или MasterCard, денежным переводом Contact или на банковский счет.
                    
                  </p>
                </div>
              </div>
              <div class="cell-xs-12 cell-sm-5 cell-lg-3 offset-top-56 offset-lg-top-0">
                <div class="product product-inset-1">
                  <div class="icon-decoration-border">
                    <div class="icon-decoration-border-inner">
                      <span class="icon icon-md-variant-2 icon-primary fa-credit-card-alt"></span>
                    </div>
                  </div>
                  <h4>Много способов для погашения займа</h4>
                  <p>
                    Оплата выданного займа с помощью банковской карты, переводом, электронными деньгами или Киви.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- What We Do-->
        <section data-on="false" data-lg-on="true" class="rd-parallax bg-gray-darker">
          <div data-speed="0.5" data-type="media" data-url="images/bg-image-2.jpg" class="rd-parallax-layer"></div>
          <div data-speed="0" data-type="html" class="rd-parallax-layer">
            <div class="shell text-center text-md-left">
              <div class="range">
                <div class="cell-xs-12">
                  <div class="section-45 section-sm-top-85 section-sm-bottom-75">
                    <div class="elements-group">
                      <div class="element-wrap">
                        <h2 class="relative-shift-up-5 noshrink">Что мы делаем?</h2>
                        <div class="hr-wrap offset-top-10 offset-sm-top-15 offset-md-top-0">
                          <hr class="hr-md-vertical hr-white">
                        </div>
                        <p class="big">Мы собрали все лущшие предложения МФО и отфильтровали по вашим запросам</p>
                      </div>
                      <div class="element-wrap">
                        <?= Html::a('Калькулятор',['site/calculator'],['class' => 'btn btn-sm btn-curious-blue-variant-1 min-width-160']) ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        

      </main>