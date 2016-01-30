<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Page */

$this->title = Yii::t('common', 'Create {modelClass}', ['modelClass' => Yii::t('page', 'Page')]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('page', 'Page'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-create">

	<h1><?= Html::encode($this->title) ?></h1>

	<div class="content">

	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

	</div>

</div>
