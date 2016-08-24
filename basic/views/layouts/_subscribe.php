<?php
use yii\helpers\Html;

echo Html::beginTag('form',['name' => 'subscribe', 'class' => 'form-inline']);
//rd-mailform rd-mailform-inline max-width-300
	echo Html::beginTag('div',['class' => 'form-group']);
		echo Html::input('email', 'email', '', ['class' => 'form-control', 'required' => 'required']);
	echo Html::endTag('div');
	echo Html::submitButton('Save', [
                    'class' => 'btn btn-xs btn-primary margin-top-0 margin-left-10'
                ]);
echo Html::endTag('form');

?>