<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Page */

$this->title = Yii::t('common', 'Update {modelClass}', ['modelClass' => Yii::t('page', 'Page')]) . ' ' . $model->title;

$this->params['breadcrumbs'][] = ['label' => Yii::t('page', 'Page'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('common', 'Update');
?>
<div class="page-update">

	<h1><?= Html::encode($this->title) ?></h1>

	<div class="content">

	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
</div>
