<?php
use yii\helpers\Html;

echo Html::beginTag('div',['class' => 'row']);
	echo Html::beginTag('div',['class' => 'col-sm-6']);
		echo Html::beginTag('ul',['class' => 'list-group']);
			echo Html::beginTag('li',['class' => 'list-group-item']);
				echo 'от '.$offer->min_loan.' руб. до '.$offer->max_loan.' руб.';
			echo Html::endTag('li');
			echo Html::beginTag('li',['class' => 'list-group-item']);
				if ($offer->max_age == 100) {
					echo 'от '.$offer->min_age.' лет.';
				}else{
					echo 'от '.$offer->min_age.' до '.$offer->max_age.' лет.';
				}

				
			echo Html::endTag('li');
		echo Html::endTag('ul');
	echo Html::endTag('div');
	echo Html::beginTag('div',['class' => 'col-sm-6']);
		echo Html::beginTag('ul',['class' => 'list-group']);
			echo Html::beginTag('li',['class' => 'list-group-item']);
				echo 'от '.$offer->min_time.' до '.$offer->max_time.' дней.';
			echo Html::endTag('li');
			echo Html::beginTag('li',['class' => 'list-group-item']);
				echo 'Документы: '.$offer->document;
			echo Html::endTag('li');
		echo Html::endTag('ul');
	echo Html::endTag('div');
echo Html::endTag('div');

echo Html::beginTag('div',['class' => 'row']);
	echo Html::beginTag('div',['class' => 'col-sm-12']);
		echo Html::beginTag('ul',['class' => 'list-group']);
			echo Html::beginTag('li',['class' => 'list-group-item list-payment']);
				echo $offer->listPayments();
			echo Html::endTag('li');
		echo Html::endTag('ul');
	echo Html::endTag('div');
echo Html::endTag('div');
if ($offer->description != NULL) {
	echo Html::beginTag('div',['class' => 'row']);
		echo Html::beginTag('div',['class' => 'col-sm-12']);
			echo Html::beginTag('ul',['class' => 'list-group']);
				echo Html::beginTag('li',['class' => 'list-group-item']);
					echo $offer->description;
				echo Html::endTag('li');
			echo Html::endTag('ul');
		echo Html::endTag('div');
	echo Html::endTag('div');
}





?>