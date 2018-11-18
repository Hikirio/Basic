<?php

namespace app\models;


use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model
{
    public $image;

    public function rules()
    {
        return
            [
                [['image'], 'required'],
                [['image'], 'file', 'extensions' => 'jpg,png,jpeg']
            ];

    }

    public function uploadFile(UploadedFile $file, $currenimage)
    {

        $this->image = $file;
        if ($this->validate()) {

            $this->deleteCurrentImage($currenimage);

            return $this->upImg();

        }
    }

    public function upImg()
    {
        $filename = $this->generateFilename();

        $this->image->saveAs($this->getFolder() . $filename);

        return $filename;
    }

    public function deleteCurrentImage($currenimage)
    {
        if ($this->fileExists($currenimage)) {

            unlink($this->getFolder() . $currenimage);

        }

    }

    public function fileExists($currenimage)
    {
        if (!empty($currenimage) && $currenimage != null) {
            return file_exists($this->getFolder() . $currenimage);
        }
    }

    public function generateFilename()
    {
        return strtolower(md5(uniqid($this->image->baseName)) . '.' . $this->image->extension);
    }

    public function getFolder()
    {

        return Yii::getAlias('@web') . 'uploads/';

    }
}