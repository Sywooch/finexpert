<?php
use yii\helpers\Html;
$this->registerJsFile('@web/js/offer/offers.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile('@web/css/offer/offer.css', ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
$this->title = 'Offers';
echo Html::beginTag('div',['class' => 'row']);
	echo Html::beginTag('div',['class' => 'col-sm-12','name' => 'block-info']);

	echo Html::endTag('div');
echo Html::endTag('div');
echo $this->render('offer/form/_default');
echo $this->render('offer/modal/form/_new');
echo Html::beginTag('div',['class' => 'row']);
	echo Html::beginTag('div',['class' => 'col-sm-12', 'name' => 'list-offers']);
		echo $this->render('offer/table/_list',[
				'offers' => $offers,
			]);
	echo Html::endTag('div');
echo Html::endTag('div');

?>