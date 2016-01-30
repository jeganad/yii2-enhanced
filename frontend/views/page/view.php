<?php
/* @var $this yii\web\View */
/* @var $page common\models\Page */

use yii\helpers\Html;

$this->title = $page->title;
?>

	<div class="col-md-12">
		<?= Html::decode($page->content); ?>
	</div>