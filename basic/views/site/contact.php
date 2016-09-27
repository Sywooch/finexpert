<?php
use yii\helpers\Html;;
/* @var $this yii\web\View */
echo $this->render('_header',[
    'city' => null,
  ]);
?>

<section class="contact">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3">
                <?= $this->render('form/_contact',[
                    'contact' => $contact,
                  ]
                ); ?>
      </div>
    </div>  
  </div>
</section>
<?php
echo $this->render('_what_we_do.php',[
    'title' => 'Что мы делаем?',
  ]);
 ?>