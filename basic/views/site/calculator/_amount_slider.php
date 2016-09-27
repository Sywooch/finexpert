<?php
use yii\helpers\Html;
echo Html::beginTag('div',['name' => 'amount-slider']);
	echo Html::beginTag('div',['class' => 'row']);
		echo Html::beginTag('div',['class' => 'col-sm-12']);
			echo Html::tag('h5','Сумма:',['name' => 'lable-slider']);
		echo Html::endTag('div');
	echo Html::endTag('div');
	echo Html::beginTag('div',['class' => 'row']);
		echo Html::beginTag('div',['class' => 'col-sm-10']);
			echo Html::tag('div','',['id' => 'amount-slider']);
		echo Html::endTag('div');
		echo Html::beginTag('div',['class' => 'col-sm-2 text-right current-amount']);
			echo Html::beginTag('div',['class' => 'btn btn-default btn-sm']);
				echo Html::tag('span','5000',['name' => 'current-amount']).' руб.';
			echo Html::endTag('div');
		echo Html::endTag('div');
	echo Html::endTag('div');
echo Html::endTag('div');


?>