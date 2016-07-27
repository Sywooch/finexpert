<?php
use yii\helpers\Html;

echo Html::beginTag('div',['class' => 'jumbotron jumbotron-new-offer']);
	echo Html::beginTag('div',['name' => 'block-modal-info']);

	echo Html::endTag('div');
	echo Html::beginTag('form',['name' => 'load-logo', 'enctype' => 'multipart/form-data']);
		echo Html::input('text', '_csrf', Yii::$app->request->getCsrfToken(),['type' => 'hidden']);
		echo Html::input('text', 'offer', $offer->id,['type' => 'hidden']);
		echo Html::beginTag('div',['class' => 'row']);
			echo Html::beginTag('div',['class' => 'col-sm-12']);
				echo Html::input('file', 'imageFile', '', ['class' => 'form-control']);		
			echo Html::endTag('div');
		echo Html::endTag('div');
		echo Html::beginTag('div',['class' => 'row top-10']);
			echo Html::beginTag('div',['class' => 'col-sm-12']);
				if (file_exists('@web/images/offer/logo/'.$offer->id.'.png')) {
					echo Html::img('@web/images/offer/logo/'.$offer->id.'.png',['name' => 'preview-logo']);
				}else{
					echo Html::img('@web/images/noavatar.png',['name' => 'preview-logo']);
				}
				
			echo Html::endTag('div');
		echo Html::endTag('div');

		echo Html::beginTag('div',['class' => 'row top-10']);
			echo Html::beginTag('div',['class' => 'col-sm-12 text-right top10']);
				
				
				echo Html::submitButton('Save', [
                    'class' => 'btn btn-primary btn-sm'
                ]);
			echo Html::endTag('div');
		echo Html::endTag('div');				
	echo Html::endTag('form');
echo Html::endTag('div');

?>