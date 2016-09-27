<?php 
use yii\helpers\Html;
?>
<header>
      <div class = "top-header hidden-xs hidden-sm">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-8" name = "title">Добро пожаловать в eZaimExpert, ваш эксперт в микрозаймах!
            </div>
            <div class="col-sm-4 text-right" name = "social">
              <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,twitter"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="med-header">
        <div class="container-fluid">
          <div class="row row-header">
            <div class="col-xs-10 col-sm-6 col-md-4" name = "logo">
              <div class="visible-xs-inline visible-sm-inline btn-menu-xs">
                <i class="fa fa-bars i-menu-xs" aria-hidden="true"></i>
                <div class="block-menu-xs">
                  <?= $this->render('_menu_xs',[
                      'city' => $city,
                  ]) ?>
                </div>
              </div>
              <?= $this->render('_brand') ?>
            </div>
            <?= $this->render('_info') ?>
          </div>
        </div>
      </div>
      <div class="menu-header hidden-xs hidden-sm">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <?= $this->render('_menu',[
                      'city' => $city,
              ]) ?>
            </div>
            <div class="col-md-6 text-right">
              <?= $this->render('_search')?>
            </div>
          </div>
          
        </div>
      </div>

</header>