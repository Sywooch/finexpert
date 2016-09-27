<?php
use yii\helpers\Html;
setlocale(LC_ALL, 'ru_RU');
if (isset($data)) {
	echo Html::beginTag('div',['class' => 'table-responsive	']);
		echo Html::beginTag('table',['class' => 'table table-condensed']);
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
					echo Html::beginTag('th',['class' => 'text-center hidden-xs']);
						echo 'К выплате '.date("d/m/Y",strtotime("+ $time day",time()));
					echo Html::endTag('th');
					echo Html::beginTag('th',['class' => 'text-center']);
						//echo Html::tag('i','',['class' => 'fa fa-cog visible-xs-block']);
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
								echo Html::tag('i','',['class' => 'fa fa-info-circle', 'name' => 'offer-info']);

							echo Html::endTag('td');
							echo Html::beginTag('td',['class' => 'text-center']);
								echo $item['commision'].' руб.';
							echo Html::endTag('td');
							echo Html::beginTag('td',['class' => 'text-center hidden-xs']);
								echo $item['amount'] + $item['commision'].' руб.';
							echo Html::endTag('td');
							echo Html::beginTag('td',['class' => 'text-right order']);
								echo Html::a('Оформить',['go','url' => $offers[$item['id']]->url],['class' => 'btn btn-primary btn-sm','target' => '_blank']);
								
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