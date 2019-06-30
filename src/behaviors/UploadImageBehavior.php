<?php

namespace zacksleo\yii2\gallery\behaviors;

use mohorev\file\UploadImageBehavior as UploadBehavior;
use yii\web\UploadedFile;
use zacksleo\yii2\gallery\models\GalleryFile;

class UploadImageBehavior extends UploadBehavior
{
    public $galleryId = 1;

    public function init()
    {
        $this->path = '@frontend/web/uploads/galleries/';
        $this->url = '@web/uploads/galleries/';
        parent::init();
    }

    public function beforeSave()
    {
        /** @var \yii\db\BaseActiveRecord $model */
        $model = $this->owner;
        if (in_array($model->scenario, $this->scenarios)) {
            if ($this->getUploadedFile() instanceof UploadedFile) {
                if (!$model->getIsNewRecord() && $model->isAttributeChanged($this->attribute)) {
                    if ($this->unlinkOnSave === true) {
                        $this->delete($this->attribute, true);
                    }
                }
                $model->setAttribute($this->attribute, $this->galleryId . '/' . $this->getUploadedFile()->name);
            } else {
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

    /**
     * @inheritdoc
     */
    protected function delete($attribute, $old = false)
    {
        parent::delete($attribute, $old);
        /** @var \yii\db\BaseActiveRecord $model */
        $model = $this->owner;
        $fileName = ($old === true) ? $model->getOldAttribute($attribute) : $model->$attribute;
        GalleryFile::deleteAll([
            'gallery_id' => $this->galleryId,
            'file' => $fileName
        ]);
    }

    protected function afterUpload()
    {
        $model = new GalleryFile();
        $model->gallery_id = $this->galleryId;
        $model->file = $this->owner->{$this->attribute};
        $model->caption = $this->owner->name;
        $model->save();
        parent::afterUpload();
    }
}
