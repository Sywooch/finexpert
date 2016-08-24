<?php
use yii\helpers\Html;
echo Html::a(
                  Html::tag('span','[',['class' => 'text-thin text-primary']).
                  Html::beginTag('div',['class' => 'brand-name']).
                    Html::tag('span','eZaim',['class' => 'text-ubold text-river-bed']).
                    Html::tag('span','Expert',['class' => 'text-thin']).
                  Html::endTag('div').
                  Html::tag('span',']',['class' => 'text-thin text-primary'])
                  ,
                  [
                    'index'
                  ],
                  [
                    'class' => 'rd-navbar-brand'
                  ]
                  );
?>