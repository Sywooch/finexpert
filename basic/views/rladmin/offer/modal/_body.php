<?php
use yii\helpers\Html;
if (isset($offer)) {
	$title_modal = $offer->name;
	$offer_id = $offer->id;
}else{
	$title_modal = 'New Offer';
	$offer_id = NULL;
}
echo Html::beginTag('div',['class' => 'modal fade', 'id' => $id, 'role' => 'dialog', 'aria-labelledby' => 'Offer', 'offer' => $offer_id]);
	echo Html::beginTag('div',['class' => 'modal-dialog', 'role' => 'document']);
		echo Html::beginTag('div',['class' => 'modal-content']);
			echo Html::beginTag('div',['class' => 'modal-header']);
				echo Html::button(Html::tag('span','&times;',['aria-hidden' => 'true']),['class' => 'close', 'data-dismiss' => 'modal', 'aria-label' => 'Close']);
				echo Html::tag('h4',$title_modal,['class' => 'modal-title']);
			echo Html::endTag('div');
			echo Html::beginTag('div',['class' => 'modal-body']);
				
			echo Html::endTag('div');
		echo Html::endTag('div');
	echo Html::endTag('div');
echo Html::endTag('div');
?>