<?php

namespace backend\controllers;

use Yii;
use common\components\Url;
use common\models\ShopProducts;
use common\models\ShopProductsGalleries;
use backend\models\ShopProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\web\HttpException;

/**
 * ShopProductsController implements the CRUD actions for ShopProducts model.
 */
class ShopProductsController extends Controller
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
     * Lists all ShopProducts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ShopProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ShopProducts model.
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
     * Creates a new ShopProducts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = [];
        $model[] = new ShopProducts();
        $model[] = new ShopProductsGalleries();

        $post_request = Yii::$app->request->post();

        if ($post_request) {
            $model[0]->setAttributes($post_request['ShopProducts']);
            $images = UploadedFile::getInstances($model[1], 'img');
            $control = true;

            if ($model[0]->save()) {
                foreach($images as $img) {
                    echo $img;
                    $time = time();
                    $gallery = new ShopProductsGalleries;
                    $gallery->img = $time . $img->baseName . '.' . $img->extension;
                    $gallery->product_id = $model[0]->id;
                    if ($gallery->upload($img, $time)) {
                        if ($gallery->save(false)) {
                            continue;
                        } else {
                            $control = false;
                            break;
                        }
                    } else {
                        $control = false;
                        break;
                    }
                }
                
                if ($control) {
                    return $this->redirect(['view', 'id' => $model[0]->id]);
                } else {
                    throw new HttpException(500, 'Could not be saved.');
                }
            } else {
                throw new HttpException(500, 'Internal Server Error.');
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ShopProducts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ShopProducts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model_gallery = ShopProductsGalleries::find()->where(['product_id' => $id])->all();

        foreach($model_gallery as $gallery) {
            unlink(Yii::$app->Url->unlinkUrl() . $gallery->img);
            $gallery->delete();
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionChangeStock($id)
    {
        $model = ShopProducts::findOne(['id' => $id]);

        if ($model->stock === 0) {
            $model->stock = 1;
        } else {
            $model->stock = 0;
        }

        if ($model->save()) {
            return $this->redirect(['/shop-products']);
        }
    }

    /**
     * Finds the ShopProducts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ShopProducts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ShopProducts::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
