<?php

use app\models\Task;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\TaskSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Tasks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1>Panel de admistración de tareas</h1>

    <p>
        <?= Html::a(Yii::t('app', 'Crear nueva tarea'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'title',
                'label' => 'Título',
            ],
            [
                'attribute' => 'type',
                'label' => 'Tipo',
            ],
            [
                'attribute' => 'status',
                'label' => 'Estado',
            ],
            [
                'attribute' => 'priority',
                'label' => 'Prioridad',
            ],
            [
                'attribute' => 'create_time',
                'label' => 'Fecha de creación',
            ],
            //'company',
            //'user_id',
            //'update_time',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Task $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
