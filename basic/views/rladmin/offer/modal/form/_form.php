<?php
use yii\helpers\Html;

echo Html::beginTag('div',['class' => 'jumbotron jumbotron-add-contract']);
	echo Html::beginTag('form',['name' => 'resolve']);
		echo Html::input('text', '_csrf', Yii::$app->request->getCsrfToken(),['type' => 'hidden']);
		echo Html::input('text', 'id', $item->id,['type' => 'hidden']);
		echo Html::input('text', 'manager', $manager->id,['type' => 'hidden']);
		echo Html::beginTag('div',['class' => 'row']);
			echo Html::beginTag('div',['class' => 'col-sm-6']);
				echo Html::input('text', 'resolution_date', date("Y/m/d"), ['class' => 'form-control', 'placeholder' => 'Resolution date', 'required' => 'required']);		
			echo Html::endTag('div');
			echo Html::beginTag('div',['class' => 'col-sm-6']);
				echo Html::dropDownList('status', $item->nonconformance_status_id, ArrayHelper::map(ContractNonconformanceStatus::listD(),'id','title'),['class' => 'form-control']);		
			echo Html::endTag('div');
		echo Html::endTag('div');
		echo Html::beginTag('div',['class' => 'row top10']);
			echo Html::beginTag('div',['class' => 'col-sm-12']);
				echo Html::textarea('comment', '',['class' => 'form-control', 'placeholder' => 'Comment']);			
			echo Html::endTag('div');
		echo Html::endTag('div');		
		
		echo Html::beginTag('div',['class' => 'row top10']);
			echo Html::beginTag('div',['class' => 'col-sm-12 text-right top10']);
				
				
				echo Html::submitButton('Save', [
                    'class' => 'btn btn-primary btn-sm'
                ]);
			echo Html::endTag('div');
		echo Html::endTag('div');				
	echo Html::endTag('form');
echo Html::endTag('div');
?>