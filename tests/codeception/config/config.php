<?php
/**
 * Application configuration shared by all applications and test types
 */
return [
	'language'      => 'en-US',
	'controllerMap' => [
		'fixture' => [
			'class'           => 'yii\faker\FixtureController',
			'fixtureDataPath' => '@tests/codeception/common/fixtures/data',
			'templatePath'    => '@tests/codeception/common/templates/fixtures',
			'namespace'       => 'tests\codeception\common\fixtures',
		],
	],
	'components'    => [
		'db'         => [
			'dsn' => 'mysql:host=localhost;dbname=yii2_enhanced_test',
		],
		'mailer'     => [
			'useFileTransport' => true,
		],
		'urlManager' => [
			'showScriptName' => true,
		],
	],
];
