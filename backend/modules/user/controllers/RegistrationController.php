<?php

namespace backend\modules\user\controllers;

use backend\modules\user\models\forms\RegistrationForm;
use backend\modules\user\Module;
use common\models\User;
use Yii;
use yii\filters\AccessControl;
use backend\components\web\Controller;

class RegistrationController extends Controller
{
	/** @var string */
	public $defaultAction = 'register';
	/** @var string */
	public $layout = '@backend/views/layouts/login_main';

	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'actions' => ['register', 'activate'],
						'allow'   => false,
					],
				],
			],
		];
	}

	/**
	 * Login action
	 * @return string|\yii\web\Response
	 */
	public function actionRegister()
	{
		if (!\Yii::$app->user->isGuest) {
			return $this->goHome();
		}

		$model = new RegistrationForm();
		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			Yii::$app->session->setFlash('success', Module::t('registration', 'Check your email for further instructions.'));

			// Send email and save the model
			$model->register();

			return $this->goBack();
		}

		return $this->render('registration', [
			'model' => $model,
		]);
	}

	/**
	 * @param $auth_key
	 * @return \yii\web\Response
	 */
	public function actionActivate($auth_key)
	{
		if ($user = User::findOne(['auth_key' => $auth_key])) {
			$user->status = User::STATUS_ACTIVE;
			$user->auth_key = null;
			$user->save();
			Yii::$app->session->setFlash('success', Module::t('registration', 'Account successfully activated, you can now login with your credentials.'));
		}

		return $this->goHome();
	}
}