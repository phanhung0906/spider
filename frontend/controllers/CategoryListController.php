<?php

namespace frontend\controllers;

use yii\web\Controller;

class CategoryListController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}