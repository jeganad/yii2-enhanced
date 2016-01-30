<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
	<style type="text/css">
		html,
		body {
			height: 100%;
		}
	</style>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap register-page">

	<header class="header">
		<div class="container">
			<div class="navbar-brand">
				<?= Html::a(Html::img('/images/logo-abn-amro-svg.svg', ['alt' => Yii::$app->name]), Yii::$app->homeUrl); ?>
			</div>
		</div>
	</header>

	<div class="container">
		<?php
		foreach (Yii::$app->session->allFlashes as $key => $message) {
			if (is_array($message)) {
				foreach ($message as $_message) {
					echo '<div class="alert alert-' . $key . '">' . $_message . '</div>';
				}
			} else {
				echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
			}
		}
		?>
		<?= $content ?>
	</div>

</div>

<footer class="footer">
	<div class="container">
		<ul>
			<li><a href="/site/conditions">Algemene voorwaarden</a></li>
			<li><a href="/">Disclaimer</a></li>
		</ul>
	</div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
