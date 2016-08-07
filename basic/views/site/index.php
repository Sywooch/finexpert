<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
$this->registerJsFile('@web/js/core.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<!-- Swiper-->
      <div data-min-height="400px" class="swiper-container swiper-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide bg-gray-lighter"><img src="images/home-slide-1.jpg" alt="" width="1"/>
            <div class="swiper-slide-caption">
              <!-- Solutions that never miss the aim-->
              <section class="section-68 section-sm-top-125 section-sm-bottom-152 section-lg-top-152 section-lg-bottom-235">
                <div class="shell text-center text-sm-left">
                  <div class="range">
                    <div class="cell-xs-12 cell-md-preffix-1 cell-xl-preffix-0">
                      <h1>Solutions that<br>never miss the aim</h1>
                      <div class="group-md offset-top-25"><a href="#" class="btn btn-sm btn-curious-blue-variant-1 min-width-160">Learn More</a><a href="services.html" class="btn btn-sm btn-gray-darker-outline min-width-160">Our Services</a></div>
                    </div>
                  </div>
                </div>

              </section>
            </div>
          </div>
          <div class="swiper-slide bg-gray-darker"><img src="images/home-slide-2.jpg" alt="" width="2"/>
            <div class="swiper-slide-caption">
              <!-- Solutions that never miss the aim-->
              <section class="section-68 section-sm-top-125 section-sm-bottom-152 section-lg-top-125 section-lg-bottom-235">
                <div class="shell text-center text-sm-left">
                  <div class="range">
                    <div class="cell-xs-12 cell-md-preffix-1 cell-xl-preffix-0">
                      <h1>Expert Financial Advice</h1>
                      <p class="big">With over 20 years of experience we'll ensure<br class="veil reveal-sm-block">you always get the best guidance</p>
                      <div class="group-md offset-top-25"><a href="services.html" class="btn btn-sm btn-curious-blue-variant-1 min-width-160">Our Services</a><a href="#" class="btn btn-sm btn-sm-mod btn-white-outline min-width-160">Purchase now</a></div>
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
                    <div class="icon-decoration-border-inner"><span class="icon icon-md-variant-2 icon-primary fl-sympletts-coin18"></span></div>
                  </div>
                  <h4><a href="#">Financial Planning</a></h4>
                  <p>
                    We'll help you make
                    sensible decisions about
                     money that can help you
                    achieve your goals in life.
                    
                  </p>
                </div>
              </div>
              <div class="cell-xs-12 cell-sm-5 cell-lg-3 offset-top-56 offset-sm-top-0">
                <div class="product">
                  <div class="icon-decoration-border">
                    <div class="icon-decoration-border-inner"><span class="icon icon-md-variant-2 icon-primary fl-sympletts-coffee2"></span></div>
                  </div>
                  <h4><a href="#">Retirement Planning</a></h4>
                  <p>
                    Use our strategies and
                    retirement advice, including retirement  calculators
                    to help you retire faster.
                    
                  </p>
                </div>
              </div>
              <div class="cell-xs-12 cell-sm-5 cell-lg-3 offset-top-56 offset-lg-top-0">
                <div class="product product-inset-1">
                  <div class="icon-decoration-border">
                    <div class="icon-decoration-border-inner">
                      <div class="icon icon-image"><img src="images/icon-chart-41x36.png" alt="" width="41" height="36"/>
                      </div>
                    </div>
                  </div>
                  <h4><a href="#">Risk Management</a></h4>
                  <p>
                    Risk management is intended
                     to manage financial and other
                    losses associated with risks
                    to your assets or business.
                    
                  </p>
                </div>
              </div>
              <div class="cell-xs-12 cell-sm-5 cell-lg-3 offset-top-56 offset-lg-top-0">
                <div class="product product-inset-1">
                  <div class="icon-decoration-border">
                    <div class="icon-decoration-border-inner">
                      <div class="icon icon-image"><img src="images/icon-case-42x39.png" alt="" width="42" height="39"/>
                      </div>
                    </div>
                  </div>
                  <h4><a href="#">Taxation</a></h4>
                  <p>
                    Tax planning considers the
                    tax implications of business
                    decisions, usually with the goal
                    of minimizing tax liability.
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
                      <div class="element-wrap"><a href="services.html" class="btn btn-sm btn-curious-blue-variant-1 min-width-160">Калькулятор</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        

      </main>