<?php

namespace common\components;

use yii\base\Component;

class Url extends Component
{
    public $path = 'http://127.0.0.1/Personal/abysand/';

    public function imgUrl()
    {
        return $this->path . 'backend/web/uploads/';
    }

    public function staticImg()
    {
        return $this->path . 'frontend/web/img/';
    }

    public function unlinkUrl()
    {
        return $_SERVER['DOCUMENT_ROOT'] . '/abysand/backend/web/uploads/';
    }

    public function assetImgUrl()
    {
        return $this->path . 'frontend/web/img/';
    }
}
