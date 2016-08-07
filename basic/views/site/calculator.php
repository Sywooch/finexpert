<?php
use yii\helpers\Html;;
/* @var $this yii\web\View */

$this->title = 'Калькулятор займа';
$this->registerCssFile('@web/css/calculator.css');
$this->registerCssFile('@web/jquery/jquery-ui.css', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/core.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/jquery/jquery-ui.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/calculator/calculator.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

?>
<!-- Swiper-->
      
      <!-- Page Content-->
      <main class="page-content">
        <!-- Main services-->
        <section class="section-top-60 section-bottom-55">
          <div class="shell">
            <div class="range range-sm-center">
              <div class="col-sm-12">
                <?= $this->render('calculator/_sliders'); ?>
              </div>
              <div class="col-sm-12" name = "list-offers">
                <?= $this->render('calculator/_offers'); ?>
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