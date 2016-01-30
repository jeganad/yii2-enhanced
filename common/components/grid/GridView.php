<?php
namespace common\components\grid;

class GridView extends \yii\grid\GridView
{
	public $filterOptions = ['class' => 'filters form-control'];
	public $footerRowOptions = ['style' => 'font-weight:bold;'];

}