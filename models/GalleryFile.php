<?php

namespace zacksleo\yii2\gallery\models;

use Yii;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "{{%gallery_file}}".
 *
 * @property integer $id
 * @property integer $gallery_id
 * @property string $file
 * @property string $caption
 * @property integer $position
 */
class GalleryFile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%gallery_file}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gallery_id', 'file'], 'required'],
            [['gallery_id', 'position'], 'integer'],
            ['position', 'default', 'value' => 0],
            [['caption', 'file'], 'string', 'max' => 255]
        ];
    }

    /**
     * Get file src
     * @return string
     */
    public function getSrc()
    {
        $path = DIRECTORY_SEPARATOR . preg_replace('/^@(\w+)\//i', '', Yii::$app->getModule('gallery')->basePath);

        return FileHelper::normalizePath($path . DIRECTORY_SEPARATOR . $this->gallery_id . DIRECTORY_SEPARATOR . $this->file, DIRECTORY_SEPARATOR);
    }

    /**
     * Get file path
     * @return bool|string
     */
    public function getPath()
    {
        return FileHelper::normalizePath(Yii::getAlias(Yii::$app->getModule('gallery')->basePath . DIRECTORY_SEPARATOR
            . $this->gallery_id . DIRECTORY_SEPARATOR . $this->file));
    }
}
