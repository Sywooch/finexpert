<?php
use yii\helpers\Html;

echo Html::beginTag('div',['class' => 'responsive-tabs responsive-tabs-horizontal responsive-tabs-default']);
	echo Html::beginTag('ul',['class' => 'resp-tabs-list inset-sm-right-25']);
		echo Html::beginTag('li');
			echo "Размер";
		echo Html::endTag('li');
		echo Html::beginTag('li');
			echo "Срок";
		echo Html::endTag('li');
		echo Html::beginTag('li');
			echo "Возраст";
		echo Html::endTag('li');
		echo Html::beginTag('li');
			echo "Документы";
		echo Html::endTag('li');
	echo Html::endTag('ul');
	echo Html::beginTag('div',['class' => 'resp-tabs-container']);
		echo Html::beginTag('div',['class' => 'fadeIn animated']);
			echo 'от '.$offer->min_loan.' до '.$offer->max_loan;
		echo Html::endTag('div');
		echo Html::beginTag('div',['class' => 'fadeIn animated']);
			echo 'от '.$offer->min_time.' до '.$offer->max_time;
		echo Html::endTag('div');
		echo Html::beginTag('div',['class' => 'fadeIn animated']);
			echo 'от '.$offer->min_time.' до '.$offer->max_time;
		echo Html::endTag('div');
		echo Html::beginTag('div',['class' => 'fadeIn animated']);
			echo $offer->document;
		echo Html::endTag('div');
	echo Html::endTag('div');
echo Html::endTag('div');
?>