<?php
/**
 * Created by PhpStorm.
 * User: slava
 * Date: 12.01.16
 * Time: 12:56
 */

namespace app\controllers;


class WidgetTestController extends BehaviorsController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}