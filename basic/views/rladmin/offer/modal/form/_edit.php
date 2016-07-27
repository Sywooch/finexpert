<?php
use yii\helpers\Html;

echo Html::beginTag('div',['class' => 'row']);
	echo Html::beginTag('div',['class' => 'col-sm-12 text-right']);
			echo Html::button('Edit Offer',['class' => 'btn btn-warning btn-sm', 'data-toggle' => 'modal', 	'data-target' => '#edit-offer-'.$offer->id]);
	echo Html::endTag('div');
echo Html::endTag('div');
echo $this->render('../_body',[
		'id' => 'edit-offer-'.$offer->id,
		'offer' => $offer,
	]);




?>