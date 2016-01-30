<?php

use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use common\components\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('page', 'Pages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<div class="content">

		<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

		<p>
			<?= Html::a(Yii::t('common', 'Create {modelClass}', ['modelClass' => Yii::t('page', 'Page')]), ['create'], ['class' => 'btn btn-success']) ?>
		</p>

		<?= GridView::widget([
			'dataProvider' => $dataProvider,
			'filterModel'  => $searchModel,
			'columns'      => [
				'url_description',
				'title',
				'content:ntext',
				[
					'attribute' => 'status',
					'value'     => 'statusString',
					'filter'    => Html::activeDropDownList($searchModel, 'status', $searchModel->statusOptions, ['prompt' => Yii::t('common', 'Select')])
				],
				//				[
				//					'attribute' => 'created_by',
				//					'value'     => 'created_by_name',
				//					'filter'    => Html::activeDropDownList($searchModel, 'created_by', ArrayHelper::map(User::find()->asArray()->all(), 'id', 'username'), ['prompt' => Yii::t('common', 'Select')])
				//				],
				//				[
				//					'attribute' => 'updated_by',
				//					'value'     => 'updated_by_name',
				//					'filter'    => Html::activeDropDownList($searchModel, 'updated_by', ArrayHelper::map(User::find()->asArray()->all(), 'id', 'username'), ['prompt' => Yii::t('common', 'Select')])
				//				],
				//				'created_at:datetime',
				//				'updated_at:datetime',

				['class' => '\common\components\grid\ActionColumn'],
			],
		]); ?>

	</div>
</div>
