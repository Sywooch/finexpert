<?php
use yii\helpers\Html;;
/* @var $this yii\web\View */


$this->registerCssFile('@web/css/calculator.css');
$this->registerCssFile('@web/jquery/jquery-ui.css', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/jquery/jquery-ui.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/calculator/calculator.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

echo $this->render('_header',[
    'city' => $city,
  ]);
?>
<section class="calculator">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 block-calculator">
        <?php
        
        echo  $this->render('calculator/_sliders',[
                      'city' => $city,
                      'refer' => 'city',
                      'payment' => $payment,
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
       <div class="col-sm-12" name = "list-near-cities">
                <?= $this->render('list/_near_cities',[
                    'near_cities' => $near_cities,
                    'payment' => $payment,
                ]); ?>
        </div>
    </div>  
  </div>
</section>

<?php
echo $this->render('_what_we_do.php',[
    'title' => textH2($city,$this->title,$payment),
  ]);

function textH2($city,$title,$payment)
{
    if ($city != NULL && $payment != NULL) {
        return textH1($city,$title).' '.$city->name.'?'; 
      }
      else{
        return 'Займ онлайн '.$city->name.'?'; 
      }
}

function textH1($city,$title)
{
  if (stripos($title, $city->name)) {
    return trim(substr($title, 0, stripos($title, $city->name)));
  }
}
?>