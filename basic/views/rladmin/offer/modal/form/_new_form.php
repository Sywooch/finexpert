<?php
use yii\helpers\Html;
use app\models\Offer;
echo Html::beginTag('div',['class' => 'jumbotron jumbotron-new-offer']);
	echo Html::beginTag('div',['name' => 'block-modal-info']);

	echo Html::endTag('div');
	echo Html::beginTag('form',['name' => 'new-offer']);
		echo Html::input('text', '_csrf', Yii::$app->request->getCsrfToken(),['type' => 'hidden']);
		echo Html::beginTag('div',['class' => 'row']);
			echo Html::beginTag('div',['class' => 'col-sm-12']);
				echo Html::input('text', 'Offer[name]', '', ['class' => 'form-control', 'placeholder' => 'Name', 'required' => 'required']);		
			echo Html::endTag('div');
		echo Html::endTag('div');
		echo Html::beginTag('div',['class' => 'row top-10']);
			echo Html::beginTag('div',['class' => 'col-sm-3']);
				echo Html::input('number', 'Offer[min_loan]', '', ['class' => 'form-control', 'placeholder' => 'Min Loan', 'required' => 'required', 'min' => 100, 'step' => 100]);
			echo Html::endTag('div');
			echo Html::beginTag('div',['class' => 'col-sm-3']);
				echo Html::input('number', 'Offer[max_loan]', '', ['class' => 'form-control', 'placeholder' => 'Max Loan', 'required' => 'required', 'min' => 5000, 'step' => 100]);
			echo Html::endTag('div');
			echo Html::beginTag('div',['class' => 'col-sm-3']);
				echo Html::input('number', 'Offer[min_time]', '', ['class' => 'form-control', 'placeholder' => 'Min Time', 'required' => 'required', 'min' => 1]);
			echo Html::endTag('div');
			echo Html::beginTag('div',['class' => 'col-sm-3']);
				echo Html::input('number', 'Offer[max_time]', '', ['class' => 'form-control', 'placeholder' => 'Max Time', 'required' => 'required', 'min' => 7]);
			echo Html::endTag('div');
		echo Html::endTag('div');	

		echo Html::beginTag('div',['class' => 'row top-10']);
			echo Html::beginTag('div',['class' => 'col-sm-3']);
				echo Html::input('number', 'Offer[min_age]', '', ['class' => 'form-control', 'placeholder' => 'Min Age', 'required' => 'required', 'min' => 18]);
			echo Html::endTag('div');
			echo Html::beginTag('div',['class' => 'col-sm-3']);
				echo Html::input('number', 'Offer[max_age]', '', ['class' => 'form-control', 'placeholder' => 'Max Age', 'required' => 'required', 'min' => 50, 'step' => 5]);
			echo Html::endTag('div');
			echo Html::beginTag('div',['class' => 'col-sm-3']);
				echo Html::input('text', 'Offer[min_interest_rate_day]', '', ['class' => 'form-control', 'placeholder' => 'Min Rate', 'required' => 'required', 'data-validation' => 'number', 'data-validation-allowing' => 'float,positive']);
			echo Html::endTag('div');
			echo Html::beginTag('div',['class' => 'col-sm-3']);
				echo Html::input('text', 'Offer[max_interest_rate_day]', '', ['class' => 'form-control', 'placeholder' => 'Max Rate', 'required' => 'required','data-validation' => 'number', 'data-validation-allowing' => 'float,positive']);
			echo Html::endTag('div');
		echo Html::endTag('div');

		echo Html::beginTag('div',['class' => 'row top-10']);
			echo Html::beginTag('div',['class' => 'col-sm-3']);
				echo Html::input('text', 'Offer[interest_rate_month]', '', ['class' => 'form-control', 'placeholder' => 'Month Rate', 'data-validation' => 'number', 'data-validation-allowing' => 'float,positive']);
			echo Html::endTag('div');
			echo Html::beginTag('div',['class' => 'col-sm-3']);
				echo Html::input('text', 'Offer[interest_rate_year]', '', ['class' => 'form-control', 'placeholder' => 'Year Rate', 'data-validation' => 'number', 'data-validation-allowing' => 'float,positive']);
			echo Html::endTag('div');
			echo Html::beginTag('div',['class' => 'col-sm-3']);
				echo Html::input('number', 'Offer[profit_rating]', '', ['class' => 'form-control', 'placeholder' => 'Profit Rating']);
			echo Html::endTag('div');
			echo Html::beginTag('div',['class' => 'col-sm-3']);
				echo Html::input('number', 'Offer[client_rating]', '', ['class' => 'form-control', 'placeholder' => 'Client Rating']);
			echo Html::endTag('div');
		echo Html::endTag('div');		

		echo Html::beginTag('div',['class' => 'row top-10']);
			echo Html::beginTag('div',['class' => 'col-sm-3']);
				echo Html::input('text', 'Offer[document]', '', ['class' => 'form-control', 'placeholder' => 'Documents']);
			echo Html::endTag('div');
			echo Html::beginTag('div',['class' => 'col-sm-3']);
				echo Html::input('text', 'Offer[citizenship]', '', ['class' => 'form-control', 'placeholder' => 'Citizenship']);
			echo Html::endTag('div');
			echo Html::beginTag('div',['class' => 'col-sm-3']);
				echo Html::input('text', 'Offer[registration]', '', ['class' => 'form-control', 'placeholder' => 'Registration']);
			echo Html::endTag('div');
			echo Html::beginTag('div',['class' => 'col-sm-3']);
				echo Html::input('text', 'Offer[job]', '', ['class' => 'form-control', 'placeholder' => 'Job']);
			echo Html::endTag('div');
		echo Html::endTag('div');

		echo Html::beginTag('div',['class' => 'row top-10']);
			echo Html::beginTag('div',['class' => 'col-sm-12']);
				echo Html::input('text', 'Offer[payment]', '', ['class' => 'form-control', 'placeholder' => 'Payment']);
			echo Html::endTag('div');
			
		echo Html::endTag('div');		

		echo Html::beginTag('div',['class' => 'row top-10']);
			echo Html::beginTag('div',['class' => 'col-sm-12']);
				echo Html::input('url', 'Offer[url]', '', ['class' => 'form-control', 'placeholder' => 'Url', 'required' => 'required', 'data-validation' => 'url']);
			echo Html::endTag('div');
			
		echo Html::endTag('div');	

		echo Html::beginTag('div',['class' => 'row top-10']);
			echo Html::beginTag('div',['class' => 'col-sm-12']);
				echo Html::textarea('Offer[description]', '',['class' => 'form-control', 'placeholder' => 'Description']);
			echo Html::endTag('div');
		echo Html::endTag('div');	

		echo Html::beginTag('div',['class' => 'row top-10']);
			echo Html::beginTag('div',['class' => 'col-sm-12']);
				echo Html::dropDownList('Offer[status]', '', [Offer::ACTIVE => 'Active', Offer::PENDING => 'Pending', Offer::STOPPED => 'Stopped'],['class' => 'form-control', 'prompt' => 'Status']);		
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