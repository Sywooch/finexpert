<?php
use yii\helpers\Html;

echo Html::beginTag('div',['class' => 'table-responsive']);
	echo Html::beginTag('table',['class' => 'table table-hover table-bordered']);
		echo Html::beginTag('thead');
			echo Html::beginTag('tr');
				echo Html::beginTag('th');
					echo 'Role';
				echo Html::endTag('th');
				echo Html::beginTag('th');
					echo 'Description';
				echo Html::endTag('th');
			echo Html::endTag('tr');
		echo Html::endTag('thead');
		echo Html::beginTag('tbody');
			foreach ($roles as $role) {
				echo Html::beginTag('tr');
					echo Html::beginTag('td');
						echo $role->name;
					echo Html::endTag('td');
					echo Html::beginTag('td');
						echo $role->description;
					echo Html::endTag('td');
				echo Html::endTag('tr');
			}
		echo Html::endTag('tbody');
	echo Html::endTag('table');
echo Html::endTag('div');
?>