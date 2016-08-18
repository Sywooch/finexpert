<?php
use yii\helpers\Html;
echo Html::beginTag('div',['name' => 'additional-filter']);
	echo Html::beginTag('div',['class' => 'row margin-top-10']);
		echo Html::beginTag('div',['class' => 'col-sm-3']);
			echo Html::dropDownList('payment', '', [
					'visa' => 'VISA',
					'master' => 'MasterCard',
					'счет' => 'Банковский счет',
					'qiwi' => 'QIWI',
					'яндекс' => 'Яндекс кошелек',
					'webmoney' => 'Webmoney',
					'contact' => 'CONTACT',
					'кукуруза' => 'Кукуруза',
					'unistream' => 'UNISTREAM',
					'корона' => 'Золотая Корона',
					'лидер' => 'Лидер',
					'наличные' => 'Наличные в офисе'
 				],['prompt' => 'Способ получения']);
		echo Html::endTag('div');
		echo Html::beginTag('div',['class' => 'col-sm-3 margin-top-10-xs']);
			echo Html::input('number', 'age', '', ['class' => 'form-control', 'placeholder' => 'Возраст', 'min' => 18]);
		echo Html::endTag('div');
	echo Html::endTag('div');
	
echo Html::endTag('div');


?>