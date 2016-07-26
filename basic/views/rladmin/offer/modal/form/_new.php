<?php
use yii\helpers\Html;

echo Html::beginTag('div',['class' => 'row']);
	echo Html::beginTag('div',['class' => 'col-sm-12 text-right']);
			echo Html::button('New Offer',['class' => 'btn btn-primary btn-sm', 'data-toggle' => 'modal', 	'data-target' => '#new-offer']);
	echo Html::endTag('div');
echo Html::endTag('div');
echo $this->render('../_body',[
		'id' => 'new-offer',
	]);




?>