<?php

use backend\modules\user\Module;
use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use common\components\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\user\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('user', 'User');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

	<div class="content">

		<p>
			<?= Html::a(Yii::t('common', 'Create {modelClass}', ['modelClass' => Module::t('user', 'User')]), ['create'], ['class' => 'btn btn-success']) ?>
		</p>

		<?= GridView::widget([
			'dataProvider' => $dataProvider,
			'filterModel'  => $searchModel,
			'columns'      => [
				'username',
				'email',

				['class' => '\common\components\grid\ActionColumn'],
			],
		]); ?>

	</div>
</div>
