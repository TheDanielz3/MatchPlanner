<?php
/**
 * Created by PhpStorm.
 * User: Diogo
 * Date: 15/01/2019
 * Time: 12:44
 */

namespace frontend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    public $image;
    public $video;

    public function rules()
    {
        return [
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, gif'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $file)
            {
                $file->saveAs('posts/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}