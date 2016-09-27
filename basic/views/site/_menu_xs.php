<?php
use yii\helpers\Html;

echo Html::beginTag('ul',['class' => 'list-unstyled menu-xs']);
	echo Html::beginTag('li');
		echo Html::a('Главная',['index']);
	echo Html::endTag('li');
	echo Html::beginTag('li');
		
		echo Html::beginTag('a',['class' => 'sub-menu-xs']);
			echo Html::tag('span','Займны',['class' => 'item']);
			echo Html::tag('span',Html::tag('i','',['class' => 'fa fa-angle-right', 'aria-hidden' => 'true']),['class' => 'icon-item']);
		echo Html::endTag('a');
		echo Html::beginTag('ul',['class' => 'list-unstyled sub-menu-xs']);
			if ($city != NULL) {
				$url = ['city', 'id' => $city->id, 'payment' => 'card'];
			}else{
				$url = ['loans', 'payment' => 'card'];
			}
			echo Html::tag('li',Html::a('Займны на карту',$url,['title' => 'Займы онлайн на карту']));

			if ($city != NULL) {
				$url = ['city', 'id' => $city->id, 'payment' => 'account'];
			}else{
				$url = ['loans', 'payment' => 'account'];
			}
			echo Html::tag('li',Html::a('Займы банковский счет',$url,['title' => 'Займы онлайн на банковский счет']));
			
			if ($city != NULL) {
					$url = ['city', 'id' => $city->id, 'payment' => 'contact'];
				}else{
					$url = ['loans', 'payment' => 'contact'];
				}
				echo Html::tag('li',Html::a('Займы через систему контакт',$url,['title' => 'Займы через систему контакт']));
				
				if ($city != NULL) {
					$url = ['city', 'id' => $city->id, 'payment' => 'qiwi'];
				}else{
					$url = ['loans', 'payment' => 'qiwi'];
				}
				echo Html::tag('li',Html::a('Займы на киви',$url,['title' => 'Займы онлайн на киви']));
				
				if ($city != NULL) {
					$url = ['city', 'id' => $city->id, 'payment' => 'yandex'];
				}else{
					$url = ['loans', 'payment' => 'yandex'];
				}
				echo Html::tag('li',Html::a('Займы на яндекс деньги',$url,['title' => 'Займы на яндекс деньги']));
				
				if ($city != NULL) {
					$url = ['city', 'id' => $city->id, 'payment' => 'webmoney'];
				}else{
					$url = ['loans', 'payment' => 'webmoney'];
				}
				echo Html::tag('li',Html::a('Займы на вебмании',$url,['title' => 'Займы на вебмани']));
				
				if ($city != NULL) {
					$url = ['city', 'id' => $city->id, 'payment' => 'cash'];
				}else{
					$url = ['loans', 'payment' => 'cash'];
				}
				echo Html::tag('li',Html::a('Займы наличными',$url,['title' => 'Займы наличными']));
				
				if ($city != NULL) {
					$url = ['city', 'id' => $city->id, 'payment' => 'unistream'];
				}else{
					$url = ['loans', 'payment' => 'unistream'];
				}
				echo Html::tag('li',Html::a('Займы через систему юнистрим',$url,['title' => 'Займы через систему юнистрим']));
				
				if ($city != NULL) {
					$url = ['city', 'id' => $city->id, 'payment' => 'corn'];
				}else{
					$url = ['loans', 'payment' => 'corn'];
				}
				echo Html::tag('li',Html::a('Займы на карту кукуруза',$url,['title' => 'Займы на карту кукуруза']));
				
				if ($city != NULL) {
					$url = ['city', 'id' => $city->id, 'payment' => 'gold'];
				}else{
					$url = ['loans', 'payment' => 'gold'];
				}
				echo Html::tag('li',Html::a('Займы через систему золотая корона',$url,['title' => 'Займы через систему золотая корона']));
				
				if ($city != NULL) {
					$url = ['city', 'id' => $city->id, 'payment' => 'leader'];
				}else{
					$url = ['loans', 'payment' => 'leader'];
				}
				echo Html::tag('li',Html::a('Займы через систему лидер',$url,['title' => 'Займы через систему лидер']));
				
		echo Html::endTag('ul');
		
		
	echo Html::endTag('li');
	echo Html::beginTag('li',['class' => 'menu-li']);
		echo Html::a('Калькулятор',['site/calculator']);
	echo Html::endTag('li');
	echo Html::beginTag('li',['class' => 'menu-li']);
		echo Html::a('Контакты',['site/contact']);
	echo Html::endTag('li');
echo Html::endTag('ul');

?>
