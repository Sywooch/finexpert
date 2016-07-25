<?php
use yii\helpers\Html;
$this->registerJsFile('@web/js/user/user.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->title = 'Users';
echo Html::beginTag('div',['class' => 'row']);
	echo Html::beginTag('div',['class' => 'col-sm-12','name' => 'block-info']);

	echo Html::endTag('div');
echo Html::endTag('div');
if ($users != NULL) {
	echo Html::beginTag('div',['class' => 'table-responsive']);
		echo Html::beginTag('table',['class' => 'table table-hover table-bordered']);
			echo Html::beginTag('thead');
				echo Html::beginTag('tr');
					echo Html::beginTag('th');
						echo 'Name';
					echo Html::endTag('th');
					echo Html::beginTag('th');
						echo 'Email';
					echo Html::endTag('th');
					echo Html::beginTag('th');
						echo 'Role';
					echo Html::endTag('th');
					echo Html::beginTag('th');
						echo 'Permission';
					echo Html::endTag('th');
				echo Html::endTag('tr');
			echo Html::endTag('thead');
			echo Html::beginTag('tbody');
				foreach ($users as $user) {
					echo Html::beginTag('tr');
						echo Html::beginTag('td');
							echo $user->username;
						echo Html::endTag('td');
						echo Html::beginTag('td');
							echo $user->email;
						echo Html::endTag('td');
						echo Html::beginTag('td');
							echo $this->render('user/form/_change-role',[
									'user' => $user,
								]);
						echo Html::endTag('td');
						echo Html::beginTag('td');

						echo Html::endTag('td');
					echo Html::endTag('tr');
				}
			echo Html::endTag('tbody');
		echo Html::endTag('table');
	echo Html::endTag('div');
}
?>