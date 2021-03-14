<?php

namespace app\controllers;

use app\models\Clients;
use Yii;
use yii\web\NotFoundHttpException;

class ClientsController extends \yii\web\Controller
{

    /**
     * Renderiza a View
     * Onde mostra todos os Clients cadastrados
     */
    public function actionIndex()
    {
        $clients = Clients::find()->all();
        return $this->render('index', ['clients' => $clients]);
    }


    public function actionCreate()
    {

        $request = Yii::$app->request;

        if ($request->isPost) {
            $model = new Clients();
            $model->attributes = $request->post();
            $model->save();
            return $this->redirect(['clients/index']);
        }

        return $this->render('create');
    }

    public function actionEdit($id)
    {

        $clients = Clients::findOne($id);
        if (!$clients) {
            throw new NotFoundHttpException("Página não encontrada!");
        }
        return $this->render('create', ['clients' => $clients]);
    }

    public function actionUpdate($id)
    {

        $model = Clients::findOne($id);

        $request = Yii::$app->request;
        

        if ($request->isPost) {
            $model->attributes = $request->post();
            $model->save();
            return $this->redirect(['clients/index']);
        } else {
            throw new NotFoundHttpException(406,"Não salvo!");
        }
    }

    public function actionDelete($id)
    {
        $model = Clients::findOne($id);
        if(! $model)
        {
            throw new NotFoundHttpException("Página não encontrada");
        }
        $model->delete();
        return $this->redirect(['clients/index']);
    }
}
