<?php
use yii\helpers\Html;;
/* @var $this yii\web\View */


$this->registerCssFile('@web/css/calculator.css');

$this->registerCssFile('@web/jquery/jquery-ui.css', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/jquery/jquery-ui.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$this->registerJsFile('@web/js/calculator/calculator.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

echo $this->render('_header',[
    'city' => null,
  ]);

?>
<section class="calculator">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 block-calculator">
        <?php
        
        echo  $this->render('calculator/_sliders',[
                      'city' => NULL,
                      'refer' => 'calculator',
                      'payment' => NULL,
               ]
        );
         ?>
      </div>
      <div class="col-sm-12 block-list-offer" name = "list-offers">
        <?= $this->render('calculator/_offers',[
                      'offers' => $offers,
                      'data' => $data,
                      'amount' => $amount,
                      'time' => $time,

        ]); ?>
      </div>
    </div>  
  </div>
</section>

<?php
echo $this->render('_what_we_do.php',[
    'title' => 'Что мы делаем?',
  ]);
 ?>
          
     