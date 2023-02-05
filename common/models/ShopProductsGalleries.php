<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "shop_products_galleries".
 *
 * @property int $id
 * @property int $product_id
 * @property string $img
 */
class ShopProductsGalleries extends \yii\db\ActiveRecord
{
    public $imageFiles;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shop_products_galleries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'img'], 'required'],
            [['product_id'], 'integer'],
            [['img'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg', 'maxFiles' => 10, 'maxSize' => 5120000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'img' => 'Img',
        ];
    }

    public function upload($img, $time)
    {
        if ($this->validate(false)) {
            $img->saveAs('uploads/' . $time . $img->baseName . '.' . $img->extension);
            return true;
        }

        return false;
    }
}
