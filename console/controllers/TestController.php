<?php 

namespace console\controllers;

use yii\console\Controller;

class TestController extends Controller
{
	public function actionCheckDb()
	{
		var_dump(\Yii::$app->components);
	}
}