<?php
namespace frontend\controllers;

use common\models\Page;
use frontend\components\web\Controller;
use Yii;
use yii\web\NotFoundHttpException;

/**
 * Page controller
 */
class PageController extends Controller
{

	/**
	 * @param $slug
	 * @return string
	 * @throws NotFoundHttpException
	 */
	public function actionView($slug)
	{
		$page = Page::findOne(['url_description' => $slug,]);

		// Make sure we have the page
		if (!is_null($page) && $page->status === Page::STATUS_SHOW) {
			return $this->render('view', [
				'page' => $page,
			]);
		}

		throw new NotFoundHttpException(Yii::t('error', 'The requested page does not exist.'));
	}


}