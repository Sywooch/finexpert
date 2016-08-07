<?php
use yii\helpers\Html;

echo Html::beginTag('div',['class' => 'banner bg-curious-blue']);
	echo $this->render('_amount_slider');
	echo $this->render('_time_slider');
echo Html::endTag('div');
?>