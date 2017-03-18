<?php

use yii\helpers\Html;
use zacksleo\yii2\gallery\Module;

?>

<div class="image col-lg-3 col-md-4 col-sm-6 col-xs-12" data-id="<?= $model->id ?>">
    <div class="wrapper">
        <div class="handle">
            <img src="<?= $model->src; ?>" class="portrait img-responsive"/>
        </div>

        <div class="bottom">
            <?= Html::textInput('caption', $model->caption, [
                'class' => 'form-control',
                'placeholder' => Module::t('default', 'Caption')
            ]); ?>

            <div class="actions">
                <a href="<?= $model->src; ?>" rel="<?= $model->gallery_id; ?>" class="fancy"
                   title="<?= $model->caption; ?>">
                    <i class="watch glyphicon glyphicon-eye-open" title="<?= Module::t('default', 'Original'); ?>"></i>
                </a>

                <i class="edit glyphicon glyphicon-pencil" title="<?= Module::t('default', 'Update caption'); ?>"></i>

                <i class="remove glyphicon glyphicon-trash" title="<?= Module::t('default', 'Remove image'); ?>"></i>
            </div>
        </div>
    </div>
</div>
