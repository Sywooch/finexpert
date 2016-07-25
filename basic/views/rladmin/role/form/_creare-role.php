<?php
use yii\helpers\Html;

echo Html::beginTag('div',['class' => 'row top-20']);
	echo Html::beginTag('div',['class' => 'col-sm-12']);
		echo Html::beginTag('form',['name' => 'create-role', 'class' => 'form-inline']);
			echo Html::input('text', '_csrf', Yii::$app->request->getCsrfToken(),['type' => 'hidden']);
			echo Html::beginTag('div',['class' => 'form-group']);
				echo Html::input('text', 'name', '', ['class' => 'form-control','placeholder' => 'Name' ,'required' => 'required' ]);
			echo Html::endTag('div');
			echo Html::beginTag('div',['class' => 'form-group left-5']);
				echo Html::input('text', 'data', '', ['class' => 'form-control', 'placeholder' => 'Description','required' => 'required']);
			echo Html::endTag('div');
			echo Html::beginTag('div',['class' => 'form-group left-5']);
				echo Html::submitButton('Submit',['class' => 'btn btn-default']);
			echo Html::endTag('div');
		echo Html::endTag('form');
	echo Html::endTag('div');
echo Html::endTag('div');
?>
