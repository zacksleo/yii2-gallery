<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use zacksleo\yii2\gallery\Module;

$this->title = Html::encode($model->name);
$this->params['breadcrumbs'] = [
    ['label' => Module::t('default', 'Galleries'), 'url' => ['index']],
    $this->title
];

?>

<div class="gallery-view">
    <div class="page-header">
        <div class="row">
            <div class="col-md-9">
                <h1><?= Html::encode($model->name); ?></h1>
            </div>

            <div class="col-md-3">
                <div class="pull-right">
                    <?= Html::a(Module::t('default', 'Create'), ['create'], [
                        'class' => 'btn btn-success btn-sm'
                    ]); ?>
                    <?= Html::a(Module::t('default', 'Update'), ['update', 'id' => $model->id], [
                        'class' => 'btn btn-primary btn-sm'
                    ]); ?>
                    <?= Html::a(Module::t('default', 'Delete'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger btn-sm',
                        'data' => [
                            'confirm' => Module::t('default', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'status:boolean',
            'created_at:time',
            'updated_at:time',
        ],
    ]); ?>
</div>
