<?php

namespace frontend\controllers;

use Yii;
use frontend\models\User;
use frontend\models\Userprofile;
use frontend\models\Teamprofile;
use frontend\models\Event;
use frontend\models\Post;
use frontend\models\Comment;
use frontend\models\CommentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CommentController implements the CRUD actions for Comment model.
 */
class CommentController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Comment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CommentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Comment model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Comment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Comment();

        $id = Yii::$app->user->identity->getId();
        $idEvent = Yii::$app->request->getQueryParam('event_id');

        //TEAM ID E SOLO TEM O MESMO ID  DO USER DONT FORGET!!
        $Team = Teamprofile::findAll($id);

        $Solo = Userprofile::findAll($id);

        //Selecao de solo é igual 1
        if($Solo != null)
        {
            $id_Respetivo_a_Passar = $Solo;
            $selecao = 1;
            //var_dump($id_Respetivo_a_Passar);

        }
        //Selecao de Team é igual a 2
        if($Team != null)
        {
            $id_Respetivo_a_Passar = $Team;
            $selecao = 2;
            //var_dump($id_Respetivo_a_Passar);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['event/view', 'id' => $idEvent]);
        }

        return $this->render('create', [
            'model' => $model,
            'ID_a_passar' => $id_Respetivo_a_Passar,
            $this->view->params['selecao'] = $selecao,
            $this->view->params['id_Respetivo_a_Passar'] = $id_Respetivo_a_Passar,
        ]);
    }

    /**
     * Updates an existing Comment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $id = Yii::$app->user->identity->getId();
        $idEvent = Yii::$app->request->get('event_id');

        //TEAM ID E SOLO TEM O MESMO ID  DO USER DONT FORGET!!
        $Team = Teamprofile::findAll($id);

        $Solo = Userprofile::findAll($id);

        //Selecao de solo é igual 1
        if($Solo != null)
        {
            $id_Respetivo_a_Passar = $Solo;
            $selecao = 1;
            //var_dump($id_Respetivo_a_Passar);

        }
        //Selecao de Team é igual a 2
        if($Team != null)
        {
            $id_Respetivo_a_Passar = $Team;
            $selecao = 2;
            //var_dump($id_Respetivo_a_Passar);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/event/view', 'id' => $idEvent]);
        }

        return $this->render('update', [
            'model' => $model,
            'id_event' => $idEvent,
            'ID_a_passar' => $id_Respetivo_a_Passar,
            $this->view->params['selecao'] = $selecao,
            $this->view->params['id_Respetivo_a_Passar'] = $id_Respetivo_a_Passar,
        ]);
    }

    /**
     * Deletes an existing Comment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        $idEvent = Yii::$app->request->get('event_id');

        return $this->redirect(['event/view', 'id' => $idEvent]);
    }

    /**
     * Finds the Comment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Comment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Comment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
