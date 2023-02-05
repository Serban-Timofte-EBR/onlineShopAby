<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "shop_categories".
 *
 * @property int $id
 * @property string $category_name
 * @property string $img
 */
class ShopCategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shop_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_name', 'img'], 'required'],
            [['category_name'], 'string', 'max' => 256],
            [['img'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg', 'maxSize' => 5120000],
            [['category_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_name' => 'Category Name',
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
