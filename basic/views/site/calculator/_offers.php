<?php
use yii\helpers\Html;
setlocale(LC_ALL, 'ru_RU');
if (isset($data)) {
	echo Html::beginTag('div',['class' => 'table-mobile']);
		echo Html::beginTag('table',['class' => 'table table-curious-blue']);
			echo Html::beginTag('thead');
				echo Html::beginTag('tr');
					echo Html::beginTag('th');
						echo 'Название';
					echo Html::endTag('th');
					echo Html::beginTag('th',['class' => 'text-center']);
						echo 'Описание';
					echo Html::endTag('th');
					echo Html::beginTag('th',['class' => 'text-center']);
						echo 'Комиссия';
					echo Html::endTag('th');
					echo Html::beginTag('th',['class' => 'text-center']);
						echo 'К выплате '.date("d/m/Y",strtotime("+ $time day",time()));
					echo Html::endTag('th');
					echo Html::beginTag('th');
						
					echo Html::endTag('th');
				echo Html::endTag('tr');
			echo Html::endTag('thead');
			echo Html::beginTag('tbody');
				foreach ($data as $item) {
					if (isset($offers[$item['id']])) {
						echo Html::beginTag('tr',['name' => 'offer']);
							echo Html::beginTag('td');
								//echo $offers[$item['id']]->name;
								echo Html::img('@web/images/offer/logo/'.$item['id'].'.png',['width' => '100px', 'name' => 'offer-logo', 'alt' => $offers[$item['id']]->name, 'title' => $offers[$item['id']]->name]);
							echo Html::endTag('td');
							echo Html::beginTag('td',['class' => 'text-center']);
								echo Html::tag('span','',['class' => 'icon icon-md-variant-1 icon-primary fa-info-circle', 'name' => 'offer-info']);

							echo Html::endTag('td');
							echo Html::beginTag('td',['class' => 'text-center']);
								echo $item['commision'].' руб.';
							echo Html::endTag('td');
							echo Html::beginTag('td',['class' => 'text-center']);
								echo $item['amount'] + $item['commision'].' руб.';
							echo Html::endTag('td');
							echo Html::beginTag('td',['class' => 'text-right']);
								echo Html::beginTag('div',['class' => 'btn btn-curious-blue-outline btn-icon btn-icon-right"']);
									echo "Оформить";
									echo Html::beginTag('span',['class' => 'icon icon-sm fa-angle-right']);

									echo Html::endTag('span');
								echo Html::endTag('div');
							echo Html::endTag('td');
						echo Html::endTag('tr');
						echo Html::beginTag('tr',['name' => 'info', 'class' => 'active']);
							echo Html::beginTag('td',['colspan' => 5]);
								echo $this->render('_offer_info',[
										'offer' => $offers[$item['id']],
									]);
							echo Html::endTag('td');
						echo Html::endTag('tr');
					}
					
				}
			echo Html::beginTag('tbody');
		echo Html::endTag('table');
	echo Html::endTag('div');
	
}

/*$this->registerJs('var test = JSON.stringify();
console.log(test);
	');*/

?>