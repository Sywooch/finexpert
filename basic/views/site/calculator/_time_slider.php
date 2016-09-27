<?php
use yii\helpers\Html;
echo Html::beginTag('div',['name' => 'time-slider']);
	echo Html::beginTag('div',['class' => 'row margin-top-10']);
		echo Html::beginTag('div',['class' => 'col-sm-12']);
			echo Html::tag('h5','Срок:',['name' => 'lable-slider']);
		echo Html::endTag('div');
	echo Html::endTag('div');
	echo Html::beginTag('div',['class' => 'row']);
		echo Html::beginTag('div',['class' => 'col-sm-10']);
			echo Html::tag('div','',['id' => 'time-slider']);
		echo Html::endTag('div');
		echo Html::beginTag('div',['class' => 'col-sm-2 text-right current-time']);
			echo Html::beginTag('div',['class' => 'btn btn-default btn-sm']);
				echo Html::tag('span','10',['name' => 'current-time']).' дней';
			echo Html::endTag('div');
		echo Html::endTag('div');
	echo Html::endTag('div');
echo Html::endTag('div');


?>