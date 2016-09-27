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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php $this->beginBody() ?>

    <?= $content ?>
    
    <section name = "partners">
      <div class="container-fluid">
        <div class="row partners">
          <div class="col-xs-4 col-sm-2">
            <?= Html::img('@web/images/offer/2.png',['class' => 'img-responsive'])?>
          </div>
          <div class="col-xs-4 col-sm-2">
            <?= Html::img('@web/images/offer/3.png',['class' => 'img-responsive'])?>
          </div>
          <div class="col-xs-4 col-sm-2">
            <?= Html::img('@web/images/offer/4.png',['class' => 'img-responsive'])?>
          </div>
          <div class="col-xs-4 col-sm-2">
            <?= Html::img('@web/images/offer/5.png',['class' => 'img-responsive'])?>
          </div>
          <div class="col-xs-4 col-sm-2">
            <?= Html::img('@web/images/offer/6.png',['class' => 'img-responsive'])?>
          </div>
          <div class="col-xs-4 col-sm-2">
            <?= Html::img('@web/images/offer/7.png',['class' => 'img-responsive'])?>
          </div>
        </div>
      </div>
    </section>
    <footer>
      <div class="top-footer">
        <div class="container-fluid">
          <div class="row row-top-footer">
            <div class="col-xs-12 col-sm-6 col-top-footer">
              <div class="title">
                Подписка
              </div>
              <div class="label">Подпишитесь на новые предложения.</div>
              <div name = "result-subcribe"></div>
              <div class="content">
                <form class="form-inline" name="subscribe">
                  <div class="form-group">
                    <input type="email" name="email" class="form-control" required>
                    
                  </div>
                  <div class="form-group text-right">
                    <button type="submit" class="btn btn-sm btn-primary">Подписаться</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-top-footer">
              <div class="title">
                Контакты
              </div>
              <div class="content">
                <ul class="list-unstyled">
                  <li>
                    <div class="unit-left">
                      <i class="fa fa-phone" aria-hidden="true"></i>
                    </div>
                    <div class="unit-body">
                      <a href="callto:#">(495) 663-00-00</a>
                    </div>
                  </li>
                  <li>
                    <div class="unit-left">
                      <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    </div>
                    <div class="unit-body">
                      <a href="mailto:#">info@eZaimExpert.ru</a>
                    </div>
                  </li>
                  <li>
                    <div class="unit-left">
                      <i class="fa fa-clock-o" aria-hidden="true"></i>
                    </div>
                    <div class="unit-body">
                      Пон - Суб: 9:00 - 18:00
                    </div>
                  </li>
                  <li>
                    <div class="unit-left">
                      <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </div>
                    <div class="unit-body">
                      ул. Ферганская, 17 109444, г. Москва
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>  
        </div>
      </div>
      <div class="bottom-footer">
          <div class="row">
            <div class="col-xs-12 text-center">
              <div class="copyright">
                © 2016 eZaimExpert.
              </div>
            </div>
          </div>
      </div>
      
    </footer>
    

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
