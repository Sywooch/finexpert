<?php
use yii\helpers\Html;

if ($offers != NULL) {
	echo Html::beginTag('div',['class' => 'table-responsive top-20']);
		echo Html::beginTag('table',['class' => 'table table-hover table-bordered']);
			echo Html::beginTag('thead');
				echo Html::beginTag('tr');
					echo Html::beginTag('th');
						echo 'Image';
					echo Html::endTag('th');
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
					echo Html::beginTag('th');
						
					echo Html::endTag('th');
				echo Html::endTag('tr');
			echo Html::endTag('thead');
			echo Html::beginTag('tbody');
				foreach ($offers as $offer) {
					echo Html::beginTag('tr');
						echo Html::beginTag('td');
							echo $this->render('../form/_load_images',[
									'offer' => $offer,
								]);
						echo Html::endTag('td');
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
						echo Html::beginTag('td');
							echo $this->render('../modal/form/_edit',[
								'offer' => $offer,
							]);
						echo Html::endTag('td');
					echo Html::endTag('tr');
				}
			echo Html::endTag('tbody');
		echo Html::endTag('table');
	echo Html::endTag('div');
}
?>