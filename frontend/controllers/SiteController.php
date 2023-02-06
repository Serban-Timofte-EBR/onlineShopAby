<?php
namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\HttpException;
use yii\helpers\Json;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $layout = 'main';
    public $enableCsrfValidation = false;
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'home-layout';

        $categories = \common\models\ShopCategories::find()->all();
        $categories_count = count($categories);
        $products = \common\models\ShopProducts::find()->all();

        return $this->render('index', [
            'products' => $products,
            'categories' => $categories,
            'categories_count' => $categories_count
        ]);
    }

    public function actionItem($id)
    {
        $product = \common\models\ShopProducts::findOne(['id' => $id]);

        if (!isset($product)) {
            throw new HttpException(404, 'The requested item has not been found. Sorry.');
        }

        $gallery = \common\models\ShopProductsGalleries::find()->where(['product_id' => $id])->all();

        if (!isset($gallery)) {
            throw new HttpException(404, 'The requested item has not been found. Sorry.');
        }

        $gallery_json_obj = [];
        $gallery_zoom_image = [];
        $i = false;
        foreach ($gallery as $img) {
            $gallery_json_obj[] = [
                'src' => Yii::$app->Url->imgUrl() . $img->img,
                'w' => 600,
                'h' => 743
            ];

            if (!$i) {
                $gallery_zoom_image = $img;
                $i = true;
            }
        }

        return $this->render('item', [
            'product' => $product,
            'gallery' => $gallery,
            'gallery_json_obj' => Json::encode($gallery_json_obj),
            'gallery_zoom_image' => $gallery_zoom_image
        ]);
    }

    /**
     * Displays the shop page.
     * 
     * @return mixed
     */
    public function actionShop($category = '', $sorting = '')
    {
        $categories = \common\models\ShopCategories::find()->all();

        if ($category === '') {
            $products = \common\models\ShopProducts::find()->all();
        } else {
            $products = \common\models\ShopProducts::find()->where(['category_id' => (int) $category])->all();
        }

        return $this->render('shop', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    /**
     * Displays the checkout page.
     * 
     * @return mixed
     */
    public function actionCheckout()
    {
        return $this->render('checkout');
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        return $this->render('contact');
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Displays gallery page.
     * 
     * @return mixed
     */
    public function actionGallery()
    {
        return $this->render('gallery');
    }
    
    /**
     * Displays the current shopping cart page.
     * 
     * @return mixed
     */
    public function actionViewCart()
    {
        return $this->render('view-cart');
    }

    /**
     * Displays the services page.
     * 
     * @return mixed
     */
    public function actionServices()
    {
        return $this->render('services');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Adds an item to the shopping cart.
     */
    public function actionAddToCart()
    {
        if (Yii::$app->request->post()) {
            $id = Yii::$app->request->post()['id'];
            $product = \common\models\ShopProducts::findOne(['id' => $id]);
            $qty = Yii::$app->request->post()['qty'];

            $cart = Yii::$app->cart;
            $cart->add($product, $qty);

            Yii::$app->session->setFlash('success', 'Product has been added to the shopping cart.');
            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        }

        Yii::$app->session->setFlash('error', 'Product could not be added. Please try again later.');
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    /**
     * Completely removes an item from the shopping cart.
     */
    public function actionItemCancel($id)
    {
        $cart = Yii::$app->cart;

        if ($cart->getItem($id) !== null) {
            $cart->remove($id);
            Yii::$app->session->setFlash('success', 'Product has been removed from the cart.');
            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        }

        Yii::$app->session->setFlash('error', 'Product could not be removed.');
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    /**
     * Clears the cart.
     */
    public function actionClearCart()
    {
        Yii::$app->cart->clear();

        Yii::$app->session->setFlash('success', 'Cart has been cleared.');
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    /**
     * Updates the products' quantities in the cart.
     */
    public function actionUpdateCart()
    {
        $cart = Yii::$app->cart;

        foreach (Yii::$app->request->post() as $key => $value) {
            $tmp = explode('+', $key);
            $id = $tmp[1];

            $cart->change($id, $value);
        }

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    /**
     * Gets all the information from the cart and places the order.
     */
    public function actionPlaceOrder()
    {
        if (Yii::$app->cart->getTotalCost() === 0) {
            Yii::$app->session->setFlash('error', 'Cosul de cumparaturi este gol.');

            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        }

        if (Yii::$app->request->post()) {

            $request = Yii::$app->request->post();

            if (!isset($request['radio'])) {
                Yii::$app->session->setFlash('error', 'Please fill in all the required fields of the form.');
                return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
            }

            $req_direct = [];
            $req_indirect = [];

            foreach ($request as $key => $value) {
                $tmp = explode('_direct', $key);

                if (isset($tmp[1])) {
                    $req_direct[$tmp[0]] = $value;
                }
            }

            if ($request['radio'] === 'card') {
                Yii::$app->session->set('req_direct', $req_direct);

                return $this->redirect(['/site/payment']);
            }

            if (isset($request['indirect_true'])) {
                foreach ($request as $key => $value) {
                    $tmp = explode('_indirect', $key);
    
                    if (isset($tmp[1])) {
                        $req_indirect[$tmp[0]] = $value;
                    }
                }
            }

            if ($this->saveClientDetails($req_direct, 'cash-on-delivery')) {
                if ($this->generateInvoice()) {
                    if ($this->sendEmails()) {
                        Yii::$app->cart->clear();
                        Yii::$app->session->setFlash('success', 'Comanda a fost plasata.');

                        return $this->goHome();
                    } else {
                        throw new HttpException(500, 'Your request could be completed. Please try again later. Error: Send Emails.');
                    }
                } else {
                    throw new HttpException(500, 'Your request could be completed. Please try again later. Error: Generate invoice.');
                }
            } else {
                throw new HttpException(500, 'Your request could be completed. Please try again later. Error: Save Client Details.');
            }
        }
    }

    private function saveClientDetails($req_direct, $payment_method)
    {
        $model_client = \common\models\ClientsInfo::findOne(['client_email_address' => $req_direct['email']]);

        if ($model_client) {
            $client_history = new \common\models\ClientsHistory;

            $client_history->client_id = $model_client->id;
            $client_history->transaction_date = date('d-m-Y');
            $client_history->payment_total = Yii::$app->cart->getTotalCost();
            $client_history->payment_method = $payment_method;

            if ($client_history->save(false)) {
                return true;
            }
        } else {
            $client_info = new \common\models\ClientsInfo;
            $client_history = new \common\models\ClientsHistory;

            $client_info->client_first_name = $req_direct['first_name'];
            $client_info->client_last_name = $req_direct['last_name'];
            $client_info->client_email_address = $req_direct['email'];

            if ($client_info->save()) {
                $client_history->client_id = $client_info->id;
                $client_history->transaction_date = date('d-m-Y');
                $client_history->payment_total = Yii::$app->cart->getTotalCost();
                $client_history->payment_method = $payment_method;
                
                if ($client_history->save(false)) {
                    return true;
                }
            }
        }

        return false;
    }

    private function generateInvoice()
    {
        return true;
    }

    private function sendEmails()
    {
        return true;
    }

    /**
     * Displays and processes payment.
     */
    public function actionPayment()
    {
        $this->layout = 'payment';

        return $this->render('payment');
    }

    /**
     * Stripe SDK integration
     */
    public function actionPerformPayment()
    {
        \Stripe\Stripe::setApiKey('sk_test_51HLFOaDfku0lGfVqZpmhcnUhCzlZC4QhE6N3CtlQD9FHQal15vEypkgC0nD5uVco14jwTfMcFxiE1zWLRiwP5ctx003d05yPwf');
        
        try {
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => Yii::$app->cart->getTotalCost() * 100,
                'currency' => 'ron',
            ]);
            $output = [
                'clientSecret' => $paymentIntent->client_secret,
            ];
            
            echo json_encode($output);
        } catch (Error $e) { 
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    /**
     * Payment confirmation page
     */
    public function actionConfirmPayment()
    {
        $req_direct = Yii::$app->session->get('req_direct');

        if ($this->saveClientDetails($req_direct, 'card-payment')) {
            if ($this->generateInvoice()) {
                if ($this->sendEmails()) {
                    Yii::$app->cart->clear();
                    Yii::$app->session->setFlash('success', 'Comanda a fost plasata.');

                    return $this->goHome();
                } else {
                    throw new HttpException(500, 'Your request could be completed. Please try again later. Error: Send Emails.');
                }
            } else {
                throw new HttpException(500, 'Your request could be completed. Please try again later. Error: Generate invoice.');
            }
        } else {
            throw new HttpException(500, 'Your request could be completed. Please try again later. Error: Save Client Details.');
        }
    }
}
