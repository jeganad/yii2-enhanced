<?php
namespace backend\modules\user\models\forms;

use backend\modules\user\Module;
use backend\modules\user\models\User;
use Yii;
use \yii\base\Model;
use yii\validators\EmailValidator;

/**
 * RegistrationForm
 */
class RegistrationForm extends Model
{
	/** @var String */
	public $email;
	/** @var */
	public $password;
	/** @var */
	public $repeat_password;

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['email', 'password', 'repeat_password'], 'required'],
			[['email'], 'email'],
			[['email'], 'unique'],
			['password', 'string', 'min' => 6],
			['repeat_password', 'compare', 'compareAttribute' => 'password', 'operator' => '==='],
		];
	}

	/**
	 * Validates the password.
	 * This method serves as the inline validation for password.
	 *
	 * @param string $attribute the attribute currently being validated
	 * @param array $params the additional name-value pairs given in the rule
	 */
	public function validatePassword($attribute, $params)
	{
		var_dump($this->password);
		// TODO misschien letters+cijfers? Extra randvoorwaarden?
	}

	/**
	 * Save the user and send an email with the activation key
	 * @return bool
	 */
	public function register()
	{
		// Create user
		$user = new User([
			'username' => $this->email,
			'email'    => $this->email,
			'status'   => User::STATUS_DELETED,
			'roles'    => ['admin']
		]);

		$user->setPassword($this->password);
		$user->generateAuthKey();
		$user->save();

		return \Yii::$app->mailer->compose('@backend/modules/user/views/mail/registration', ['user' => $user])
			->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name])
			->setTo($this->email)
			->setSubject(Module::t('registration', 'Account activation for {email}', ['name' => \Yii::$app->name]))
			->send();
	}

	public function attributeLabels()
	{
		return [
			'email'           => Module::t('registration', 'Email'),
			'password'        => Module::t('registration', 'Password'),
			'repeat_password' => Module::t('registration', 'Repeat Password'),
		];
	}
}
