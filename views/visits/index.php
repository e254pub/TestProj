<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\components\VisitorComponent;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VisitsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visits-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Visits', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => VisitorComponent::visitorsCount(),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'host',
            'count',
        ],
    ]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'usr_id',
            'date',
            'host',
            'ip_addr',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, \app\models\Visits $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>
</div>
