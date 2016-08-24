<?php
use yii\helpers\Html;

echo Html::beginTag('ul',['class' => 'rd-navbar-nav']);
	echo Html::beginTag('li');
		echo Html::a('Главная',['index']);
	echo Html::endTag('li');
	echo Html::beginTag('li');
		echo Html::a('Займы');
		echo Html::beginTag('ul',['class' => 'rd-navbar-dropdown']);
			echo Html::beginTag('li');
				if ($city != NULL) {
					$url = ['city', 'id' => $city->id, 'payment' => 'card'];
				}else{
					$url = ['loans', 'payment' => 'card'];
				}
				echo Html::a('Займны на карту',$url,['title' => 'Займы онлайн на карту']);
			echo Html::endTag('li');
			echo Html::beginTag('li');
				if ($city != NULL) {
					$url = ['city', 'id' => $city->id, 'payment' => 'account'];
				}else{
					$url = ['loans', 'payment' => 'account'];
				}
				echo Html::a('Займы банковский счет',$url,['title' => 'Займы онлайн на банковский счет']);
			echo Html::endTag('li');
			echo Html::beginTag('li');
				if ($city != NULL) {
					$url = ['city', 'id' => $city->id, 'payment' => 'contact'];
				}else{
					$url = ['loans', 'payment' => 'contact'];
				}
				echo Html::a('Займы через систему контакт',$url,['title' => 'Займы через систему контакт']);
			echo Html::endTag('li');
			echo Html::beginTag('li');
				if ($city != NULL) {
					$url = ['city', 'id' => $city->id, 'payment' => 'qiwi'];
				}else{
					$url = ['loans', 'payment' => 'qiwi'];
				}
				echo Html::a('Займы на киви',$url,['title' => 'Займы онлайн на киви']);
			echo Html::endTag('li');
			echo Html::beginTag('li');
				if ($city != NULL) {
					$url = ['city', 'id' => $city->id, 'payment' => 'yandex'];
				}else{
					$url = ['loans', 'payment' => 'yandex'];
				}
				echo Html::a('Займы на яндекс деньги',$url,['title' => 'Займы на яндекс деньги']);
			echo Html::endTag('li');
			echo Html::beginTag('li');
				if ($city != NULL) {
					$url = ['city', 'id' => $city->id, 'payment' => 'webmoney'];
				}else{
					$url = ['loans', 'payment' => 'webmoney'];
				}
				echo Html::a('Займы на вебмании',$url,['title' => 'Займы на вебмани']);
			echo Html::endTag('li');
			echo Html::beginTag('li');
				if ($city != NULL) {
					$url = ['city', 'id' => $city->id, 'payment' => 'cash'];
				}else{
					$url = ['loans', 'payment' => 'cash'];
				}
				echo Html::a('Займы наличными',$url,['title' => 'Займы наличными']);
			echo Html::endTag('li');
			echo Html::beginTag('li');
				if ($city != NULL) {
					$url = ['city', 'id' => $city->id, 'payment' => 'unistream'];
				}else{
					$url = ['loans', 'payment' => 'unistream'];
				}
				echo Html::a('Займы через систему юнистрим',$url,['title' => 'Займы через систему юнистрим']);
			echo Html::endTag('li');
			echo Html::beginTag('li');
				if ($city != NULL) {
					$url = ['city', 'id' => $city->id, 'payment' => 'corn'];
				}else{
					$url = ['loans', 'payment' => 'corn'];
				}
				echo Html::a('Займы на карту кукуруза',$url,['title' => 'Займы на карту кукуруза']);
			echo Html::endTag('li');
			echo Html::beginTag('li');
				if ($city != NULL) {
					$url = ['city', 'id' => $city->id, 'payment' => 'gold'];
				}else{
					$url = ['loans', 'payment' => 'gold'];
				}
				echo Html::a('Займы через систему золотая корона',$url,['title' => 'Займы через систему золотая корона']);
			echo Html::endTag('li');
			echo Html::beginTag('li');
				if ($city != NULL) {
					$url = ['city', 'id' => $city->id, 'payment' => 'leader'];
				}else{
					$url = ['loans', 'payment' => 'leader'];
				}
				echo Html::a('Займы через систему лидер',$url,['title' => 'Займы через систему лидер']);
			echo Html::endTag('li');
		echo Html::endTag('ul');
	echo Html::endTag('li');
	echo Html::beginTag('li');
		echo Html::a('Калькулятор',['site/calculator']);
	echo Html::endTag('li');
	echo Html::beginTag('li');
		echo Html::a('Контакты',['site/contact']);
	echo Html::endTag('li');
echo Html::endTag('ul');

?>
