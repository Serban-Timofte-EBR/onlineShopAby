<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "shop_products".
 *
 * @property int $id
 * @property string $product_name
 * @property string $product_desc
 * @property string $price
 * @property int $stock
 */
class ShopProducts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shop_products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_name', 'product_desc', 'price', 'category_id'], 'required'],
            [['stock', 'category_id'], 'integer'],
            [['product_name'], 'string', 'max' => 256],
            [['product_desc'], 'string', 'max' => 1024],
            [['price'], 'string', 'max' => 16],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_name' => 'Product Name',
            'product_desc' => 'Product Desc',
            'price' => 'Price',
            'stock' => 'Stock',
        ];
    }
}
