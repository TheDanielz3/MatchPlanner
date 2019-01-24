<?php

namespace frontend\controllers;

use frontend\models\Event;
use frontend\models\Comment;
use frontend\models\Teamprofile;
use frontend\models\User;
use frontend\models\Userprofile;
use Yii;
use frontend\models\Post;
use frontend\models\PostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
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
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $id = Yii::$app->user->identity->getId();

        return $this->render('view', [
            'model' => $model,
            'idEvent' => $model->event->id,
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();

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

        if ($model->load(Yii::$app->request->post()))
        {
            //$postID = $model->id;

            /*$model->event_id = $idEvent;

            $image = UploadedFile::getInstance($model, 'image');

            $imgName = $model->id . ' . ' . $image->getExtension();

            $image->saveAs(Yii::getAlias('@imagePostPath') . '/' . $imgName);

            $model->image = $imgName;*/

            $model->save();

            //return $this->redirect(['/post/view', 'id' => $model->id]);
            return $this->redirect(['/event/view', 'id' => $idEvent]);
        }

        return $this->render('create', [
            'model' => $model,
            'ID_a_passar' => $id_Respetivo_a_Passar,
            $this->view->params['selecao'] = $selecao,
            $this->view->params['id_Respetivo_a_Passar'] = $id_Respetivo_a_Passar,
        ]);
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $id = Yii::$app->user->identity->getId();

        //Recebe o ID do Post
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

        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            /*$model->event_id = $idEvent;

            $image = UploadedFile::getInstance($model, 'image');

            $imgName = $model->id . ' . ' . $image->getExtension();

            $image->saveAs(Yii::getAlias('@imagePostPath') . '/' . $imgName);

            $model->image = $imgName;

            $model->save();

            return $this->redirect(['/post/view', 'id' => $model->id]);*/
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
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id); //Model de posts
        $idEvent = Yii::$app->request->get('event_id');

        foreach($model->comments as $comment)
        {
            $comment->delete();
        }

        //Apaga o post
        $model->delete();

        //Redireciona para o evento respetivo onde estava
        return $this->redirect(['event/view', 'id' => $idEvent]);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
