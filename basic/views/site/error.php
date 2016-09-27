<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;

echo $this->render('_header',[
    'city' => null,
  ]);
?>

<section class="site-error">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1><?= Html::encode($this->title) ?></h1>

                <div class="alert alert-danger">
                    <?= nl2br(Html::encode($message)) ?>
                </div>

                <p>
                    The above error occurred while the Web server was processing your request.
                </p>
                <p>
                    Please contact us if you think this is a server error. Thank you.
                </p>    
            </div>
        </div>
    </div>
</section>