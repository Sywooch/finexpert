<?php
use yii\helpers\Html;
?>

<section name = "what-we-do">
       <div class="container-fluid">
        <div class="row what-we-do">
          <div class="col-xs-12 col-sm-3">
            <h2>
              <?= $title ?>
            </h2>
          </div>
          <div class="col-xs-12 col-sm-7">
            <div class="bl2">
              Мы собрали все лущшие предложения МФО и отфильтровали по вашим запросам
            </div>
          </div>
          <div class="col-xs-12 col-sm-2">
            <div class="bl2 text-center">
              <?= Html::a('Калькулятор',['calculator'],['class' => 'btn btn-primary btn-sm']) ?>
            </div>
          </div>
        </div>
      </div>
</section>