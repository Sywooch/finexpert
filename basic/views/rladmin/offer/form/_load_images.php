<?php
use yii\helpers\Html;
echo Html::button(Html::img('@web/images/noavatar.png',['width' => '50px']),['class' => 'btn btn-default btn-lg', 'data-toggle' => 'modal', 	'data-target' => '#load-image-'.$offer->id]);
echo $this->render('../modal/_body',[
		'id' => 'load-image-'.$offer->id,
		'offer' => $offer,
	]);
?>