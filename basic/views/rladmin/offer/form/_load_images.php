<?php
use yii\helpers\Html;
if (file_exists(Yii::$app->basePath.'/web/images/offer/logo/'.$offer->id.'.png')) {
	$src = '@web/images/offer/logo/'.$offer->id.'.png';
}else{
	$src = '@web/images/noavatar.png';
}

echo Html::button(Html::img($src,['width' => '50px', 'name' => 'offer-logo']),['class' => 'btn btn-default btn-lg', 'data-toggle' => 'modal', 	'data-target' => '#load-image-'.$offer->id]);
echo $this->render('../modal/_body',[
		'id' => 'load-image-'.$offer->id,
		'offer' => $offer,
	]);
?>