<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TaskSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="task-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?php //$form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?php //$form->field($model, 'description') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'company') ?>

    <?php echo $form->field($model, 'status') ?>

    <?php echo $form->field($model, 'priority') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php echo $form->field($model, 'create_time') ?>

    <?php // echo $form->field($model, 'update_time') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Limpiar'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
