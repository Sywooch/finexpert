<?php
use yii\helpers\Html;

if (isset($data)) {
	echo Html::beginTag('div',['class' => 'table-mobile']);
		echo Html::beginTag('table',['class' => 'table table-curious-blue']);
			echo Html::beginTag('thead');
				echo Html::beginTag('tr');
					echo Html::beginTag('th');
						echo 'Название';
					echo Html::endTag('th');
					echo Html::beginTag('th');
						echo 'Описание';
					echo Html::endTag('th');
					echo Html::beginTag('th');
						echo 'Комиссия';
					echo Html::endTag('th');
					echo Html::beginTag('th');
						echo 'К выплате';
					echo Html::endTag('th');
				echo Html::endTag('tr');
			echo Html::endTag('thead');
			echo Html::beginTag('tbody');
				foreach ($data as $item) {
					if (isset($offers[$item['id']])) {
						echo Html::beginTag('tr');
							echo Html::beginTag('td');
								echo $offers[$item['id']]->name;
							echo Html::endTag('td');
							echo Html::beginTag('td');
								
							echo Html::endTag('td');
							echo Html::beginTag('td');
								echo $item['commision'];
							echo Html::endTag('td');
							echo Html::beginTag('td');
								echo $item['amount'] + $item['commision'];
							echo Html::endTag('td');
						echo Html::endTag('tr');
					}
					
				}
			echo Html::beginTag('tbody');
		echo Html::endTag('table');
	echo Html::endTag('div');
	
}


?>