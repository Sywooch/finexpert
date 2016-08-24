<?php
use yii\helpers\Html;
echo Html::beginTag('div',['name' => 'additional-filter']);
	echo Html::beginTag('div',['class' => 'row margin-top-10']);
		echo Html::beginTag('div',['class' => 'col-sm-3']);
			echo Html::dropDownList('payment', paymentDD($payment), [
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
		echo Html::beginTag('div',['class' => 'col-sm-6 margin-top-10-xs']);
			echo Html::tag('span','и мы подберем для вас лучшие предложения!',['class' => 'font-size-20']);
		echo Html::endTag('div');
	echo Html::endTag('div');
	
echo Html::endTag('div');

	/**
    *
    * @param string $payment
    * @return string
    *
    */
    function paymentDD($payment)
    {
        $payments = payments();
        if ($payment == $payments['card']) {
            return 'visa';
        }
        if ($payment == $payments['account']) {
            return 'счет';
        }
        if ($payment == $payments['contact']) {
            return 'contact';
        }
        if ($payment == $payments['qiwi']) {
            return 'qiwi';
        }
        if ($payment == $payments['yandex']) {
            return 'яндекс';
        }
        if ($payment == $payments['webmoney']) {
            return 'webmoney';
        }
        if ($payment == $payments['cash']) {
            return 'наличные';
        }
        if ($payment == $payments['unistream']) {
            return 'unistream';
        }
        if ($payment == $payments['corn']) {
            return 'кукуруза';
        }
        if ($payment == $payments['gold']) {
            return 'корона';
        }
        if ($payment == $payments['leader']) {
            return 'лидер';
        }
    }

    /**
    * @return array
    */
    function payments()
    {
        return [
            'card' => 'card',
            'account' => 'account',
            'contact' => 'contact',
            'qiwi' => 'qiwi',
            'yandex' => 'yandex',
            'webmoney' => 'webmoney',
            'cash' => 'cash',
            'corn' => 'corn',
            'gold' => 'gold',
            'leader' => 'leader',
            'unistream' => 'unistream'
        ];
    }

?>