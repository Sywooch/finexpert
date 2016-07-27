<?php
use yii\helpers\Html;

echo Html::beginTag('form',['name' => 'default-form']);
	echo Html::input('text', '_csrf', Yii::$app->request->getCsrfToken(),['type' => 'hidden']);
echo Html::endTag('form');
?>