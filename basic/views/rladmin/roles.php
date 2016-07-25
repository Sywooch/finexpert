<?php
use yii\helpers\Html;
$this->title = 'Roles';
$this->registerJsFile('@web/js/role/role.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

	echo Html::beginTag('div',['class' => 'row']);
		echo Html::beginTag('div',['class' => 'col-sm-12', 'name' => 'list-roles']);
			if ($roles != NULL) {
				echo $this->render('role/table/_roles',[
						'roles' => $roles,
					]);
			}
		echo Html::endTag('div');
	echo Html::endTag('div');
	


echo $this->render('role/form/_creare-role');

?>