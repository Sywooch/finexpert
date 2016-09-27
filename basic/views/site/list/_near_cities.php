<?php
use yii\helpers\Html;

if ($near_cities != NULL) {
	foreach ($near_cities as $city) {
		echo Html::beginTag('div',['class' => 'col-xs-12 col-sm-6 col-md-3 single-near-city text-center']);
			echo Html::a($city->name,['city', 'id' => $city->id, 'payment' => $payment],['class' => 'btn btn-primary near-city', 'title' => 'Займы '.$city->name]);
			
		echo Html::endTag('div');
	}
}
?>