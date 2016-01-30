<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Page */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('page', 'Page'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<div class="content">

		<p>
			<?= Html::a(Yii::t('common', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
			<?= Html::a(Yii::t('common', 'Delete'), ['delete', 'id' => $model->id], [
				'class' => 'btn btn-danger',
				'data'  => [
					'confirm' => Yii::t('common', 'Are you sure you want to delete this item?'),
					'method'  => 'post',
				],
			]) ?>
		</p>

		<?= DetailView::widget([
			'model'      => $model,
			'attributes' => [
				'url_description',
				'title',
				'content:ntext',
				[
					'attribute' => 'status',
					'value'     => $model->statusString,
				],
				[
					'attribute' => 'created_by',
					'value'     => $model->created_by_name
				],
				[
					'attribute' => 'updated_by',
					'value'     => $model->updated_by_name
				],
				'created_at:datetime',
				'updated_at:datetime',
			],
		]) ?>
	</div>
</div>
