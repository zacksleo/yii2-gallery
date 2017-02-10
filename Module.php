<?php

namespace zacksleo\yii2\gallery;

use Yii;

/**
 * Class Module
 * @package sadovojav\gallery
 */
class Module extends \yii\base\Module
{
    /**
     * @var string
     */
    public $controllerNamespace = 'zacksleo\yii2\gallery\controllers';

    /**
     * @var string
     */
    public $sourcePath = '@frontend/web/galleries';
    public $basePath = '@webroot/galleries';

    /**
     * @var int
     */
    public $queryCacheDuration = 604800;

    /**
     * @var bool
     */
    public $uniqueName = true;

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['zacksleo/gallery/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@vendor/zacksleo/yii2-gallery/messages',
            'fileMap' => [
                'zacksleo/gallery/default' => 'default.php',
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('zacksleo/gallery/' . $category, $message, $params, $language);
    }
}
