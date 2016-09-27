<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;


?>

    <h3><?= Html::encode($this->title) ?></h3>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Спасибо за обращение. Мы ответим как можно быстрее.
        </div>

       

    <?php else: ?>

        
        <?php $form = ActiveForm::begin([
                    'id' => 'contact-form',
                    'options' => [
                        'class' => ''
                    ],
                ]); ?>
        <div class="range">

            <div class="cell-xs-12">

                

                    <?= $form->field($contact, 'name')->textInput(['autofocus' => true])->label('Имя') ?>

                    <?= $form->field($contact, 'email')->label('Email') ?>

                    <?= $form->field($contact, 'subject')->label('Тема') ?>

                    <?= $form->field($contact, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-xs-6">{image}</div><div class="col-xs-6">{input}</div></div>',
                    ])->label(false) ?>



            </div>
            <div class="cell-xs-12">
                <?= $form->field($contact, 'body')->textArea(['rows' => 6])->label('Сообщение') ?>
                
            </div>
            <div class="text-right">
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>
            
        </div>
        <?php ActiveForm::end(); ?>

    <?php endif; ?>

