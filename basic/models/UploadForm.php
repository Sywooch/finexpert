<?php
namespace app\models;

use yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }
    
    public function upload($id)
    {
        $path = Yii::$app->basePath;
       
        if ($this->validate()) {
            if (!file_exists($path.'/web/images/offer/')) {
                mkdir($path.'/web/images/offer');
                if (!file_exists($path.'/web/images/offer/logo/')) {
                    mkdir($path.'/web/images/offer/logo');    
                }
            }
            $this->imageFile->saveAs($path.'/web/images/offer/logo/' . $id . '.png');
            return true;
        } else {
            return false;
        }
    }
}
?>