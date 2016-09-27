<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->registerCssFile('@web/css/slider.css', ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
$this->registerCssFile('@web/jquery/jquery-ui.css', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/jquery/jquery-ui.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

echo $this->render('_header',[
    'city' => null,
  ]);
?>

<section name = "slider">
      <div id="carousel-home" class="carousel slide" data-ride="carousel" data-interval = "3000">
        
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="images/slider/1.jpg" alt="...">
            <div class="carousel-caption">
              <div class="title first-slider text-left">
                Решения, которые<br> никогда не упустят цель.
              </div>
            </div>
          </div>
          <div class="item">
            <img src="images/slider/2.jpg" alt="...">
            <div class="carousel-caption">
              <div class="title second-slider text-left">
                Эксперт займов
              </div>
              <div class="description second-slider text-left">
                Опираясь на опыт более 5 лет. Мы уверены, что вы получите лучшее предложение.
              </div>
            </div>
          </div>
          
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-home" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-home" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
</section>
<section name = "icons">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-3 text-center">
            <div class="item">
              <div class="icon">
                <i class="fa fa-key fa-2x" aria-hidden="true"></i>
              </div>
              <div class="title">
                Безопасность и конфиденциальность
              </div>
              <div class="description">
                Мы гарантируем сохранность персональных данных. Хранятся сервисом в зашифрованном виде.
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 text-center">
            <div class="item">
              <div class="icon">
                <i class="fa fa-globe fa-2x" aria-hidden="true"></i>
              </div>
              <div class="title">
                Займы доступны по всей России
              </div>
              <div class="description">
                  Вы можете получить микрозайм в любом месте РФ. Все, что вам нужно – доступ к сети интернет.
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 text-center">
            <div class="item">
              <div class="icon">
                <i class="fa fa-money fa-2x" aria-hidden="true"></i>
              </div>
              <div class="title">
                Перечисление на любой счёт
              </div>
              <div class="description">
                Получение микрозайма удобным для вас способом – Киви, банковская карта Visa или MasterCard, денежным переводом Contact или на банковский счет.
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 text-center">
            <div class="item">
              <div class="icon">
                <i class="fa fa-credit-card-alt fa-2x" aria-hidden="true"></i>
              </div>
              <div class="title">
                Много способов для погашения займа
              </div>
              <div class="description">
                Оплата выданного займа с помощью банковской карты, переводом, электронными деньгами или Киви.
              </div>
            </div>
          </div>
        </div>  
      </div>
</section>
<?php
echo $this->render('_what_we_do.php',[
    'title' => 'Что мы делаем?',
  ]);
?>
