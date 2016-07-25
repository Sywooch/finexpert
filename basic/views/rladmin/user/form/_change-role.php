<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\AuthItem;
echo Html::beginTag('form',['name' => 'assign-role', 'class' => 'form-inline']);
	echo Html::input('text', '_csrf', Yii::$app->request->getCsrfToken(),['type' => 'hidden']);
	echo Html::input('text', 'user', $user->id,['type' => 'hidden']);
	echo Html::beginTag('div',['class' => 'form-group']);
		echo Html::checkboxList('roles', roleName($user->id), ArrayHelper::map(AuthItem::listRoles(),'name','name'));
	echo Html::endTag('div');

echo Html::endTag('form');

/**
*
* @param integer $id
* @return array 
*/
function roleName($id)
{
	$out = [];
	$roles = Yii::$app->authManager->getRolesByUser($id);
	if ($roles != NUll) {
		foreach ($roles as $role) {
			$out[] = $role->name;
		}
	}
	return $out;
}
?>