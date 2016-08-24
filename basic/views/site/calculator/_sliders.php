<?php
use yii\helpers\Html;

echo Html::beginTag('div',['class' => 'banner baner-slider bg-curious-blue']);
	echo Html::beginTag('h1');
		if ($refer == 'city') {
			if ($city != NULL && $payment != NULL) {
				echo textH1($city,$this->title).'. '.$city->name.'. Быберите сумму и срок займа';	
			}
			else{
				echo $city->name.'. Быберите сумму и срок займа';	
			}
		}
		if ($refer == 'loans') {
			echo $this->title.'. Быберите сумму и срок займа';	
		}
		if ($refer == 'calculator') {
			echo 'Быберите сумму и срок займа';	
		}
		
		
	echo Html::endTag('h1');
	echo $this->render('_amount_slider');
	echo $this->render('_time_slider');
	echo $this->render('_additional_filter',[
		'payment' => $payment,
		]);
echo Html::endTag('div');


?>