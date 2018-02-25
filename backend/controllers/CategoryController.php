<?php

namespace backend\controllers;

use Yii;
use common\models\Category;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\CategorySearch;

class CategoryController extends BaseController
{
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
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
        $model = new Category();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => (string)$model->_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => (string)$model->_id]);
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
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionTree()
    {
        return $this->render('tree');
    }

    public function actionResponse()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $model = new Category();
        $request = \Yii::$app->request;

        if (isset($_GET['operation'])) {
            switch ($_GET['operation']) {
                case 'create_node':
                    $model->name = $request->post('name');
                    $model->parent = $request->post('parent');

                    if ($model->save()) {
                        return ['id' => (string)$model->getPrimaryKey()];
                    }
                    break;
                case 'rename_node':
                    $id = $request->post('id');
                    $name = $request->post('name');

                    $model = $this->findModel($id);
                    $model->name = $name;
                    if($model->save()){
                        return true;
                    }
                    break;
                case 'delete_node':
                    $id = $request->post('id');
                    $this->findModel($id)->delete();
                    return true;
                case 'move_node':
                    $id = $request->post('id');
                    $parent = $request->post('parent');

                    $model = $this->findModel($id);
                    $model->parent = $parent;
                    if($model->save()){
                        return true;
                    }
                    break;
                default:
                    break;
            }

            return null;
        } else {
            $datas  = Category::find()->all();
            $result = [];
            foreach ($datas as $data) {
                $result[] = ['id' => (string)$data->_id, 'parent' => $data->parent, 'text' => $data->name];
            }
            return $result;
        }
    }
}
