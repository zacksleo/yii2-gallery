<?php

use yii\helpers\Html;
use zacksleo\yii2\gallery\Module;

$this->title = Module::t('default', 'Update') . ' ' . Html::encode($model->name);
$this->params['breadcrumbs'] = [
    ['label' => Module::t('default', 'Galleries'), 'url' => ['index']],
    ['label' => Html::encode($model->name), 'url' => ['view', 'id' => $model->id]],
    Module::t('default', 'Update')
];

?>

<div class="gallery-update">
    <div class="page-header">
        <div class="row">
            <div class="col-md-9">
                <h1><?= Html::encode($model->name); ?></h1>
            </div>

            <div class="col-md-3">
                <div class="pull-right">
                    <?= Html::a(Module::t('default', 'View'), [
                        'view', 'id' => $model->id
                    ], [
                        'class' => 'btn btn-warning btn-sm'
                    ]); ?>
                </div>
            </div>
        </div>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]); ?>
</div>
