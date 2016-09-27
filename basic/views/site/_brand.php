<?php
use yii\helpers\Html;
echo Html::a(
                Html::tag('span','[',['name' => 'clip']).
                Html::tag('span','eZaim',['name' => 'first-word']).
                Html::tag('span','Expert',['name' => 'second-word']).
                Html::tag('span',']',['name' => 'clip']),
                [
                    'index'
                ]
);
?>