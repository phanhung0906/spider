<?php

namespace backend\controllers;

use Yii;
use common\models\Product;
use backend\models\ProductSearch;
use yii\web\NotFoundHttpException;

class ProductController extends BaseController
{
   public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Product();
        $request = \Yii::$app->request;

        if ($request->post()) {
            $model->load($request->post());
            $model->begin_date = strtotime($request->post('Product')['begin_date']);
            $model->end_date   = strtotime($request->post('Product')['end_date']);
            if ($model->save()) {
                return $this->redirect(['view', 'id' => (string)$model->_id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model   = $this->findModel($id);
        $request = \Yii::$app->request;

        if ($request->isPost) {
            $model->load($request->post());
            $model->begin_date = strtotime($request->post('Product')['begin_date']);
            $model->end_date   = strtotime($request->post('Product')['end_date']);

            if ($model->save()) {
                return $this->redirect(['view', 'id' => (string)$model->_id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        if (Yii::$app->getRequest()->getIsPost()) {
            $this->findModel($id)->delete();
        }
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
