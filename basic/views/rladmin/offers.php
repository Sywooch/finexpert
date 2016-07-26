<?php
use yii\helpers\Html;
//$this->registerJsFile('@web/js/user/user.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->title = 'Offers';
echo Html::beginTag('div',['class' => 'row']);
	echo Html::beginTag('div',['class' => 'col-sm-12','name' => 'block-info']);

	echo Html::endTag('div');
echo Html::endTag('div');
echo $this->render('offer/modal/form/_new');
if ($offers != NULL) {
	echo Html::beginTag('div',['class' => 'table-responsive']);
		echo Html::beginTag('table',['class' => 'table table-hover table-bordered']);
			echo Html::beginTag('thead');
				echo Html::beginTag('tr');
					echo Html::beginTag('th');
						echo 'Name';
					echo Html::endTag('th');
					echo Html::beginTag('th');
						echo 'Min Loan';
					echo Html::endTag('th');
					echo Html::beginTag('th');
						echo 'Max Loan';
					echo Html::endTag('th');
					echo Html::beginTag('th');
						echo 'Min Interest';
					echo Html::endTag('th');
					echo Html::beginTag('th');
						echo 'Max Interest';
					echo Html::endTag('th');
					echo Html::beginTag('th');
						echo 'Status';
					echo Html::endTag('th');
					echo Html::beginTag('th');
						echo 'Created';
					echo Html::endTag('th');
				echo Html::endTag('tr');
			echo Html::endTag('thead');
			echo Html::beginTag('tbody');
				foreach ($offers as $offer) {
					echo Html::beginTag('tr');
						echo Html::beginTag('td');
							echo $offer->name;
						echo Html::endTag('td');
						echo Html::beginTag('td');
							echo $offer->min_loan;
						echo Html::endTag('td');
						echo Html::beginTag('td');
							echo $offer->max_loan;
						echo Html::endTag('td');
						echo Html::beginTag('td');
							echo $offer->min_interest_rate_day;
						echo Html::endTag('td');
						echo Html::beginTag('td');
							echo $offer->max_interest_rate_day;
						echo Html::endTag('td');
						echo Html::beginTag('td');
							echo $offer->statusName;
						echo Html::endTag('td');
						echo Html::beginTag('td');
							echo date("d M Y",$offer->created_at);
						echo Html::endTag('td');
					echo Html::endTag('tr');
				}
			echo Html::endTag('tbody');
		echo Html::endTag('table');
	echo Html::endTag('div');
}
?>