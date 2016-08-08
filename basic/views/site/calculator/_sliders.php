<?php
use yii\helpers\Html;

echo Html::beginTag('div',['class' => 'banner bg-curious-blue']);
	echo Html::beginTag('h3');
		echo 'Быберите сумму и срок займа и мы подберем для вас лучшие предложения!';
	echo Html::endTag('h3');
	echo $this->render('_amount_slider');
	echo $this->render('_time_slider');
echo Html::endTag('div');
?>