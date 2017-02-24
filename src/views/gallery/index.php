<?php

use yii\helpers\Html;
use yii\grid\GridView;
use zacksleo\yii2\gallery\Module;

$this->title = Module::t('default', 'Gallery manager');
$this->params['breadcrumbs'] = [
    Module::t('default', 'Galleries')
];

?>

<div class="gallery-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'status',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
