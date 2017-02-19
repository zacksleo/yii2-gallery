<?php


namespace zacksleo\yii2\gallery\behaviors;

use mongosoft\file\UploadImageBehavior as UploadBehavior;
use yii\web\UploadedFile;

class UploadImageBehavior extends UploadBehavior
{
    public $galleryId = 1;

    public function init()
    {
        $this->path = '@frontend/web/galleries/';
        $this->url = '@web/galleries/';
        parent::init();
    }

    public function beforeSave()
    {
        /** @var BaseActiveRecord $model */
        $model = $this->owner;
        if (in_array($model->scenario, $this->scenarios)) {
            if ($this->_file instanceof UploadedFile) {
                if (!$model->getIsNewRecord() && $model->isAttributeChanged($this->attribute)) {
                    if ($this->unlinkOnSave === true) {
                        $this->delete($this->attribute, true);
                    }
                }
                $model->setAttribute($this->attribute, $this->galleryId . '/' . $this->_file->name);
            } else {
                // Protect attribute
                unset($model->{$this->attribute});
            }
        } else {
            if (!$model->getIsNewRecord() && $model->isAttributeChanged($this->attribute)) {
                if ($this->unlinkOnSave === true) {
                    $this->delete($this->attribute, true);
                }
            }
        }
    }
}