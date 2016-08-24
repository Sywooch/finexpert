<?php
use yii\helpers\Html;

if ($near_cities != NULL) {
	foreach ($near_cities as $city) {
		echo Html::beginTag('div',['class' => 'col-xs-12 col-sm-6 col-md-3 margin-top-10']);
			echo Html::a($city->name,['city', 'id' => $city->id, 'payment' => $payment],['class' => 'btn btn-circle btn-curious-blue', 'title' => 'Займы '.$city->name]);
			
		echo Html::endTag('div');
	}
}
?>