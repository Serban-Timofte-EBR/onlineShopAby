<?php

namespace frontend\controllers;

use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\helpers\Json;
use common\models\User;
use common\models\ShopProducts;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

/**
 * API controller
 */
class AjaxActionsController extends Controller
{
    public $enableCsrfValidation = false;
    /**
     * Main test page for the ajax actions controller.
     */
    public function actionIndex()
    {
        return Json::encode(['status' => 200, 'message' => 'OK']);
    }

    /**
     * Adds an element to cart, requires id and quantity.
     */
    public function actionAddToCart()
    {
        if (Yii::$app->request->post()) {
            var_dump(Yii::$app->request->post()); die;
            $product = $this->findProduct(Yii::$app->request->post()['id']);
            $qty = 1;

            if ($this->checkProductExistsInCart($product->id)) {
                $this->changeQuantity($product, 1);
                return Json::encode(['status' => 200, 'message' => 'OK']);
            }

            $cart = Yii::$app->cart;

            if ($cart->add($product, $qty)) {
                return Json::encode(['status' => 200, 'message' => 'OK']);
            }

            return Json::encode(['status' => 500, 'message' => 'internal_server_error']);
        }

        return Json::encode(['status' => 403, 'message'=> 'forbidden_error']);
    }

    /**
     * Change the quantity of a product, product id and quantity required.
     */
    private function changeQuantity($product, $qty)
    {
        $cart = Yii::$app->cart;

        if ($cart->plus($product->id, $qty)) {
            return true;
        }

        return false;
    }

    /**
     * Removes a product from the shopping cart, id requred.
     */
    public function actionRemoveProduct()
    {
        if (Yii::$app->request->post()) {
            $id = Yii::$app->request->post()['id'];
            $cart = Yii::$app->cart;

            if ($cart->remove($id)) {
                return Json::encode(['status' => 200, 'message' => 'OK']);
            }

            return Json::encode(['status' => 500, 'message' => 'internal_server_error']);
        }

        return Json::encode(['status' => 403, 'message'=> 'forbidden_error']);
    }

    /**
     * Clears the cart of all the products.
     */
    public function actionClearCart()
    {
        Yii::$app->cart->clear();

        return Json::encode(['status' => 200, 'message' => 'OK', 'payload' => 'Cart is clear.']);
    }

    /**
     * Returns the total number of items in the cart.
     */
    public function actionCartItemsCount()
    {
        return Json::encode(['status' => 200, 'message' => 'OK', 'payload' => Yii::$app->cart->getTotalCount()]);
    }

    /**
     * Returns the total cost of the cart.
     */
    public function actionCartCostCount()
    {
        return Json::encode(['status' => 200, 'message' => 'OK', 'payload' => round(Yii::$app->cart->getTotalCost(), 2)]);
    }

    /**
     * Returns an ActiveRecord ShopProducts.
     * @param id
     */
    protected function findProduct($id)
    {
        return ShopProducts::findOne(['id' => $id]);
    }

    /**
     * Check if a product exists in the cart.
     * @param id
     */
    protected function checkProductExistsInCart($id)
    {
        return Yii::$app->cart->getItem($id) ? true : false;
    }

    /**
     * Checks whether the post request parameters are empty or not.
     * @param product
     * @param qty
     */
    private function checkRequestParamsMissing($product, $qty)
    {
        if (empty($product) && empty($qty)) {
            return Json::encode(['status' => 500, 'message' => 'internal_server_error', 'payload' => 'Missing product and quantity.']);
        }
    }
}