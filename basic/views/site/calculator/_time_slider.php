<?php
use yii\helpers\Html;
echo Html::beginTag('div',['name' => 'time-slider']);
	echo Html::beginTag('div',['class' => 'row margin-top-10']);
		echo Html::beginTag('div',['class' => 'col-sm-12 padding-left-7']);
			echo Html::tag('h5','Срок:',['name' => 'lable-slider']);
		echo Html::endTag('div');
	echo Html::endTag('div');
	echo Html::beginTag('div',['class' => 'row margin-right-0']);
		echo Html::beginTag('div',['class' => 'col-sm-10']);
			echo Html::tag('div','',['id' => 'time-slider']);
		echo Html::endTag('div');
		echo Html::beginTag('div',['class' => 'col-sm-2 text-right margin-top-10-xs']);
			echo Html::beginTag('div',['class' => 'btn btn-curious-blue-outline btn-shadow']);
				echo Html::tag('span','10',['name' => 'current-time']).' дней';
			echo Html::endTag('div');
		echo Html::endTag('div');
	echo Html::endTag('div');
echo Html::endTag('div');


?>